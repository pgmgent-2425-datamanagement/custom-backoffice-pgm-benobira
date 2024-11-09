<?php

namespace App\Models;

use App\Models\BaseModel;

class User extends BaseModel {
    // Public function to save the new values
    public function save () {
        // Prepare the query
        $sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";

        // Prepare the statement
        $stmt = $this->db->prepare($sql);

        // Bind and execute the query
        return $stmt->execute([
            ':name' => $this->name,
            ':email' => $this->email,
            ':id' => $this->id
        ]);
    }
}