<?php

$urlParts = explode('/', $requestedUrl);
$accountId = $urlParts[2];
$time = time();

if(isset($_GET['premium'])) {
    $setting = $_GET['premium'];
    if($setting === 'perma') {
        $stmt = $dbConnection->prepare('UPDATE `Account` SET `premium` = -1 WHERE `account_id` = :accid');
        $stmt->bindParam(':accid', $accountId);
        if($stmt->execute()) {
            $templateEngine->addAlert('success', 'Successfully added Permanent Premium to the Account!');
            $setting = '';
            header('Location: '.$requestedPath.'/manageaccount/'.$accountId);
        }
        if(!empty($setting)) {
            $templateEngine->addAlert('danger', 'Couldn\'t add permanent premium!');
            $setting = '';
            header('Location: '.$requestedPath.'/manageaccount/'.$accountId);
        }
    }
    if($setting === 'remove') {
        $stmt = $dbConnection->prepare('UPDATE `Account` SET `premium` = :curtime WHERE `account_id` = :accid');
        $stmt->bindParam(':curtime', $time);
        $stmt->bindParam(':accid', $accountId);
        if($stmt->execute()) {
            $templateEngine->addAlert('success', 'Successfully removed premium!');
            $setting = '';
            header('Location: '.$requestedPath.'/manageaccount/'.$accountId);
        }
        if(!empty($setting)) {
            $templateEngine->addAlert('danger', 'Couldn\'t remove permanent premium!');
            $setting = '';
            header('Location: '.$requestedPath.'/manageaccount/'.$accountId);
        }
    }
}

if(isset($_POST['userSettingsFirstname'], $_POST['userSettingsLastname'], $_POST['userSettingsEmail'], $_POST['userSettingsRank'], $_POST['userSettingsStatus'], $_POST['userSettingsSubmit'])) {

    $firstname = $_POST['userSettingsFirstname'];
    $lastname = $_POST['userSettingsLastname'];
    $email = $_POST['userSettingsEmail'];
    $rank = $_POST['userSettingsRank'];
    $status = $_POST['userSettingsStatus'];
    $execute = true;

    $newRole = 'USER';
    if($rank === 'admin') {
        $newRole = 'ADMIN';
    }

    $active = 'false';
    if($status === 'on') {
        $active = 'true';
    }

    $stmt = $dbConnection->prepare('SELECT `role` FROM `Account` WHERE `account_id` = :accid');
    $stmt->bindParam(':accid', $accountId);
    if(!$stmt->execute()) {
        $execute = false;
    }
    $tempData = $stmt->fetch();

    $stmt = $dbConnection->prepare('UPDATE `Account` SET `email` = :email, `firstname` = :fname,`lastname` = :lname WHERE `account_id` = :accid');
    if($tempData['role'] !== 'ROOT') {
        $stmt = $dbConnection->prepare('UPDATE `Account` SET `email` = :email,`firstname` = :fname,`lastname` = :lname, `role` = :role, `active` = :active WHERE `account_id` = :accid');
        $stmt->bindParam(':active', $active);
        $stmt->bindParam(':role', $newRole);
    }
    $stmt->bindParam(':accid', $accountId);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':fname', $firstname);
    $stmt->bindParam(':lname', $lastname);
    if($execute && $stmt->execute()) {
        $templateEngine->addAlert('success', 'Successfully updated the Account Settings!');
        $execute = false;
    }

    if($execute === true) {
        $templateEngine->addAlert('danger', 'Couldn\'t update the Account Settings!');
        $execute = false;
    }

}

if(isset($_POST['userChangePassword'], $_POST['userChangePasswordRepeat'], $_POST['userChangePasswordSumbit'])) {

    $newPwd = $_POST['userChangePassword'];
    $repeat = $_POST['userChangePasswordRepeat'];
    $proceed = true;

    $password = password_hash($newPwd, PASSWORD_BCRYPT);

    if(empty($newPwd)) {
        $templateEngine->addAlert('danger', 'The Password can not be empty!');
        $proceed = false;
    }

    if($newPwd !== $repeat) {
        $templateEngine->addAlert('danger', 'The passwords don\'t match!');
        $proceed = false;
    }

    if($proceed) {
        $stmt = $dbConnection->prepare('SELECT `role` FROM `Account` WHERE `account_id` = :accid');
        $stmt->bindParam(':accid', $accountId);
        if(!$stmt->execute()) {
            $proceed = false;
        }
        $tempData = $stmt->fetch();
    }

    if($proceed && $tempData['role'] !== 'ROOT') {
        $stmt = $dbConnection->prepare('UPDATE `Account` SET `password` = :password WHERE `account_id` = :accid');
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':accid', $accountId);
        if($stmt->execute()) {
            $templateEngine->addAlert('success', 'Successfully changed the users Password!');
            $proceed = false;
        }
    }

    if($proceed) {
        $templateEngine->addAlert('success', 'An error occureed while changing the users password!');
        $proceed = false;
    }
}

if(isset($_POST['userPremiumAddXDays'], $_POST['userPremiumAddSubmit'])) {
    $days = $_POST['userPremiumAddXDays'];
    $stmt = $dbConnection->prepare('SELECT `premium` FROM `Account` WHERE `account_id` = :accid LIMIT 1');
    $stmt->bindParam(':accid', $accountId);
    $stmt->execute();
    $tempData = $stmt->fetch();
    $newPremiumTime = time() + (60 * 60 * 24 * $days);
    if($tempData['premium'] > 0 && $tempData['premium'] > $time) {
        $newPremiumTime = $tempData['premium'] + (60 * 60 * 24 * $days);
    }

    $stmt = $dbConnection->prepare('UPDATE `Account` SET `premium` = :newtime WHERE `account_id` = :accid');
    $stmt->bindParam(':newtime', $newPremiumTime);
    $stmt->bindParam(':accid', $accountId);
    if($stmt->execute()) {
        $templateEngine->addAlert('success', 'Successfully updated premium!');
        $setting = '';
    }
    if(!empty($setting)) {
        $templateEngine->addAlert('danger', 'Couldn\'t update premium!');
        $setting = '';
    }
}

$stmt = $dbConnection->prepare('SELECT `email`,`password`,`firstname`,`lastname`,`role`,`active`,`premium`,`adminnotes` FROM `Account` WHERE `account_id` = :accid LIMIT 1');
$stmt->bindParam(':accid', $accountId);
if(!$stmt->execute() || $stmt->rowCount() == 0) {
    header("Location: ".$requestedPath.'/accounts');
    exit();
}
$data = $stmt->fetch();

$premium = 'This User hadn\'t had premium yet!';
if($data['premium'] > 0) {
    $premium = date('d.m.Y H:i', $data['premium']);
}
if($data['premium'] == -1) {
    $premium = 'This User has permanent premium!';
}

$adminRole = '';
if($data['role'] === 'ADMIN' || $data['role'] === 'ROOT') {
    $adminRole = 'selected';
}

$accountDisabled = '';
if($data['active'] === 'false') {
    $accountDisabled = 'selected';
}

require_once TEMPLATE_DIR.'/page/admin.viewuser.php';