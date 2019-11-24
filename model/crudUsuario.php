<?php
require_once("banco.php");
class Cadastro extends Banco {
    private $nome;
    private $cpf;
    private $endereco;
    private $cnpj;
    private $email;
    private $telefone;
	private $senha;
    private $razao_social;
    //Metodos Set
    public function setNome($string){
        $this->nome = $string;
    }
    public function setCPF($string){
        $this->cpf = $string;
    }
    public function setEndereco($string){
        $this->endereco = $string;
    }
    public function setCNPJ($string){
        $this->cnpj = $string;
    }
    public function setEmail($string){
        $this->email = $string;
    }
    public function setTelefone($string){
        $this->telefone = $string;
    }
	
	public function setSenha($string){
        $this->senha = md5($string);
    }
    public function setRazaoSocial($string){
        $this->razao_social = $string;
    }
    //Metodos Get
    public function getNome(){
        return $this->nome;
    }
    public function getCPF(){
        return $this->cpf;
    }
    public function getEndereco(){
        return $this->endereco;
    }
    public function getCNPJ(){
        return $this->cnpj;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getTelefone(){
        return $this->telefone;
    }
	public function getSenha(){
        return $this->senha;
    }
	public function getRazaoSocial(){
        return $this->razao_social;
    }
    public function incluir(){
        return $this->setUsuario($this->getNome(),$this->getCPF(),$this->getEndereco(),$this->getCNPJ(),$this->getEmail(),$this->getTelefone(),$this->getSenha(),$this->getRazaoSocial());
    }
}
?>