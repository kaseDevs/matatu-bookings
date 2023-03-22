<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/middleware.php");
include(ROOT_PATH . "/app/helpers/validateMatatu.php");

$table = 'matatus';

$errors = array();
$id = '';
$matatu_plate = '';
// $description = '';

$matatus = selectAll($table);


if (isset($_POST['add-matatu'])) {
    adminOnly();
    $errors = validateMatatu($_POST);

    if (count($errors) === 0) {
        unset($_POST['add-matatu']);
        $matatu_id = create($table, $_POST);
        $_SESSION['message'] = 'created successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/matatus/index.php');
        exit(); 
    } else {
        $matatu_plate = $_POST['matatu_plate'];
        // $description = $_POST['description'];
    }
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $matatu = selectOne($table, ['matatu_id' => $id]);
    $id = $matatu['matatu_id'];
    $matatu_plate = $matatu['matatu_plate'];
    // $description = $matatu['description'];
}

if (isset($_GET['delete_mat'])) {
    adminOnly();
    $id = $_GET['delete_mat'];
    $count = delete_mat($table, $id);
    $_SESSION['message'] = 'matatu deleted successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/admin/matatus/index.php');
    exit();
}


if (isset($_POST['update-matatu'])) {
    adminOnly();
    $errors = validateMatatu($_POST);

    if (count($errors) === 0) { 
        $id = $_POST['matatu_id'];
        unset($_POST['update-matatu'], $_POST['matatu_id']);
        $matatu = update_mat($table, $id, $_POST);
        $_SESSION['message'] = 'updated successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/matatus/index.php');
        exit();
    } else {
        $id = $_POST['matatu_id'];
        $matatu_plate = $_POST['matatu_plate'];
        // $description = $_POST['description'];
    }

}
