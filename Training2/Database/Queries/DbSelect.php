<?php
    abstract class DbSelect extends SqlCommon//implements ISqlSelect
    {
        protected $selectCommand = 'SELECT ';
        protected $fromCommand = 'FROM ';

        public abstract function Select(IDbModel $model);



    }