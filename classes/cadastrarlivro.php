<?php

class livro {
    private $pdo;
    public $msgErro ="";

    private $servername = "localhost";
    private $database = "sistema_livrariapjint";
    private $username = "zaqueu";
    private $password = "123";

    // Função para conectar ao banco de dados
    public function conectar()
    {
            global $pdo;
            echo "Servername: {$this->servername}, Username: {$this->username}, Senha: {$this->password}. \n<br>\n";
            try {
                $conn = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
                echo "Conexão com banco de dados realizada com sucesso.";
                $this->pdo = $conn;
            } catch (PDOException $e) {
                echo "Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado " . $e->getMessage();
            }
    }

    public function cadastrar($editora, $titulo_l, $autor_l, $ano_l, $preco_l, $quant_l, $tipo_l)
    {
        //global $pdo;

        // verificar se o livro já esta cadastrado.

        $sql = $this->pdo->prepare("SELECT nome FROM editora WHERE nome = :e");
        $sql->bindValue(":e",$editora);
        $sql->execute();
        if($sql->rowCount() > 0)
        {


            return false;
            //já está cadastrado.
        }
        // Caso não livro não esteja cadastrado fazer cadastro.
        else{
            $sql = $this->pdo->prepare("
            INSERT INTO acervo01(idEditora, titulo, autor, ano, preco, quantidade, tipo)
            VALUES (:e, :t, :a, :an, :p, :q,:tp)");

            $sql->bindValue(":e",$editora);
            $sql->bindValue(":t",$titulo_l);
            $sql->bindValue(":a",$autor_l);
            $sql->bindValue(":an",$ano_l);
            $sql->bindValue(":p",$preco_l);
            $sql->bindValue(":q",$quant_l);
            $sql->bindValue(":tp",$tipo_l);
            $sql->execute();
            return true; // foi cadrastado com sucesso.
        }

    }
   
}


?>
