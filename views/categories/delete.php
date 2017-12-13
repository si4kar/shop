<?php
/**
 * @var array $categories
 */

?>



<h3>Are you sure you want to delete <?= $categories['title'] ?> category</h3>

<a href="/categories/list" class="btn btn-sm btn-primary">No</a>
<a href="/categories/delete?id=<?= $categories['id'] ?>" class="btn btn-sm btn-danger">Yes</a>








