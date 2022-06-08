<?php

/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

function addEmployee(array $newEmployee)
{
    $newEmployee['id'] = hexdec(uniqid());


    $db = getQueryStringParameters();
    array_push($db, $newEmployee);
    $db = json_encode($db);
    file_put_contents('../.././resources/employees.json', $db);
}



function deleteEmployee($id)
{
    $db = getQueryStringParameters();
    $modifiedDb = array();
    foreach ($db as $key => $value) {
        if ($value['id'] === $id) {
            unset($db[$key]);
        }
    }
    $modifiedDb = array_values($db);
    $modifiedDb = json_encode($modifiedDb, JSON_PRETTY_PRINT);
    file_put_contents('../.././resources/employees.json', $modifiedDb);
    return $modifiedDb;
}



function updateEmployee(array $updateEmployeeId)
{
    // TODO implement it
    $db = getQueryStringParameters();

    foreach ($db as $key => $value) {

        if ($value['id'] === intval($updateEmployeeId['id'])) {
            
            $db[$key]['name'] = $updateEmployeeId['name'];
            $db[$key]['lastName'] = $updateEmployeeId['lastName'];
            $db[$key]['email'] = $updateEmployeeId['email'];
            $db[$key]['gender'] = $updateEmployeeId['gender'];
            $db[$key]['city'] = $updateEmployeeId['city'];
            $db[$key]['streetAddress'] = $updateEmployeeId['streetAddress'];

            $db[$key]['state'] = $updateEmployeeId['state'];
            $db[$key]['age'] = intval($updateEmployeeId['age']);
            $db[$key]['postalCode'] = $updateEmployeeId['postalCode'];
            $db[$key]['phoneNumber'] = $updateEmployeeId['phoneNumber'];
        }
    }

    file_put_contents('../.././resources/employees.json', json_encode($db, JSON_PRETTY_PRINT));
    return $db;
}


function getEmployee(string $id)
{
    // TODO implement it
    $json = file_get_contents('.././resources/employees.json');
    $data = json_decode($json, true);
    
    foreach($data as $key => $value){
        
        if(intval($id) === $value['id']){
            return $value;
        }
    }
}


// function removeAvatar($id)
// {
// // TODO implement it
// }


function getQueryStringParameters(): array
{
    $json = file_get_contents('../.././resources/employees.json');
    $data = json_decode($json, true);
    return $data;
}

// function getNextIdentifier(array $employeesCollection): int
// {
// // TODO implement it
// }
