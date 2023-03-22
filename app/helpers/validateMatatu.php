<?php

function validateMatatu($matatu)
{
    $errors = array();

    if (empty($matatu['matatu_plate'])) {
        array_push($errors, 'plate_name is required');
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
