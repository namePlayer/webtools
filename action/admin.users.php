<?php

$newUserFname = '';
$newUserLname = '';
$newUserEmail = '';

if(isset($_POST['newUserFname'], $_POST['newUserLname'], $_POST['newUserEmail'], $_POST['newUserPremium'])) {

    $newUserFname = $_POST['newUserFname'];
    $newUserLname = $_POST['newUserLname'];
    $newUserEmail = $_POST['newUserEmail'];
    $premium = (int)$_POST['newUserPremium'];
    $execute = true;

    if(empty($newUserEmail)) {
        $templateEngine->addAlert('danger', 'Please enter an valid Email');
        $execute = false;
    }

    if($premium > 0) {
        $premium = time() + (60 * 60 * 24 * $premium);
    }

    $stmt = $dbConnection->prepare('INSERT INTO `Account` SET `email` = :email, `firstname` = :firstname, `lastname` = :lastname, `premium` = :premium');
    $stmt->bindParam(':email', $newUserEmail);
    $stmt->bindParam('firstname', $newUserFname);
    $stmt->bindParam(':lastname', $newUserLname);
    $stmt->bindParam(':premium', $premium);
    if($execute && $stmt->execute()) {
        $templateEngine->addAlert('success', 'Successfully created a new User!');
        $newUserFname = '';
        $newUserLname = '';
        $newUserEmail = '';
        $execute = false;
    }

    if($execute) {
        $templateEngine->addAlert('danger', 'An error occurred!');
        $execute = false;
    }

}

$stmt = $dbConnection->prepare('SELECT `account_id`,`email`,`firstname`,`lastname`,`role`,`active`, `premium` FROM `Account`');
$stmt->execute();

$output = '';
while($row = $stmt->fetch()) {

    $hasPremium = '<i class="fa fa-times text-danger"></i>';
    if($row['premium'] == -1 || $row['premium'] > time()) {
        $hasPremium = '<i class="fa fa-check text-success"></i>';
    }

    $output .= '<tr><td>'.$row['account_id'].'</td><td>'.$row['email'].'</td><td>'.$row['firstname'].' '.$row['lastname'].'</td><td>'.$hasPremium.'</td><td>'.$row['role'].'</td><td><a href="'.$requestedPath.'/manageaccount/'.$row['account_id'].'">Manage</a></td></tr>';

}

require_once TEMPLATE_DIR.'/page/admin.users.php';