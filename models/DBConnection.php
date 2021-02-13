<?php 
class DBConnection {


    private $DB_HOST = "localhost";
    private $DB_USER = "root";
    private $DB_PASSWORD = "";
    private $DB_DATABASE = "loja";
    
     
    protected function connect() {
        $con = mysqli_connect($this->DB_HOST, $this->DB_USER, $this->DB_PASSWORD) or die("Conexão não realizada" . mysqli_error($con));
        mysqli_select_db($con, $this->DB_DATABASE) or die("Erro ao escolher banco " . mysqli_error($con));
        return $con;
    }
    protected function close($con) {
        mysqli_close($con);
    }

    
    function save(){

    }

    function update($id){

    }

    function delete($id){

    }

    function getAll(){

    }

    function getById($id){

    }
    
}
?>