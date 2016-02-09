<?php
 
class Arquivo{
    
    function Arquivo(){}
    
    private $id;
    private $nome;
    private $tempo;
    private $caminho;
    private $time;
    private $tamanho;
    private $tipo;
 
    
    public function getId() { return $this->id; } 
    public function setId($id) { $this->id = $id; }
    
    public function getNome() { return $this->nome; } 
    public function setNome($nome) { $this->nome = $nome; }
    
    public function getTempo() { return $this->tempo; } 
    public function setTempo($tempo) { $this->tempo = $tempo; }
    
    public function getCaminho() { return $this->caminho; } 
    public function setCaminho($caminho) { $this->caminho = $caminho; }
    
    public function getTime() { return $this->time; } 
    public function setTime($time) { $this->time = $time; }
    
    public function getTamanho() { return $this->tamanho; } 
    public function setTamanho($tamanho) { $this->tamanho = $tamanho; }
    
    public function getTipo() { return $this->tipo; } 
    public function setTipo($tipo) { $this->tipo = $tipo; }
    
    
    
   

}

