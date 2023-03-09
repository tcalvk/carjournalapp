<?php include '../view/header.php'; ?>

<main>
    <h1>Service History</h1>
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
        <h2><?php echo $vehicle['year']; ?> <?php echo $vehicle['makeName']; ?> <?php echo $vehicle['modelName']; ?></h2>

        <table>
            <tr>
                <th>Service Date:</th>
                <th>Service Type:</th>
                <th>Location:</th>
                <th>Cost:</th>
            </tr>
            <?php foreach ($services as $service) : ?>
            <tr>
                <td><?php echo $service['serviceDate']; ?></td>
                <td><?php echo $service['serviceTypeName']; ?></td>
                <td><?php echo $service['locationName']; ?></td>
                <td><?php echo $service['serviceCost']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </section>
</main>
<?php include '../view/footer.php'; ?>