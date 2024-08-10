<div class="form-group">
    <label for="exampleFormControlInput1"><?= $label; ?></label>
    <div class="input-group">
        <?=
            !empty($addon) ? '
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"> '.$addon.' </span>
            </div>' : '';
        ?>
        
        <input class="form-control"
            type="<?= $type  ?>"
            name="<?= $name; ?>"
            <?=
                !empty($max) ? "max='$max'" : '';
                !empty($min) ? "min='$min'" : '';
            ?>
            placeholder="<?= $placeholder; ?>"
            value="<?= $value ?>" />
    </div>

</div>
