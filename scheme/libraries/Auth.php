<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Auth Library for LavaLust Framework
 * Handles user authentication using sessions
 */
class Auth {

    private $session;
    private $db;

    public function __construct()
    {
        // Load session library
        require_once 'Session.php';
        $this->session = new Session();
    }

    /**
     * Attempt to log in a user
     *
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function login($email, $password)
    {
        // Load AuthModel
        lava_instance()->call->model('AuthModel');
        $user = lava_instance()->AuthModel->find_by_email($email);

        if ($user && password_verify($password, $user['password'])) {
            // Set session data
            $this->session->set_userdata([
                'user_id' => $user['id'],
                'user_email' => $user['email'],
                'user_role' => $user['role'],
                'logged_in' => true
            ]);
            return true;
        }
        return false;
    }

    /**
     * Log out the current user
     */
    public function logout()
    {
        $this->session->unset_userdata(['user_id', 'user_email', 'user_role', 'logged_in']);
        $this->session->sess_destroy();
    }

    /**
     * Check if user is logged in
     *
     * @return bool
     */
    public function is_logged_in()
    {
        return $this->session->userdata('logged_in') === true;
    }

    /**
     * Get current user data
     *
     * @return array|null
     */
    public function get_user()
    {
        if ($this->is_logged_in()) {
            return [
                'id' => $this->session->userdata('user_id'),
                'email' => $this->session->userdata('user_email'),
                'role' => $this->session->userdata('user_role')
            ];
        }
        return null;
    }

    /**
     * Check if current user has specific role
     *
     * @param string $role
     * @return bool
     */
    public function has_role($role)
    {
        if ($this->is_logged_in()) {
            return $this->session->userdata('user_role') === $role;
        }
        return false;
    }

    /**
     * Check if current user is admin
     *
     * @return bool
     */
    public function is_admin()
    {
        return $this->has_role('admin');
    }
}
?>
