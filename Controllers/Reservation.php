<?php

namespace App\Controllers;

use App\Models\Reservation;
use App\Models\Table;
use App\Models\Menu;
use App\Models\User;

class ReservationController extends BaseController {

    public static function index() {
        $userId = $_GET['user_id'] ?? null;
        $reservationDate = $_GET['reservation_date'] ?? null;
        $status = $_GET['status'] ?? null;
    
        $reservations = Reservation::filter($userId, $reservationDate, $status);
    
        // Fetch users for the filter dropdown
        $users = User::all();
    
        // Load the view with the filtered reservations
        self::loadView('/reservations/index', [
            'title' => 'Reservations',
            'reservations' => $reservations,
            'users' => $users,
            'selectedUserId' => $userId,
            'selectedDate' => $reservationDate,
            'selectedStatus' => $status
        ]);
    }

    public static function add() {
        if (isset($_POST['user_id']) && isset($_POST['reservation_date']) && isset($_POST['reservation_time']) && isset($_POST['guests']) && isset($_POST['status'])) {
            $reservation = new Reservation();
            $reservation->user_id = $_POST['user_id'];
            $reservation->reservation_date = $_POST['reservation_date'];
            $reservation->reservation_time = $_POST['reservation_time'];
            $reservation->guests = $_POST['guests'];
            $reservation->status = $_POST['status'];
            $reservation->comment = $_POST['comment'] ?? null;

            if ($reservation_id = $reservation->add()) {
                if (isset($_POST['menus'])) {
                    $reservation->addMenus($_POST['menus']);
                }
                if (isset($_POST['table_id'])) {
                    $reservation->addTable($_POST['table_id']);
                }
                header('Location: /reservations');
                exit;
            } else {
                echo "Failed to add reservation.";
            }
        }

        // Fetch tables, menus, and users
        $tables = Table::all();
        $menus = Menu::all();
        $users = User::all();

        self::loadView('/reservations/add', [
            'title' => 'Add Reservation',
            'tables' => $tables,
            'menus' => $menus,
            'users' => $users
        ]);
    }

    public static function edit($id) {
        $reservation = Reservation::find($id);
        $tables = Table::all();
        $menus = Menu::all();
    
        // Fetch the current associated table and menus for the reservation
        $currentTable = $reservation->getTable();
        $reservation->table_id = $currentTable['table_id'] ?? null;
    
        // Build an associative array of menu_id => amount for easier access in the view
        $reservationMenus = $reservation->getMenus();
        $reservation->menus = [];
        foreach ($reservationMenus as $menu) {
            $reservation->menus[$menu['menu_id']] = $menu['amount'];
        }
    
        // Handle form submission
        if (isset($_POST['reservation_date']) && isset($_POST['reservation_time']) && isset($_POST['guests']) && isset($_POST['status'])) {
            // Update basic reservation details
            $reservation->reservation_date = $_POST['reservation_date'];
            $reservation->reservation_time = $_POST['reservation_time'];
            $reservation->guests = $_POST['guests'];
            $reservation->status = $_POST['status'];
            $reservation->comment = $_POST['comment'] ?? null;
    
            if ($reservation->save()) {
                // Update table association
                if (isset($_POST['table_id'])) {
                    $reservation->deleteTable(); // Remove existing table link
                    $reservation->addTable($_POST['table_id']); // Add new table link
                }
    
                // Update menu associations
                $reservation->deleteMenus(); // Clear existing menu links
                if (isset($_POST['menus'])) {
                    $reservation->addMenus($_POST['menus']); // Add new menu links
                }
    
                // Redirect after successful update
                header('Location: /reservations');
                exit;
            } else {
                echo "Failed to save reservation.";
            }
        }
    
        // Load the view with current data
        self::loadView('/reservations/edit', [
            'title' => 'Edit Reservation',
            'reservation' => $reservation,
            'tables' => $tables,
            'menus' => $menus
        ]);
    }

    public static function delete($id) {
        // Find the reservation by ID
        $reservation = Reservation::find($id);

        // If the reservation exists, delete it
        if ($reservation) {
            // Delete the associated tables and menus (the links not the actual tables and menus)
            $reservation->deleteLinks();
            // Delete the reservation
            $reservation->delete();
            // Redirect back to the reservations list
            header('Location: /reservations');
            exit;
        } else {
            // Handle the case where the reservation does not exist
            header('Location: /reservations');
            exit;
        }
    }

    // APIGetReservations (/api/reservations)
    public static function APIGetReservations() {
        $reservations = Reservation::all();
        if (!$reservations) {
            http_response_code(404);
            echo json_encode(['error' => 'No reservations found']);
            exit;
        }
        foreach ($reservations as $reservation) {
            $output[] = [
                'id' => $reservation->id,
                'user_id' => $reservation->user_id,
                'reservation_date' => $reservation->reservation_date,
                'reservation_time' => $reservation->reservation_time,
                'guests' => $reservation->guests,
                'status' => $reservation->status,
                'table' => $reservation->getTable(),
                'menus' => $reservation->getMenus(),
                'comment' => $reservation->comment,
            ];
        }
        echo json_encode($output);
    }

    // APIGetReservation (/api/reservations/(\d+))
    public static function APIGetReservation($id) {
        $reservation = Reservation::find($id);
        if ($reservation->id === null) {
            http_response_code(404);
            echo json_encode(['error' => 'Reservation not found']);
            exit;
        }
        $output = [
            'id' => $reservation->id,
            'user_id' => $reservation->user_id,
            'reservation_date' => $reservation->reservation_date,
            'reservation_time' => $reservation->reservation_time,
            'guests' => $reservation->guests,
            'status' => $reservation->status,
            'table' => $reservation->getTable(),
            'menus' => $reservation->getMenus(),
            'comment' => $reservation->comment,
        ];
        echo json_encode($output);
    }

    // APIAddComment (/api/reservations/(\d+)/comment)
    public static function APIAddComment($id) {
        $reservation = Reservation::find($id);
        if ($reservation->id === null) {
            http_response_code(404);
            echo json_encode(['error' => 'Cannot add comment to non-existing reservation']);
            exit;
        }

        // source: https://www.tutorialspoint.com/how-to-receive-json-post-with-php
        $comment = json_decode(file_get_contents('php://input'), true);

        // Check if the comment is provided
        if (!isset($comment['comment'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Comment is required in the request body']);
            exit;
        }

        $reservation->comment = $comment['comment'];
        if ($reservation->save()) {
            echo json_encode(['message' => 'Comment added']);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Failed to add comment']);
        }
    }
}