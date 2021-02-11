<?php

$stmt = $dbConnection->prepare('SELECT `version`,`releasenotes`,`released` FROM `Changelog` ORDER BY `released` DESC LIMIT 50');
$stmt->execute();

$output = '';
while($row = $stmt->fetch()) {

    $data = ['version' => $row['version'], 'releasenotes' => $row['releasenotes'], 'released' => $row['released'], 'requestedPath' => $requestedPath];
    $output .= $templateEngine->render('changelog', $data);

}

require_once TEMPLATE_DIR.'/page/changelog.php';