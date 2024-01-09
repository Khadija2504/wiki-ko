<?php

class AuthController {
    public function showRegisterForm() {
        include 'app/views/auth/register.php';
    }

    public function showLoginForm() {
        include 'app/views/auth/login.php';
    }

    public function processRegister() {

    }

    public function processLogin() {
        
    }
}
