<?php

namespace App\Controllers;

use App\Models\Reservation;
use App\Models\Table;
use App\Models\Menu;
use App\Models\User;

class HomeController extends BaseController {

    public static function index() {
        // Fetch the most popular menus
        $popularMenus = Reservation::getMostPopularMenus();

        // Fetch stats on reservation statuses
        $reservationStatusStats = Reservation::getReservationStatusStats();

        // Get total numbers
        $totalReservations = Reservation::getTotalReservations();
        $totalTables = Table::getTotalTables();
        $totalMenus = Menu::getTotalMenus();
        $totalUsers = User::getTotalUsers();

        // Get today's reservations
        $todayReservations = Reservation::getTodayReservations();

        // Load the dashboard view
        self::loadView('/home/index', [
            'title' => 'Dashboard',
            'popularMenus' => $popularMenus,
            'reservationStatusStats' => $reservationStatusStats,
            'totalReservations' => $totalReservations,
            'totalTables' => $totalTables,
            'totalMenus' => $totalMenus,
            'totalUsers' => $totalUsers,
            'todayReservations' => $todayReservations
        ]);
    }
}