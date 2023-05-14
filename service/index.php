<?php 
if (!isset($_COOKIE['userId'])) {
    header("Location: ../view/login.php?login_message=You need to login to view this page.");
}

// imports 
require('../model/database.php');
require '../model/vehicle_db.php';
require '../model/location_db.php';
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
    include 'add_service.php';
}

else if ($action == 'submit_service') {
    $vehicle_id = filter_input(INPUT_POST, 'vehicle_id');
    $service_date = filter_input(INPUT_POST, 'service_date');
    $service_type = filter_input(INPUT_POST, 'service_type');
    $date_added = date("Y-m-d");
    $location_id = filter_input(INPUT_POST, 'location_id');
    $service_miles = filter_input(INPUT_POST, 'service_miles');
    $service_cost = filter_input(INPUT_POST, 'service_cost');
    $add_service_function = add_service($vehicle_id, $service_date, $service_type, $date_added, $location_id, $service_miles, $service_cost, $user_id);
    header("Location: add_service.php?Service saved successfully.");
}

else if ($action == 'service_list') {
    $vehicle_id = filter_input(INPUT_GET, 'vehicle_id');
    $vehicle = get_vehicle_by_id($vehicle_id);
    $services = get_services_by_vehicle($vehicle_id);
    include 'service_list.php';
}

else if ($action == 'service_details') {
    $service_id = filter_input(INPUT_GET, 'service_id');
    $details = get_service_by_id($service_id);
    include 'service_detail.php';
}
?>