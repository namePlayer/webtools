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
              <h1 class="m-0">Manage Systemstatus</h1>
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
            <div class="col-md-4">
                <button type="button" data-toggle="modal" data-target="#addNewStatusModal" class="btn btn-dark w-100 h-100">Create new Indecent</button>
            </div>
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

<div class="modal fade" id="addNewStatusModal" tabindex="-1" aria-labelledby="addNewStatusModalLabel" aria-hidden="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewStatusModalLabel">Add new Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="addNewStatusTitle" class="form-label">Title</label>
                        <input type="text" id="addNewStatusTitle" name="addNewStatusTitle" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="addNewStatusDescription" class="form-label">Description</label>
                        <input type="text" id="addNewStatusDescription" name="addNewStatusDescription" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="addNewStatusStatus" class="form-label">Status</label>
                            <select class="form-control" id="addNewStatusStatus" name="addNewStatusStatus">
                                <option value="open">Open</option>
                                <option value="maintenance">Maintenance</option>
                                <option value="monitoring">Monitoring</option>
                                <option value="closed">Closed</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="addNewStatusDashMsg" class="form-label">Dashboard Message</label>
                            <input type="text" id="addNewStatusDashMsg" name="addNewStatusDashMsg" class="form-control">
                            <small>Leave empty for no Dashboard Message</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
                    <button type="submit" class="btn btn-primary">Add Indecent</button>
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
