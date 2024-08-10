<div class="form-group">
    <label for="exampleFormControlInput1"><?= $label; ?></label>
    <textarea cols="30" rows="10" class="form-control"
        id="<?= $name; ?>"
        name="<?= $name; ?>"
        placeholder="<?= $placeholder; ?>"><?= $value; ?></textarea>
</div>

<script type="text/javascript">
    $("#<?= $name; ?>").summernote({
        height: 200, //example height
    });
</script>
