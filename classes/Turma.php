<?php

require_once 'Crud.php';

class Turma extends Crud{
	
	protected $table = 'turma';
	private $nome;
	private $periodo_letivo;
	private $status_turma;

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getNome(){
		return $this->nome;
	}
	public function setPeriodo_letivo($periodo_letivo): self {
		$this->periodo_letivo = $periodo_letivo;
		return $this;
	}
	public function getPeriodo_letivo() {
		return $this->periodo_letivo;
	}
	public function setStatus_turma($status_turma): self {
		$this->status_turma = $status_turma;
		return $this;
	}
	public function getStatus_turma() {
		return $this->status_turma;
	}

	public function insert(){

		$sql  = "INSERT INTO $this->table (nome, periodo_letivo, status_turma) VALUES (:nome, :periodo_letivo , :status_turma)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':periodo_letivo', $this->periodo_letivo);
		$stmt->bindParam(':status_turma', $this->status_turma);
		return $stmt->execute(); 

	}

	public function update($id){

		$sql  = "UPDATE $this->table SET nome = :nome, periodo_letivo = :periodo_letivo, status_turma = :status_turma WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':periodo_letivo', $this->periodo_letivo);
		$stmt->bindParam(':status_turma', $this->status_turma);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
	}
}