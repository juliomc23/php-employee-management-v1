<?php 
require('./employeeManager.php');

$req = $_SERVER['REQUEST_METHOD'];

    $db = getQueryStringParameters(); 
    echo json_encode($db);

switch ($req) {
    case $req == 'DELETE': 
        $inputdata = file_get_contents("php://input");
        $data = json_decode($inputdata);
    
        deleteEmployee($data);
        break;
    case $req == 'POST': 

        $inputdata = file_get_contents("php://input");
        $data = json_decode($inputdata, true);

        var_dump($data);

        if(isset($data['id'])){
            addEmployee($data);
            break;
        }

        if($_POST['id'] != ''){
            updateEmployee($_POST);
            header('location: .././dashboard.php');
        }

    case $req == 'GET':
        if(isset($_GET['id'])){
            header('Location: .././employee.php?id='.$_GET['id'].'');
        }
}
