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
                <td><a href="index.php?action=change_firstname">Edit</a></td>
                <td><a href="index.php?action=change_lastname">Edit</a></td>
            </tr>
        </table>
        <h2>Login Information</h2>
        <table>
            <tr>
                <th>Email</th>
                <th>Password</th>
            </tr>
            <tr>
                <td><?php echo $personal_info['email']; ?></td>
                <td>***********</td>
            </tr>
            <tr>
                <td><a href="index.php?action=change_email">Change</a></td>
                <td><a href="index.php?action=change_password">Change</a></td>
            </tr>
        </table>
    </section>
</main>
<?php include '../view/footer.php'; ?>