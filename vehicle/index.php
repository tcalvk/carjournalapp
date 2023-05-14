<?php 
if (!isset($_COOKIE['userId'])) {
    header("Location: ../view/login.php?login_message=You need to login to view this page.");
}
// imports 
require '../model/database.php';
require '../model/vehicle_db.php';
require '../model/make_db.php';
require '../model/model_db.php';

// get the action 
$action = filter_input(INPUT_POST, 'action');
if ($action == null) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == null) {
        $action = 'list_vehicles';
    }
}

if ($action == 'list_vehicles') {
    $user_id = $_COOKIE['userId'];
    $vehicles = get_vehicles($user_id);
    $makes = get_makes();
    $error_message = filter_input(INPUT_GET, 'error_message');
    include('vehicles_list.php');
} 

else if ($action == 'show_add_form') {
    $make_id = filter_input(INPUT_POST, 'make_id');
    $make = get_make_by_id($make_id);
    $models = get_model_by_makeid($make_id);
    include('add_vehicle.php');
}

else if ($action == 'add_vehicle') {
    $vin = filter_input(INPUT_POST, 'vin');
    $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
    $model_id = filter_input(INPUT_POST, 'model_id', FILTER_VALIDATE_INT);
    $year = filter_input(INPUT_POST, 'year');
    $color = filter_input(INPUT_POST, 'color');
    $purchase_date = filter_input(INPUT_POST, 'purchase_date');
    $date_added = date('Y/m/d');
    $purchase_price = filter_input(INPUT_POST, 'purchase_price');
    $purchase_miles = filter_input(INPUT_POST, 'purchase_miles');
    $owner_id = $_COOKIE['userId'];

    if ($vin == null || $make_id == null || $model_id == null || $year == null || $color == null || $purchase_date == null 
        || $purchase_price == null || $purchase_miles == null) {
        header("Location: .?action=list_vehicles&error_message=All vehicle data must be filled out. Please try again.");
    } else {
        try {
            add_vehicle(
                $vin,
                $make_id,
                $model_id, 
                $year, 
                $color, 
                $purchase_date, 
                $date_added, 
                $purchase_price,
                $purchase_miles, 
                $owner_id
            );
        } catch (Exception $e) {
            $error_message = $e->getMessage();
            include('../errors/error.php');
            exit();
        }
        header('Location: .');
    }
}

else if ($action == 'delete_vehicle') {
    $delete_confirm = filter_input(INPUT_POST, 'remove_boolean'); 
    if ($delete_confirm == 'false') {
        header('Location: .');
    } else {
        $vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
        if ($vehicle_id == null) {
            $error = "Invalid data. Contact your database administrator.";
            include('../errors/error.php');
        } else {
            $current_date = date('Y-m-d H:i:s');
            $delete = delete_vehicle($vehicle_id, $current_date);
            header('Location: .');
        }
    }
}

?>