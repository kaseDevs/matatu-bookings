<?php

function validateSchedules($schedules)
{
    $errors = array();

    if (empty($schedules['mat_id'])) {
        array_push($errors, 'Matatu is required');
    }


    if (empty($schedules['travel_from'])) {
        array_push($errors, 'Departure is required');
    }

    if (empty($schedules['travel_to'])) {
        array_push($errors, 'Destination is required');
    }

    if (empty($schedules['travel_date'])) {
        array_push($errors, 'Date is required');
    }


    if (empty($schedules['travel_time'])) {
        array_push($errors, 'Time is required');
    }

    if (empty($schedules['price'])) {
        array_push($errors, 'Fare is required');
    }

    return $errors;
}
