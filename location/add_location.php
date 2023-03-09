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
    <h1>Add a Service Location</h1>
    <form action="." method="post">
        <input type="hidden" name="action" value="submit_location">

        <label>Location Name:</label>
        <input type="text" name="name">
        <br>

        <label>Address 1:</label>
        <input type="text" name="address1" placeholder="Optional">
        <br>

        <label>Address 2:</label>
        <input type="text" name="address2" placeholder="Optional">
        <br>

        <label>City:</label>
        <input type="text" name="city" placeholder="Optional">
        <br>

        <label>State:</label>
        <select name="state">
            <?php foreach ($states as $state) : ?>
            <option value="<?php echo $state ?>">
                <?php echo $state ?>
            </option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Zip Code:</label>
        <input type="text" name="zip" placeholder="Optional">
        <br>

        <label>Phone:</label>
        <input type="tel" name="phone" placeholder="Optional">
        <br>

        <label>Email:</label>
        <input type="email" name="email" placeholder="Optional">
        <br>

        <label>Website:</label>
        <input type="text" name="website" placeholder="Optional">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Save">
        <br>
    </form>
    <p class="last_paragraph">
        <a href="../service/index.php?action=select_vehicle_from_list">Back</a>
    </p>
    <div class="error">
        <p><?php echo $save_message; ?></p>
    </div>
</main>

<?php include '../view/footer.php'; ?>