<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Info extends Controller
{
    public function index()
    {
        phpinfo();
    }
}