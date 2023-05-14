<?php 
include '../view/header.php'; 
if (!isset($_COOKIE['userId'])) {
    header("Location: ../view/login.php?login_message=You need to login to view this page.");
}
?>

<main>
    <div class="container">
        <h2>Service Details</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Service Date</th>
                    <th>Service Type</th>
                    <th>Date Performed</th>
                    <th>Miles at Service</th>
                    <th>Service Cost</th>
                    <th>Location</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $details['serviceDate']; ?></td>
                    <td><?php echo $details['serviceType']; ?></td>
                    <td><?php echo $details['dateAdded']; ?></td>
                    <td><?php echo $details['serviceMiles']; ?></td>
                    <td><?php echo $details['serviceCost']; ?></td>
                    <td><?php echo $details['locationName']; ?>-<?php echo $details['city']; ?></td>
                </tr>
            </tbody>
        </table><br>
    </div>
</main>

<?php include '../view/footer.php'; ?>