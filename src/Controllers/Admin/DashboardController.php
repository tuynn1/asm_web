<?php

namespace Tuyennt\Asm2Oop\Controllers\Admin;

use Tuyennt\Asm2Oop\Commons\Controller;
use Tuyennt\Asm2Oop\Commons\Helper;
use Tuyennt\Asm2Oop\Models\User;

class DashboardController extends Controller
{
    // private User $user;
    // public function __construct()
    // {
    //     $this->user = new User();
    // }
    public function dashboard()
    {
        if(!isset($_SESSION['user'])){
            header('Location: ' . url('login'));
            exit;
        }
        if ($_SESSION['user']['type'] == 'admin') {
            $this->renderViewAdmin(__FUNCTION__,$_SESSION['user']);
        }
        header('Location: ' . url());
        exit;
    }
}
