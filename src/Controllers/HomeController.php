<?php

namespace App\Controllers;

/**
 * HomeController class
 * 
 * This class represents the homepage controller for the project.
 */

final class HomeController
{
    public function index(): string
    {
        ob_start();
        require __DIR__ . '/../views/home.php';
        return ob_get_clean();
    }
}