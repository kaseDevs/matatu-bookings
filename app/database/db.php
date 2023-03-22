<?php
// starting a new session23
session_start();
require('connect.php');



// function dd($value) // to be deleted
// {
//     echo "<pre>", print_r($value, true), "</pre>";
//     die();
// }


function executeQuery($sql, $data)
{
    global $conn;
    $stmt = $conn->prepare($sql);
    $values = array_values($data);
    $types = str_repeat('s', count($values));
    $stmt->bind_param($types, ...$values);
    $stmt->execute();
    return $stmt;
}


function selectAllJoines($table, $conditions = [])
{
    global $conn;
    // $sql = "SELECT * FROM $table JOIN matatus ON $table.mat_id=matatus.matatu_id JOIN routes ON $table.travel_from=routes.route_id JOIN routes a ON $table.travel_to=a.route_id";
    $sql = "SELECT * FROM $table JOIN matatus ON $table.mat_id=matatus.matatu_id";

    if (empty($conditions)) {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    } else {
        $i = 0;
        foreach ($conditions as $key => $value) {
            if ($i === 0) {
                $sql = $sql . " WHERE $key=?";
            } else {
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }
        
        $stmt = executeQuery($sql, $conditions);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
}


function selectAll($table, $conditions = [])
{
    global $conn;
    $sql = "SELECT * FROM $table";
    if (empty($conditions)) {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    } else {
        $i = 0;
        foreach ($conditions as $key => $value) {
            if ($i === 0) {
                $sql = $sql . " WHERE $key=?";
            } else {
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }
        
        $stmt = executeQuery($sql, $conditions);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
}


function selectAllUsers($table, $conditions = [])
{
    global $conn;
    $sql = "SELECT * FROM $table";
    if (empty($conditions)) {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    } else {
        $i = 0;
        foreach ($conditions as $key => $value) {
            if ($i === 0) {
                $sql = $sql . " WHERE $key=?";
            } else {
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }
        
        $stmt = executeQuery($sql, $conditions);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
}


function selectOne($table, $conditions)
{
    global $conn;
    $sql = "SELECT * FROM $table";

    $i = 0;
    foreach ($conditions as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " WHERE $key=?";
        } else {
            $sql = $sql . " AND $key=?";
        }
        $i++;
    }

    $sql = $sql . " LIMIT 1";
    $stmt = executeQuery($sql, $conditions);
    $records = $stmt->get_result()->fetch_assoc();
    return $records;
}

function selectOneMatatu($table, $conditions)
{
    global $conn;
    $sql = "SELECT * FROM $table";

    $i = 0;
    foreach ($conditions as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " WHERE $key=?";
        } else {
            $sql = $sql . " AND $key=?";
        }
        $i++;
    }

    $sql = $sql . " LIMIT 1";
    $stmt = executeQuery($sql, $conditions);
    $records = $stmt->get_result()->fetch_assoc();
    return $records;
}

function selectOnePassenger($table, $conditions)
{
    global $conn;
    $sql = "SELECT * FROM $table JOIN users ON $table.user_passenger=users.id";

    $i = 0;
    foreach ($conditions as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " WHERE $key=?";
        } else {
            $sql = $sql . " AND $key=?";
        }
        $i++;
    }

    $sql = $sql . " LIMIT 1";
    $stmt = executeQuery($sql, $conditions);
    $records = $stmt->get_result()->fetch_assoc();
    return $records;
}

function selectOneSeat($cond)
{
	global $conn;
	$sql = "SELECT * FROM bookings WHERE schedule_book_id=$cond LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$data_result = mysqli_fetch_assoc($result);
	return $data_result;
}


function create($table, $data)
{
    global $conn;
    $sql = "INSERT INTO $table SET ";

    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " $key=?";
        } else {
            $sql = $sql . ", $key=?";
        }
        $i++;
    }
    
    $stmt = executeQuery($sql, $data);
    $id = $stmt->insert_id;
    return $id;
}



function update($table, $id, $data)
{
    global $conn;
    $sql = "UPDATE $table SET ";

    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " $key=?";
        } else {
            $sql = $sql . ", $key=?";
        }
        $i++;
    }

    $sql = $sql . " WHERE pid=?";
    $data['id'] = $id;
    $stmt = executeQuery($sql, $data);
    return $stmt->affected_rows;
}

function update_mat($table, $id, $data)
{
    global $conn;
    $sql = "UPDATE $table SET ";

    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " $key=?";
        } else {
            $sql = $sql . ", $key=?";
        }
        $i++;
    }

    $sql = $sql . " WHERE matatu_id=?";
    $data['matatu_id'] = $id;
    $stmt = executeQuery($sql, $data);
    return $stmt->affected_rows;
}
// update schedules

function update_schedules($table, $id, $data)
{
    global $conn;
    $sql = "UPDATE $table SET ";

    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " $key=?";
        } else {
            $sql = $sql . ", $key=?";
        }
        $i++;
    }

    $sql = $sql . " WHERE schedule_id=?";
    $data['schedule_id'] = $id;
    $stmt = executeQuery($sql, $data);
    return $stmt->affected_rows;
}

// update Routes

function update_route($table, $id, $data)
{
    global $conn;
    $sql = "UPDATE $table SET ";

    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " $key=?";
        } else {
            $sql = $sql . ", $key=?";
        }
        $i++;
    }

    $sql = $sql . " WHERE route_id=?";
    $data['route_id'] = $id;
    $stmt = executeQuery($sql, $data);
    return $stmt->affected_rows;
}


function delete($table, $id)
{
    global $conn;
    $sql = "DELETE FROM $table WHERE id=?";

    $stmt = executeQuery($sql, ['id' => $id]);
    return $stmt->affected_rows;
}


function delete_mat($table, $id)
{
    global $conn;
    $sql = "DELETE FROM $table WHERE matatu_id=?";

    $stmt = executeQuery($sql, ['matatu_id' => $id]);
    return $stmt->affected_rows;
}


function delete_schedule($table, $id)
{
    global $conn;
    $sql = "DELETE FROM $table WHERE schedule_id=?";

    $stmt = executeQuery($sql, ['schedule_id' => $id]);
    return $stmt->affected_rows;
}

function delete_booking($table, $id)
{
    global $conn;
    $sql = "DELETE FROM $table WHERE book_id=?";

    $stmt = executeQuery($sql, ['book_id' => $id]);
    return $stmt->affected_rows;
}



function delete_route($table, $id)
{
    global $conn;
    $sql = "DELETE FROM $table WHERE route_id=?";

    $stmt = executeQuery($sql, ['route_id' => $id]);
    return $stmt->affected_rows;
}

// function getPublishedPosts()
// {
//     global $conn;
//     $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=?";

//     $stmt = executeQuery($sql, ['published' => 1]);
//     $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
//     return $records;
// }


// function getPostsByTopicId($topic_id)
// {
//     global $conn;
//     $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=? AND topic_id=?";

//     $stmt = executeQuery($sql, ['published' => 1, 'topic_id' => $topic_id]);
//     $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
//     return $records;
// }


// function searchPosts($term)
// {
//     $match = '%' . $term . '%';
//     global $conn;
//     $sql = "SELECT 
//                 p.*, u.matatu_plate 
//             FROM schedules AS p 
//             JOIN matatus AS u 
//             ON p.mat_id=u.matatu_id 
//             WHERE p.travel_date=?
//             AND p.travel_from LIKE ? AND p.travel_to LIKE ?";


//     $stmt = executeQuery($sql, ['travel_date' => $_POST['travel_date'], 'travel_from' => $match, 'travel_to' => $match]);
//     $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
//     return $records;
// }



// // function searchPosts($term)
// // {
// //     $match = '%' . $term . '%';
// //     global $conn;
// //     $sql = "SELECT 
// //                 p.*, u.username 
// //             FROM posts AS p 
// //             JOIN users AS u 
// //             ON p.user_id=u.id 
// //             WHERE p.published=?
// //             AND p.title LIKE ? OR p.body LIKE ?";


// //     $stmt = executeQuery($sql, ['published' => 1, 'title' => $match, 'body' => $match]);
// //     $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
// //     return $records;
// // }