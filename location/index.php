<?php
if (!isset($_COOKIE['userId'])) {
    header("Location: ../view/login.php?login_message=You need to login to view this page.");
}
require '../model/database.php';
require '../model/users_db.php';
require '../model/location_db.php';
$save_message = filter_input(INPUT_GET, 'save_message');

$action = filter_input(INPUT_POST, 'action');
if ($action == null) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == 'add_location') {
        include 'add_location.php';
    } 
    else if ($action == 'list_locations') {
        $locations = get_locations($user_id);
        include 'location_list.php';
    }
    
}

else if ($action == 'submit_location') {
    $name = filter_input(INPUT_POST, 'name');
    if ($name == null) {
        header("Location: .?action=add_location&save_message=You must add a location name to save. Please try again.");
    } else {
        $address1 = filter_input(INPUT_POST, 'address1');
        if ($address1 == '') {
            $address1 = NULL;
        }
        $address2 = filter_input(INPUT_POST, 'address2');
        if ($address2 == '') {
            $address2 = NULL;
        }
        $city = filter_input(INPUT_POST, 'city');
        if ($city == '') {
            $city = NULL;
        }
        $state = filter_input(INPUT_POST, 'state');
        if ($state == '') {
            $state = NULL;
        }
        $zip = filter_input(INPUT_POST, 'zip');
        if ($zip == '') {
            $zip = NULL;
        }
        $phone = filter_input(INPUT_POST, 'phone');
        if ($phone == '') {
            $phone = NULL;
        }
        $email = filter_input(INPUT_POST, 'email');
        if ($email == '') {
            $email = NULL;
        }
        $website = filter_input(INPUT_POST, 'website');
        if ($website == '') {
            $website = NULL;
        }
        $user_id = $_COOKIE['userId'];
        $success = add_location($name, $address1, $address2, $city, $state, $zip, $phone, $email, $website, $user_id);
        if ($success == true) {
            header("Location: .?action=add_location&save_message=Location Saved Successfully.");
        } else {
            header("Location: .?action=add_location&save_message=Save error. Try again.");
        }
    }   
}

?>