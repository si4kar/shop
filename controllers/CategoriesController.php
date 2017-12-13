<?php

function actionList()
{
    $query = mysqli_query(getDbConnection(), 'SELECT * FROM categories');
    $categories = mysqli_fetch_all($query, MYSQLI_ASSOC);



    return renderTemplate('categories/list', ['categories' => $categories]);
}

function actionCreate()
{
    if (getIsPostrequest()) {
        $sql = 'INSERT INTO categories (title, parent_category_id) VALUES (?, ?)';
        $statement = mysqli_prepare(getDbConnection(), $sql);
        if (!$statement) {
            die(mysqli_error(getDbConnection()));
        }
        $title = getArrayValue($_POST, 'title');
        $parentCategoryId = getArrayValue($_POST, 'parent_category_id');
        $bindResult = mysqli_stmt_bind_param($statement, 'si', $title, $parentCategoryId);
        if (!$bindResult) {
            die(mysqli_stmt_error($statement));
        }

        $isOK = mysqli_stmt_execute($statement);
        if ($isOK) {
            addFlash('success', "Category {$title} created successfully");
            redirect('/categories/list');
        } else {
            addFlash('error', "Category {$title} can not be created");
            addFlash('failedCategoryData', $_POST);
            redirect('/categories/create');
        }

    }
    $query = mysqli_query(getDbConnection(), 'SELECT * FROM categories');
    $categories = mysqli_fetch_all($query, MYSQLI_ASSOC);
    return renderTemplate('categories/create');
}


function actionAcceptDelete()
{
    if (isset($_GET)) {

        $id = (int)$_GET['id'];

        $query = mysqli_query(getDbConnection(), "SELECT * FROM categories WHERE id = {$id} LIMIT 1");
        $categories = mysqli_fetch_array($query);

        return renderTemplate('categories/delete', ['categories' => $categories]);
    }
        //mysqli_query(getDbConnection(), 'SELECT * FROM categories WHERE id = {$id} LIMIT 1');
        //return renderTemplate('categories/delete');


}

function actionDelete()
{

    if (isset($_GET)) {
       $id = (int)$_GET['id'];
        mysqli_query(getDbConnection(), "DELETE FROM categories WHERE id = {$id} LIMIT 1");
        //echo mysqli_error(getDbConnection());
        $query = mysqli_query(getDbConnection(), 'SELECT * FROM categories');
        $categories = mysqli_fetch_all($query, MYSQLI_ASSOC);
    }

    return renderTemplate('categories/list', ['categories' => $categories]);
}
