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
}