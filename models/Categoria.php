<?php
require_once('DBConnection.php');

class Categoria extends DBConnection{
    public $categoria_id = '';
    public $categoria_nome = '';

    public function save()
    {
        // String para salvar dados da model de Categoria
        $sqlInsert = "INSERT INTO Categoria (categoria_id, categoria_nome) VALUES ($this->categoria_id, '$this->categoria_nome') ON DUPLICATE KEY UPDATE categoria_nome='$this->categoria_nome'";
        // $sqlInsert = "INSERT INTO Categoria (categoria_id, categoria_nome) VALUES ($this->categoria_id, '$this->categoria_nome')";
        $con = $this->connect();
        $con->query($sqlInsert);
        
        $this->close($con);
    }

    function update($id){
        // String para atualizar dados da model de Categoria
        $sqlUpdate = "UPDATE Categoria SET categoria_nome = '$this->categoria_nome'
                        WHERE categoria_id = $id";
        $con = $this->connect();
        $con->query($sqlUpdate);
        $this->close($con);
    }

    function delete($id){
        // String para salvar dados da model de Categoria
        $sqlDelete = "DELETE FROM Categoria WHERE categoria_id=$id";
        $con = $this->connect();
        $con->query($sqlDelete);
        
        $this->close($con);
    }

    function getAll(){
        $sqlSelect = "SELECT * FROM Categoria";
        $con = $this->connect();
        $resultSelect = $con->query($sqlSelect);
        $arrayCategorias = $resultSelect->fetch_all(MYSQLI_ASSOC);
        $this->close($con);
        return $arrayCategorias;
    }

    function getById($id){
        $sqlSelect = "SELECT * FROM Categoria where categoria_id = $id";
        $con = $this->connect();
        $resultSelect = $con->query($sqlSelect);
        $arrayCategorias = $resultSelect->fetch_array();
        $this->close($con);
        return $arrayCategorias;
    }
}