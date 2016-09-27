<?php

    require_once './Database/Interfaces/DbInterfaces.php';

    require_once './Database/Models/DbModel.php';
    require_once './Database/Models/Databases/TableModels/UsersModel.php';

    require_once './Database/Models/DbField.php';

    require_once  './Database/Queries/SqlCommon.php';
    require_once './Database/Queries/DbInsert.php';

    require_once './Database/DbHandlers/DbHandle.php';
    require_once './Database/DbHandlers/PostgreSqlDbHandle.php';

    require_once './Database/Queries/PostgreSqlInsert.php';


//to kopiujemy do Crudgeneratora

//TODO: nie można powołac klasy
$insert = new PostgreSqlInsert();
$model = new UsersModel();

$handle = new PostgreSqlDbHandle();

$model->Set(UsersModel::LOGIN,'piotrek login');
$model->Set(UsersModel::PASSWORD,'piotrek 100 pass');
$model->Set(UsersModel::NAME,'piołtrek 1000 name');


$insertCommand = $insert->Insert($model);

//$insert->Insert($model);
$handle->Connect();
$handle->RunQuery($insertCommand);
//dotąd