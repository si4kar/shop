<?php

function actionList()
{
    $query = mysqli_query(getDbConnection(), 'SELECT * FROM products');
    $products = mysqli_fetch_all($query, MYSQLI_ASSOC);

    return renderTemplate('products/list', ['products' => $products]);
}

function actionCreate()
{
    if (getIsPostRequest()) {
        $sql = 'INSERT INTO products (title, description, price) VALUES (?, ?, ?)';
        $productStatement = mysqli_prepare(getDbConnection(), $sql);
        if (!$productStatement) {
            die(mysqli_error(getDbConnection()));
        }
        $title = getArrayValue($_POST,'title');
        $description = getArrayValue($_POST, 'description');
        $price = getArrayValue($_POST, 'price', 0.00);
        $productBindResult = mysqli_stmt_bind_param($productStatement, 'ssd', $title, $description, $price);
        if (!$productBindResult) {
            die(mysqli_stmt_error($productStatement));
        }
        $isProductOk = mysqli_stmt_execute($productStatement);

        if ($isProductOk) {
            $productId = mysqli_insert_id(getDbConnection());
            $categories = getArrayValue($_POST, 'categories', []);
            $sql = 'INSERT INTO product_to_category (product_id, category_id) VALUES (?, ?)';
            foreach ($categories as $categoryId) {
                $relationStatement = mysqli_prepare(getDbConnection(), $sql);
                if (!$relationStatement) {
                    die(mysqli_error(getDbConnection()));
                }
                $relationBindResult = mysqli_stmt_bind_param($relationStatement, 'ii', $productId, $categoryId);
                mysqli_stmt_execute($relationStatement);
                if (!$relationBindResult) {
                    die(mysqli_stmt_error($relationBindResult));
                }
            }
            addFlash('success', "Product {$title} created successfully");
            redirect('/products/list');
        } else {
            addFlash('error', "Product {$title} can not be created");
            addFlash('failedProductData', $_POST);
            redirect('/products/create');
        }
    }
    $query = mysqli_query(getDbConnection(), 'SELECT * FROM categories');
    $categories = [];
    while ($category = mysqli_fetch_assoc($query)) {
        $categories[$category['id']] = $category['title'];
    }
    return renderTemplate('products/create', ['categories' => $categories]);
}

function actionAcceptDelete()
{
    if (isset($_GET)) {

        $id = (int)$_GET['id'];

        $query = mysqli_query(getDbConnection(), "SELECT * FROM products WHERE id = {$id} LIMIT 1");
        $products = mysqli_fetch_array($query);

        return renderTemplate('products/delete', ['products' => $products]);
    }
}

function actionDelete()
{
    if (isset($_GET)) {
        $id = (int)$_GET['id'];
        mysqli_query(getDbConnection(), "DELETE FROM products WHERE id = {$id} LIMIT 1");
        //echo mysqli_error(getDbConnection());
        $query = mysqli_query(getDbConnection(), 'SELECT * FROM products');
        $products = mysqli_fetch_all($query, MYSQLI_ASSOC);
    }

    return renderTemplate('products/list', ['products' => $products]);
}

function actionEdit()
{
    if (isset($_GET)) {

        $id = (int)$_GET['id'];

        $query = mysqli_query(getDbConnection(), "SELECT * FROM products WHERE id = {$id} LIMIT 1");
        $categoryId = mysqli_query(getDbConnection(), "SELECT category_id FROM product_to_category WHERE product_id = {$id} LIMIT 1");

        $categoryIdFetch = mysqli_fetch_array($categoryId);
        $categoryTitle = mysqli_query(getDbConnection(), "SELECT title FROM categories WHERE id = {$categoryIdFetch[0]} LIMIT 1");
        $categoryTitleFetch  = mysqli_fetch_array($categoryTitle);

        $products = mysqli_fetch_array($query);
        $products['categories_id'] = $categoryTitleFetch[0];
/*        echo "<br>";
        var_dump($products);
        echo "</br>";*/

        return renderTemplate('products/edit', ['products' => $products]);
    }


}

function actionUpdate()
{
    if (getIsPostRequest()) {

        $id = getArrayValue($_POST, 'id');
        $title = getArrayValue($_POST, 'title');
        $description = getArrayValue($_POST, 'description');
        $price = getArrayValue($_POST, 'price');

        $sql = "UPDATE products SET title = '{$title}', description = '{$description}', price = '{$price}' WHERE id = {$id}";

        $statement = mysqli_prepare(getDbConnection(), $sql);

        if (!$statement) {
            die(mysqli_error(getDbConnection()));
        }

        mysqli_stmt_execute($statement);

        return header('Location: /products/list');
    }
}
