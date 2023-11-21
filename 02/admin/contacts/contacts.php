<?php
class ContactManager {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function loadContactRequests() {
        $stmt = $this->pdo->query('SELECT * FROM ContactRequests');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function index() {
        return $this->loadContactRequests();
    }

    public function detail($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM ContactRequests WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($contactRequest) {
        $stmt = $this->pdo->prepare('INSERT INTO ContactRequests (name, email, message) VALUES (?, ?, ?)');
        $stmt->execute([$contactRequest['name'], $contactRequest['email'], $contactRequest['message']]);
    }

    public function edit($id, $contactRequest) {
        $stmt = $this->pdo->prepare('UPDATE ContactRequests SET name=?, email=?, message=? WHERE id=?');
        $stmt->execute([$contactRequest['name'], $contactRequest['email'], $contactRequest['message'], $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM ContactRequests WHERE id=?');
        $stmt->execute([$id]);
    }
}
?>
