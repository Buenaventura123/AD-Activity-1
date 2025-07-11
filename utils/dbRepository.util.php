<?php
// connecting add stock page to db
class ProductRepository {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM products ORDER BY name");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateStock($productId, $additionalStock) {
           $stmt = $this->db->prepare("
        UPDATE products 
        SET stock = stock + :additional 
        WHERE id = :id"
    );    
        return $stmt->execute([
            ':additional' => $additionalStock,
            ':id' => $productId
    ]);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllProducts(): array {
    $stmt = $this->db->query("SELECT * FROM products ORDER BY name ASC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>