<?php
/**
 * @var array $products
 */

?>



<h1>Products list</h1>
<p><a href="/products/create" class="btn btn-success">Create product</a></p>

<table class="table table-striped">
    <tr>
        <td>ID</td>
        <td>Title</td>
        <td>Description</td>
        <td>Price</td>
        <td>Category</td>
        <td></td>
    </tr>

    <?php foreach ($products as $product) : ?>
        <tr>
            <td><?= $product['id'] ?> </td>
            <td><?= $product['title'] ?></td>
            <td><?= $product['description'] ?></td>
            <td><?= $product['price'] ?></td>
            <td></td>
            <td>
                <a href="/products/Edit?id=<?= $product['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                <a href="/products/AcceptDelete?id=<?= $product['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
            </td>

        </tr>
    <?php endforeach; ?>

</table>