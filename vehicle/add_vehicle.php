<?php
if (!isset($_COOKIE['userId'])) {
    header("Location: ../view/login.php?login_message=You need to login to view this page.");
}
include '../view/header.php';

$years = array();
for ($y = 1920, $now = date('Y') + 1; $y <= $now; ++$y) {
$years[$y] = array('name' => $y, 'value' => $y); }

$colors = array('Black', 'White', 'Grey', 'Silver', 'Tan', 'Blue', 'Red', 'Green', 'Yellow');
$error_message = filter_input(INPUT_GET, 'error_message');
?>


<main>
    <h1>Add Vehicle</h1>
    <h2><?php echo $make['name']; ?></h2>

    <form action="index.php" method="post">
        <input type="hidden" name="action" value="add_vehicle">
        <input type="hidden" name="make_id" value="<?php echo $make['makeId']; ?>">
        
        <label>Model:</label>
        <select name="model_id">
            <?php foreach ($models as $model) : ?>
            <option value="<?php echo $model['modelId']; ?>">
                <?php echo $model['name']; ?>
            </option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>VIN:</label>
        <input type="text" name="vin">
        <br>

        <label>Year:</label>
        <select name="year">
            <?php foreach ($years as $year) : ?>
            <option value="<?php echo $year['name']; ?>">
                <?php echo $year['value']; ?>
            </option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Color:</label>
        <select name="color">
            <?php foreach ($colors as $color) : ?>
            <option value="<?php echo $color; ?>">
                <?php echo $color; ?>
            </option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Purchase Date:</label>
        <input type="date" name="purchase_date">
        <br>

        <label>Purchase Price:</label>
        $<input type="number" name="purchase_price">
        <br>

        <label>Purchase Miles:</label>
        <input type="number" name="purchase_miles">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Save">
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_vehicles">My Vehicles</a>
    </p>
</main>
<?php include '../view/footer.php'; ?>