<?php 
if (!isset($_COOKIE['userId'])) {
    header("Location: ../view/login.php?login_message=You need to login to view this page.");
}
include '../view/header.php'; 
?>
<main>
    <h1>Locations</h1>
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
        <!--Display a table of vehicles-->
        <h2>My Locations</h2>
        <table>
            <tr>
                <th>Location Name:</th>
                <th>City:</th>
                <th>Times Used:</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($locations as $location) : ?>
            <tr>
                <td>
                    <a href="../service/index.php?action=service_list&vehicle_id=<?php echo $location['locationId']; ?>"> 
                        <?php echo $location['name']; ?>
                    </a>
                </td>
                <td><?php echo $location['city']; ?></td>
                <td><?php echo $location['']; ?></td>
                <td>
                    <form action="." method="post" onsubmit="remove_function()">
                        <input type="hidden" name="action" value="delete_vehicle">
                        <input type="hidden" name="vehicle_id" value="<?php echo $vehicle['vehicleId']; ?>">
                        <input type="hidden" name="remove_boolean" id="remove_boolean">
                        <input type="submit" value="Remove">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p class="last_paragraph">
            <button onclick="show_make_form()">Add Vehicle</button>
        </p>
        <div id="div_make_form" hidden>
            <form action="." method="post">
                <input type="hidden" name="action" value="show_add_form">
                <select name="make_id">
                    <?php foreach ($makes as $make) : ?>
                    <option value="<?php echo $make['makeId']; ?>">
                        <?php echo $make['name']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <input type="submit" value="Go">
            </form>
        </div>
        <div>
            <p class="error"><?php echo $error_message; ?></p>
        </div>
    </section>
</main>
<?php include '../view/footer.php'; ?>