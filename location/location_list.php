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

<main>
    <div class="container">
        <h2>My Locations</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Location Name</th>
                    <th>City</th>
                    <th>Times Used</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($locations as $location) : ?>
                <tr>
                    <td><?php echo $location['name']; ?></td>
                    <td><?php echo $location['city']; ?></td>
                    <td><?php echo $location['TimesUsed']; ?></td>
                    <td>
                        <form action="." method="post" onsubmit="remove_function()">
                            <input type="hidden" name="action" value="delete_location">
                            <input type="hidden" name="location_id" value="<?php echo $location['locationId']; ?>">
                            <input type="hidden" name="remove_boolean" id="remove_boolean">
                            <input type="submit" value="Remove">
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p class="last_paragraph">
        <a href=".?action=add_location">Add Service Location</a>
        </p>
        <div>
            <p class="error"><?php echo $error_message; ?></p>
        </div>
    </div>
</main>
<?php include '../view/footer.php'; ?>