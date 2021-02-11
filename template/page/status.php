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
                        <h1 class="m-0">Systemstatus</h1>
                        <small>Displaying the last 50 indicents.</small>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">WebTools</a></li>
                            <li class="breadcrumb-item"><a href="<?= $requestedPath ?>/status">Status</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <?= $templateEngine->outputAlerts() ?>
                <div class="row">
                    <?= $output ?>
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

<div class="modal fade" id="addNewServerModal" tabindex="-1" aria-labelledby="addNewServerModalLabel" aria-hidden="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewServerModalLabel">Add new Server</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="addNewServerAddress" class="form-label">IP-Address:</label>
                        <input type="text" id="addNewServerAddress" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="addNewServerPort" class="form-label">Port:</label>
                        <input type="number" id="addNewServerPort" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="addNewServerPort" class="form-label">Document Limit:</label>
                            <input type="number" id="addNewServerDocumentLimit" class="form-control">
                            <small class="text-muted">LibreOffice has to be installed!</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="addNewServerPort" class="form-label">Image Limit:</label>
                            <input type="number" id="addNewServerImageLimit" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
                    <button type="submit" class="btn btn-primary">Setup Server</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?= $requestedPath ?>/asset/plugins/jquery/jquery.min.js"></script>
<script src="<?= $requestedPath ?>/asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= $requestedPath ?>/asset/dist/js/adminlte.min.js"></script>
</body>
</html>
