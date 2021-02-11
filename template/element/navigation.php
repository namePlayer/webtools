<nav class="main-header navbar navbar-expand navbar-dark navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= $requestedPath ?>/dashboard" class="nav-link">Dashboard</a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a href="#" class="nav-link"><?= $accountManager->getFirstLastName() ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= $requestedPath ?>/logout">
                Logout
                <i class="fa fa-sign-out-alt"></i>
            </a>
        </li>
    </ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?= $requestedPath ?>/dashboard" class="brand-link">
        <img src="<?= $requestedPath ?>/asset/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">WebTools</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= $requestedPath ?>/asset/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="UI">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $accountManager->getFirstLastName() ?></a>
                <?= $accountManager->getUserType() ?>
            </div>
        </div>

        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= $requestedPath ?>/dashboard" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $requestedPath ?>/status" class="nav-link">
                        <i class="nav-icon fas fa-signal"></i>
                        <p>
                            Status
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $requestedPath ?>/qrcodegen" class="nav-link">
                        <i class="nav-icon fas fa-qrcode"></i>
                        <p>
                            QR-Code Creator
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Document Tools
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-file-pdf nav-icon"></i>
                                <p>PDF -> Doc/x</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-file-word nav-icon"></i>
                                <p>Doc/x -> PDF</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-images"></i>
                        <p>
                            Image Tools
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-expand-alt nav-icon"></i>
                                <p>Resize Images</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= $requestedPath ?>/changelog" class="nav-link">
                        <i class="nav-icon fa fa-history"></i>
                        <p>
                            Changelog
                            <span class="right badge badge-danger"></span>
                        </p>
                    </a>
                </li>

                <?php if($accountManager->isAdmin()): ?>
                    <li class="nav-header">Administration</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Overview
                                <span class="right badge badge-danger"></span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $requestedPath ?>/servers" class="nav-link">
                            <i class="nav-icon fas fa-server"></i>
                            <p>
                                Server Manager
                                <span class="right badge badge-danger"></span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $requestedPath ?>/accounts" class="nav-link">
                            <i class="nav-icon fas fa-user-circle"></i>
                            <p>
                                Accounts
                                <span class="right badge badge-danger"></span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-folder-open"></i>
                            <p>
                                Storage
                                <span class="right badge badge-danger"></span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $requestedPath ?>/admin-changelog" class="nav-link">
                            <i class="nav-icon fa fa-history"></i>
                            <p>
                                Changelog
                                <span class="right badge badge-danger"></span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $requestedPath ?>/adminstatus" class="nav-link">
                            <i class="nav-icon fa fa-wifi"></i>
                            <p>
                                System Status
                                <span class="right badge badge-danger"></span>
                            </p>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</aside>