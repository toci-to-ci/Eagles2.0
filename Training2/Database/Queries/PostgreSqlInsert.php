<?php
      class PostgreSqlInsert extends DbInsert
      {


     public function SqlCommon (IDbModel $model)
     {

     }



    public function Insert(IDbModel $model)
        {
            $fields = $model->GetFields();



            //insert into users (name, login, password)
            // Values ('myname', 'mylogin' , 'mypassword');
            $names = $this -> GetNames($model);
            $valuesInSurroundings = $this->GetValues($model);

            $insert = $this->insertCommand . $model->GetTableName() .
                ' (' . implode(', ', $names) .
                ') values(' .
                implode(', ',$valuesInSurroundings).
                ');'
            ;

            var_dump($insert);
            return $insert;

        }

    }