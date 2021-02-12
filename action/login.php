<?php

var_dump($_POST);
var_dump($_SESSION);

if(isset($_POST['webtoolsLoginEmail'], $_POST['webtoolsLoginPassword'])) {

    $email = $_POST['webtoolsLoginEmail'];
    $password = $_POST['webtoolsLoginPassword'];
    $execute = true;

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $templateEngine->addAlert('danger', 'Please enter an valid email!');
        $execute = false;
    }

    if(empty($password)) {
        $templateEngine->addAlert('danger', 'Please enter an password!');
        $execute = false;
    }

    if($execute) {
        $stmt = $dbConnection->prepare('SELECT `account_id`,`password`,`active` FROM `Account` WHERE `email` = :email');
        $stmt->bindParam(':email', $email);
        if(!$stmt->execute()) {
            $templateEngine->addAlert('danger', 'An database error occurred!');
            $execute = false;
        }

        $data = $stmt->fetch();
    }

    var_dump($data);

    if($execute && password_verify($password, $data['password']) && $data['active'] === 'true') {
        setLogin($data['account_id']);
        $_SESSION['webtools_loginid'] = $data['account_id'];
        header("Location: ".$requestedPath."/dashboard/");

        $execute = false;
    }

    if($execute) {
        $templateEngine->addAlert('danger', 'An error occurred during the login proccess!');
        $execute = false;
    }

}

require_once TEMPLATE_DIR.'/page/login.php';