<?php

if(isset($_POST['addNewStatusTitle'], $_POST['addNewStatusDescription'], $_POST['addNewStatusStatus'], $_POST['addNewStatusDashMsg'])) {

    $title = $_POST['addNewStatusTitle'];
    $description = $_POST['addNewStatusDescription'];
    $status = $_POST['addNewStatusStatus'];
    $dashMsg = $_POST['addNewStatusDashMsg'];
    $time = time();

    if(empty($dashMsg)) {
        $dashMsg = NULL;
    }

    $continue = true;
    $stmt = $dbConnection->prepare(
        'INSERT INTO `Status` SET `title` = :title, `description` = :descripton, `status` = :status, `created` = :timenow, `lastupdate` = :timenoww, `dash_message` = :dashmsg, `automtical` = "false"');
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':descripton', $description);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':timenow', $time);
    $stmt->bindParam(':timenoww', $time);
    $stmt->bindParam(':dashmsg', $dashMsg);
    if($stmt->execute()) {
        $continue = false;
        $templateEngine->addAlert('success', 'Added new Indecent to the database!');
    }

    if($continue) {
        $continue = false;
        $templateEngine->addAlert('danger', 'Couldn\'t add the indecent to our database!');
    }

}

$stmt = $dbConnection->prepare('SELECT status_id,title, created, status, dash_message, automtical FROM `Status` ORDER BY `created` DESC');
$stmt->execute();

$output = '';
while ($row = $stmt->fetch()) {

    $status = '<span class="badge badge-dark">Unknown</span>';
    if($row['status'] == 'open') {
        $status = '<span class="badge badge-danger">Open</span>';
    }
    if($row['status'] == 'maintenance') {
        $status = '<span class="badge badge-primary">Maintenance</span>';
    }
    if($row['status'] == 'monitoring') {
        $status = '<span class="badge badge-info">Monitoring</span>';
    }
    if($row['status'] == 'closed') {
        $status = '<span class="badge badge-success">Closed</span>';
    }

    $autoreport = '';
    if($row['automtical'] == 'true') {
        $autoreport = '<small class="text-muted"> (Automatic)</small>';
    }

    $data = ['title' => $row['title'], 'status' => $status, 'created' => date('d.m.Y H:i', $row['created']) . $autoreport, 'statusid' => $row['status_id'], 'requestedPath' => $requestedPath];

    $output .= $templateEngine->render('admin.indecent', $data);

}

require_once TEMPLATE_DIR.'/page/admin.status.php';