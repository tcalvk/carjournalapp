<?php 
if (!isset($_COOKIE['userId'])) {
    header("Location: ../view/login.php?login_message=You need to login to view this page.");
}

// imports 
require('../model/database.php');
require '../model/vehicle_db.php';
require '../model/location_db.php';
require '../model/service_type_db.php';
require '../model/service_db.php';
$user_id = $_COOKIE['userId'];
$vehicles = get_vehicles($user_id);
$locations = get_locations($user_id);

// get the action 
$action = filter_input(INPUT_GET, 'action');
if ($action == null) {
    $action = filter_input(INPUT_POST, 'action');
}

// add a service without selecting vehicle first
if ($action == 'select_vehicle_from_list') {
    $error_message = filter_input(INPUT_GET, 'error_message');
    include 'list_vehicles.php';
}

// a service by clicking on vehicle hyperlink 


else if ($action == 'add_service') {
    $vehicle_id = filter_input(INPUT_POST, 'vehicleId');
    $vehicle = get_vehicle_by_id($vehicle_id);
    $service_types = get_service_types($user_id);
    include 'add_service.php';
}

else if ($action == 'submit_service') {
    // user provided values
        // logic to get the serviceType if 'Other' is selected
    $other_box = filter_input(INPUT_POST, 'other_box');
    if ($other_box == null) {
        $service_type_id = filter_input(INPUT_POST, 'service_type_id');
    } else {
        // logic to add that service type to the database
        $duplicate = check_serviceType_duplicates($other_box, $user_id);
        if ($duplicate == '') {
            add_service_type($other_box, $user_id);
            $service_type = get_service_type_by_name($other_box, $user_id);
            $service_type_id = $service_type['serviceTypeId'];
        }
        else {
            header("Location: .?action=select_vehicle_from_list&error_message=A service type by that name already exists.");
        }
    }
    $vehicle_id = filter_input(INPUT_POST, 'vehicle_id');
    $location_id = filter_input(INPUT_POST, 'location_id');
    $service_date = filter_input(INPUT_POST, 'service_date');
    $service_miles = filter_input(INPUT_POST, 'service_miles');
    $service_cost = filter_input(INPUT_POST, 'service_cost');

    // server provided values
    $date_added = date('Y/m/d');

    // data validation 
    if ($vehicle_id == null || $service_date == null || $service_type_id == null || $location_id == null || 
        $service_miles == null || $service_cost == null) {
        header("Location: .?action=select_vehicle_from_list&error_message=All service fields must be completed. Please try again.");
    } else {
        $success = add_service($vehicle_id, $service_date, $service_type_id, $date_added, $location_id, 
        $service_miles, $service_cost, $user_id);
        if ($success == true) {
            header("Location: ../view/menu.php");
        } else {
            header("Location: add_service.php?error_message=Save unsuccessful. Try again later.");
        }
    }
}

else if ($action == 'service_list') {
    $vehicle_id = filter_input(INPUT_GET, 'vehicle_id');
    $vehicle = get_vehicle_by_id($vehicle_id);
    $top_service = get_single_service_by_vehicle($vehicle_id);
    $services = get_services_by_vehicle($vehicle_id);
    if ($top_service['ownerId'] != $user_id) {
        header("Location: ../errors/error.php");
    } else {
        include 'service_list.php';
    }
}

else if ($action == 'service_details') {
    $service_id = filter_input(INPUT_GET, 'service_id');
    include 'service_detail.php';
}
?>