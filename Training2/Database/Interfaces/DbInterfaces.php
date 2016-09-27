<?php
//1.
//połaczenie z db i uruchomienie zapytania /2/ 00:02:00
interface IDbHandle
{
    public function Connect();
    public function RunQuery($query);
}


//4. tworzymy klasy z których pól (atrybutów)
// bedziemy mogli wydedukowac zapytnia
//z DbInsert.php
// foreach ($fields as $fieldKey => $fieldValue)
interface IDbField
{
    public function GetType(); //string / text
    public function GetValue(); //beatka
    public function GetFieldName(); // name, login, password    - nazwa pola bazy danych...
    public function Set($fieldName, $fieldValue);
    public function HasValue(); //puste , nie puste
    public function IsAutomatic(); //


}

//zbiera z jsona listę tabel dla danej bazy
//config do tworzenia AutoModel.php
interface IDBlist
{
    public function GetDbList();


}

//4.a
interface IDbModel
{
    /**
     * @return array of IDbField
     */
    public function GetFields();
    public function GetTableName();
    public function Set($fieldName, $fieldValue);
    public function GetValues();
    public function HasField($fieldName);

}
// 4.b
interface ISqlInsert
{
    /**
     * @param IDbModel $model
     * @return mixed
     */
    public function Insert(IDbModel $model);
}

interface ISqlSelect
{
    public function Select(IDbModel $model);
}

interface ISqlWhere
{
    public function Where(IDbModel $model);
}

interface IDisplayData
{
    public function Display(IDbModel $model);
}

interface ISqlCommon
{
    public function SqlCommon(IDbModel $model);
}