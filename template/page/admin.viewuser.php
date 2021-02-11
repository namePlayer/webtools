<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WebTools | Dashboard</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?= $requestedPath ?>/asset/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?= $requestedPath ?>/asset/plugins/fontawesome-free/css/all.min.css">
    <script src="<?= $requestedPath ?>/asset/plugins/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea#updateEditor',
            height: 500,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });
    </script>
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
              <h1 class="m-0">View Account #<?= $accountId ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">WebTools</a></li>
              <li class="breadcrumb-item"><a href="<?= $requestedPath ?>/accounts">User Manager</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">
          <?= $templateEngine->outputAlerts() ?>
          <form action="" method="post">
              <div class="row">
                  <div class="col-md-12">
                      <div class="card">
                          <div class="card-header">
                              Overview
                          </div>
                          <div class="card-body">
                              <h5><?= $data['firstname'] ?> <?= $data['lastname'] ?></h5>
                              <p class="text-muted"><?= $data['email'] ?></p>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="card">
                          <div class="card-header">
                              Settings
                          </div>
                          <div class="card-body">
                              <form action="" method="post">
                                  <div class="mb-3">
                                      <div class="mb-3">
                                          <label for="userSettingsFirstname" class="form-label">Firstname:</label>
                                          <input type="text" class="form-control" name="userSettingsFirstname" id="userSettingsFirstname" value="<?= $data['firstname'] ?>">
                                      </div>
                                      <div class="mb-3">
                                          <label for="userSettingsLastname" class="form-label">Lastname:</label>
                                          <input type="text" class="form-control" name="userSettingsLastname" id="userSettingsLastname" value="<?= $data['lastname'] ?>">
                                      </div>
                                      <div class="mb-3">
                                          <label for="userSettingsEmail" class="form-label">Email:</label>
                                          <input type="email" class="form-control" name="userSettingsEmail" id="userSettingsEmail" value="<?= $data['email'] ?>">
                                      </div>
                                      <div class="form-group">
                                          <label for="userSettingsRank">Account-Type:</label>
                                          <select class="form-control" <?php if($data['role'] == 'ROOT'): echo 'disabled'; endif; ?> id="userSettingsRank" name="userSettingsRank">
                                              <option value="user">User</option>
                                              <option value="admin" <?= $adminRole ?>>Admin</option>
                                          </select>
                                          <?php if($data['role'] == 'ROOT'): echo '<small class="text-muted">This User is Root, you can\'t change their Rank!</small>'; endif; ?>
                                      </div>
                                      <div class="form-group">
                                          <label for="userSettingsStatus">Status:</label>
                                          <select class="form-control" <?php if($data['role'] == 'ROOT'): echo 'disabled'; endif; ?> id="userSettingsStatus" name="userSettingsStatus">
                                              <option value="on">Active</option>
                                              <option value="off" <?= $accountDisabled ?>>Disabled</option>
                                          </select>
                                          <?php if($data['role'] == 'ROOT'): echo '<small class="text-muted">This User is Root, you can\'t disable their Account!</small>'; endif; ?>
                                      </div>
                                  </div>
                                  <button type="submit" name="userSettingsSubmit" class="btn btn-success w-100">Save</button>
                              </form>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="card">
                          <div class="card-header">
                              Security
                          </div>
                          <div class="card-body">
                              <form action="" method="post">
                                  <div class="mb-3">
                                      <label for="userChangePassword" class="form-label">New Password:</label>
                                      <input type="password" class="form-control" name="userChangePassword" id="userChangePassword">
                                  </div>
                                  <div class="mb-3">
                                      <label for="userChangePasswordRepeat" class="form-label">Repeat Password:</label>
                                      <input type="password" class="form-control" name="userChangePasswordRepeat" id="userChangePasswordRepeat">
                                  </div>
                                  <hr>
                                  <div class="row">
                                      <div class="col-md-6 mb-3">
                                          <button type="submit" name="userChangePasswordSumbit" class="btn btn-success w-100" <?php if($data['role'] == 'ROOT'): echo 'disabled'; endif; ?>>Save</button>
                                      </div>
                                      <div class="col-md-6 mb-3">
                                          <a href="<?= $requestedPath ?>/manageaccount/<?= $accountId ?>?security=resend" class="btn btn-info w-100">Send Reset</a>
                                      </div>
                                      <div class="col-md-12 mb-3">
                                          <a href="<?= $requestedPath ?>/manageaccount/<?= $accountId ?>?security=" class="btn btn-danger w-100 <?php if($data['role'] == 'ROOT'): echo 'disabled'; endif; ?>">Delete Account</a>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="card">
                          <div class="card-header">
                              Premium
                          </div>
                          <div class="card-body">
                              <span><b>Premium End:</b> <?= $premium ?></span><br>
                              <span><b>Status:</b> <span class="badge badge-success">Active</span></span>
                              <hr>
                              <form action="" method="post">
                                  <div class="mb-3">
                                      <label for="userPremiumAddXDays" class="form-label">Add Premium for X Days:</label>
                                      <input type="number" class="form-control" name="userPremiumAddXDays" id="userPremiumAddXDays">
                                  </div>
                                  <div class="row">
                                      <div class="col-md-12 mb-3">
                                          <button type="submit" name="userPremiumAddSubmit" class="btn btn-success w-100">Save</button>
                                      </div>
                                      <div class="col-md-6 mb-3">
                                          <a href="<?= $requestedPath ?>/manageaccount/<?= $accountId ?>?premium=perma" class="btn btn-info w-100">Perma Premium</a>
                                      </div>
                                      <div class="col-md-6 mb-3">
                                          <a href="<?= $requestedPath ?>/manageaccount/<?= $accountId ?>?premium=remove" class="btn btn-danger w-100">Remove Premium</a>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="card">
                          <div class="card-header">
                              Ticketsystem
                          </div>
                          <div class="card-body text-center">
                              <span class="text-muted">Tickets will be added soon</span>
                          </div>
                      </div>
                  </div>
              </div>
          </form>
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
