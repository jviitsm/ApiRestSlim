<?php
namespace App\Models\Entity;


class Pessoa{

	private $id,$nome,$cpf,$telefone;


	function getId(){
		return $this->id;
	}
	function getNome(){
		return $this->nome;
	}
	function getCpf(){
		return $this->cpf;
	}
	function getTelefone(){
		return $this->telefone;
	}



	function setId($id){
		$this->id = $id;
	}
	function setNome($nome){
		$this->$nome = $nome;
	}
	function setCpf($cpf){
		$this->cpf = $cpf;
	}
	function settelefone($telefone){
		$this->telefone = $telefone;
	}


}












?>