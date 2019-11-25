<?php
require_once("../model/banco.php");
class editarController {
    private $editar;
    private $nome;
    private $tipo;
    private $prioridade;
    public function __construct($id){
        $this->editar = new Banco();
        $this->criarFormulario($id);
    }
    private function criarFormulario($id){
        $row = $this->editar->pesquisaNecessidades($id);
        $this->nome         =$row['nome'];
        $this->tipo         =$row['tipo'];
        $this->prioridade   =$row['prioridade'];
    }
    public function editarFormulario($nome,$tipo,$prioridade,$id){
        if($this->editar->updateNecessidades($nome,$tipo,$prioridade,$id) == TRUE){
            echo "<script>alert('Registro incluído com sucesso!');document.location='../view/necessidades.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }
    public function getNome(){
        return $this->nome;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function getPrioridade(){
        return $this->prioridade;
    }
}
$id = $_REQUEST['id'];
$editar = new editarController($id);
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $editar->editarFormulario($_POST['nome'],$_POST['tipo'],$_POST['prioridade'],$_POST['id']);
}
?>