<?php

//    require_once 'Controls.php';
    class CrudGenerator // extends DbModel
    {

        const MODEL_TYPE='ModelType';

        public function GenerateForm(IDbModel $model)
        {
            $fields = $model -> GetFields();

//            echo '<pre>';
//            print_r($fields);
//            echo '</pre>';

            $result = ''; //tu pchamy HTMLa, kt uzupełniamy w foreach-u
            //samo rozstrzyga czy to textbox, checkbox itp..

            //$result = '<form method="POST" action="'.$_SERVER['PHP_SELF'].'"> <div>';

            $result = '<form method="POST" action="'.$_SERVER['PHP_SELF'].'"> <div>';
           // $result .= Controls::AddHidden(self::MODEL_TYPE, get_class($model) );
            $result .= Controls::AddHidden(self::MODEL_TYPE, $model->GetTableName() );


            foreach ($fields as $fieldkey => $field)
            {
                //Controls::AddTextBox($label, $name, $value); => DbField.php
                echo '<pre>';
                print_r($field);
                echo '</pre>';

//                echo 'dupa<br>';
//                var_dump($field->IsAutomatic());
//
                if (!$field->IsAutomatic()) {
                    $result .= '<div>' . Controls::AddTextBox($field->GetFieldName(),
                            $field->GetFieldName(), $field->GetValue()) . '</div>'; //get field name, getfieldlabel, getfieldvalue
                    }
            }

            $result .= '</div>';
            $result .= Controls::AddSubmitButton('Zatwierdź' ,'confirm');

            $result .= '</form>';
            return $result;

        }

        public function SaveData()
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            { //tutaj problemem bedzie jaki to będzie $model - żeby to rozpoznać.
                // Trzeba to zmieścic w jakimś 'hiddenie' kt trzeba dodac w Controls.php

                //$model = new $_POST[self::MODEL_TYPE]; //w tym momencie utwożyliśmy users model
               // echo $_POST[self::MODEL_TYPE];
                //var_dump($model); //i wywołac save data w index.php
                $dbList = new DbList("db_toci", $_POST[self::MODEL_TYPE] );

                $model = $dbList->GetModel();
                //utwożony w ten sposób obiekt należy uzupełnic SETem (DbModel.php ma Set ($fieldName, %fieldValue)

                foreach ($_POST as $key => $value)

                {

                    if ($model->HasField($key))
                    {
                        echo "dupa ". $key . '<br>';
                        //$model->Set($fieldName, $fieldValue); //z Set() DbModel.php
                        $model->Set($key, $value);
                        //model w tym momencie jest uzupełniony, i trzeba go potraktować jak insert i handle z runDbOperations.php
                        //czyli zeby wykonał insert do bazy po klepnięciu w zatwierdź
                    }
                }



                $insert = new PostgreSqlInsert();
                $handle = new PostgreSqlDbHandle();
                $insertCommand = $insert->Insert($model);

                //var_dump($insertCommand);

                $handle->Connect();
                $handle->RunQuery($insertCommand);


            }
        }
    }