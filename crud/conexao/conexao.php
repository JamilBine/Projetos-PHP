<?php

// Mensagens de Erro
$msg[0] = "Conexao com o banco falhou!";
$msg[1] = "Nao foi possivel selecionar o banco de dados!";

// Fazendo a conexão com o servidor MySQL
$conexao = mysql_connect("localhost","root","") or die($msg[0]);
mysql_select_db("k13", $conexao) or die($msg[1]);

/*class Conexao {
	private $data = array(); 
	
	//variavel da classe Base 
	protected $pdo = null; 
	
	//métodos mágicos _get e _set do php 
	public function __set($name, $value){ 
		$this->data[$name] = $value; 
	} 
	
	public function __get($name){ 
		if (array_key_exists($name, $this->data)) { 
			return $this->data[$name]; 
		} 
	
		$trace = debug_backtrace(); 
	
		trigger_error( 'Undefined property via __get(): ' . $name . ' in ' . $trace[0]['file'] . 
							' on line ' . $trace[0]['line'], E_USER_NOTICE); 
		
		return null; 
	}
	 
	
	//método que retorna a variável $pdo 
	public function getPdo() { 
		return $this->pdo; 
	} 
	
	//método construtor da classe 
	function __construct($pdo = null) { 
		$this->pdo = $pdo; 
		if ($this->pdo == null) 
			$this->conectar(); 
	} 

	//método que conecta com o banco de dados 
	public function conectar() { 
		try {
			$this->pdo = new PDO("mysql:host=localhost;dbname=k13", 
									"root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			//$this->pdo = new PDO("pgsql:host = localhost; port = 3306; dbname = k13; user = root; password = ''");
		} catch (PDOException $e) { 
			print "<center><h2>Error!: " . $e->getMessage() . "</h2></center><br/>";
			die(); 
		} 
	} 
	
	//método que desconecta 
	public function desconectar() { 
		$this->pdo = null; 
	} 
}
*/?>