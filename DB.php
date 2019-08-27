<?php

class DB {
    private $DB_NOME = "db_tai";
    private $DB_USUÁRIO = "root";
    private $DB_SENHA = " ";
    private $DB_CHARSET = "utf8";

    public function connection(){
        
            $str_conn = "mysql:host=localhost;dbname=" . $this->DB_NOME;

            return new PDO($str_conn,$this->DB_USUÁRIO, $this->DB_NOME);
    }
        
    

    public function insert($dados){
     $sql = "INSERT INTO tb_alunos(nome, curso, turma) VALUES(";

      $flag = 0;
      $arrayValue = [];
       foreach ($dados as $valor) {
            if ($flag == 0){
               $sql .= "?";
              $flag = 1;
           }
          else{
                $sql .= ", ?";
          }
           $arrayValue[] = $valor;
      }
      $sql .= ");";

      $conn = $this->connection();
      $stmt = $conn->prepare($sql);

      $stmt->execute($arrayValue);

      return $stmt;
    }
}

$dados = array("nome" => "Julia", "curso" => "Informática", "turma" => "InfoVI");

$obj = new DB();

$aluno = $obj->insert($dados);

echo "Inserido com sucesso!";