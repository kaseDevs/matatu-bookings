<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/middleware.php");
include(ROOT_PATH . "/app/helpers/validateRoute.php");

$table = 'routes';

$errors = array();
$id = '';
$route_name = '';
// $description = '';

$routes = selectAll($table);


if (isset($_POST['add-route'])) {
    adminOnly();
    $errors = validateRoute($_POST);

    if (count($errors) === 0) {
        unset($_POST['add-route']);
        $routes_id = create($table, $_POST);
        $_SESSION['message'] = 'created successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/routes/index.php');
        exit(); 
    } else {
        $route_name = $_POST['route_name'];
        // $description = $_POST['description'];
    }
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $routes = selectOne($table, ['route_id' => $id]);
    $id = $routes['route_id'];
    $route_name = $routes['route_name'];
    // $description = $routes['description'];
}

if (isset($_GET['delete_route'])) {
    adminOnly();
    $id = $_GET['delete_route'];
    $count = delete_route($table, $id);
    $_SESSION['message'] = 'routes deleted successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/admin/routes/index.php');
    exit();
}


if (isset($_POST['update-routes'])) {
    adminOnly();
    $errors = validateRoute($_POST);

    if (count($errors) === 0) { 
        $id = $_POST['route_id'];
        unset($_POST['update-routes'], $_POST['route_id']);
        $routes = update_route($table, $id, $_POST);
        $_SESSION['message'] = 'updated successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/routes/index.php');
        exit();
    } else {
        $id = $_POST['route_id'];
        $route_name = $_POST['route_name'];
        // $description = $_POST['description'];
    }

}
