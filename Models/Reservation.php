<?php

namespace App\Models;

use App\Models\BaseModel;

class Reservation extends BaseModel {
    // Define the table and primary key
    protected $table = 'reservations';
    protected $pk = 'id';

    // Properties
    public $user_id;
    public $reservation_date;
    public $reservation_time;
    public $guests;
    public $status;

    // Save or update a reservation
    public function save() {
        $sql = "UPDATE {$this->table} SET user_id = :user_id, reservation_date = :reservation_date, reservation_time = :reservation_time, guests = :guests, status = :status WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':user_id' => $this->user_id,
            ':reservation_date' => $this->reservation_date,
            ':reservation_time' => $this->reservation_time,
            ':guests' => $this->guests,
            ':status' => $this->status,
            ':id' => $this->id
        ]);
    }

    // Add a new reservation
    public function add() {
        $sql = "INSERT INTO {$this->table} (user_id, reservation_date, reservation_time, guests, status) VALUES (:user_id, :reservation_date, :reservation_time, :guests, :status)";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':user_id' => $this->user_id,
            ':reservation_date' => $this->reservation_date,
            ':reservation_time' => $this->reservation_time,
            ':guests' => $this->guests,
            ':status' => $this->status
        ]);

        $this->id = $this->db->lastInsertId(); // Get the ID of the inserted reservation
        return $this->id;
    }

    public function addTable($table_id) {
        $sql = "INSERT INTO reservation_table (reservation_id, table_id) VALUES (:reservation_id, :table_id)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':reservation_id' => $this->id,
            ':table_id' => $table_id
        ]);
    }

    public function addMenus($menus) {
        foreach ($menus as $menu_id => $menuData) {
            if (isset($menuData['selected']) && $menuData['selected'] == '1') {
                $amount = $menuData['amount'] ?? 1; // Default to 1 if amount is not provided
                $sql = "INSERT INTO reservation_menu (reservation_id, menu_id, amount) VALUES (:reservation_id, :menu_id, :amount)";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([
                    ':reservation_id' => $this->id,
                    ':menu_id' => $menu_id,
                    ':amount' => $amount
                ]);
            }
        }
    }

    // Delete a reservation and associated links
    public function delete() {
        // Delete from reservation_menu and reservation_table first
        $this->deleteLinks();
        parent::delete();
    }

    // Helper to delete associated menus and tables for a reservation
    public function deleteLinks() {
        $this->deleteMenus();
        $this->deleteTable();
    }

    public function deleteTable() {
        $this->db->prepare("DELETE FROM reservation_table WHERE reservation_id = :id")->execute([':id' => $this->id]);
    }

    public function deleteMenus() {
        $this->db->prepare("DELETE FROM reservation_menu WHERE reservation_id = :id")->execute([':id' => $this->id]);
    }

    // Retrieve menus associated with the reservation
    public function getMenus() {
        $sql = "SELECT menus.id AS menu_id, menus.name, reservation_menu.amount 
                FROM reservation_menu 
                LEFT JOIN menus ON reservation_menu.menu_id = menus.id 
                WHERE reservation_menu.reservation_id = :reservation_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':reservation_id' => $this->id]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Retrieve the table associated with the reservation
    public function getTable() {
        $sql = "SELECT tables.id AS table_id, tables.table_number 
                FROM reservation_table 
                LEFT JOIN tables ON reservation_table.table_id = tables.id 
                WHERE reservation_table.reservation_id = :reservation_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':reservation_id' => $this->id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function allWithUser() {
        $sql = "SELECT reservations.*, users.name AS user_name 
                FROM reservations
                LEFT JOIN users ON reservations.user_id = users.id";
    
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        
        $reservations = $stmt->fetchAll();
        return $this->castToModel($reservations);
    }
}