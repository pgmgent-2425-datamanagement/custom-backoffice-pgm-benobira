<?php

namespace App\Controllers;

class HomeController extends BaseController {

    public static function index () {
        // Load the view
        self::loadView('/home/index', [
            'title' => 'Dashboard',
        ]);
    }
}