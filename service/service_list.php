<?php 
include '../view/header.php'; 
if (!isset($_COOKIE['userId'])) {
    header("Location: ../view/login.php?login_message=You need to login to view this page.");
}
?>

<main>
    <div class="container">
        <h2><?php echo $vehicle['year']; ?> <?php echo $vehicle['makeName']; ?> <?php echo $vehicle['modelName']; ?></h2><br>
        <h4>Service History</h4>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Service Date</th>
                    <th>Service Type</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($services as $service) : ?>
                <tr>
                    <td><?php echo $service['serviceDate']; ?></td>
                    <td><?php echo $service['serviceType']; ?></td>
                    <td><a href="index.php?action=service_details&service_id=<?php echo $service['serviceId'];?>">Details</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table><br>

        <h4>Vehicle Details</h4>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>VIN</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Color</th>
                    <th>Purchase Date</th>
                    <th>Purchase Price</th>
                    <th>Purchase Miles</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $vehicle['vin']; ?></td>
                    <td><?php echo $vehicle['makeName']; ?></td>
                    <td><?php echo $vehicle['modelName']; ?></td>
                    <td><?php echo $vehicle['year']; ?></td>
                    <td><?php echo $vehicle['color']; ?></td>
                    <td><?php echo $vehicle['purchaseDate']; ?></td>
                    <td><?php echo $vehicle['purchasePrice']; ?></td>
                    <td><?php echo $vehicle['purchaseMiles']; ?></td>
                </tr>
            </tbody>
        </table><br>
    </div>    
</main>
<?php include '../view/footer.php'; ?>