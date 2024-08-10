<?php if(!empty($button)) : ?>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?= $name; ?>">
    <?= $button; ?>
</button>
<?php endif; ?>

<div class="modal fade" id="<?= $name; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= $action ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title"><?= $title; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php 
                    foreach ($body as $n) {
                        if ($n['type'] == 'file') { ?>

                            <div class="fileinput" data-provides="fileinput">
                                <label for="<?= $n['name']; ?>"><?= $n['label']; ?></label>
                                <div>
                                    <input type="file" name="<?= $n['name'] ?>" id="<?= $n['name'] ?>" accept="image/x-png,image/gif,image/jpeg" />
                                </div>
                                <small class="text-danger">*Jenis file yg diperbolehkan <?= $n['allowed_types'] ?></small>
                            </div>

                            
                        <?php } else if($n['type'] == 'hidden') { ?>

                            <input type="hidden" 
                            name="<?= $n['name'] ?>" 
                            <?= 
                            $name == 'modal-ubah' ? "id='" . $n['name'] . "'" : '';
                            ?>
                             />

                        <?php } else if($n['type'] == 'select') { ?>
                    
                            <div class="form-group">
                                <label for="<?= $n['name']; ?>"><?= $n['label']; ?></label>
                                <select class="form-control" 
                                <?=  $name == 'modal-ubah' ? "id='" . $n['name'] . "'" : ''; ?>
                                name="<?= $n['name']; ?>" required>
                                    <option selected disabled><?= $n['placeholder']; ?></option>
                                    <?php foreach($n['option'] as $opt) { ?>
                                        <option value="<?= $opt['value'] ?>"><?= $opt['label']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            
                        <?php } else if($n['type'] == 'textarea') { ?>

                            <div class="form-group">
                                <label for="<?= $n['name']; ?>"><?= $n['label']; ?></label>
                                <textarea cols="10" rows="5" 
                                    class="form-control"
                                    name="<?= $n['name']; ?>"
                                    <?=  $name == 'modal-ubah' ? "id='" . $n['name'] . "'" : ''; ?>
                                    required></textarea>
                            </div>

                        <?php } else { ?>

                            <div class="form-group">
                                <label for="<?= $n['name']; ?>"><?= $n['label']; ?></label>
                                <div class="input-group">
                                    <?=
                                    array_key_exists('addon', $n) ? '
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"> ' . $n['addon'] . ' </span>
                                    </div>' : '';
                                    ?>

                                    <input 
                                        class="form-control" 
                                        type="<?= $n['type']; ?>" 
                                        name="<?= $n['name']; ?>" 
                                        
                                        <?= $name == 'modal-ubah' ? "id='" . $n['name'] . "'" : ''; ?>
                                        <?= array_key_exists('min', $n) ? "min='" . $n['min'] . "'" : ''; ?> 
                                        <?= array_key_exists('max', $n) ? "max='" . $n['max'] . "'" : ''; ?> 
                                        <?= array_key_exists('placeholder', $n) ? "placeholder='" . $n['placeholder'] . "'" : ''; ?> 
                                        <?= array_key_exists('value', $n) ? "value='" . $n['value'] . "'" : ''; ?> 
                                        
                                        required />
                                </div>

                            </div>
                    <?php }
                    } ?>

                </div>
                <div class="modal-footer text-right">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">Batal</span>
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>