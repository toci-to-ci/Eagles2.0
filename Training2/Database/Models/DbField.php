<?php
//kolumna tabelki w db
class DbField implements IDbField
{
    protected $fieldName; //przechowuje nazwę pola
    protected $fieldValue; //przechowuje wartość pola
    protected $isAutomatic;

    public function __construct($fieldName, $isAutomatic = false)
    {
        $this->fieldName = $fieldName;
        $this->isAutomatic = $isAutomatic;
    }


    public function Set($fieldName, $fieldValue)
    {
        $this->fieldName = $fieldName;
        $this->fieldValue = $fieldValue;
    }
    //string / text / int //przechowuje typ pola
    public function GetType()
    {
        return gettype($this->fieldValue);
    }

    public function GetValue() //beatka
    {
        return $this->fieldValue;
    }
    // name    - nazwa pola bazy danych
    public function GetFieldName()
    {
        return $this->fieldName;
    }

    public function HasValue()
    {
        return !is_null($this->fieldValue);
    }

    public function IsAutomatic()
    {
        return $this->isAutomatic;
    }

}
