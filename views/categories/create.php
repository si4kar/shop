<?php

$data = getFlash('failedCategoryData') ?: [];
?>

<h1>Create new category </h1>

<form action="" method="post">
    <div class="form-group">
        <label>Category title</label>
        <input type="text" name="title" class="form-control" value="<?= getArrayValue($data, 'title') ?>">

    </div>
    <div class="form-group">
        <label>Parent category</label>
        <select name="parent_category_id" class="form-control"></select>
    </div>

    <button type="submit" class="btn btn-success">Create</button>
</form>