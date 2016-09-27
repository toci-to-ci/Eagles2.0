<?php
//header('Content-Type: text/html; charset=utf-8');
//
require_once 'DbModel.php';
require_once 'GenerateModel.php';




    class DbList extends DbModel
    {
        protected $dblist = array(); //ogólna tab baz, tabel i pól z jsona
        protected $activeDb = '';
        protected $activeTable = ''; //working tab
        protected $activeFields = array(); //working tab fields

        public function __construct($activeDb, $activeTable)
        {
            $this->activeDb = $activeDb;
            $this->activeTable = $activeTable;
        }

        protected function SetTableFieldsList()
        {
            $this->GetDbList();

                if (isset($this->dblist['dbName'][$this->activeDb][$this->activeTable])) {
                    $this->activeFields = $this->dblist['dbName'][$this->activeDb][$this->activeTable];
                } else {
                    echo "dupa";
            }
        }



        public function GetDbList()
        {
            //$string = file_get_contents(__DIR__ . "/DbLists.json");
            $string = file_get_contents(__DIR__ .'./Databases/DbLists.json');
            $this->dblist = json_decode($string, true);
        }

        public function GetModel()
        {

            $this->SetTableFieldsList();
            //var_dump($this->activeFields);

            $gnerateModel = new GenerateModel($this->activeFields);

            //var_dump($gnerateModel->GetFilds());

            $this->fields = $gnerateModel->GetFilds(); //    pole protected $fields = array (); z DbModel.php
            $this->tableName = $this->activeTable;

            return $this;
        }
    }



/*
    class DbList implements IDBlist
    {

        protected $dblist = array(); //ogólna tab baz, tabel i pól z jsona

        protected $activeDb = '';
        protected $activeTable = ''; //working tab
        protected $activeFields = array (); //working tab fields



        public function __construct()
        {
            $this->dblist = $this->GetDbList();
            //$this->SetTableFieldsList();
        }

        public function GetDbList()
        {
            $string = file_get_contents(__DIR__."/Databases/DbLists.json");
            $this->dblist = json_decode($string, true);

            return $this->dblist;
        }


        public function SetActiveDb_DbTab($activeDbName, $activeTable)
        {
            $this->activeDb = $activeDbName;
            $this->activeTable = $activeTable;
        }

        public function SetTableFieldsList()
        {
            //if(isset($this->dblist['dbName']['db_toci']['users']))
            if(isset($this->dblist['dbName'][$this->activeDb][$this->activeTable]))
            {
                return $this->activeFields = $this->dblist['dbName'][$this->activeDb][$this->activeTable];
            }
            else
            {
                echo "brak definicji poprawnej definicji w DbList";
            }
        }

        public function GetTableFieldsList()
        {
            return $this->activeFields;
        }

        public function GetActiveSet()
        {
            echo '$activeDb: '.$this->activeDb.'<br>';
            echo '$activeTable: '.$this->activeTable.'<br>';
            echo '$activeFields: '.'<pre>';
            echo print_r($this->GetTableFieldsList());
            echo '<pre>';
        }

    }*/