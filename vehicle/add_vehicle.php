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
    <div class="container">
        <br>
        <h2>Add a <?php echo $make['name']; ?></h2>

        <form action="index.php" method="post" class="needs-validation" novalidate>
            <input type="hidden" name="action" value="add_vehicle">
            <input type="hidden" name="make_id" value="<?php echo $make['makeId']; ?>">
            
            <div class="form-row">
                <div class="form-group col-8">
                    <label for="model">Model</label>
                    <select class="form-control" id="model" name="model_id" required>
                        <?php foreach ($models as $model) : ?>
                        <option value="<?php echo $model['modelId']; ?>">
                            <?php echo $model['name']; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        You must select a model. 
                    </div>
                </div>
                <div class="form-group col">
                    <label for="year">Year</label>
                    <select class="form-control" id="year" name="year" required>
                        <?php foreach ($years as $year) : ?>
                        <option value="<?php echo $year['name']; ?>">
                            <?php echo $year['value']; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        You must select a model year. 
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-8">
                    <label for="vin">VIN</label>
                    <input class="form-control" type="text" name="vin" id="vin" placeholder="VIN" required> 
                </div>
                <div class="invalid-feedback">
                    You must input a VIN. 
                </div>
                <div class="form-group col">
                    <label for="color">Color</label>
                    <select class="form-control" id="color" name="color" required>
                        <?php foreach ($colors as $color) : ?>
                        <option value="<?php echo $color; ?>">
                            <?php echo $color; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        You must select a color. 
                    </div>
                </div>
            </div>

            <div class="form-row">
                <label for="purchase_price">Purchase Price ($)</label>
                <input class="form-control" id="purchase_price" type="number" name="purchase_price" required>
            </div>
            <div class="invalid-feedback">
                You must enter a purchase price. 
            </div>

            <div class="form-row">
                <div class="form-group col-5">
                    <label for="purchase_date">Purchase Date</label>
                    <input class="form-control" type="date" id="purchase_date" name="purchase_date" required>
                </div>
                <div class="invalid-feedback">
                    You must select a purchase date. 
                </div>
                <div class="form-group col">
                    <label for="purchase_miles">Purchase Miles</label>
                    <input class="form-control" id="purchase_miles" type="number" name="purchase_miles" required>
                </div>
                <div class="invalid-feedback">
                    You must enter the miles at purchase. 
                </div>
            </div>
            <input type="submit" value="Save">
        </form>

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
    <div>
    <br>
</main>
<?php include '../view/footer.php'; ?>