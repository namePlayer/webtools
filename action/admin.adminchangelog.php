<?php

if(isset($_POST['addNewChangelogVersion'], $_POST['addNewChangelogDescriptionEditor'])) {

    $version = $_POST['addNewChangelogVersion'];
    $description = $_POST['addNewChangelogDescriptionEditor'];
    $time = time();
    $continue = true;

    $stmt = $dbConnection->prepare('INSERT INTO `Changelog` SET `version` = :version, `releasenotes` = :notes, `released` = :released');
    $stmt->bindParam(':version', $version);
    $stmt->bindParam(':notes', $description);
    $stmt->bindParam(':released', $time);
    if($stmt->execute()){
        $templateEngine->addAlert('success', 'Successfully added new Changelog.');
        $continue = false;
    }

    if($continue) {
        $templateEngine->addAlert('danger', 'Couldn\'t add new Changelog!');
        $continue = false;
    }

}

$stmt = $dbConnection->prepare('SELECT `version`,`releasenotes`,`released` FROM `Changelog` ORDER BY `released` DESC LIMIT 50');
$stmt->execute();

$output = '';
while($row = $stmt->fetch()) {

    $data = ['version' => $row['version'], 'releasenotes' => $row['releasenotes'], 'released' => $row['released'], 'requestedPath' => $requestedPath];
    $output .= $templateEngine->render('admin.changelog', $data);

}

require_once TEMPLATE_DIR.'/page/admin.adminchangelog.php';