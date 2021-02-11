<?php

$stmt = $dbConnection->prepare(
    'SELECT `status_id`,`created`,`title`,`description`,`status`,`lastupdate`,`updates` FROM `Status` ORDER BY `created` DESC');
$stmt->execute();

$output = '';
while($row = $stmt->fetch()) {

    $status = 'dark';
    if($row['status'] == 'open') {
        $status = 'danger';
    }
    if($row['status'] == 'monitoring') {
        $status = 'info';
    }
    if($row['status'] == 'maintenance') {
        $status = 'primary';
    }
    if($row['status'] == 'closed') {
        $status = 'success';
    }

    $data = ['identifier' => $row['status_id'], 'created' => $row['created'], 'title' => $row['title'], 'description' => $row['description'], 'type' => $status, 'lastupdate' => $row['lastupdate'], 'updates' => $row['updates']];

    $output .= $templateEngine->render('indecent', $data);

}

require_once TEMPLATE_DIR.'/page/status.php';