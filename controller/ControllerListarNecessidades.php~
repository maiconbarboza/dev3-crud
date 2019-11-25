<?php
require_once("../model/banco.php");
class listarController{
    private $lista;
    public function __construct(){
        $this->lista = new Banco();
        $this->criarTabela();
    }
    private function criarTabela(){
        $row = $this->lista->getNecessidades();
        foreach ($row as $value){
            echo "<tr>";
            echo "<th>".$value['nome'] ."</th>";
            echo "<td>".$value['tipo'] ."</td>";
            echo "<td>".$value['prioridade'] ."</td>";
            echo "<td><center><a class='btn btn-light btn-sm mr-1' href='editarNecessidades.php?id=".$value['id']."'><i class='fas fa-pencil-alt mr-1'></i>Editar</a><a class='btn btn-danger btn-sm' href='../controller/ControllerDeletarNecessidades.php?id=".$value['id']."'><i class='fas fa-times mr-1'></i>Excluir</a></center></td>";
            echo "</tr>";
        }
    }
}
