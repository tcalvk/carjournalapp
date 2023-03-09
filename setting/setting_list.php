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
        <h2>Personal Information</h2>
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
            </tr>
            <tr>
                <td><?php echo $personal_info['FirstName']; ?></td>
                <td><?php echo $personal_info['LastName']; ?></td>
            </tr>
            <tr>
                <td>Edit</td>
                <td>Edit</td>
            </tr>
        </table>
    </section>
</main>
<?php include '../view/footer.php'; ?>