<?php

$error = getFlash('error');
$success = getFlash('success');

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>0910 Shop</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>

<body>

<div class="container">
    <header class="header clearfix">
        <nav>
            <ul class="nav nav-pills float-right">

                <li class="nav-item">
                    <a class="nav-link active" href="/">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/categories/list">Categories</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/products/list">Products</a>
                </li>

            </ul>
        </nav>
        <h3 class="text-muted">0910 Shop</h3>
    </header>

    <main role="main">

        <?php if ($error) : ?>
            <p class="alert alert-danger"><?= $error ?></p>
        <?php endif; ?>

        <?php if ($success) : ?>
            <p class="alert alert-success"><?= $success ?></p>
        <?php endif; ?>

        <?=  $content  ?>

    </main>

    <footer class="footer">
        <p>&copy; PHP Academy <?= date('Y') ?></p>
    </footer>

</div> <!-- /container -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</body>
</html>