<?php 
include '../view/header.php'; 
if (!isset($_COOKIE['userId'])) {
    header("Location: ../view/login.php?login_message=You need to login to view this page.");
}
?>

<main>
<h1>Add a Service Record</h1>
    <aside>
        <!--Display a nav menu-->
        <h2>Menu</h2>
        <nav>
            <ul>
                <a href="../">Home</a><br>
            </ul>
        </nav>
    </aside>

    <section>
        <h2>Select a Vehicle for Service</h2>
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="add_service">

            <select name="vehicleId">
                <?php foreach ($vehicles as $vehicle) : ?>
                <option value="<?php echo $vehicle['vehicleId']; ?>">
                    <?php echo $vehicle['year']; ?> <?php echo $vehicle['makeName']; ?> <?php echo $vehicle['modelName']; ?>
                </option>
                <?php endforeach; ?>
            </select>
            
            <input type="submit" value="Go">
        </form>
        <p class="last_paragraph">
            <a href="../vehicle/index.php?action=list_vehicles">Add Vehicle</a>
        </p>
        <div>
            <p class="error"><?php echo $error_message; ?></p>
        </div>
    </section>
</main>

<?php include '../view/footer.php'; ?>