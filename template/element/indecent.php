<div class="col-md-4">
    <div class="card border-<?= $type ?> border">
        <div class="card-header bg-<?= $type ?>">
            <?= $title ?>
        </div>
        <div class="card-body">
            <?= $description ?>
            <hr>
            <?= $updates ?>
        </div>
        <div class="card-footer text-right">
            <small><?= date('H:i d.m.Y', $created) ?> - <?= date('H:i d.m.Y', $lastupdate) ?></small>
        </div>
    </div>
</div>