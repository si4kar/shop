
<?php
/**
 * @var array $categories
 */

?>


<form action="" method="post">

    <div class="form-group">
        <label> Product title</label>
        <input type="text" name="title" class="form-control">
    </div>

    <div class="form-group">
        <label>Product categories</label>
        <select name="categories[]" class="form-control" multiple>
            <?= renderDropDown($categories) ?>
        </select>
    </div>

    <div class="form-group">
        <label>Product price</label>
        <input type="text" class="form-control">
            </div>

    <div class="form-group">
        <label>Product description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <button class="btn btn-success">Create</button>


</form>