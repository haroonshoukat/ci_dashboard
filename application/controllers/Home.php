<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); // Load the URL Helper
        $this->load->database();
        $this->load->model('Product_model');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('captcha');
        $this->load->library('email');
        $this->load->library('image_lib');
    }




    public function index()
    {
        if ($this->session->userdata('name') && $this->session->userdata('password')) {
            // Session data exists, redirect to dashboard
            $this->load->view('main/index');
        } else

            $this->load->view('auth/login');
    }


    //   $this->load->view('main/index');
    // $this->load->view('main/index');

    public function table()
    {
        $this->load->view('pages/table.php');
    }

    public function register12()
    {
        $this->load->view('auth/login');
    }

    public function register()
    {
        // Load necessary libraries and models
        $this->load->library('form_validation');
        $this->load->model('Product_model');

        // Set validation rules
        $this->form_validation->set_rules('name', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed, load your view with validation errors
            $this->load->view('home/register'); // Change 'auth/register' to the appropriate view
        } else {
            // Validation passed, process the form data
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );
            $this->Product_model->insert_user($data);
            redirect('Home/dashboard');
        }
    }


    public function captcha1()
    {
        $this->load->view('captcha');
    }


    public function signin()
    {
        $this->load->view('auth/login');
    }

    // In controllers/AuthController.php
    public function login()
    {
        $this->load->model('Product_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        // Set validation rules
        $this->form_validation->set_rules('name', 'Username or Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload the login form with errors
            $this->load->view('auth/login');
        } else {
            $username = $this->input->post('name');
            $password = $this->input->post('password');

            $user = $this->Product_model->get_user($username, $password);

            if ($user) {
                $session_data = array(
                    'name' => $user->name,
                    'password' => $user->password,
                    'logged_in' => TRUE
                );
                if (!isset($_SESSION)) {
                    session_start();
                }

                // Captcha validation
                if ($this->input->post('captcha') !== $_SESSION['captcha']) {
                    $data['error'] = "Captcha code is incorrect!";
                    $this->load->view('login_view', $data);
                    return; // Stop further execution
                }
                $this->session->set_userdata($session_data);

                redirect('Home/captcha');
            } else {
                $data['login_error'] = "Invalid password";
                $this->load->view('auth/login', $data);
            }
        }
    }
    public function dashboard()
    {
        if ($this->session->userdata('name') && $this->session->userdata('password')) {
            // Session data exists, redirect to dashboard
            $this->load->view('main/index');
        } else

            redirect('Home');
    }


    public function logout()
    {
        $this->load->library('session');

        // Unset all session data
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('password');

        // Destroy the session
        $this->session->sess_destroy();

        // Redirect to the login page
        redirect('Home');
    }


    public function basicbutton()
    {
        $this->load->view('theme/template/pages/ui-features/buttons.php');
    }



    public function dropdown()
    {
        if ($this->session->userdata('name') && $this->session->userdata('password')) {
            // Session data exists, redirect to dashboard
            $this->load->view('theme/template/pages/ui-features/dropdowns.php');
        } else {
            $this->load->view('auth/login');
        }
    }

    public function typography()
    {
        $this->load->view('theme/template/pages/ui-features/typography.php');
    }
    public function formelement()
    {
        if ($this->session->userdata('name') && $this->session->userdata('password')) {
            // Session data exists, redirect to dashboard
            $this->load->view('theme/template/pages/forms/basic_elements.php');
        } else {
            $this->load->view('auth/login');
        }
    }
    public function tables()
    {
        if ($this->session->userdata('name') && $this->session->userdata('password')) {
            // Session data exists, redirect to dashboard
            $this->load->view('theme/template/pages/tables/basic-table.php');
        } else {
            $this->load->view('auth/login');
        }
    }

    public function charts()
    {
        if ($this->session->userdata('name') && $this->session->userdata('password')) {
            $this->load->view('theme/template/pages/charts/chartjs.php');
        }
    }
    public function icons()
    {
        $this->load->view('theme/template/pages/icons/mdi.php');
    }
    public function blankpage()
    {
        $this->load->view('theme/template/pages/samples/blank-page.php');
    }

    public function loginload()
    {
        $this->load->view('auth/login.php');
    }

    public function doc()
    {
        $this->load->view('theme/documentation/documentation.php');
    }


    public function submitForm()
    {
        // Get form data
        $data = array(
            'firstname' => $this->input->post('first_name'),
            'Gender' => $this->input->post('Gender'),
            'Position' => $this->input->post('Position'),
            'Office' => $this->input->post('Office'),
            'Age' => $this->input->post('Age'),
            'Startdate' => $this->input->post('Startdate'),
            'Salary' => $this->input->post('Salary'),
            'Extn' => $this->input->post('Extn'),
            'Email' => $this->input->post('Email')
        );

        // Insert data into the database
        $this->Product_model->insertFormData($data);
        redirect('Home/displayTable');
        // Redirect or do something else after insertion
    }

    public function displayTable()
    {
        if ($this->session->userdata('name') && $this->session->userdata('password')) {
            // Session data exists, redirect to dashboard
            $this->load->model('Product_model');

            // getUsers method ko call karke data ko fetch karen
            $data['users'] = $this->Product_model->getUsers();
            $this->load->view('theme/template/pages/tables/basic-table', $data);
        } else {
            $this->load->view('auth/login');
        }
        // Session data exists, redirect to dashboard


        // Model ko load karen


        // View ko load karke data ko pass karen

    }

    public function delete_record($id)
    {

        $this->db->where('id', $id);
        $var = $this->db->delete('table2');

        if ($var == true) {
            echo "deleted";
        } else {
            echo "error";
        }
    }

    public function edit($id)
    {
        // Load the model
        $this->load->model('Product_model');

        // Fetch the item from the model
        $data['item'] = $this->Product_model->get_item($id);

        // Load the view to edit the item
        $this->load->view('edite-form', $data);
    }

    public function update($id)
    {
        // Load the model
        $this->load->model('Product_model');

        // Update the item using data from the form
        $this->Product_model->update_item($id, $this->input->post());

        // Redirect to the item's page or any other appropriate page
        redirect('Home/displayTable');
    }


    public function loadpassword()
    {
        $this->load->view('change_password');
    }

    public function changePassword()
    {
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Product_model');

        // Set validation rules
        $this->form_validation->set_rules('oldpass', 'Old Password', 'trim|required');
        $this->form_validation->set_rules('newpass', 'New Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('passconf', 'Confirm Password', 'trim|required|matches[newpass]');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload the change password form with errors
            $this->load->view('change_password');
        } else {
            $old_password = $this->input->post('oldpass');
            $username = $this->session->userdata('name');
            $new_password = $this->input->post('newpass');

            // Check if old password matches the one stored in the database
            $user = $this->Product_model->get_user($username, $old_password);

            if ($user) {
                // Update password in the database
                $this->Product_model->update_password($username, array('password' => $new_password));

                // Redirect to dashboard or any other page
                redirect('Home/dashboard');
            } else {
                // Old password doesn't match, show error
                $data['change_password_error'] = "Invalid old password";
                // $this->load->view('change_password', $data);
            }
        }
    }


    // Controller: Home.php

    public function captcha()
    {
        $this->load->helper(array('form', 'captcha'));
        $this->load->library('form_validation');
        // CAPTCHA configurationkb
        $captcha_config = array(
            'word'          => '',
            'img_path'      => './captcha-images/',
            'img_url'       => base_url('captcha-images/'),
            'font_path'     => FCPATH . 'system/fonts/texb.ttf',
            'img_width'     => 200,
            'img_height'    => 50,
            'expiration'    => 7200,
            'word_length'   => 6,
            'font_size'     => 17,
            'img_id'        => 'captcha_img',
            'pool'          => '0123456789',

            // White background and border, black text and red grid
            'colors' => array(
                'background' => array(0, 0, 0), // Black background
                'border' => array(255, 255, 255), // White border
                'text' => array(255, 255, 255), // White text // Neon color for text (You can adjust the RGB values as needed)
                'grid' => array(25, 118, 108) // Light red grid


            )
        );

        $captcha = create_captcha($captcha_config);

        // Store CAPTCHA in session
        $this->session->set_userdata('captcha_word', $captcha['word']);

        // Pass CAPTCHA image to view
        $data['captcha'] = $captcha;

        // Form validation rules
        $this->form_validation->set_rules('captcha', 'CAPTCHA', 'required|callback_check_captcha');

        if ($this->form_validation->run() === FALSE) {
            // Load view with form
            $this->load->view('captcha', $data);
        } else {
            // Redirect to dashboard
            redirect('Home/dashboard');
        }
    }

    // Callback function to check CAPTCHA
    // Callback function to check CAPTCHA
    public function check_captcha()
    {
        $str = $this->input->post('captcha');
        $captcha_word = $this->session->userdata('captcha_word');
        // Convert both strings to lowercase for case-insensitive comparison
        if (strtolower($str) == $captcha_word) {
            // echo 'YES I AM HERE';die;
            redirect('Home/dashboard');
            return TRUE;
        } else {



            $this->form_validation->set_message('check_captcha', 'The {field} does not match the CAPTCHA.');
            redirect('Home/captcha');
            return FALSE;
        }
    }
    // Controller function to generate and download PDF
    // public function downloadPDF()
    // {
    //     // Load the TCPDF library
    //     require_once(APPPATH . 'tcpdf.php');

    //     // Create new TCPDF instance
    //     $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    //     // Set document information
    //     $pdf->SetCreator(PDF_CREATOR);
    //     $pdf->SetTitle('Example PDF');
    //     $pdf->SetSubject('Downloaded PDF');
    //     $pdf->SetKeywords('PDF, example, download');

    //     // Add a page
    //     $pdf->AddPage();

    //     // Set font
    //     $pdf->SetFont('helvetica', '', 12);

    //     // Add content to the PDF
    //     $pdf->Write(0, 'Hello, this is a PDF file.');

    //     // Close and output PDF document
    //     $pdf->Output('example.pdf', 'D');
    // }

    public function forget()
    {
        $this->load->view('auth/forget_password');
    }
    public function downloadPDF()
    {
        $data['title'] = 'Sample PDF';

        // Load the view file containing the content to be converted to PDF
        $html = $this->load->view('pdf', $data, true);

        // Generate the PDF
        $this->pdf->load_html($html);
        $this->pdf->render();
        $pdf_content = $this->pdf->output();

        // Set the headers for PDF download
        $this->load->helper('download');
        force_download('sample_pdf.pdf', $pdf_content);
    }
}
