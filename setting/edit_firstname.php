<?php 
if (!isset($_COOKIE['userId'])) {
    header("Location: ../view/login.php?login_message=You need to login to view this page.");
}
include '../view/header.php'

?>

<main>
    <div class="container">
        <br>
        <h2>Edit First Name</h2>
        <form class="needs-validation" action="index.php" method="post" novalidate>
            <input type="hidden" name="action" value="submit_firstname">
            <div class="form-group">
                <label for="first_name">New First Name</label>
                <input class="form-control" id="first_name" type="text" name="first_name" required>
                <div class="invalid-feedback">
                    You must enter a new first name. 
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

    </div><br>
</main>
<?php include '../view/footer.php'; ?>