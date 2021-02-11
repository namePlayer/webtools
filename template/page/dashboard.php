<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WebTools | Dashboard</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?= $requestedPath ?>/asset/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?= $requestedPath ?>/asset/plugins/fontawesome-free/css/all.min.css">
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
            <h1 class="m-0">Services</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">WebTools</a></li>
              <li class="breadcrumb-item"><a href="<?= $requestedPath ?>/dashboard">Dashboard</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">
          <?= $templateEngine->outputAlerts() ?>
        <div class="row">
            <div class="col-lg-4 mb-3">
                <div class="list-group">
                    <a href="<?= $requestedPath ?>/qrcodegen" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">QR-Code generator</h5>
                            <small class="text-green">Online</small>
                        </div>
                        <p class="mb-1">Convert your PDF Documents to Doc/x Documents.</p>
                        <small class="text-muted">Processing QR-Codes: Unlimited</small>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
              <div class="list-group">
                  <a href="#" class="list-group-item list-group-item-action">
                      <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1">PDF to Doc/x</h5>
                          <small class="text-blue">To be announced</small>
                      </div>
                      <p class="mb-1">Convert your PDF Documents to Doc/x Documents.</p>
                      <small class="text-muted">Processing Documents (Cur/Max): 0/<?= $documentLimit ?> - <span class="badge badge-dark">Limited</span></small>
                  </a>
              </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Doc/x to PDF</h5>
                            <small class="text-blue">To be announced</small>
                        </div>
                        <p class="mb-1">Convert your Doc/x Documents to PDF Documents.</p>
                        <small class="text-muted">Processing Documents (Cur/Max): 0/<?= $documentLimit ?> - <span class="badge badge-dark">Limited</span></small>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Image Resizer</h5>
                            <small class="text-danger">Not implemented yet</small>
                        </div>
                        <p class="mb-1">Resize your Images with a few clicks</p>
                        <small class="text-muted">Processing Picutures (Cur/Max): 0/0 - <span class="badge badge-dark">Limited</span></small>
                    </a>
                </div>
            </div>
            <?php
            if($accountManager->isAdmin()):
            ?>
                <div class="col-12 mt-3">
                    <h4>Admin Tools</h4>
                    <hr>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Overview</h5>
                            </div>
                            <p class="mb-1">A quick overview over all Systems and Service Health</p>
                            <small>Measured Health: <span class="badge badge-secondary">Unconfigured</span></small>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="list-group">
                        <a href="<?= $requestedPath ?>/servers" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Server Manager</h5>
                            </div>
                            <p class="mb-1">Manage available Processing Servers</p>
                            <small class="text-muted">Reachable (Cur/Max): 0/0 - <span class="badge badge-secondary">Not Configured</span></small>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Accounts</h5>
                            </div>
                            <p class="mb-1">Manage Users</p>
                            <small class="text-muted">Currently Registered: 1</small>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">View Storage</h5>
                            </div>
                            <p class="mb-1">View all files cached in the System Storage</p>
                            <small class="text-muted">Currently cached files: 1</small>
                        </a>
                    </div>
                </div>
            <?php
            endif;
            ?>
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
