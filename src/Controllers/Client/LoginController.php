<?php

namespace Tuyennt\Asm2Oop\Controllers\Client;

use Tuyennt\Asm2Oop\Commons\Controller;
use Tuyennt\Asm2Oop\Commons\Helper;
use Tuyennt\Asm2Oop\Models\User;

class LoginController extends Controller
{
    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function showFormLogin()
    {
        auth_check();

        $this->renderViewClient('login');
    }

    public function login()
    {
        auth_check();

        try {
            $user = $this->user->findByEmail($_POST['email']);

           
            if (empty($user)) {
                throw new \Exception('KO TON TAI EMAIL: ' . $_POST['email']);
            }

            $flag = password_verify($_POST['password'], $user['password']);
            //  $flag = strcmp($_POST['password'], $user['password']);
            //  var_dump( $user['password']);die;
            if ($flag) {

                $_SESSION['user'] = $user;

                unset($_SESSION['cart']);

                if ($user['type'] == 'admin') {
                    header('Location: ' . url('admin/'));
                    exit;
                }
                header('Location: ' . url());
                exit;
            }

            throw new \Exception('PASS KO DUNG: ');
        } catch (\Throwable $th) {
            $_SESSION['error'] = $th->getMessage();

            header('Location: ' . url('login'));
            exit;
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);

        header('Location: ' . url());
        exit;
    }
}
