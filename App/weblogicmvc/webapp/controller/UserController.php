<?php

use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\View;


class UserController
{
    public function register()
    {
        $msg = new Register();
        $msg->primeiroNome = Post::get('primeiroNome');
        if(empty($primeiroNome)){
            $erro[] = "Você esqueceu-se de colocar o seu primeiro nome";
        }

        $msg->ultimoNome = Post::get('ultimoNome');
        if(empty($ultimoNome)){
            $erro[] = "Você esqueceu-se de colocar o seu ultimo nome";
        }

        $msg->email_user = Post::get('email');
        if(empty($email_user)){
            $erro[] = "Você esqueceu-se de colocar o seu email";
        }

        $password = Post::get('password');
        if(empty($password)){
            $erro[] = "Você esqueceu-se de colocar a sua password";
        }

        $confirmarPass = Post::get('confirmarPass');
        if(empty($confirmarPass)){
            $erro[] = "Você esqueceu-se de confirmar a sua password";
        }

        $msg->msg = $msg->register_user($msg->primeiroNome, $msg->ultimoNome, $msg->email_user, $password, $confirmarPass);

        return View::make('user.register', ['msg' => $msg]);
    }

    public function logout()
    {
        Session::destroy();
        return View::make('user.login');
    }

    public function login (){
        $msg = new Login();
        $msg->email_user = Post::get('email');
        if(empty($email)){
            $erro[] = "Você esqueceu-se de colocar o seu email";
        }

        $password = Post::get('password');
        if(empty($password)){
            $erro[] = "Você esqueceu-se de colocar a sua password";
        }

        $msg->msg = $msg->login_user($msg->email_user, $password);

        return View::make('user.login', ['msg' => $msg]);
    }
}