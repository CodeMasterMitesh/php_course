<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);

class Database{
    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    private $db_name = "studentdb";

    private $mysqli;
    public $error = array();
    public function __construct(){
        $this->mysqli = new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
        
        if($this->mysqli->connect_error){
            echo "Failed to connect: " . $this->mysqli->connect_error;
            exit;
        }
    }

    public function insertDb($table,$columns=array()){
        if (!$this->mysqli) {
            die("Database connection error!"); // Extra safety check
        }
        
        $columnsName = implode(',',array_keys($columns));
        $values = implode("','",$columns);

        $sql = "INSERT INTO $table($columnsName) VALUES('$values')";
        $query = $this->mysqli->query($sql);
        if($query){
            echo "Insert Successfully";
        }else{
            $this->mysqli->die($query);
        }
    }

    public function updateDb(){

    }

    public function deleteDb(){

    }

    public function selectDb(){

    }

    public function __destruct(){
        
    }


}

$conn = new Database();

?>