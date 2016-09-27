<?php

    require_once  './functions.php';
    require_once './Database/Interfaces/DbInterfaces.php';

    require_once './Database/Models/DbModel.php';
    require_once './Database/Models/Databases/TableModels/UsersModel.php';

    require_once './Database/Models/DbField.php';

    require_once './Database/Queries/SqlCommon.php';
    require_once './Database/Queries/DbInsert.php';

    require_once './Database/DbHandlers/DbHandle.php';
    require_once './Database/DbHandlers/PostgreSqlDbHandle.php';


  require_once './Database/Queries/DbInsert.php';
  require_once './Database/Queries/PostgreSqlInsert.php';


    require_once './Front/Controls.php';
    require_once './Front/CrudGenerator.php';

//echo 'dziala';


$crudGenerator = new CrudGenerator();

drk($crudGenerator);


//$model = new UsersModel();
//$model->Set(UsersModel::LOGIN,'piotrek login');
//$model->Set(UsersModel::PASSWORD,'piotrek 100 pass');
//$model->Set(UsersModel::NAME,'piołtrek 1000 name');


echo $crudGenerator->GenerateForm(new UsersModel());

drk($crudGenerator);
//echo $crudGenerator->SaveData();

//$ob = new UsersModel();
//drk ($ob);