<?php 
if (!isset($_COOKIE['userId'])) {
    header("Location: ../view/login.php?login_message=You need to login to view this page.");
}
$user_id = $_COOKIE['userId'];
require '../model/database.php';
require '../model/users_db.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == null) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == null) {
        header("Location: ../index.php");
    }
}

if ($action == 'setting_list') {
    $personal_info = get_personal_info($user_id);
    include('setting_list.php');
}

?>