<?php

namespace App\Models;

use App\Models\BaseModel;

class Table extends BaseModel {
    // Public function to save the new values (update existing table)
    public function save() {
        $sql = "UPDATE tables SET table_number = :table_number, seats = :seats WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':table_number' => $this->table_number,
            ':seats' => $this->seats,
            ':id' => $this->id
        ]);
    }

    // Public function to add a new table
    public function add() {
        $sql = "INSERT INTO tables (table_number, seats) VALUES (:table_number, :seats)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':table_number' => $this->table_number,
            ':seats' => $this->seats
        ]);
    }

    // Public function to delete the table
    public function delete() {
        $sql = "DELETE FROM tables WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':id' => $this->id
        ]);
    }
}