<?php 
if (!isset($_COOKIE['userId'])) {
    header("Location: ../view/login.php?login_message=You need to login to view this page.");
}
include '../view/header.php'; 
?>

<script>
    function remove_function() {
        var jsChoose = confirm("Are you sure you want to remove vehicle?");
        document.getElementById("remove_boolean").value = jsChoose;
    }
</script>
<script>
    function show_make_form() {
        var element = document.getElementById("div_make_form");
        element.removeAttribute("hidden");
    }
</script>

<main>
    <div class="container">
        <br>
        <h2>My Vehicles</h2>
    </div>

    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Make</th>
                    <th scope="col">Model</th>
                    <th scope="col">Year</th>
                    <th scope="col">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vehicles as $vehicle) : ?>
                <tr>
                    <td>
                        <a href="../service/index.php?action=service_list&vehicle_id=<?php echo $vehicle['vehicleId']; ?>"> 
                            <?php echo $vehicle['makeName']; ?>
                        </a>
                    </td>
                    <td><?php echo $vehicle['modelName']; ?></td>
                    <td><?php echo $vehicle['year']; ?></td>
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
            </tbody>
        </table>
        <br>
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
    </div>
</main> 
<?php include '../view/footer.php'; ?>