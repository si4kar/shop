<?php
/**
 *@var array $categories
 */
?>

<h1>Categories</h1>
<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Parent</th>
        <th></th>
    </tr>
    <?php foreach ($categories as $category) : ?>
    <form action="/categories/update" method="post">
        <tr>
            <td><input type="text" name="id" value="<?= $category['id'] ?>"> </td>
            <td><input type="text" name="title" value="<?= $category['title'] ?>"></td>
            <td><input type="text" name="parent_category_id" value="<?= $category['parent_category_id'] ?>"></td>
            <td></td>
            <td>
                <input type="submit" class="btn btn-sm btn-primary" value="edit">
            </td>
        </tr>
        <?php endforeach; ?>
    </form>
</table>