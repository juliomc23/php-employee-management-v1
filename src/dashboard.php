<?php
session_start();


require '../src/library/sessionHelper.php';

if (!isset($_SESSION['name'])) {
  header('location: .././index.php');
}

if(isset($_SESSION['name'])) {
  $timeOut = 600;
  ini_set('session.gc_maxlifetime', $timeOut);
  if (isset($_SESSION['start']) && (time() - $_SESSION['start'] > $timeOut)) {
   closeSession();
   
}

}

    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="../assets/js/index.js" type="module" defer></script>
  <link href="../assets/css/main.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/ae63adffc0.js" crossorigin="anonymous" defer></script>
  <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11" type="module"></script> -->
  <title>Document</title>
</head>

<body>
  <?php
  //   if (isset($_GET['updated'])) {
  //     echo "<div class='alert alert-success fade-out' role='alert'>
  //   The employee has been update
  // </div>";
  //   }

  ?>
  <div class="main__container">
    <table class="employee_table" id="table">
      <thead class="thead__table">
        <tr class="trow__tableHead">
          <th class="thead__col">Name</th>
          <th class="thead__col">Email</th>
          <th class="thead__col">Age</th>
          <th class="thead__col">Street No</th>
          <th class="thead__col">City</th>
          <th class="thead__col">State</th>
          <th class="thead__col">Postal Code</th>
          <th class="thead__col">Phone Number</th>
          <th class="thead__col">
            <button id='addNewEmp' class="addEmp__button">+</button>
          </th>
        </tr>
      </thead>
      <tbody id='table-body' class="tbody__table">
        <tr id="addEmployeeForm" class="toggle">
          <!-- <form action="./library/employeeController.php" method="POST" enctype="multipart/form-data"> -->
          <form id="addEmpForm" method="POST" enctype="multipart/form-data" class="newEmpForm__table">
            <input type="hidden" name="id" id="id" value="" placeholder="">
            <td><input type="text" name="name" id="name" class="name__input" value="" placeholder="name" form-emp require></td>
            <input type="hidden" name="lastName" id="lastName" value="" placeholder="lastname">
            <input type="hidden" name="gender" id="gender" value="" placeholder="gender">
            <td><input type="email" name="email" id="email" class="email__input" value="" placeholder="email" form-emp require></td>
            <td><input type="text" name="age" id="age" value="" class="age__input" placeholder="Age" form-emp require></td>
            <td><input type="text" name="streetAddress" id="streetAddress" class="address__input" value="" form-emp placeholder="Street Address" require></td>
            <td><input type="text" name="city" id="city" value="" class="city__input" placeholder="city" form-emp require></td>
            <td><input type="text" name="state" id="state" value="" class="state__input" placeholder="State" form-emp require></td>
            <td><input type="text" name="postalCode" id="postalCode" value="" class="postalCode__input" form-emp placeholder="Postal Code" require></td>
            <td><input type="text" name="phoneNumber" id="phoneNumber" value="" class="nphone__input" form-emp placeholder="Phone Number" require></td>
            <td><button type="submit" id="createEmpButton" class="createEmp__button"><i class="fa-solid fa-check"></i></button></td>
          </form>
        </tr>
      </tbody>
    </table>
  </div>
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>