<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?= $name; ?>">
    <?= $button; ?>
</button>

<div class="modal fade" id="<?= $name; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= $title; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= $body; ?>
            </div>
        </div>
    </div>
</div>