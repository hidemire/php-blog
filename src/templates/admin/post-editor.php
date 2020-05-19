<?php
  $tags = TagController::getInstance()->getAll();
?>

<div class="form-group">
  <label >Tag</label>
  <select class="form-control" id="editor-tag-selector">
    <?php foreach($tags as $tag) { ?>
      <option <?=$post["tagId"] == $tag->id ? "selected": ""?> value="<?=$tag->id?>"><?=$tag->name?></option>
    <?php } ?>
  </select>
</div>
<div class="row">
  <div id="editorjs"></div>
</div>
<div class="row">
  <button class="btn btn-success" id="editor-save-button">Save</button>
</div>
<script>
  const _POST = <?= json_encode($post) ?>;
</script>
