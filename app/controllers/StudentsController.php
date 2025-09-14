<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentsController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->call->database();
        $this->call->model('StudentsModel');
        $this->call->library('session');
    }

    public function index()
    {
        $search = '';
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
        }
        $page = 1;
        if (isset($_GET['page'])) {
            $page = (int)$_GET['page'];
        }
        $limit = 10; // Records per page

        $total_students = $this->StudentsModel->count_students($search);
        $students = $this->StudentsModel->get_students($search, $limit, $page);

        // Load pagination library
        $this->call->library('pagination');
        $this->pagination->set_theme('tailwind');
        $url = 'students';
        if (!empty($search)) {
            $url .= '?search=' . urlencode($search);
            $this->pagination->set_options(['page_delimiter' => '&page=']);
        } else {
            $this->pagination->set_options(['page_delimiter' => '?page=']);
        }
        $pagination_data = $this->pagination->initialize($total_students, $limit, $page, $url, 5);

        $data['students'] = $students;
        $data['pagination'] = $this->pagination->paginate();
        $data['search'] = $search;
        $data['page'] = $page;
        $data['total'] = $total_students;

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $data['message'] = isset($_SESSION['flash_message']) ? $_SESSION['flash_message'] : null;
        unset($_SESSION['flash_message']);
        $this->call->view('students_crud', $data);
    }

    public function create()
    {
        $data['student'] = []; // Empty array for new student
        $data['students'] = $this->StudentsModel->all();
        $this->call->view('students_crud', $data);
    }

    public function edit($id)
    {
        $student = $this->StudentsModel->find($id);
        if ($student) {
            $data['student'] = $student;
            $data['students'] = $this->StudentsModel->all();
            $this->call->view('students_crud', $data);
        } else {
            $this->session->set('flash_message', 'Student not found.');
            header('Location: /students');
            exit;
        }
    }

    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $this->io->post('id');
            $data = [
                'last_name' => $this->io->post('last_name'),
                'first_name' => $this->io->post('first_name'),
                'email' => $this->io->post('email')
            ];

            // Validate required fields
            if (empty($data['last_name']) || empty($data['first_name']) || empty($data['email'])) {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['flash_message'] = 'All fields are required.';
                header('Location: /students');
                exit;
            }

            if (!empty($id)) {
                // Update existing student
                if ($this->StudentsModel->update($id, $data)) {
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }
                    $_SESSION['flash_message'] = 'Student updated successfully.';
                } else {
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }
                    $_SESSION['flash_message'] = 'Failed to update student.';
                }
            } else {
                // Create new student
                if ($this->StudentsModel->insert($data)) {
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }
                    $_SESSION['flash_message'] = 'Student created successfully.';
                } else {
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }
                    $_SESSION['flash_message'] = 'Failed to create student.';
                }
            }

            header('Location: /students');
            exit;
        }
    }

    public function delete($id)
    {
                if ($this->StudentsModel->delete($id)) {
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }
                    $_SESSION['flash_message'] = 'Student deleted successfully.';
                } else {
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }
                    $_SESSION['flash_message'] = 'Failed to delete student.';
                }

                header('Location: /students');
                exit;
    }


    function get_all(){
        $students = $this->StudentsModel->all();
        header('Content-Type: application/json');
        echo json_encode($students);
    }

}
