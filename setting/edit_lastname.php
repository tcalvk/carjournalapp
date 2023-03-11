<?php 
if (!isset($_COOKIE['userId'])) {
    header("Location: ../view/login.php?login_message=You need to login to view this page.");
}
include '../view/header.php'

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
        <h2>Edit Last Name</h2>
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="submit_lastname">
            <label>New Last Name</label>
            <input type="text" name="last_name">
            <input type="submit" value="Save">
        </form>
    </section>
</main>
<?php include '../view/footer.php'; ?>