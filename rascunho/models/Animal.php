<?php
class Animal {
    private $conn;
    private $table = "animais";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function listar() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function cadastrar($dados) {
        $query = "INSERT INTO " . $this->table . " (nome, especie, raca, idade, peso, descricao, foto) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            $dados['nome'],
            $dados['especie'],
            $dados['raca'],
            $dados['idade'],
            $dados['peso'],
            $dados['descricao'],
            $dados['foto']
        ]);
    }
}
?>