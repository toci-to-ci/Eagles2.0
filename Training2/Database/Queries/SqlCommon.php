<?php
abstract class SqlCommon implements ISqlCommon
{

    protected  $surroundings = array(
        'string' => "'",
        'int' => "",   );
    //TODO: PYTANIE: do operacji sql potrzeba 'surroundings'
    //TODO: jak się ich pozbbyć przy tworzeniu list [view] z selecta?

    //TODO: insert, select, update i delete zawsze
    //TODO: będą miały wspólne elementy, jak nazwy tabel i pól,
    //TODO: to powinno zostac gdzieś wyżej zaimplementowane
    //TODO: przed klasą specjalizowaną (np: DbInsert/PostgreSqlInsert
    //TODO: jako np SqlCommon.php


    /**
     * @param IDbModel $model
     * @return mixed
     */
    public abstract function SqlCommon (IDbModel $model);

    protected function GetNames(IDbModel $model)
    {
        $fields = $model->GetFields();
        $names = array ();

        //$fieldValue to nasz IDbField
        foreach ($fields as $fieldKey => $fieldValue)
        {
//            if ($fieldValue->HasValue() ) {
//                $names[] =  $fieldValue->GetFieldName();
//            }

                        if ($fieldValue->HasValue() && strlen($fieldValue->GetValue()) > 0) {
                $names[] =  $fieldValue->GetFieldName();
            }

        }
        return $names;

    }

    //TODO: GetValues dla selecta nie potrzebuje surroundings
    protected function GetValues(IDbModel $model)
    {
        $fields = $model->GetFields();
        $values = array ();

        //$fieldValue to nasz IDbField
        foreach ($fields as $fieldKey => $fieldValue)
        {
//            if ($fieldValue->HasValue()) {
//
//            //  var_dump($fieldValue->GetType());
//            $values[] = $this->surroundings[$fieldValue->GetType()] .
//                $fieldValue->GetValue() .
//                $this->surroundings[$fieldValue->GetType()];
//        }


            if ($fieldValue->HasValue() && strlen($fieldValue->GetValue()) > 0 ) {

                //  var_dump($fieldValue->GetType());
                $values[] = $this->surroundings[$fieldValue->GetType()] .
                    $fieldValue->GetValue() .
                    $this->surroundings[$fieldValue->GetType()];
            }



        }

        var_dump($values);
        return $values;

    }



}