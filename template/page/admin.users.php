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
              <h1 class="m-0">Available Servers</h1>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        System Users
                        <button class="btn btn-dark btn-sm float-right" data-toggle="modal" data-target="#createNewUseModal">Create new User</button> <br>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <td>#</td>
                                <td>Email Address</td>
                                <td>Full Name</td>
                                <td>Premium</td>
                                <td>Type</td>
                                <td>Actions</td>
                            </thead>
                            <tbody>
                                <?= $output ?>
                            </tbody>
                        </table>
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

<div class="modal fade" id="createNewUseModal" tabindex="-1" aria-labelledby="createNewUserModalLabel" aria-hidden="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createNewUserModalLabel">Add new Server</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="newUserFname" class="form-label">Firstname:</label>
                            <input type="text" id="newUserFname" name="newUserFname" class="form-control" value="<?= $newUserFname ?>">
                        </div>
                        <div class="col-6 mb-3">
                            <label for="newUserLname" class="form-label">Lastname:</label>
                            <input type="text" id="newUserLname" name="newUserLname" class="form-control" value="<?= $newUserLname ?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="newUserEmail" class="form-label">Email Address:</label>
                        <input type="text" id="newUserEmail" name="newUserEmail" class="form-control" value="<?= $newUserEmail ?>">
                    </div>
                    <div class="mb-3">
                        <label for="newUserPremium" class="form-label">Premium for x days:</label>
                        <input type="number" id="newUserPremium" name="newUserPremium" class="form-control" value="">
                        <small class="text-muted">-1 for Infinite, 0 for no Premium</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
                    <button type="submit" class="btn btn-primary">Create User</button>
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
