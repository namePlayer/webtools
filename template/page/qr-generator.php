<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WebTools | Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= $requestedPath ?>/asset/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= $requestedPath ?>/asset/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= $requestedPath ?>/asset/custom.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <?= $templateEngine->render('navigation', ['requestedPath' => $requestedPath, 'accountManager' => $accountManager]) ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">QR-Generator</h1>
                        <small>Generate QR-Codes with Text or URLs</small>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">WebTools</a></li>
                            <li class="breadcrumb-item"><a href="<?= $requestedPath ?>/qrcodegen">QR-Code Generator</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <?= $templateEngine->outputAlerts() ?>
                <div class="row">
                    <div class="col-md-3 list-group mb-3">
                        <a href="<?= $requestedPath ?>/qrcodegen" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Basic QR-Code</h5>
                                <small><span class="badge badge-secondary" title="This is a offical Template!">Offical <i class="fa fa-check"></i></span>
                                    <span class="badge badge-dark" title="This is a offical Template!">Free <i class="fas fa-hand-holding-usd"></i></span></small>
                            </div>
                            <p class="mb-1">Create a very simple QR-Code with a Text</p>
                            <small>Last updated: 10.02.2021</small>
                        </a>
                    </div>
                    <div class="col-md-3 list-group mb-3">
                        <a href="<?= $requestedPath ?>/qrcodegen?template=webaddress" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Webaddress</h5>
                                <small><span class="badge badge-secondary" title="This is a offical Template!">Offical <i class="fa fa-check"></i></span>
                                    <span class="badge badge-dark" title="This is a offical Template!">Free <i class="fas fa-hand-holding-usd"></i></span></small>
                            </div>
                            <p class="mb-1">Create a QR-Code with a URL in it</p>
                            <small>Last updated: 10.02.2021</small>
                        </a>
                    </div>
                    <div class="col-md-3 list-group mb-3">
                        <a href="<?= $requestedPath ?>/qrcodegen?template=wifi-connect" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">WiFi</h5>
                                <small><span class="badge badge-secondary" title="This is a offical Template!">Offical <i class="fa fa-check"></i></span>
                                    <span class="badge badge-warning" title="Premium Membership required!">Premium <i class="fas fa-coins"></i></span></small>
                            </div>
                            <p class="mb-1">Create a QR-Code for Connecting to a wifi Network</p>
                            <small>Last updated: 10.02.2021</small>
                        </a>
                    </div>
                    <hr>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">
                                Enter your Information
                            </div>
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="mb-3 <?= $inputAttrib ?>">
                                        <label for="qrCodeGeneratorText" class="form-label">Content</label>
                                        <input type="text" id="qrCodeGeneratorText" name="qrCodeGeneratorText" class="form-control" value="<?= $qrData ?>">
                                    </div>
                                    <?php if($showWifiGen): ?>
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label for="qrCodeGeneratorWifiSSID" class="form-label">Wifi Name (SSID):</label>
                                                <input type="text" id="qrCodeGeneratorWifiSSID" name="qrCodeGeneratorWifiSSID" class="form-control">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="qrCodeGeneratorWifiPasswd" class="form-label">Wifi Password:</label>
                                                <input type="password" id="qrCodeGeneratorWifiPasswd" name="qrCodeGeneratorWifiPasswd" class="form-control">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="qrCodeGeneratorEncrypt" class="form-label">Encryption:</label>
                                                <select id="qrCodeGeneratorEncrypt" name="qrCodeGeneratorEncrypt" class="form-control">
                                                    <option value="none">None</option>
                                                    <option value="wep">WEP</option>
                                                    <option value="wpa">WPA / WPA2</option>
                                                </select>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label for="qrCodeGeneratorForeColor" class="form-label">Foreground Color:</label>
                                            <input type="color" id="qrCodeGeneratorForeColor" name="qrCodeGeneratorForeColor" class="form-control" value="<?= $qrFrontDataColor ?>">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="qrCodeGeneratorBackColor" class="form-label">Background Color:</label>
                                            <input type="color" id="qrCodeGeneratorBackColor" name="qrCodeGeneratorBackColor" class="form-control" value="<?= $qrBackDataColor ?>">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-dark">Generate</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                Output
                            </div>
                            <div class="card-body">
                                <img class="w-100" src="<?= $selectedImage ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="main-footer">
        <div class="float-right d-none d-sm-inline">
            Private Project
        </div>
        <strong>Copyright &copy; 2021 <a href="https://npcore.net">npcore.net</a>.</strong> All rights reserved.
    </footer>
</div>

<script src="<?= $requestedPath ?>/asset/plugins/jquery/jquery.min.js"></script>
<script src="<?= $requestedPath ?>/asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= $requestedPath ?>/asset/dist/js/adminlte.min.js"></script>
</body>
</html>
