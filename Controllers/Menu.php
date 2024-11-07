<?php

namespace App\Controllers;

use App\Models\Menu;

class MenuController extends BaseController {

    public static function index() {
        // Get all menu items
        $menus = Menu::all();

        // Load the view
        self::loadView('/menus/index', [
            'title' => 'Menus',
            'menus' => $menus
        ]);
    }

    public static function add() {
        // If the form is submitted
        if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price'])) {
            // Create a new menu instance
            $menu = new Menu();
            $menu->name = $_POST['name'];
            $menu->description = $_POST['description'];
            $menu->price = $_POST['price'];

            // Check if an existing image was selected
            if (!empty($_POST['existing_image'])) {
                $menu->file_path = $_POST['existing_image'];
            } elseif (isset($_FILES['file_path']) && $_FILES['file_path']['error'] == 0) {
                // Handle file upload if no existing image was selected
                $uploads_dir = BASE_DIR . '/public/uploads/menus/';
                $file_name = uniqid() . '_' . basename($_FILES['file_path']['name']);
                $file_path = $uploads_dir . $file_name;

                if (move_uploaded_file($_FILES['file_path']['tmp_name'], $file_path)) {
                    $menu->file_path = $file_name;
                } else {
                    die('Failed to upload the image.');
                }
            }

            // Save the new menu item
            if ($menu->add()) {
                // Redirect to the menus page
                header('Location: /menus');
                exit;
            }
        }

        // Load the view for adding a menu item
        self::loadView('/menus/add', [
            'title' => 'Add Menu Item'
        ]);
    }

    public static function edit($id) { 
        // Get menu item by ID
        $menu = Menu::find($id);

        // If the form is submitted
        if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price'])) {
            // Set the new values
            $menu->name = $_POST['name'];
            $menu->description = $_POST['description'];
            $menu->price = $_POST['price'];

            // Check if an existing image was selected
            if (!empty($_POST['existing_image'])) {
                // Update menu item with the selected image
                $menu->file_path = $_POST['existing_image'];
            } elseif (isset($_FILES['file_path']) && $_FILES['file_path']['error'] == 0) {
                // Handle file upload if no existing image was selected
                $uploads_dir = BASE_DIR . '/public/uploads/menus/';
                $file_name = uniqid() . '_' . basename($_FILES['file_path']['name']);
                $file_path = $uploads_dir . $file_name;

                if (move_uploaded_file($_FILES['file_path']['tmp_name'], $file_path)) {
                    // Delete the old file
                    $old_file_path = $uploads_dir . $menu->file_path;
                    if ($menu->file_path && file_exists($old_file_path)) {
                        unlink($old_file_path);
                    }
                    // Update the menu item with the new file path
                    $menu->file_path = $file_name;
                } else {
                    die('Failed to upload the new image.');
                }
            }

            // Save the updated menu item
            if ($menu->save()) {
                // Redirect to the menus page
                header('Location: /menus');
                exit;
            }
        }

        // Load the view for editing a menu item
        self::loadView('/menus/edit', [
            'title' => 'Edit Menu Item',
            'menu' => $menu
        ]);
    }

    public static function delete($id) {
        // Find the menu item by ID
        $menu = Menu::find($id);

        // If the menu item exists, delete it
        if ($menu) {
            if ($menu->delete()) {
                // Redirect back to the menus list
                header('Location: /menus');
                exit;
            }
        } else {
            // Handle the case where the menu item does not exist
            header('Location: /menus');
            exit;
        }
    }
}