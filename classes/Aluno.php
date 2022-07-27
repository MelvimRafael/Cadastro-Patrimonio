<?php

require_once 'Crud.php';

class Aluno  extends Crud{
	
	protected $table = 'aluno';
	private $nome;
	private $matricula;
	private $telefone;
	private $email;
	private $senha;
	private $turma_id;

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getNome(){
		return $this->nome;
	}
	public function setMatricula($matricula){
		$this->matricula = $matricula;
	}

	public function getMatricula(){
		return $this->matricula;
	}
	public function setTelefone($telefone){
		$this->telefone = $telefone;
	}

	public function getTelefone(){
		return $this->telefone;
	}

	public function setEmail($email){
		$this->email = $email;
	}
	public function getEmail(){
		return $this->email;
	}
	public function setSenha($senha){
		$this->senha = $senha;
	}

	public function getSenha(){
		return $this->senha;
	}
	public function setturma_id($turma_id): self {
		$this->turma_id = $turma_id;
		return $this;
	}


	public function getturma_id() {
		return $this->turma_id;
	}



	public function insert(){

		$sql  = "INSERT INTO $this->table (nome, matricula, telefone , email, senha, turma_id) 
		VALUES (:nome, :matricula, :telefone, :email, :senha, :turma_id)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':matricula', $this->matricula);
		$stmt->bindParam(':telefone', $this->telefone);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':senha', $this->senha);
		$stmt->bindParam(':turma_id', $this->turma_id);
		return $stmt->execute(); 

	}

	public function update($id){

		$sql  = "UPDATE $this->table SET nome = :nome, matricula = :matricula, telefone = :telefone, email = :email , senha = :senha, turma_id = :turma_id  WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':matricula', $this->matricula);
		$stmt->bindParam(':telefone', $this->telefone);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':senha', $this->senha);
		$stmt->bindParam(':turma_id', $this->turma_id);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();

	}

	
	
}