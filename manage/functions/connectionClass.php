<?php
class connectionClass extends mysqli{
    
    private $host="localhost",$password="Promsy_205$",$username="egenujyx_jaspino206",$dbName='egenujyx_egeniusquiz';
    public $con;
    function __construct() {
        $this->con=  $this->connect($this->host, $this->username, $this->password, $this->dbName);
    }
}
