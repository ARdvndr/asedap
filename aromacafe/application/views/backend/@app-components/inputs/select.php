<div class="form-group">
    <select id="<?= $name; ?>" class="form-control" <?= !empty($is_multiple) && $is_empty != false ? 'multiple' : ''; ?>>
        <?php
        foreach ($data as $key => $optionValue) {
            echo "<option value='$key' " . ($key === $value ? 'selected' : '') . ">$optionValue</option>";
        }
        ?>
    </select>
</div>

<!-- <script type="text/javascript">
    if (<?= $is_multiple ?>) {
        $("#custom-select").select2();
    }
</script> -->