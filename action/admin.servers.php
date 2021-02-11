<?php

$title = '';
$address = '';
$port = '';
$documentsLimit = '';
$imageLimit = '';
$user = '';

var_dump($_POST);

if(isset($_POST['addNewServerTitle'], $_POST['addNewServerAddress'], $_POST['addNewServerPort'], $_POST['addNewServerPassword'], $_POST['addNewServerUser'], $_POST['addNewServerKey'], $_POST['addNewServerDocumentLimit'], $_POST['addNewServerImageLimit'], $_POST['addNewServerPort'])) {

    $title = $_POST['addNewServerTitle'];
    $address = $_POST['addNewServerAddress'];
    $port = (int)$_POST['addNewServerPort'];
    $documentsLimit = (int)$_POST['addNewServerDocumentLimit'];
    $imageLimit = (int)$_POST['addNewServerImageLimit'];
    $user = $_POST['addNewServerUser'];
    $sshKey = $_POST['addNewServerKey'];
    $password = $_POST['addNewServerPassword'];
    $process = true;

    if(empty($title)) {
        $templateEngine->addAlert('danger', 'Please fill out the Server Title!');
        $process = false;
    }

    if(empty($address) || $address != '127.0.0.1') {
        $templateEngine->addAlert('danger', 'Please enter an valid Server Address!');
        $process = false;
    }

    if(empty($user)) {
        $templateEngine->addAlert('danger', 'Please fill out the SSH User!');
        $process = false;
    }

    if(empty($sshKey) && empty($password)) {
        $templateEngine->addAlert('danger', 'Please fill out the SSH Private Key or Password!');
        $process = false;
    }

    if($process) {

        $continue = false;
        $connectionSuccess = false;

        if($address == '127.0.0.1' && shell_exec('sudo -u ' . $user . ' touch test.txt' < $password)) {
            $continue = true;
        }

        if($connectionSuccess == false) {
            echo 'extern';

            $sshSession = ssh2_connect($address, $port);
            var_dump(ssh2_auth_password($sshSession, $user, $password));
            var_dump($sshSession);
        }

        if($continue) {

            $status = 'online';

            $stmt = $dbConnection->prepare(
                'INSERT INTO `Server` SET `title` = :title, `ipaddress` = :address, `port` = :port, `process_documents` = :doclimit, `process_pictures` = :piclimit, `status` = :status, `ping` = 0, `user` = :username, `password` = :pwd');
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':port', $port);
            $stmt->bindParam(':doclimit', $documentsLimit);
            $stmt->bindParam(':piclimit', $imageLimit);
            $stmt->bindParam(':username', $user);
            $stmt->bindParam(':pwd', $password);
            $stmt->bindParam(':status', $status);
            /*if($stmt->execute()) {
                $templateEngine->addAlert('success', 'Connected and registered the Server!');
                $continue = false;
                $process = false;
            }*/
        }

    }

    if($process == true) {
        $templateEngine->addAlert('danger', 'An error occurred, please check your information!');
        $process = false;
    }

}

$stmt = $dbConnection->prepare("SELECT `server_id`,`ipaddress`,`port`,`process_documents`,`process_pictures` FROM `Server`");
$stmt->execute();

$output = '';
while($row = $stmt->fetch()) {

    $onlineStatus = '<span class="badge badge-success">Online</span>';
    if($row['ipaddress'] != '127.0.0.1' && pingDomain($row['ipaddress'],$row['port']) < 0) {
        $onlineStatus = '<span class="badge badge-danger" title="The Server hasn\'t responded in 2 Seconds">Offline</span>';
    }

    if($row['ipaddress'] == '127.0.0.1') {
        $onlineStatus = '<span class="badge badge-primary" title="Local Server">This Server</span>';
    }

    $processDocuments = '<i class="fa fa-times text-danger" title="This server is not setup to process documents."></i>';
    if($row['process_documents'] > 0) {
        $processDocuments = '<i class="fa fa-check text-success" title="This server is setup to process documents."></i>';
    }

    $processPictures = '<i class="fa fa-times text-danger" title="This server is not setup to process pictures."></i>';
    if($row['process_pictures'] > 0) {
        $processPictures = '<i class="fa fa-check text-success" title="This server is setup to process pictures."></i>';
    }

    $output .=
        '<tr><td>'.$row['server_id'].'</td><td>'.$row['ipaddress'].':'.$row['port'].'</td><td>'.$onlineStatus.'</td><td>'.$processDocuments.'</td><td>'.$processPictures.'</td><td><a href="#">Manage</a></td></tr>';

}

require_once TEMPLATE_DIR.'/page/admin.servers.php';