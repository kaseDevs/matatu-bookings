<?php

function validateRoute($route)
{
    $errors = array();

    if (empty($route['route_name'])) {
        array_push($errors, 'Route is required');
    }

    // $existingMatatu = selectOne('matatus', ['matatu_plate' => $post['plate_name']]);
    // if ($existingMatatu) {
    //     if (isset($post['update-matatu']) && $existingMatatu['matatu_id'] != $post['id']) {
    //         array_push($errors, 'Plate already exists');
    //     }

    //     if (isset($post['add-matatu'])) {
    //         array_push($errors, 'Plate already exists');
    //     }
    // }

    return $errors;
}
