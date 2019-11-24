<?php
require_once("../model/banco.php");
class listarController{
    private $lista;
    public function __construct(){
        $this->lista = new Banco();
        $this->criarTabela();
    }
    private function criarTabela(){
        $row = $this->lista->getUsuarios();
        foreach ($row as $value){
            echo "<tr>";
            echo "<th>".$value['nome'] ."</th>";
            echo "<td>".$value['cpf'] ."</td>";
            echo "<td>".$value['endereco'] ."</td>";
            echo "<td>".$value['telefone'] ."</td>";
            echo "<td>".$value['email'] ."</td>";
            echo "<td>".$value['razao_social'] ."</td>";
            echo "<td>".$value['cnpj'] ."</td>";
            echo "<td><center><a class='btn btn-light btn-sm mr-1' href='editar.php?id=".$value['id']."'><i class='fas fa-pencil-alt mr-1'></i>Editar</a><a class='btn btn-danger btn-sm' href='../controller/ControllerDeletar.php?id=".$value['id']."'><i class='fas fa-times mr-1'></i>Excluir</a></center></td>";
            echo "</tr>";
        }
    }
}
