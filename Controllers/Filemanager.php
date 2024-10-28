<?php

namespace App\Controllers;

class FilemanagerController extends BaseController {

    public static function index($folder = '') {
        // Get all files
        $files = scandir(BASE_DIR . '/public/uploads/' . $folder);

        // Load the view
        self::loadView('/filemanager/index', [
            'title' => 'Filemanager',
            'files' => $files,
            'currentPath' => $folder
        ]);
    }

    public static function add($folder = '') {
        // If the form is submitted
        if (isset($_FILES['file_path']) && $_FILES['file_path']['error'] == 0) {
            // Handle file upload
            $uploads_dir = BASE_DIR . '/public/uploads/' . $folder;
            $file_name = uniqid() . '_' . basename($_FILES['file_path']['name']);
            $file_path = $uploads_dir . '/' . $file_name;

            if (move_uploaded_file($_FILES['file_path']['tmp_name'], $file_path)) {
                // Redirect to the filemanager page
                header('Location: /filemanager/' . $folder);
                exit;
            } else {
                die('Failed to upload the file.');
            }
        }

        // Load the view for adding a file
        self::loadView('/filemanager/add', [
            'title' => 'Add File',
            'currentPath' => $folder
        ]);
    }

    public static function delete($path) {
        // Split the path into folder and file
        $fullPath = BASE_DIR . '/public/uploads/' . $path;
        if (file_exists($fullPath)) {
            unlink($fullPath);
        } else {
            die('File not found.');
        }

        // Redirect to the filemanager page
        $folder = dirname($path);  // Gets the folder portion from the path
        header('Location: /filemanager/' . $folder);
        exit;
    }
}