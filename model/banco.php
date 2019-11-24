<?php

require_once("../init.php");
class Banco{

    protected $mysqli;

    public function __construct(){
        $this->conexao();
    }

    private function conexao(){
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO , BD_SENHA, BD_BANCO);
    }

    public function setUsuario($nome,$cpf,$endereco,$cnpj,$email,$telefone,$senha,$razao_social){
        try {
            $stmt = $this->mysqli->prepare("INSERT INTO usuarios (`nome`, `senha`,`cpf`, `endereco`, `cnpj`, `email`, `telefone`, `razao_social`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)") or exit( $this->mysqli->error );
            $stmt->bind_param("ssssssss",$nome,$senha,$cpf,$endereco,$cnpj,$email,$telefone,$razao_social);
            if( $stmt->execute() == TRUE){
                return true ;
            }else{
                echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
                return false;
            }
        }
        catch(PDOException $erro){
            echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</p>";
        }
    }

    public function getUsuarios(){
        $result = $this->mysqli->query("SELECT * FROM usuarios");
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $array[] = $row;
        }
        return $array;

    }

    public function deleteUsuario($id){
        if($this->mysqli->query("DELETE FROM `usuarios` WHERE `id` = '".$id."';")== TRUE){
            return true;
        }else{
            return false;
        }

    }
    public function pesquisaUsuario($id){
        $result = $this->mysqli->query("SELECT * FROM usuarios WHERE id='$id'");
        //$stmt->bindParam(1, $id, PDO::PARAM_INT);
        return $result->fetch_array(MYSQLI_ASSOC);

    }
    public function updateUsuario($nome,$cpf,$endereco,$cnpj,$email,$telefone,$senha,$razao_social,$id){
        try {
            $stmt = $this->mysqli->prepare("UPDATE usuarios SET `nome` = ?, `senha` = ?,`cpf`=?, `endereco`=?, `cnpj`=?, `email`=?,`telefone`=?, `razao_social`=?  WHERE `id` = ?");
            $stmt->bind_param("sssssssss",$nome,$senha,$cpf,$endereco,$cnpj,$email,$telefone,$razao_social,$id);
            if($stmt->execute()==TRUE){
                return true;
            }else{
                return false;
            }
        }
        catch(PDOException $erro){
            echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</p>";
        }
    }
}
?>