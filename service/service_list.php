<?php 
include '../view/header.php'; 
if (!isset($_COOKIE['userId'])) {
    header("Location: ../view/login.php?login_message=You need to login to view this page.");
}
?>

<main>
    <h1><?php echo $vehicle['year']; ?> <?php echo $vehicle['makeName']; ?> <?php echo $vehicle['modelName']; ?></h1>
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
        <!--Display a table of service-->
        <h2>Service History</h2>

        <table>
            <tr>
                <th>Service Date:</th>
                <th>Service Type:</th>
                <th></th>
            </tr>
            <?php foreach ($services as $service) : ?>
            <tr>
                <td><?php echo $service['serviceDate']; ?></td>
                <td><?php echo $service['serviceTypeName']; ?></td>
                <td><a href="index.php?action=service_details&service_id=<?php echo $service['serviceId'];?>">Details</a></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <h2>Vehicle Details</h2>
        <table>
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
        </table>
    </section>
</main>
<?php include '../view/footer.php'; ?>