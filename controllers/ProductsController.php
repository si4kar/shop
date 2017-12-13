<?php

function actionList()
{
    return renderTemplate('products/list');
}
function actionCreate()
{
    if (getIsPostRequest()) {
        $sql = 'INSERT INTO products (title, description, price) VALUES (?, ?, ?)';
        $productStatement = mysqli_prepare(getDbConnection(), $sql);
        if (!$productStatement) {
            die(mysqli_error(getDbConnection()));
        }
        $title = getArrayValue($_POST, 'title');
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