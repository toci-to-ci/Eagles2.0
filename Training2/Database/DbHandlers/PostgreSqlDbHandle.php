<?php
//3.
class PostgreSqlDbHandle extends DbHadle
{

    protected $connectionHandle;

    public function __construct()
    {
        parent::__construct('postgres', 'db_toci', 'Zzaq1234' , 'localhost');
        $this->connectionString =
            'host='.$this->host.
            ' port=5432 dbname='.$this->db.
            ' user='.$this->user.
            ' password='.$this->password
        ;
    }

    public function Connect()
    {
        $this->connectionHandle = pg_connect($this->connectionString);
        var_dump($this->connectionString);
    }

    public function RunQuery($query)
    {
        $resource = pg_query($this->connectionHandle, $query);
        $result = pg_fetch_array($resource);

        return $result;
    }
}