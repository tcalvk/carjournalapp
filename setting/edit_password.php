<?php 
if (!isset($_COOKIE['userId'])) {
    header("Location: ../view/login.php?login_message=You need to login to view this page.");
}
include '../view/header.php';
$error_msg = filter_input(INPUT_GET, 'error');

?>

<main>
    <div class="container">
        <br>
        <h2>Change Password</h2><br>
        <form class="needs-validation" action="index.php" method="post" novalidate>
            <input type="hidden" name="action" value="submit_password">
            <div class="form-group">
                <label for="current_password">Current Password</label>
                <input class="form-control" id="current_password" type="password" name="current_password" required>
                <div class="invalid-feedback">
                    You must enter your current password. 
                </div>
            </div>
            <div class="form-group">
                <label for="new_password">New Password</label>
                <input class="form-control" id="new_password" type="password" name="new_password" required>
                <div class="invalid-feedback">
                    You must enter a new passord. 
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

        <br>
        <div>
            <p class="error"><?php echo $error_msg; ?></p>
        </div>
    </div>
</main>
<?php include '../view/footer.php'; ?>