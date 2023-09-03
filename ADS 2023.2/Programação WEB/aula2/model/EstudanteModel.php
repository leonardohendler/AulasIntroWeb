<?php

require_once $_SERVER ['DOCUMENT_ROOT'] . '/' . FOLDER . '/database/Database.php';

class EstudanteModel 
{
    private int $idade;

    private string $nome;
    
    private $database;


    // GETTERS AND SETTERS
    public function __construct()
    {
        $this->database = new Database();
    }

    public function listarModel(): array
    {
        // obter e retornar os dados no BD
        // return [
        //     [
        //         "nome" => "Lucas Saraiva",
        //         "idade" => 20    
        //     ],
        //     [
        //         "nome" => "Leonardo Hendler",
        //         "idade" => 25 
        //     ]
        // ];
        $dadosArray=$this->database->executeSelect("SELECT * FROM estudantes");
        
        return $dadosArray;
    }

    public function salvarModel(string $nome, int $idade)
    {
        $sql = "INSERT INTO estudantes (nome, idade) values ('$nome', '$idade')";
        $this->database->insert($sql);
    }
}