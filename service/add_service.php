<?php 
if (!isset($_COOKIE['userId'])) {
    header("Location: ../view/login.php?login_message=You need to login to view this page.");
}
include '../view/header.php';
?>

<script>
    function show_other() {
        var dropdown = document.getElementById("dropdown");
        var other_box = document.getElementById("other_box");
        if (dropdown.value == 1) {
            other_box.removeAttribute("hidden");
        }
    }
</script>

<main>
    <h1>Add a Service Record</h1>
    <h2><?php echo $vehicle['year']; ?> <?php echo $vehicle['makeName']; ?> <?php echo $vehicle['modelName']; ?></h2>

    <form action="." method="post">
        <input type="hidden" name="action" value="submit_service">
        <input type="hidden" name="vehicle_id" value="<?php echo $vehicle['vehicleId']; ?>"> 

        <label>Location:</label>
        <select name="location_id">
            <?php foreach ($locations as $location) : ?>
            <option value="<?php echo $location['locationId']; ?>">
                <?php echo $location['name']; ?> <?php echo $location['city']; ?>
            </option>
            <?php endforeach; ?>
        </select>
        &nbsp;
        <a href="../location/index.php?action=add_location">Add a Location</a>
        <br>

        <label>Service Date:</label>
        <input type="date" name="service_date">
        <br>
        
        <label>Service Type:</label>
        <select name="service_type_id" onchange="show_other()" id="dropdown">
            <?php foreach ($service_types as $service_type) : ?>
            <option value="<?php echo $service_type['serviceTypeId']; ?>">
                <?php echo $service_type['name']; ?>
            </option>
            <?php endforeach; ?>
        </select>
        
        <input type="text" name="other_box" id="other_box" hidden placeholder="Input Service Type">
        <br>
        
        <label>Miles at Service:</label>
        <input type="number" name="service_miles">
        <br>

        <label>Service Cost:</label>
        $<input type="text" name="service_cost">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Save">
        <br>
    </form>
    
    <p class="last_paragraph">
        <a href="index.php?action=select_vehicle_from_list">Back</a>
    </p>
</main>

<?php include '../view/footer.php'; ?>