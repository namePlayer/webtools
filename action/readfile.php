<?php
$urlParts = explode('/', $requestedUrl);
// var_dump($urlParts);

if(count($urlParts) !== 5) {
    exit();
}

$storage = '';

if($urlParts['2'] === 'userstorage') {
    $storage = 'user';
}


if($urlParts['2'] === 'permastorage') {
    $storage = 'permastorage';
}

if(file_exists(STORAGE_DIR . '/' . $storage . '/' . $urlParts[4] . '.' . $urlParts[3])) {

    $fileLocation = STORAGE_DIR . '/' . $storage . '/' . $urlParts[4] . '.' . $urlParts[3];

    $fInfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($fInfo, $fileLocation);

    header("Content-Type: " . $mimeType);
    header('Content-Length: ' . filesize($fileLocation));
    readfile($fileLocation);

}