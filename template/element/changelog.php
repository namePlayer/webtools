<div class="col-md-3">
    <div class="card">
        <div class="card-header">
            Version <?= $version ?>
        </div>
        <div class="card-body">
            <?= $releasenotes ?>
        </div>
        <div class="card-footer text-right">
            <?= date('d.m.Y', $released) ?>
        </div>
    </div>
</div>