<?php

namespace App\Models;

use App\Models\BaseModel;

class Menu extends BaseModel {
    // Public function to save (update) an existing menu item
    public function save() {
        $sql = "UPDATE menus SET name = :name, description = :description, price = :price, file_path = :file_path WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':name' => $this->name,
            ':description' => $this->description,
            ':price' => $this->price,
            ':file_path' => $this->file_path,
            ':id' => $this->id
        ]);
    }

    // Public function to add a new menu item
    public function add() {
        $sql = "INSERT INTO menus (name, description, price, file_path) VALUES (:name, :description, :price, :file_path)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':name' => $this->name,
            ':description' => $this->description,
            ':price' => $this->price,
            ':file_path' => $this->file_path
        ]);
    }

    // Public function to delete a menu item
    public function delete() {
        $sql = "DELETE FROM menus WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':id' => $this->id
        ]);
    }

    // Public function to get all menu items
    public static function getTotalMenus() {
        global $db;
        $sql = "SELECT COUNT(*) as total FROM menus";

        $stmt = $db->prepare($sql);

        $stmt->execute();
        return (int)$stmt->fetchColumn();
    }

    // Public function to search for a menu item by name or description
    public static function search($search) {
        global $db;
        $sql = "SELECT * FROM menus WHERE name LIKE :search OR description LIKE :search ORDER BY name ASC";
        $stmt = $db->prepare($sql);
        $stmt->execute([':search' => '%' . $search . '%']);
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        // Use BaseModel's `castToModel` to convert each result to a Menu object
        $menuModel = new self();
        return $menuModel->castToModel($results);
    }
}