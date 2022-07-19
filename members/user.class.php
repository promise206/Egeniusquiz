<?php
//Creating class for login form and to check user authentication
class user
{
    //Declare Variable
    private $conn;
    private $table;

    //Function to connect to database server
    function __construct() {
        
        $this->conn = mysqli_connect('localhost', 'egenujyx_jaspino206', 'Promsy_205$', 'egenujyx_egeniusquiz');
    }

    // returns the db connection instance
    function get_conn() {
        return $this->conn;
    }


    //Create function for checking username and Password
    Public function login($username, $password)
    {
        $query="SELECT * FROM user WHERE email='".$username."' and
        password='".$password."'";
        $result=mysqli_query($this->conn, $query);
        $numrows=mysqli_num_rows($result);
        return !($numrows==0);
        
    }
    // Function to log the user out
    Public function logout(){
        session_start();

        session_destroy();
        setcookie("email", "", time() - 3600, "/");
        echo "<script>window.open('index.php','_self')</script>";


    }

    //Function to insert new user
    Public function register($table_name,$data)
    {
        $string = "INSERT INTO ".$table_name." (";
        $string .= implode(",", array_keys($data)).') values (';
        $string .= "'". implode("','", array_values($data))."')";

        if (mysqli_query($this->conn, $string)) {
            return true;
        }
        else{
            echo mysqli_error($this->conn);
        }

    }

    Public function recover_password($email, $secrete_question, $table_name){
        $query = "SELECT * FROM `$table_name` WHERE `email` = '$email' and `secret_question` = '$secrete_question'";
        $run_query = mysqli_query($this->conn, $query);

        while ($row_query = mysqli_fetch_array($run_query)) {
            $password = $row_query['pass'];

            header('location: index.php?password='.$password);
        }
    }

    Public function loggled_user(){
        if(isset($_SESSION['email'])){
        echo "<li><a href='member_profile.php'><b>View Profile</b></li></a>
        <br><li><a href='#'><b> " . $_SESSION['email'] . "</b></a></li><br>";
        
        }
        else{
          }
        if(!isset($_SESSION['email'])){
        
            echo "<li><a href='register.php'><b>SignUp</b></a></li><br>";
          echo "<li><a href='login.php'><b> Login</b></a></li>";
         
        }
        else{
            echo "<li><a href='member_logout.php'><b>Logout</b></li></a>";
        }
        }

    public function user_logout(){

        session_start();
        unset($_SESSION['email']);

        header('location:../index.php');
    }
}

?>