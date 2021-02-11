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
              <h1 class="m-0">Edit Status #<?= $data['status_id']; ?></h1>
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
          <form action="" method="post">
              <div class="row">
                  <div class="col-md-8">
                      <div class="card">
                          <div class="card-header">
                              Status
                          </div>
                          <div class="card-body">
                              <textarea class="form-control" id="updateEditor" name="editInformationUpdateStatus">
                                <?= $data['updates'] ?>
                              </textarea>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="card">
                          <div class="card-header">
                              Edit general Information
                          </div>
                          <div class="card-body">
                              <div class="mb-3">
                                  <label for="editInformationTitle">Title:</label>
                                  <input class="form-control" id="editInformationTitle" name="editInformationTitle" value="<?= $data['title'] ?>">
                              </div>
                              <div class="mb-3">
                                  <label for="editInformationDescription">Description:</label>
                                  <input class="form-control" id="editInformationDescription" name="editInformationDescription" value="<?= $data['description'] ?>">
                              </div>
                              <div class="mb-3">
                                  <label for="editInformationDescription">Dashboard Alert:</label>
                                  <input class="form-control" id="editInformationDashAlert" name="editInformationDashAlert" value="<?= $data['dash_message'] ?>">
                              </div>
                              <div class="mb-3">
                                  <label for="editInformationDescription">Status:</label>
                                  <select class="form-control" id="editInformationStatus" name="editInformationStatus">
                                      <option value="open" <?= $openIsSelected ?>>Open</option>
                                      <option value="maintenance" <?= $maintenanceIsSelected ?>>Maintenance</option>
                                      <option value="monitoring" <?= $monitoringIsSelected ?>>Monitoring</option>
                                      <option value="closed" <?= $closedIsSelected ?>>Closed</option>
                                  </select>
                              </div>
                              <div class="mb-3">
                                  <label for="editInformationDescription">Created Automatically:</label>
                                  <input id="editInformationDescription" class="form-control" value="<?= $automatic ?>" disabled>
                              </div>
                              <button type="submit" class="btn btn-dark w-100 mb-3">Save</button>
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
