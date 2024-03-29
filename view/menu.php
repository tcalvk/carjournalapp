<?php 
if (!isset($_COOKIE['userId'])) {
    header("Location: ../view/login.php?login_message=You need to login to view this page.");
}
include 'header.php';
?>
<!--
<script>
    $(document).ready( function() {
        confirm('Example of a basic alert box in jquery', 'jquery basic alert box');
    });
</script>
-->
<main>
    <div class="col-12 col-md-3 col-xl-2 bd-sidebar">
        <h1>Menu</h1>
        <ul>
            <li>
                <a href="../service/index.php?action=select_vehicle_from_list">Add a Service Record</a>
            </li>
            <li>
                <a href="../vehicle/">My Vehicles</a>
            </li>
            <li>
                <a href="../location/index.php?action=list_locations">Service Locations</a>
            </li>
            <li>
                <a href="">Reports</a>
            </li>
            <li>
                <a href="../setting/index.php?action=setting_list">Settings</a>
            </li>
        </ul>
    </div>
</main>
<?php include 'footer.php'; ?>