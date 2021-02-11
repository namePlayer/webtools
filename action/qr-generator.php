<?php
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;

$qrData = '';
$inputAttrib = '';
$qrFrontDataColor = '#000000';
$qrBackDataColor = '#FFFFFF';
$showWifiGen = false;
$newqrname = '';
$selectedImage = $requestedPath . '/readfile/permastorage/png/npcore-default-qr';

if(isset($_GET['template'])) {
    $template = $_GET['template'];
    if($template === 'webaddress') {
        $qrFrontDataColor = '#2980b9';
        $qrData = 'https://yourdomain.tld';
    }

    if($template === 'wifi-connect') {
        if($accountManager->userIsPremium()) {
            $premium = true;
            $showWifiGen = true;
            $qrFrontDataColor = '#2c3e50';
            $inputAttrib = 'hidden';
        }
        if(!isset($premium)) {
            $templateEngine->addAlert('danger', 'You have to own Premium, to use this feature!');
        }
    }
}

if(isset($_POST['qrCodeGeneratorForeColor']) && !empty($_POST['qrCodeGeneratorForeColor'])
    && isset($_POST['qrCodeGeneratorBackColor']) && !empty($_POST['qrCodeGeneratorBackColor'])) {
    $newqrname = generateStorageFileName('png', 'user');

    $hexFore = $_POST['qrCodeGeneratorForeColor'];
    $hexBack = $_POST['qrCodeGeneratorBackColor'];

    list($redFore, $greenFore, $blueFore) = sscanf($hexFore, "#%02x%02x%02x");
    list($redBack, $greenBack, $blueBack) = sscanf($hexBack, "#%02x%02x%02x");

    if($accountManager->userIsPremium() && isset($_POST['qrCodeGeneratorWifiSSID']) && !empty($_POST['qrCodeGeneratorWifiSSID'])
        && isset($_POST['qrCodeGeneratorWifiPasswd']) && isset($_POST['qrCodeGeneratorEncrypt']) && !empty($_POST['qrCodeGeneratorEncrypt'])) {

        $auth = 'nopass';
        if($_POST['qrCodeGeneratorEncrypt'] == 'wep') {
            $auth = 'WEP';
        }
        if($_POST['qrCodeGeneratorEncrypt'] == 'wpa') {
            $auth = 'WPA';
        }

        $_POST['qrCodeGeneratorText'] = 'WIFI:T:'.$auth.';S:'.$_POST['qrCodeGeneratorWifiSSID'].';P:'.$_POST['qrCodeGeneratorWifiPasswd'].';;';
    }

    $qrCode = new QrCode($_POST['qrCodeGeneratorText']);
    $qrCode->setSize(300);
    $qrCode->setMargin(10);
    $qrCode->setWriterByName('png');
    $qrCode->setEncoding('UTF-8');
    $qrCode->setForegroundColor(['r' => $redFore, 'g' => $greenFore, 'b' => $blueFore, 'a' => 0]);
    $qrCode->setBackgroundColor(['r' => $redBack, 'g' => $greenBack, 'b' => $blueBack, 'a' => 0]);
    $qrCode->setLogoSize(150, 200);
    $qrCode->setValidateResult(false);

    $qrCode->writeFile(STORAGE_DIR.'/user/'.$newqrname.'.png');
    $selectedImage = $requestedPath . '/readfile/userstorage/png/'.$newqrname.'';
}

require_once TEMPLATE_DIR.'/page/qr-generator.php';