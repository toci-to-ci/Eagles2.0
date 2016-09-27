<?php

    require_once './functions.php';
    require_once './Database/Interfaces/DbInterfaces.php';
    require_once './Database/DbHandlers/DbHandle.php';
    require_once './Database/DbHandlers/PostgreSqlDbHandle.php';

    require_once './Database/Models/DbModel.php';


require_once './Database/Models/DbField.php';
require_once './Database/Models/Databases/TableModels/UsersModel.php';


$ob = new PostgreSqlDbHandle(); var_dump($ob);

//$RDbModel = new DbModel(); var_dump($RDbModel);

$RUsersModel = new  UsersModel(); var_dump($RUsersModel);


drk (get_class_methods ($RUsersModel));

$class_methods = get_class_methods($RUsersModel);
echo 'class name: '. get_class($RUsersModel)."<br>\n";
foreach ($class_methods as $method_name) {
    echo "$method_name<br>\n";
}


echo 'test<br>';
get_this_class_methods(new DbModel());
echo 'test<br>';


