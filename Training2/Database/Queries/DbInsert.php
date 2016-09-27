<?php
abstract class DbInsert extends SqlCommon
    {
        protected  $insertCommand = 'INSERT INTO ';


     public abstract function Insert (IDbModel $model);


        public function __construct()
        {
            echo 'clasa: '.__CLASS__; echo ' working dir: '.getcwd() . "\n";
        }



    }