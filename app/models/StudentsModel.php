<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: StudentsModel
 *
 * Automatically generated via CLI.
 */
class StudentsModel extends Model {
    protected $table = 'students';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get students with optional search and pagination
     *
     * @param string|null $search Search keyword
     * @param int $limit Number of records per page
     * @param int $page Current page number
     * @return array
     */
    public function get_students($search = null, $limit = 10, $page = 1)
    {
        $this->table($this->table);

        if (!empty($search)) {
            $searchTerm = '%' . $search . '%';
            $this->grouped(function($db) use ($searchTerm) {
                $db->like('last_name', $searchTerm)
                   ->or_like('first_name', $searchTerm)
                   ->or_like('email', $searchTerm);
            });
        }

        $offset = ($page - 1) * $limit;
        $this->limit($offset, $limit);
        $this->order_by('id', 'DESC');

        return $this->get_all();
    }

    /**
     * Count students with optional search filter
     *
     * @param string|null $search Search keyword
     * @return int
     */
    public function count_students($search = null)
    {
        $this->table($this->table);

        if (!empty($search)) {
            $searchTerm = '%' . $search . '%';
            $this->grouped(function($db) use ($searchTerm) {
                $db->like('last_name', $searchTerm)
                   ->or_like('first_name', $searchTerm)
                   ->or_like('email', $searchTerm);
            });
        }

        return $this->count();
    }
}
