<?php
    abstract class DbWhere extends DbSelect
    {
        protected $whereCommand = 'WHERE ';

        public abstract function Where(IDbModel $model);

    }