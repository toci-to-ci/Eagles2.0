<?php

require_once './functions.php';

require_once './Database/Interfaces/DbInterfaces.php';
require_once './Database/DbHandlers/DbHandle.php';

require_once  './Database/Queries/SqlCommon.php';
require_once './Database/Queries/DbInsert.php';

require_once './Database/DbHandlers/PostgreSqlDbHandle.php';



require_once './Database/Queries/PostgreSqlInsert.php';


//require_once './Database/Models/DbField.php';

require_once './Database/Models/DbList.php';

require_once './Database/Models/DbModel.php';


require_once './Front/Controls.php';

require_once './Front/CrudGenerator.php';

//require_once './Database/Models/Databases/TableModels/UsersModel.php';




//require_once 'vendor/autoload.php';
//use Front\CrudGenerator;
//use ORM\DbModel\DbList;

$dbList = new DbList("my_views", "ActiveUsers");

$crudGnerator = new CrudGenerator();

echo $crudGnerator->GenerateForm($dbList->GetModel());








$crudGnerator->SaveData();