<?php

//include_once '../banco/Conexao.php';


class DaoArquivo {
    
    private $pdo;
            
    function  DaoArquivo(){
        
        $this->pdo = new Conexao();
        $this->pdo = $this->pdo->getPdo();
        
    }
    
    
    public function getNextID(){
        try{
            
            $sql = "SELECT Auto_increment FROM information_schema.tables WHERE table_name='arquivo'";
            $result = $this->pdo->query($sql);
            $final_result = $result->fetch(PDO::FETCH_ASSOC); 
            return $final_result['Auto_increment'];
         
        }  catch (Exception $e){
           
         print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
       
        }
    }


    public function inserir(Arquivo $arquivo){
        try{
            
            $sql = "INSERT INTO arquivo("
                    . "nome,"
                    . "tempo,"
                    . "caminho,"
                    . "time,"
                    . "tamanho,"
                    . "tipo"
                    . ") VALUES ("
                    . ":nome,"
                    . ":tempo,"
                    . ":caminho,"
                    . ":time,"
                    . ":tamanho,"
                    . ":tipo)";
            
            $p_sql = $this->pdo->prepare($sql);
            
            $p_sql -> bindValue(":nome", $arquivo->getNome());
            $p_sql -> bindValue(":tempo", $arquivo->getTempo());
            $p_sql -> bindValue(":caminho", $arquivo->getCaminho());
            $p_sql -> bindValue(":time", $arquivo->getTime());
            $p_sql -> bindValue(":tamanho", $arquivo->getTamanho());
            $p_sql -> bindValue(":tipo", $arquivo->getTipo());
            
            
            return $p_sql->execute();
         
            
        }  
        catch (Exception $e){
            
         print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde. " .$e; 

        }
        
    }

    public function atualizar(Arquivo $arquivo){
        
        try{
            
            $sql = "UPDATE arquivo SET "
                    . "nome = :nome,"
                    . "tempo = :tempo,"
                    . "caminho = :caminho,"
                    . "time = :time,"
                    . "tamanho = :tamanho,"
                    . "tipo = :tipo "
                    . "WHERE id = :id";
            
            $p_sql = $this->pdo->prepare($sql);
            
            $p_sql -> bindValue(":id", $arquivo->getId());
            $p_sql -> bindValue(":nome", $arquivo->getNome());
            $p_sql -> bindValue(":tempo", $arquivo->getTempo());
            $p_sql -> bindValue(":caminho", $arquivo->getCaminho());
            $p_sql -> bindValue(":time", $arquivo->getTime());
            $p_sql -> bindValue(":tamanho", $arquivo->getTamanho());
            $p_sql -> bindValue(":tipo", $arquivo->getTipo());
            
            return $p_sql->execute();
            
            
        }
 catch (Exception $e){
     
      print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
    
   
 }
        
    }
    
    
    public function deletar($id){
        
        try{
            
            $sql = "DELETE FROM arquivo WHERE id = :id";
            $p_sql  = $this->pdo->prepare($sql);
            $p_sql -> bindValue(":id", $id);
            
            return $p_sql->execute();
     
        }
        catch (Exception $e){
     
     print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
     
     
 }
        
    }
    
   

    public function buscarPorTime($time){
        
         try{
            
            $sql = "SELECT * FROM arquivo WHERE time = :time";
            $p_sql = $this->pdo->prepare($sql);
            $p_sql -> bindValue(":time", $time);
            $p_sql->execute();
    
             return $this->populaArquivo($p_sql->fetch(PDO::FETCH_ASSOC));
           
              }       
        catch (Exception $e){
     
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
           
     
        }
        
    }
    
    
    
    public function buscarPorId($id){
        
         try{
            
            $sql = "SELECT * FROM arquivo WHERE id = :id";
            $p_sql = $this->pdo->prepare($sql);
            $p_sql -> bindValue(":id", $id);
            $p_sql->execute();
    
             return $this->populaArquivo($p_sql->fetch(PDO::FETCH_ASSOC));
           
              }       
        catch (Exception $e){
     
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
           
     
        }
        
    }
    
    
    
     
   
      public function buscarPorCondicao($condicao){
        
           try{
            
            $sql = "SELECT * FROM arquivo WHERE ".$condicao;
            $result = $this->pdo->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            
            foreach ($lista as $l){
                $f_lista[] = $this->populaArquivo($l);
            }
           
            return $f_lista;
              }       
        catch (Exception $e){
     
     print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
         
 }
        
    }
     
    
    public function buscarTodos(){
        
           try{
            
            $sql = "SELECT * FROM arquivo";
            $result = $this->pdo->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            
            foreach ($lista as $l){
                $f_lista[] = $this->populaArquivo($l);
            }
           
            return $f_lista;
              }       
        catch (Exception $e){
     
     print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
         
 }
        
    }
    
    private function populaArquivo($row){
        
        $arquivo = new Arquivo();
        $arquivo ->setId($row['id']);
        $arquivo ->setNome($row['nome']);
        $arquivo ->setTempo($row['tempo']);
        $arquivo ->setCaminho($row['caminho']);
        $arquivo ->setTime($row['time']);
        $arquivo ->setTamanho($row['tamanho']);
        $arquivo ->setTipo($row['tipo']);
        
        
        return $arquivo;
    }
    
    
}
