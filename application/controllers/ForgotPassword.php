<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ForgotPassword extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model'); // Load User_model here
        $this->load->library('email');
        $this->load->helper('url'); // Load URL helper
    }
    public function send() {
       
    
        // Email configuration
        $config['protocol'] = 'smtp';
$config['smtp_host'] = 'smtp..gmail.com.';
$config['smtp_user'] = 'hassan.4xp@gmail.com';
$config['smtp_pass'] = 'Hassan@2023';
$config['smtp_port'] = 587;
$config['smtp_crypto'] = 'tls'; // or 'ssl' if tls doesn't work
$config['mailtype'] = 'html';
$config['charset'] = 'iso-8859-1';
$config['wordwrap'] = TRUE;
$config['newline'] = "\r\n"; // Important for Yahoo

    
        // Initialize email with configuration
        $this->load->library('email');

$this->email->from('hassan.4xp@gmail.com', 'Your Name');
$this->email->to('hassan.4xp@gmail.com');
$this->email->subject('Test Email');
$this->email->message('This is a test email.');

if ($this->email->send()) {
    echo 'Email sent successfully.';
} else {
    echo 'Email sending failed: ' . $this->email->print_debugger();
}

    }
    
}
