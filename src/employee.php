<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    require('./library/employeeManager.php');

    $db = getEmployee($id);

    $name = $db['name'];
    $lastName = $db['lastName'];
    $email = $db['email'];
    $age = $db['age'];
    $gender = $db['gender'];
    $streetAddress = $db['streetAddress'];
    $city = $db['city'];
    $state = $db['state'];
    $postalCode = $db['postalCode'];
    $phoneNumber = $db['phoneNumber'];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/employee.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <main class="main__content">
        <form action="../src/library/employeeController.php" method="POST" enctype="multipart/form-data" class="formEl__edit">
            <!-- dynamic id here -->
            <input type="hidden" name="id" id="" value="<?= $id ?>" placeholder="">

            <div class="div__inputLabel">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="<?= $name ?>" placeholder="name">
            </div>

            <div class="div__inputLabel">
                <label for="lastName">Lastname</label>
                <input type="text" name="lastName" id="lastName" value="<?= $lastName ?>" placeholder="Last Name">
            </div>

            <div class="div__inputLabel">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?= $email ?>" placeholder="email">
            </div>

            <div class="div__inputLabel">
                <label for="gender">Gender</label>
                <input type="text" name="gender" id="gender" value="<?= $gender ?>" placeholder="gender">
            </div>

            <div class="div__inputLabel">
                <label for="city">City</label>
                <input type="text" name="city" id="city" value="<?= $city ?>" placeholder="city">
            </div>

            <div class="div__inputLabel">
                <label for="streetAddress">Street Address</label>
                <input type="text" name="streetAddress" id="streetAddress" value="<?= $streetAddress ?>" placeholder="Street Address">
            </div>

            <div class="div__inputLabel">
                <label for="state">State</label>
                <input type="text" name="state" id="state" value="<?= $state ?>" placeholder="State">
            </div>

            <div class="div__inputLabel">
                <label for="age">Age</label>
                <input type="text" name="age" id="age" value="<?= $age ?>" placeholder="Age">
            </div>

            <div class="div__inputLabel">
                <label for="postalCode">Postal Code</label>
                <input type="text" name="postalCode" id="postalCode" value="<?= $postalCode ?>" placeholder="Postal Code">
            </div>

            <div class="div__inputLabel">
                <label for="phoneNumber">Phone Number</label>
                <input type="text" name="phoneNumber" id="phoneNumber" value="<?= $phoneNumber ?>" placeholder="Phone Number">
            </div>


            <button type="submit" id="updateEmployeeButton" class="button__change">Change</button>
        </form>
    </main>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>