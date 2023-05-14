<?php 
if (!isset($_COOKIE['userId'])) {
    header("Location: ../view/login.php?login_message=You need to login to view this page.");
}
include '../view/header.php';
?>

<script>
    function show_other() {
        var dropdown = document.getElementById("dropdown");
        var other_box = document.getElementById("other_box");
        if (dropdown.value == 1) {
            other_box.removeAttribute("hidden");
        }
    }
</script>

<main>
    <div class="container">
        <h2>Add a Service Record</h2><br>
        <h4><?php echo $vehicle['year']; ?> <?php echo $vehicle['makeName']; ?> <?php echo $vehicle['modelName']; ?></h4>

        <form class="needs-validation" action="." method="post" novalidate>
            <input type="hidden" name="action" value="submit_service">
            <input type="hidden" name="vehicle_id" value="<?php echo $vehicle['vehicleId']; ?>"> 
            <div class="form-group">
                <label for="location">Location &nbsp; <a href="../location/index.php?action=add_location">Add New</a></label>
                <select class="form-control" id="location" name="location_id" required>
                    <?php foreach ($locations as $location) : ?>
                    <option value="<?php echo $location['locationId']; ?>">
                        <?php echo $location['name']; ?> <?php echo $location['city']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    You must select a service location.
                </div>
            </div>
            <div class="form-group">
                <label for="service_date">Service Date</label>
                <input class="form-control" id="service_date" type="date" name="service_date" required>
                <div class="invalid-feedback">
                    You must select a service date.
                </div>
            </div>
            <div class="form-group">
                <label for="service_type">Service Type</label>
                <input class="form-control" id="service_type" type="text" name="service_type" required>
                <div class="invalid-feedback">
                    You must input a service type.
                </div>
            </div>
            <div class="form-group">
                <label for="service_miles">Miles at Service</label>
                <input class="form-control" id="service_miles" type="number" name="service_miles" required>
                <div class="invalid-feedback">
                    You must input the miles at service.
                </div>
            </div>
            <div class="form-group">
                <label for="service_cost">Service Cost ($)</label>
                <input class="form-control" id="service_cost" type="text" name="service_cost" required>
                <div class="invalid-feedback">
                    You must input a service cost.
                </div>
            </div>
            <input type="submit" value="Save">
        </form>
    </div><br>
</main>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

<?php include '../view/footer.php'; ?>