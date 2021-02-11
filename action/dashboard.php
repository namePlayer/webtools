<?php

# $templateEngine->addAlert('warning', 'Currently there are issues with our processing servers. Some options might not be available. Please visit our <a href="'.$requestedPath.'/status" class="text-dark">Statuspage</a> for more Information and Updates!');

$stmt = $dbConnection->prepare("SELECT `process_documents` FROM `Server`");
$stmt->execute();

$documentLimit = 0;
while($row = $stmt->fetch()) {
    $count = (int)$row['process_documents'];
    $documentLimit = $documentLimit + $count;
}

require_once TEMPLATE_DIR.'/page/dashboard.php';