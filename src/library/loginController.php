<?php

require('./loginManager.php');

$req = $_SERVER['REQUEST_METHOD'];

if($req == 'POST'){
    login();
}