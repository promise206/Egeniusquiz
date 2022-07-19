<?php

//Creating class for login form and to check user authentication
class database
{
    //Declare Variable
    private $connection;
    private $table;

    //Below is the function to connect to database server
    function connect($host,$username,$password,$database)
    {
        $this->connection=mysqli_connect($host,$username,$password,$database);
    
    }

     // returns the db connection instance
     function get_conn() {
        return $this->connection;
    }

    //Create function for checking username and Password
    Public function login($username, $password)
    {
        $query="SELECT * FROM users WHERE email='".$username."' and
        pass='".$password."'";
        $result=mysqli_query($this->connection, $query);
        $numrows=mysqli_num_rows($result);
        return !($numrows==0);
        
    }
}

?>