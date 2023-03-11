<?php 
if (!isset($_COOKIE['userId'])) {
    header("Location: ../view/login.php?login_message=You need to login to view this page.");
}
include '../view/header.php';
$error_msg = filter_input(INPUT_GET, 'error');

?>

<main>
    <h1>Settings</h1>
    <aside>
        <!--Display a nav menu-->
        <h2>Menu</h2>
        <nav>
            <ul>
                <a href="../">Home</a><br>
            </ul>
        </nav>
    </aside>

    <section>
        <!--Display a table of vehicles-->
        <h2>Change Password</h2>
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="submit_password">
            <label>Current Password</label>
            <input type="password" name="current_password"><br>
            <label>New Password</label>
            <input type="password" name="new_password"><br>
            <input type="submit" value="Save">
        </form>
        <br>
        <div>
            <p class="error"><?php echo $error_msg; ?></p>
        </div>
    </section>
</main>
<?php include '../view/footer.php'; ?>