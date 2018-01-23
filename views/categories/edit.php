<?php
/**
 *@var array $categories
 */
?>

<h3>Edit categories</h3>
<form action="/categories/update" method="post">

    <table class="table table-striped">
        <tr>
            <th>Title</th>
        </tr>

    <tr>
        <td><input type="text" name="title" value="<?= $categories['title'] ?>"></td>
        <td><input type="hidden" name="id" value="<?= $categories['id'] ?>" > </td>
        <!-- <td><input type="text" name="parent_category_id" value="<?/*= $categories['parent_category_id'] */?>"></td>-->
    </tr>
    </table>
    <input type="submit" class="btn btn-sm btn-primary btn-block" value="edit">


</form>
