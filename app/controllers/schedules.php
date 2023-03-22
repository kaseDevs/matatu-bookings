<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/middleware.php");
include(ROOT_PATH . "/app/helpers/validateSchedules.php");
include(ROOT_PATH . "/app/helpers/validateBookings.php");


$table = 'schedules';

$schedules = selectAllJoines($table);
$matatus = selectAll('matatus');
$routes = selectAll('routes');
$users = selectAllUsers('users');
$bookings = selectAll('bookings');

$errors = array();
$id = '';
$matatu_id = '';
$route_id = '';
$travel_date = '';
$travel_time = '';
$travel_from = '';
$travel_time = '';
$price = '';
$user_id = '';
$fullname = '';
$seat_number = '';
// $user_passenger='';
$schedule_book_id = '';


if (isset($_POST['add-schedule'])) {
    adminOnly();
    $errors = validateSchedules($_POST);

    if (count($errors) === 0) {
        unset($_POST['add-schedule']);
        $matatu_id = create($table, $_POST);
        $_SESSION['message'] = 'created successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/schedules/index.php');
        exit(); 
    } else {
        $matatu_id = $_POST['mat_id'];
        $travel_from = $_POST['travel_from'];
        $travel_to = $_POST['travel_to'];
        $travel_date = $_POST['travel_date'];
        $travel_time = $_POST['travel_time'];
        $price = $_POST['price'];
    }
}

if (isset($_POST['add-book'])) {
    adminOnly();
    $errors = validateBookings($_POST);
        $schedule_book_id=$_POST['schedule_book_id'];
        
        $sql_u = "SELECT * FROM bookings WHERE schedule_book_id='$schedule_book_id'";
        // $sql_e = "SELECT * FROM users WHERE email='$email'";
        $res_u = mysqli_query($db, $sql_u);
        // $res_e = mysqli_query($db, $sql_e);
    
        if (mysqli_num_rows($res_u) > 0) {
            array_push($errors, 'Seat taken');	
        }else if (count($errors) === 0) {
        unset($_POST['add-book']);
        $bookings = create('bookings', $_POST);
        $_SESSION['message'] = 'created successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/bookings/index.php');
        exit(); 
    } else {
        $schedule_book_id = $_POST['schedule_book_id'];
        $user_passenger = $_POST['user_passenger'];
        $seat_number = $_POST['seat_number'];
        // $travel_date = $_POST['travel_date'];
        // $travel_time = $_POST['travel_time'];
        // $price = $_POST['price'];
    }
}



if (isset($_GET['id'])) {
    $schedule = selectOne($table, ['schedule_id' => $_GET['id']]);
    
    $id = $schedule['schedule_id'];
    $matatu_id = $schedule['mat_id'];
    // $_id = $schedule['mat_id'];
    $travel_from = $schedule['travel_from'];
    $travel_to = $schedule['travel_to'];
    $travel_date = $schedule['travel_date'];
    $travel_time = $schedule['travel_time'];
    $price = $schedule['price'];
}


if (isset($_GET['delete_schedule'])) {
    adminOnly();
    $count = delete_schedule($table, $_GET['delete_schedule']);
    $_SESSION['message'] = 'schedule deleted';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/admin/schedules/index.php'); 
    exit();
}

if (isset($_GET['delete_booking'])) {
    adminOnly();
    $count = delete_booking('bookings', $_GET['delete_booking']);
    $_SESSION['message'] = 'Booking Deleted';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/admin/bookings/index.php'); 
    exit();
}

if (isset($_POST['update-schedule'])) {
    adminOnly();
    $errors = validateSchedules($_POST);

    if (count($errors) === 0) { 
        $id = $_POST['schedule_id'];
        unset($_POST['update-schedule'], $_POST['schedule_id']);
        $matatu = update_schedules($table, $id, $_POST);
        $_SESSION['message'] = 'updated successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/schedules/index.php');
        exit();
    } else {
        $matatu_id = $_POST['mat_id'];
        $travel_from = $_POST['travel_from'];
        $travel_to = $_POST['travel_to'];
        $travel_date = $_POST['travel_date'];
        $travel_time = $_POST['travel_time'];
        $price = $_POST['price'];
    }

}
