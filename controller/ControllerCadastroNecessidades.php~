<?php
require_once("../model/crudNecessidades.php");
class cadastroController{
    private $cadastro;
    public function __construct(){
        $this->cadastro = new Cadastro();
        $this->incluir();
    }
    private function incluir(){
        $this->cadastro->setNome($_POST['nome']);
        $this->cadastro->setPrioridade($_POST['prioridade']);
        $this->cadastro->setTipo($_POST['tipo']);

        $result = $this->cadastro->incluir();
        if($result >= 1){
            echo "<script>alert('Registro incluído com sucesso!');document.location='../view/cadastroNecessidades.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!, verifique se a necessidade não está duplicada');history.back()</script>";
        }
    }
}
new cadastroController();