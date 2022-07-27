<?php
require_once 'Crud.php';

class Patrimonio extends Crud
{
    protected $table = 'patrimonio';
    private $nome;
    private $descricao;
    private $detalhes;
    private $data_origem;
    private $data_cadastro;
    private $localizacao;
    private $googlemaps;
    private $url_video;
    private $nome_imagem;

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function getDescricao()
    {
        return $this->descricao;
    }
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }
    public function getDetalhes()
    {
        return $this->detalhes;
    }

    public function setDetalhes($detalhes)
    {
        $this->detalhes = $detalhes;
    }
    public function getData_origem()
    {
        return $this->data_origem;
    }
    public function setData_origem($data_origem)
    {
        $this->data_origem = $data_origem;
    }
    public function getData_cadastro()
    {
        return $this->data_cadastro;
    }
    public function setData_cadastro($data_cadastro)
    {
        $this->data_cadastro = $data_cadastro;
    }
    public function getLocalizacao()
    {
        return $this->localizacao;
    }
    public function setLocalizacao($localizacao)
    {
        $this->localizacao = $localizacao;
    }
    public function getGooglemaps()
    {
        return $this->googlemaps;
    }
    public function setGooglemaps($googlemaps)
    {
        $this->googlemaps = $googlemaps;
    }
    public function getUrl_video()
    {
        return $this->url_video;
    }
    public function setUrl_video($url_video)
    {
        $this->url_video = $url_video;
    }
    public function getNome_imagem()
    {
        return $this->nome_imagem;
    }
    public function setNome_imagem($nome_imagem)
    {
        $this->nome_imagem = $nome_imagem;
    }


    public function insert()
    {

        $sql  = "INSERT INTO $this->table(nome, descricao, detalhes, data_origem, data_cadastro, localizacao, googlemaps, url_video, nome_imagem) 
        VALUES (:nome,:descricao, :detalhes, :data_origem, :data_cadastro, :localizacao, :googlemaps, :url_video, :nome_imagem)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nome', $this->nome); 
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':detalhes', $this->detalhes);
        $stmt->bindParam(':data_origem', $this->data_origem);
        $stmt->bindParam(':data_cadastro', $this->data_cadastro);
        $stmt->bindParam(':localizacao', $this->localizacao);
        $stmt->bindParam(':googlemaps', $this->googlemaps);
        $stmt->bindParam(':url_video', $this->url_video);
        $stmt->bindParam(':nome_imagem', $this->nome_imagem);
        return $stmt->execute();
    }

    public function update($id)
    {

        $sql  = "UPDATE $this->table SET nome = :nome, descricao = :descricao, detalhes = :detalhes, data_origem = :data_origem, data_cadastro = :data_cadastro, localizacao = :localizacao, googlemaps = :googlemaps, url_video = :url_video WHERE id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':detalhes', $this->detalhes);
        $stmt->bindParam(':data_origem', $this->data_origem);
        $stmt->bindParam(':data_cadastro', $this->data_cadastro);
        $stmt->bindParam(':localizacao', $this->localizacao);
        $stmt->bindParam(':googlemaps', $this->googlemaps);
        $stmt->bindParam(':url_video', $this->url_video);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
	
	
}