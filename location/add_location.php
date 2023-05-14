<?php 
if (!isset($_COOKIE['userId'])) {
    header("Location: ../view/login.php?login_message=You need to login to view this page.");
}
include '../view/header.php';
$states = array(
    '',
    'AL',
    'AK',
    'AZ',
    'AR',
    'CA',
    'CO',
    'CT',
    'DE',
    'FL',
    'GA',
    'HI',
    'ID',
    'IL',
    'IN',
    'IA',
    'KS',
    'KY',
    'LA',
    'ME',
    'MD',
    'MA',
    'MI',
    'MN',
    'MS',
    'MO',
    'MT',
    'NE',
    'NV',
    'NH',
    'NJ',
    'NM',
    'NY',
    'NC',
    'ND',
    'OH',
    'OK',
    'OR',
    'PA',
    'RI',
    'SC',
    'SD',
    'TN',
    'TX',
    'UT',
    'VT',
    'VA',
    'WA',
    'WV',
    'WI',
    'WY',
    'DC'
);
?>

<main>
    <div class="container">
        <h2>Add a Service Location</h2>
        <form class="needs-validation" action="." method="post" novalidate>
            <input type="hidden" name="action" value="submit_location">
            <div class="form-group">
                <label for="name">Location Name:</label>
                <input class="form-control" id="name" type="text" name="name" required>    
                <div class="invalid-feedback">
                    You must enter a location name. 
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col">
                    <label for="address1">Address 1:</label>
                    <input class="form-control" id="address1" type="text" name="address1" placeholder="Optional">    
                </div>
                <div class="form-group col">
                    <label for="address2">Address 2:</label>
                    <input class="form-control" id="address2" type="text" name="address2" placeholder="Optional">  
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="city">City:</label>
                    <input class="form-control" id="city" type="text" name="city" placeholder="Optional">
                </div>
                <div class="form-group col-3">
                    <label for="state">State:</label>
                    <select class="form-control" id="state" name="state">
                        <?php foreach ($states as $state) : ?>
                        <option value="<?php echo $state ?>">
                            <?php echo $state ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-3">
                    <label for="zip">Zip Code:</label>
                    <input class="form-control" id="zip" type="text" name="zip" placeholder="Optional">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="tel">Phone:</label>
                    <input class="form-control" id="tel" type="tel" name="phone" placeholder="Optional">
                </div>
                <div class="form-group col">
                    <label for="email">Email:</label>
                    <input class="form-control" id="email" type="email" name="email" placeholder="Optional">
                </div>
                <div class="form-group col">
                    <label for="website">Website:</label>
                    <input class="form-control" id="website" type="text" name="website" placeholder="Optional">
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

        <div class="error">
            <p><?php echo $save_message; ?></p>
        </div>
    </div><br>
</main>

<?php include '../view/footer.php'; ?>