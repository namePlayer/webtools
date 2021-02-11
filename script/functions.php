<?php

function isLoggedIn() {
    return isset($_SESSION['webtools_loginid']);
}

function setLogin($userId) {
    $_SESSION['webtools_loginid'] = $userId;
}

function getLoginId() {
    $loginId = 0;
    if(isLoggedIn()) {
        $loginId = $_SESSION['webtools_loginid'];
    }

    return $loginId;
}

function generateRandomString($length = 10): string
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function generateStorageFileName($extension, $storageDir, $length = 10, $try = 0) {
    $filename = generateRandomString($length);
    if($try >= 10) {
        return '';
    }
    if(file_exists(STORAGE_DIR.'/'.$storageDir.'/' . $filename . '.' . $extension) && $try < 10) {
        $try += 1;
        return generateStorageFileName($extension, $storageDir, $length, $try);
    }
    return $filename;
}

function pingDomain($domain, $port)
{
    $starttime = microtime(true);
    $file = fsockopen($domain, $port, $errno, $errstr, 1);
    $stoptime = microtime(true);
    $status = 0;

    if (!$file) $status = -1;  // Site is down
    else {
        fclose($file);
        $status = ($stoptime - $starttime) * 1000;
        $status = floor($status);
    }
    return $status;
}