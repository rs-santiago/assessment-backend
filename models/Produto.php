<?php
require_once('DBConnection.php');

class Produto extends DBConnection{
    public $produto_id = '';
    public $produto_nome = '';
    public $produto_sku = '';
    public $produto_preco = '';
    public $produto_descricao = '';
    public $produto_qtd = '';
    public $produto_categorias = [];

    public function save()
    {
        // String para salvar dados da model de Produtos
        $sqlInsert = "INSERT INTO Produto (produto_nome, produto_sku, produto_preco, produto_descricao, produto_quantidade) VALUES ('$this->produto_nome', '$this->produto_sku', $this->produto_preco, '$this->produto_descricao', $this->produto_qtd)";
        $con = $this->connect();
        $con->query($sqlInsert);
        $this->produto_id = $con->insert_id;
        foreach ($this->produto_categorias as $key => $categoria_id) {
            $sqlInsertCategoria = "INSERT INTO produto_categoria (produto_id, categoria_id) VALUES ($this->produto_id, $categoria_id)";
            $con->query($sqlInsertCategoria);
        }
        $this->close($con);
    }

    function update($id){
        // String para atualizar dados da model de Produtos
        $sqlInsert = "UPDATE Produto SET produto_nome = '$this->produto_nome',
                                 produto_sku = '$this->produto_sku',
                                 produto_preco = $this->produto_preco ,
                                 produto_descricao = '$this->produto_descricao',
                                 produto_quantidade = $this->produto_qtd 
                      WHERE produto_id = $id";
        $con = $this->connect();
        $con->query($sqlInsert);
        
        $sqlDelete = "DELETE FROM produto_categoria WHERE produto_id = $id";
        $con->query($sqlDelete);

        foreach ($this->produto_categorias as $key => $categoria_id) {
            $sqlInsertCategoria = "INSERT INTO produto_categoria (produto_id, categoria_id) VALUES ($id, $categoria_id)";
            $con->query($sqlInsertCategoria);
        }

        $this->close($con);
    }

    function delete($id){
        $con = $this->connect();

        $sqlDelete = "DELETE FROM produto_categoria WHERE produto_id = $id";
        $con->query($sqlDelete);

        $sqlInsert = "DELETE FROM Produto WHERE produto_id = $id";
        $con->query($sqlInsert);

        $this->close($con);
    }

    function getAll(){
        $sqlSelect = "SELECT distinct * 
                        from produto";
        $con = $this->connect();
        $resultSelect = $con->query($sqlSelect);
        $arrayProdutos = $resultSelect->fetch_all(MYSQLI_ASSOC);

        $this->close($con);
        return $arrayProdutos;
    }

    function getById($id){
        $sqlSelect = "SELECT * FROM Produto where produto_id = $id";
        $con = $this->connect();
        $resultSelect = $con->query($sqlSelect);
        $arrayProdutos = $resultSelect->fetch_array();
        $this->close($con);
        return $arrayProdutos;
    }

    function categorias($id)
    {
        $sqlSelect = "SELECT distinct * 
                        from produto_categoria
                        natural join categoria
                        where produto_id = $id";
        $con = $this->connect();
        $resultSelect = $con->query($sqlSelect);
        $arrayProdutos = $resultSelect->fetch_all(MYSQLI_ASSOC);

        $this->close($con);
        return $arrayProdutos;
    }
}