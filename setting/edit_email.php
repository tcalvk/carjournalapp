<?php 
if (!isset($_COOKIE['userId'])) {
    header("Location: ../view/login.php?login_message=You need to login to view this page.");
}
include '../view/header.php'

?>

<main>
    <div class="container">
        <br>
        <h2>Change Email</h2>
        <form class="needs-validation" action="index.php" method="post" novalidate>
            <input type="hidden" name="action" value="submit_email">
            <div class="form-group">
                <label for="email">New Email</label>
                <input class="form-control" id="email" type="text" name="email" required>
                <div class="invalid-feedback">
                    You must enter a new email address. 
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