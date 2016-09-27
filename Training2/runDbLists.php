<?php

require_once './functions.php';

require_once './Database/Interfaces/DbInterfaces.php';
require_once './Database/Models/DbList.php';
require_once './Database/Models/GenerateModel.php';


$ob = new DbList();


$ob ->SetActiveDb_DbTab('db_toci', 'actions');
//$ob ->SetActiveDb_DbTab('db_toci', 'actions')->getModel();


$ob->SetTableFieldsList();



echo '<br>'.$ob ->GetActiveSet();

 $test = new GenerateModel($ob);

//    echo $test->test();

// drk($test);

//var_dump(ACT_ID);
//
//$.costanazwa . '= ' . parametr


//$test = new GenerateModel();

//$modelUsers = $test->DbList("db_toci", "users")->getModel(); // == new UsersModel();

for($i = 0; $i <= 7; $i++) {
    ${"variable$i"} = "srubumpsss";
}


echo 'tttt: '.$variable6.'<br>' ;

echo '<br>'.ACT_ID;