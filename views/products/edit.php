<?php
/**
 *@var array $products
 */
?>

<h3>Edit product</h3>
<form action="/products/update" method="post">

    <table class="table table-striped">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>Category</th>
        </tr>

        <tr>
            <td><input type="text" name="title" value="<?= $products['title'] ?>"></td>
            <td><input type="text" name="description" value="<?= $products['description'] ?>"></td>
            <td><input type="text" name="price" value="<?= $products['price'] ?>"></td>
            <td><input type="text" name="category" value="<?= $products['categories_id'] ?>"></td>
            <td><input type="hidden" name="id" value="<?= $products['id'] ?>" > </td>
        </tr>
    </table>
    <input type="submit" class="btn btn-sm btn-primary btn-block" value="edit">


</form>