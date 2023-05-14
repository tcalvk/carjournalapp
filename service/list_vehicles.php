<?php 
include '../view/header.php'; 
if (!isset($_COOKIE['userId'])) {
    header("Location: ../view/login.php?login_message=You need to login to view this page.");
}
?>

<main>
    <div class="container">
        <h2>Add a Service Record</h2><br>
        <h4>Select a Vehicle for Service</h4>
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="add_service">
            <div class="form-row">
                <div class="form-group col-4">
                    <select class="form-control" name="vehicleId">
                        <?php foreach ($vehicles as $vehicle) : ?>
                        <option value="<?php echo $vehicle['vehicleId']; ?>">
                            <?php echo $vehicle['year']; ?> <?php echo $vehicle['makeName']; ?> <?php echo $vehicle['modelName']; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col">
                    <input type="submit" value="Go">
                </div>
            </div>
        </form>
        <p class="last_paragraph">
            <a href="../vehicle/index.php?action=list_vehicles">Add Vehicle</a>
        </p>
        <div>
            <p class="error"><?php echo $error_message; ?></p>
        </div>
    </div>
</main>

<?php include '../view/footer.php'; ?>