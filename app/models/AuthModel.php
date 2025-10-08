<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: AuthModel
 */
class AuthModel extends Model {
    protected $table = 'users';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Find user by email
     *
     * @param string $email
     * @return array|null
     */
    public function find_by_email($email)
    {
        return $this->db->table($this->table)
                        ->where('email', $email)
                        ->get();
    }

    /**
     * Insert new user
     *
     * @param array $data
     * @return bool
     */
    public function insert_user($data)
    {
        // Hash password
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        return $this->db->table($this->table)->insert($data);
    }

    /**
     * Check if email exists
     *
     * @param string $email
     * @return bool
     */
    public function email_exists($email)
    {
        $user = $this->find_by_email($email);
        return !empty($user);
    }
}
?>
