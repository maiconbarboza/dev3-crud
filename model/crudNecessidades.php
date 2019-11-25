<?php
require_once("banco.php");
class Cadastro extends Banco {
    private $nome;
    private $tipo;
    private $prioridade;
    //Metodos Set
    public function setNome($string){
        $this->nome = $string;
    }
    public function settipo($string){
        $this->tipo = $string;
    }
    public function setPrioridade($string){
        $this->prioridade = $string;
    }
    //Metodos Get
    public function getNome(){
        return $this->nome;
    }
    public function gettipo(){
        return $this->tipo;
    }
    public function getPrioridade(){
        return $this->prioridade;
    }
    public function incluir(){
        return $this->setNecessidades($this->getNome(),$this->getTipo(),$this->getPrioridade());
    }
}
?>