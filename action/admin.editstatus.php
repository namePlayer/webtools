<?php
if(isset($_POST['editInformationUpdateStatus'], $_POST['editInformationDescription'], $_POST['editInformationTitle'], $_POST['editInformationDashAlert'], $_POST['editInformationStatus'])) {

    $updateMsg = $_POST['editInformationStatus'];
    $description = $_POST['editInformationDescription'];
    $title = $_POST['editInformationTitle'];
    $dashAlert = $_POST['editInformationDashAlert'];
    $status = $_POST['editInformationStatus'];
    $updates = $_POST['editInformationUpdateStatus'];
    $time = time();

    if(empty($dashAlert)) {
        $dashAlert = NULL;
    }

    $continue = true;
    $stmt = $dbConnection->prepare('UPDATE `Status` SET `title` = :title, `description` = :description, `dash_message` = :dashmsg, `lastupdate` = :times, `updates` = :updates, `status` = :status WHERE `status_id` = :id');
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':dashmsg', $dashAlert);
    $stmt->bindParam(':times', $time);
    $stmt->bindParam(':updates', $updates);
    $stmt->bindParam(':status', $updateMsg);
    $stmt->bindParam(':id', $requestId);
    if($stmt->execute()) {
        $templateEngine->addAlert('success', 'Successfully updated the Indecent!');
        $continue = false;
    }

    if($continue) {
        $templateEngine->addAlert('danger', 'Couldn\'t updated the Indecent!');
        $continue = false;
    }

}

$stmt = $dbConnection->prepare('SELECT `status_id`, `created`, `title`, `description`, `dash_message`, `lastupdate`, `updates`, `status`, `automtical` FROM `Status` WHERE `status_id` = :statid LIMIT 1');
$stmt->bindParam(':statid', $requestId);
$stmt->execute();

if($stmt->rowCount() == 0) {
    header("Location: " . $requestId . '/dashboard');
    exit();
}

$data = $stmt->fetch();

$openIsSelected = '';
$maintenanceIsSelected = '';
$monitoringIsSelected = '';
$closedIsSelected = '';

if($data['status'] == 'open') {
    $openIsSelected = 'selected';
}
if($data['status'] == 'maintenance') {
    $maintenanceIsSelected = 'selected';
}
if($data['status'] == 'monitoring') {
    $monitoringIsSelected = 'selected';
}
if($data['status'] == 'closed') {
    $closedIsSelected = 'selected';
}
$automatic = 'No';
if($data['automtical'] == 'true') {
    $automatic = 'Yes';
}


require_once TEMPLATE_DIR.'/page/admin.editstatus.php';