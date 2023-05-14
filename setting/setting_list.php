<?php 
if (!isset($_COOKIE['userId'])) {
    header("Location: ../view/login.php?login_message=You need to login to view this page.");
}
include '../view/header.php'

?>

<main>
    <div class="container">
        <h2>Settings</h2><br>
        <h4>Personal Information</h3>

        <div class="form-row">
            <div class="form-group col">
                <label for="first_name">First Name &nbsp;<a href="index.php?action=change_firstname">Edit</a></label>
                <input class="form-control" type="text" placeholder="<?php echo $personal_info['FirstName']; ?>" readonly>
            </div>
            <div class="form-group col">
                <label for="last_name">Last Name &nbsp;<a href="index.php?action=change_lastname">Edit</a></label>
                <input class="form-control" type="text" id="last_name" placeholder="<?php echo $personal_info['LastName']; ?>" readonly>
            </div>
        </div>

        <h4>Login Information</h3>

        <div class="form-row">
            <div class="form-group col">
                <label for="email">Email &nbsp;<a href="index.php?action=change_email">Change</a></label>
                <input class="form-control" id="email" placeholder="<?php echo $personal_info['email']; ?>" readonly type="text">
            </div>
            <div class="form-group col">
                <label for="password">Password &nbsp;<a href="index.php?action=change_password">Change</a></label>
                <input type="text" class="form-control" id="password" placeholder="*************" readonly>
            </div>
        </div>
    </div>
</main>
<?php include '../view/footer.php'; ?>