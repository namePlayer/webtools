<?php
$requestedUrl = $_SERVER['REQUEST_URI'];
$requestedPath = str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);
    $requestedUrl = str_replace($requestedPath, '', $requestedUrl);
if(strpos($requestedUrl, '?') !== FALSE) {
    $requestedUrl = substr($requestedUrl, 0, strpos($requestedUrl, "?"));
}

if($requestedUrl == '/' || empty($requestedUrl)) {
    header("Location: ".$requestedPath."/dashboard/");
}

if(isLoggedIn()) {
    $stmt = $dbConnection->prepare(
        "SELECT `dash_message` FROM `Status` WHERE `dash_message` IS NOT NULL AND `status` != 'closed' LIMIT 1");
    $stmt->execute();
    $data = $stmt->fetch();
    if($stmt->rowCount() > 0) {
        $templateEngine->addAlert('warning', $data['dash_message'] . ' Please visist the <a href="'.$requestedPath.'/status" class="link-dark">Statuspage</a> for more Information!');
    }
}

if(strpos($requestedUrl, '/login') !== FALSE) {
    if(isLoggedIn()) {
        header("Location: ".$requestedPath."/dashboard/");

        exit();
    }

    require_once ACTION_DIR.'/login.php';

    exit();
}

if(strpos($requestedUrl, '/logout') !== FALSE) {
    session_destroy();

    header("Location: ".$requestedPath."/login/");

    exit();
}

if(strpos($requestedUrl, '/dashboard') !== FALSE) {
    if(!isLoggedIn()) {
        header("Location: ".$requestedPath."/login/");

        exit();
    }

    require_once ACTION_DIR.'/dashboard.php';

    exit();
}

if(strpos($requestedUrl, '/qrcodegen') !== FALSE) {
    if(!isLoggedIn()) {
        header("Location: ".$requestedPath."/login/");

        exit();
    }

    require_once ACTION_DIR.'/qr-generator.php';

    exit();
}


if(strpos($requestedUrl, '/changelog') !== FALSE) {
    if(!isLoggedIn()) {
        header("Location: ".$requestedPath."/login/");

        exit();
    }

    require_once ACTION_DIR.'/changelog.php';

    exit();
}

if(strpos($requestedUrl, '/readfile/') !== FALSE) {
    if(!isLoggedIn()) {
        header("Location: ".$requestedPath."/login/");

        exit();
    }

    require_once ACTION_DIR.'/readfile.php';

    exit();
}

if(strpos($requestedUrl, '/servers') !== FALSE) {
    if(!isLoggedIn() || !$accountManager->isAdmin()) {
        header("Location: ".$requestedPath."/login/");

        exit();
    }

    require_once ACTION_DIR.'/admin.servers.php';

    exit();
}

if(strpos($requestedUrl, '/status') !== FALSE) {
    if(!isLoggedIn()) {
        header("Location: ".$requestedPath."/login/");

        exit();
    }

    require_once ACTION_DIR.'/status.php';

    exit();
}

if(strpos($requestedUrl, '/admin-changelog') !== FALSE) {
    if(!isLoggedIn() || !$accountManager->isAdmin()) {
        header("Location: ".$requestedPath."/login/");

        exit();
    }

    require_once ACTION_DIR.'/admin.adminchangelog.php';

    exit();
}

if(strpos($requestedUrl, '/accounts') !== FALSE) {
    if(!isLoggedIn() || !$accountManager->isAdmin()) {
        header("Location: ".$requestedPath."/login/");

        exit();
    }

    require_once ACTION_DIR.'/admin.users.php';

    exit();
}

if(strpos($requestedUrl, '/manageaccount/') !== FALSE) {
    if(!isLoggedIn() || !$accountManager->isAdmin()) {
        header("Location: ".$requestedPath."/login/");

        exit();
    }

    require_once ACTION_DIR.'/admin.viewuser.php';

    exit();
}

if(strpos($requestedUrl, '/adminstatus') !== FALSE) {
    if(!isLoggedIn() || !$accountManager->isAdmin()) {
        header("Location: ".$requestedPath."/login/");

        exit();
    }

    require_once ACTION_DIR.'/admin.status.php';

    exit();
}

if(strpos($requestedUrl, '/editstatus/') !== FALSE) {
    if(!isLoggedIn() || !$accountManager->isAdmin()) {
        header("Location: ".$requestedPath."/login/");

        exit();
    }

    $parts = explode('/', $requestedUrl);
    $requestId = $parts[2];

    require_once ACTION_DIR.'/admin.editstatus.php';

    exit();
}