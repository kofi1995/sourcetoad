<?php

function recursiveFind(array $array, $needle) {
    $iterator = new RecursiveArrayIterator($array);
    $recursive = new RecursiveIteratorIterator($iterator, RecursiveIteratorIterator::SELF_FIRST);
    $return = null;
    foreach ($recursive as $key => $value) {
        if ($key === $needle) {
            $return = $value;
        }
    }
    return $return;
}

function sortByKeys(array $orderBy, array &$array): bool
{
    if(empty($orderBy)){
        throw new ErrorException('You should specify an order, and the direction to order by (optional)');
    }

    return usort($array, function(array $a, array $b) use ($orderBy){
        $weight = (int) ('1' . str_repeat('0', count($orderBy) - 1));
        $sortVal = 0;
        foreach($orderBy as $sortKey) {
            if(empty($sortKey['orderBy'])) {
                throw new ErrorException('make sure that order by contains an array key');
            }
            if(empty($sortKey['order'])) {
                $sortKey['order'] = 'asc';
            }
            $sortVal+= ($sortKey['order'] === 'asc' ? strcasecmp(recursiveFind($a, $sortKey['orderBy']), recursiveFind($b, $sortKey['orderBy'])) : strcasecmp(recursiveFind($b, $sortKey['orderBy']), recursiveFind($a, $sortKey['orderBy']))) * $weight;
            $weight /= 10;
        }
        return $sortVal;
    });
}

$bookings = array (
    array (
        'guest_id' => 177,
        'guest_type' => 'crew',
        'first_name' => 'Marco',
        'middle_name' => NULL,
        'last_name' => 'Burns',
        'gender' => 'M',
        'guest_booking' => array (
            array (
                'booking_number' => 20008683,
                'ship_code' => 'OST',
                'room_no' => 'A0073',
                'start_time' => 1438214400,
                'end_time' => 1483142400,
                'is_checked_in' => true,
            ),
        ),
        'guest_account' => array (
            array (
                'account_id' => 20009503,
                'status_id' => 2,
                'account_limit' => 0,
                'allow_charges' => true,
            ),
        ),
    ),
    array (
        'guest_id' => 10000113,
        'guest_type' => 'crew',
        'first_name' => 'Bob Jr ',
        'middle_name' => 'Charles',
        'last_name' => 'Hemingway',
        'gender' => 'M',
        'guest_booking' => array (
            array (
                'booking_number' => 10000013,
                'room_no' => 'A0073',
                'is_checked_in' => true,
            ),
        ),
        'guest_account' => array (
            array (
                'account_id' => 10000522,
                'account_limit' => 300,
                'allow_charges' => true,
            ),
        ),
    ),
    array (
        'guest_id' => 10000114,
        'guest_type' => 'crew',
        'first_name' => 'Al ',
        'middle_name' => 'Bert',
        'last_name' => 'Santiago',
        'gender' => 'M',
        'guest_booking' => array (
            array (
                'booking_number' => 10000014,
                'room_no' => 'A0018',
                'is_checked_in' => true,
            ),
        ),
        'guest_account' => array (
            array (
                'account_id' => 10000013,
                'account_limit' => 300,
                'allow_charges' => false,
            ),
        ),
    ),
    array (
        'guest_id' => 10000115,
        'guest_type' => 'crew',
        'first_name' => 'Red ',
        'middle_name' => 'Ruby',
        'last_name' => 'Flowers ',
        'gender' => 'F',
        'guest_booking' => array (
            array (
                'booking_number' => 10000015,
                'room_no' => 'A0051',
                'is_checked_in' => true,
            ),
        ),
        'guest_account' => array (
            array (
                'account_id' => 10000519,
                'account_limit' => 300,
                'allow_charges' => true,
            ),
        ),
    ),
    array (
        'guest_id' => 10000116,
        'guest_type' => 'crew',
        'first_name' => 'Ismael ',
        'middle_name' => 'Jean-Vital',
        'last_name' => 'Jammes',
        'gender' => 'M',
        'guest_booking' => array (
            array (
                'booking_number' => 10000016,
                'room_no' => 'A0023',
                'is_checked_in' => true,
            ),
        ),
        'guest_account' => array (
            array (
                'account_id' => 10000015,
                'account_limit' => 300,
                'allow_charges' => true,
            ),
        ),
    ),
);

sortByKeys([
    [
        'orderBy' => 'room_no',
        'order' => 'desc',
    ],
    [
        'orderBy' => 'first_name',
    ],
], $bookings);


foreach($bookings as $booking) {
    var_dump($booking['first_name']);
    var_dump($booking['guest_booking'][0]['room_no']);
}