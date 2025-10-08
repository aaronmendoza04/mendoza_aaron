<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->call->database();
        $this->call->library('Auth');
        $this->call->model('AuthModel');
    }

    /**
     * Show login form or handle login
     */
    public function login() {
        if ($this->io->method() == 'post') {
            $email = $this->io->post('email');
            $password = $this->io->post('password');

            if ($this->auth->login($email, $password)) {
                redirect('/');
            } else {
                $data['error'] = 'Invalid email or password';
                $this->call->view('login', $data);
            }
        } else {
            $this->call->view('login');
        }
    }

    /**
     * Show register form or handle registration
     */
    public function register() {
        if ($this->io->method() == 'post') {
            $email = $this->io->post('email');
            $password = $this->io->post('password');
            $confirm_password = $this->io->post('confirm_password');
            $role = $this->io->post('role') ?: 'user';

            $data = [];

            // Validation
            if (empty($email) || empty($password)) {
                $data['error'] = 'Email and password are required';
            } elseif ($password !== $confirm_password) {
                $data['error'] = 'Passwords do not match';
            } elseif ($this->AuthModel->email_exists($email)) {
                $data['error'] = 'Email already exists';
            } else {
                // Insert user
                $user_data = [
                    'email' => $email,
                    'password' => $password,
                    'role' => $role
                ];

                if ($this->AuthModel->insert_user($user_data)) {
                    $data['success'] = 'Registration successful. Please login.';
                    $this->call->view('login', $data);
                    return;
                } else {
                    $data['error'] = 'Registration failed';
                }
            }

            $this->call->view('register', $data);
        } else {
            $this->call->view('register');
        }
    }

    /**
     * Logout user
     */
    public function logout() {
        $this->auth->logout();
        redirect('/');
    }
}
?>
