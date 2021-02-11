<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WebTools | Login</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?= $requestedPath ?>/asset/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?= $requestedPath ?>/asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?= $requestedPath ?>/asset/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">

    <?= $templateEngine->outputAlerts() ?>

  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href=<?= $requestedPath ?>/login" class="h1"><b>Web</b>Tools</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="webtoolsLoginEmail">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="webtoolsLoginPassword">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
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
