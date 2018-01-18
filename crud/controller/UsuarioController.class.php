<?php

include("../model/UsuarioModel.class.php");
class Usuario{
	private $nome;
    private $rua;
    private $numero;
	private $complemento;
	private $bairro;
	private $cidade;
	private $estado;
	private $telefone;
	
	public function getNome(){
		return $this->nome;
	}
	
	public function getCEP(){
		return $this->cep;	
	}
	
	public function getRua(){
		return $this->rua;	
	}
	
	public function getNumero(){
		return $this->numero;	
	}
	
	public function getComplemento(){
		return $this->complemento;	
	}
	
	public function getBairro(){
		return $this->bairro;	
	}
	
	public function getCidade(){
		return $this->cidade;	
	}
	
	public function getEstado(){
		return $this->estado;	
	}
	
	public function getTelefone(){
		return $this->telefone;
	}
	
	public function setNome($nome){
        $this->nome = $nome;
        //return $this;
	}
	
	public function setCEP($cep){
		$this->cep = $cep;
        //return $this;	
	}
	
	public function setRua($rua){
		$this->rua = $rua;
        //return $this;
	}
	
	public function setNumero($numero){
		$this->numero = $numero;
		//return $this;	
	}
	
	public function setComplemento($complemento){
		$this->complemento = $complemento;
		//return $this;	
	}
	
	public function setBairro($bairro){
		$this->bairro = $bairro;
		//return $this;
	}
	
	public function setCidade($cidade){
		$this->cidade = $cidade;
		//return $this;
	}
	
	public function setEstado($estado){
		$this->estado = $estado;
		//return $this;
	}
	
	public function setTelefone($telefone){
		$this->telefone = $telefone;
		//return $this;
	}
	
	public function insertUsuario(){
		
		$usuarioModel = new UsuarioModel();	
		$usuarioModel->insertUsuario();		
		//echo "aqui";die;
	}
	
	public function visualizarUsuarios(){
		$usuarioModel = new UsuarioModel();	
		$usuarioModel->visualizarUsuarios();
	}
	
	public function excluirUsuario($id){
		$usuarioModel = new UsuarioModel();
		$usuarioModel->excluirUsuario($id);
	}
}
?>