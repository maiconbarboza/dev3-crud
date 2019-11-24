<?php
require_once("../model/crudUsuario.php");
class cadastroController{
    private $cadastro;
    public function __construct(){
        $this->cadastro = new Cadastro();
        $this->incluir();
    }
    private function incluir(){
        $this->cadastro->setNome($_POST['nome']);
        $this->cadastro->setCPF($_POST['cpf']);
        $this->cadastro->setEndereco($_POST['endereco']);
        $this->cadastro->setCNPJ($_POST['cnpj']);
        $this->cadastro->setEmail($_POST['email']);
        $this->cadastro->setTelefone($_POST['telefone']);
		$this->cadastro->setSenha($_POST['senha']);
        $this->cadastro->setRazaoSocial($_POST['razao_social']);

        $result = $this->cadastro->incluir();
        if($result >= 1){
            echo "<script>alert('Registro incluído com sucesso!');document.location='../view/cadastro.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!, verifique se o usuário não está duplicado');history.back()</script>";
        }
    }
}
new cadastroController();