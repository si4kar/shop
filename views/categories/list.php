<?php
/**
 * @var array $categories
 */

?>


<h1>Categories</h1>

<p><a href="/categories/create" class="'btn btn-success" >Create category</a></p>

<table class="table table-striped">
    <tr>
        <td>ID</td>
        <td>Title</td>
        <td>Parent</td>
        <td></td>
    </tr>

    <?php foreach ($categories as $category) : ?>
    <tr>
        <td><?= $category['id'] ?> </td>
        <td><?= $category['title'] ?></td>
        <td></td>
        <td>
            <a href="/categories/edit?file=<?= $category['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
            <a href="/categories/AcceptDelete?id=<?= $category['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
        </td>

    </tr>
    <?php endforeach; ?>

</table>