<?php

function validateBookings($bookings)
{
    $errors = array();

    if (empty($bookings['seat_number'])) {
        array_push($errors, 'Choose seat');
    }


    if (empty($bookings['user_passenger'])) {
        array_push($errors, 'Add passenger');
    }

    if (!empty($bookings['schedule_book_id'])) {
        $existingSeat = selectOneSeat($bookings['schedule_book_id']);
        if ($existingSeat) {
            // if (isset($user['update-book']) && $existingSeat['seat_number'] != $bookings['seat_number']) {
            //     array_push($errors, 'Email already exists');
            // }
    
            if (isset($user['add-book'])) {
                array_push($errors, 'Seat is taken for this vehicle');
            }
        }
    }


    // $existingSeat = selectOneSeat($bookings['schedule_book_id']);
   

    return $errors;
}
