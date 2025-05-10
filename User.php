<?php
require_once "db.php";

class User {
    private $conn;
    private $table = "users";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($name, $email, $rg, $cpf) {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (name, email, rg, cpf) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$name, $email, $rg, $cpf]);
    }

    public function getById($id) {
        if (!is_numeric($id)) return false;

        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $name, $email, $rg, $cpf) {
        $stmt = $this->conn->prepare("UPDATE {$this->table} SET name = ?, email = ?, rg = ?, cpf = ? WHERE id = ?");
        return $stmt->execute([$name, $email, $rg, $cpf, $id]);
    }

    public function delete($id) {
        if (!is_numeric($id)) return false;

        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
