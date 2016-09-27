<?php
require_once 'Interfaces.php';
require_once './Chor.php';
require_once './Entities.php';

$chorHandler = new UserChorHandler();

$user = $chorHandler->Run();

var_dump($user);
