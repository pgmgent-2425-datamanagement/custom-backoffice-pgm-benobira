<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends BaseController {

    public static function index () {
        // Get all users
        $users = User::all();

        // Load the view
        self::loadView('/users/index', [
            'title' => 'Users',
            'users' => $users
        ]);
    }

    public static function edit ($id) { 
        // Get user by ID
        $user = User::find($id);

        // If the form is submitted
        if (isset($_POST['name'])) {
            // Set the new values
            $user->name = $_POST['name'];
            $user->email = $_POST['email'];

            // Save the new values
            if ($user->save()) {
                // Redirect to the users page
                header('Location: /users');
                exit;
            }
        }

        // Load the view
        self::loadView('/users/edit', [
            'title' => 'Edit User',
            'user' => $user
        ]);
    }

    public static function delete($id) {
        // Find the user by ID
        $user = User::find($id);

        // If the user exists, delete it
        if ($user) {
            if ($user->delete()) {
                // Redirect back to the users list
                header('Location: /users');
                exit;
            }
        } else {
            // Handle the case where the user does not exist
            header('Location: /users');
            exit;
        }
    }
}