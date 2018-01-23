<?php
/**
 * @var array $products
 */

?>

<h3>Are you sure you want to delete <?= $products['title'] ?> product</h3>

<a href="/products/list" class="btn btn-sm btn-primary">No</a>
<a href="/products/delete?id=<?= $products['id'] ?>" class="btn btn-sm btn-danger">Yes</a>


