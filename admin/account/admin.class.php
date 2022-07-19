<?php
/**
* 
*/
class admin{

    //Declare Variable
    private $conn;
    private $table;
	
	function __construct()
	{

		$this->conn = mysqli_connect('localhost', 'egenujyx_jaspino206', 'Promsy_205$', 'egenujyx_egeniusquiz');
	}

    // returns the db connection instance
    function get_conn() {
        return $this->conn;
    }

    //Create function for checking username and Password
    Public function login($email, $password)
    {
        $query="SELECT * FROM admin WHERE username='".$email."' and
        password='".$password."'";
        $result=mysqli_query($this->conn, $query);
        $numrows=mysqli_num_rows($result);
        return !($numrows==0);
        
    }
    // Function for logging the user out
    Public function logout(){

        session_destroy();
        setcookie("email", "", time() - 3600, "/");
        echo "<script>window.open('index.php','_self')</script>";


    }

    // Function to view users
    public function select_users($table_name){

    	$array = array();
    	$query = "SELECT * FROM ".$table_name." LIMIT 20";
    	$result = mysqli_query($this->conn, $query);
    	$total = mysqli_num_rows($result);
    	while ($row = mysqli_fetch_assoc($result)) {
    		$array[] = $row;
    	}
    	return $array;
    }

    

    //function to log Admin out
    public function admin_logout(){

        session_start();
        unset($_SESSION['username']);

        header('location:login.php');
    }

        //Function to Register new Admin
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
    
        public function new_feedback(){
            $get_feedback = "SELECT * FROM `feedback` WHERE `open`=0;";
    $run_feedback = mysqli_query($this->conn, $get_feedback);
    $get_feedback = mysqli_num_rows($run_feedback);

    echo '<b> F&B('.$get_feedback.')</b>';
        }

        public function new_entSport(){
            $get_entSport = "SELECT * FROM `ent_sports` WHERE approved=0;";
    $run_entSport = mysqli_query($this->conn, $get_entSport);
    $get_entSport = mysqli_num_rows($run_entSport);

    echo '<b> E&S('.$get_entSport.')</b>';
        }
}


?>