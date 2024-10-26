<?php

namespace App\Controllers;

use App\Models\Table;

class TableController extends BaseController {

    public static function index() {
        // Get all tables
        $tables = Table::all();

        // Load the view
        self::loadView('/tables/index', [
            'title' => 'Tables',
            'tables' => $tables
        ]);
    }

    public static function add() {
        // If the form is submitted
        if (isset($_POST['table_number']) && isset($_POST['seats'])) {
            // Create a new table instance
            $table = new Table();
            $table->table_number = $_POST['table_number'];
            $table->seats = $_POST['seats'];

            // Save the new table
            if ($table->add()) {
                // Redirect to the tables page
                header('Location: /tables');
                exit;
            }
        }

        // Load the view for adding a table
        self::loadView('/tables/add', [
            'title' => 'Add Table'
        ]);
    }

    public static function edit($id) { 
        // Get table by ID
        $table = Table::find($id);

        // If the form is submitted
        if (isset($_POST['table_number']) && isset($_POST['seats'])) {
            // Set the new values
            $table->table_number = $_POST['table_number'];
            $table->seats = $_POST['seats'];

            // Save the new values
            if ($table->save()) {
                // Redirect to the tables page
                header('Location: /tables');
                exit;
            }
        }

        // Load the view for editing a table
        self::loadView('/tables/edit', [
            'title' => 'Edit Table',
            'table' => $table
        ]);
    }

    public static function delete($id) {
        // Find the table by ID
        $table = Table::find($id);

        // If the table exists, delete it
        if ($table) {
            if ($table->delete()) {
                // Redirect back to the tables list
                header('Location: /tables');
                exit;
            }
        } else {
            // Handle the case where the table does not exist
            header('Location: /tables');
            exit;
        }
    }
}