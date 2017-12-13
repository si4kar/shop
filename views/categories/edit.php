<?php
/**
 *@var array $categories
 */
?>

<h3>Edit categories</h3>
<form action="/categories/update" method="post">

    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Parent</th>
            <th></th>
        </tr>

    <tr>
        <td><input type="text" name="id" value="<?= $categories['id'] ?>"> </td>
        <td><input type="text" name="title" value="<?= $categories['title'] ?>"></td>
        <td><input type="text" name="parent_category_id" value="<?= $categories['parent_category_id'] ?>"></td>
        <td></td>
    </tr>
    </table>
    <input type="submit" class="btn btn-sm btn-primary btn-block" value="edit">


</form>
