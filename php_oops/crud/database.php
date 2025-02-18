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
            die("Database connection error!"); 
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

    public function updateDb($table,$columns=array(),$where = null){
        if (!$this->mysqli) {
            die("Database connection error!"); 
        }
        $argu = array();
        foreach ($columns as $key => $value) {
            $argu[] = "$key='$value'";
        }
        $argu = implode(",", $argu);

        $sql = "UPDATE $table SET $argu";
        if($where){
            $sql.=" WHERE $where";
        }
        // echo $sql;
        $query = $this->mysqli->query($sql);
        if($query){
            echo "Upadte Successfully";
        }else{
            $this->mysqli->die($query);
        }
    }

    public function deleteDb($table,$where = null){
        if (!$this->mysqli) {
            die("Database connection error!"); 
        }
        
        $sql = "DELETE FROM $table";
        if($where){
            $sql.=" WHERE $where";
        }
        // echo $sql;
        $query = $this->mysqli->query($sql);
        if($query){
            echo "Delete Successfully";
        }else{
            $this->mysqli->die($query);
        }
    }

    public function selectDb(){

    }

    public function __destruct(){
        
    }

    private function tableExist(){
        
    }

}

$conn = new Database();

?>