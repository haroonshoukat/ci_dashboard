<?php
// application/models/User_model.php

class User_model extends CI_Model {

    
    public function __construct() {
        parent::__construct();
        // Load the necessary database library
        $this->load->database();
    }
    
    public function email_exists($email) {
        // Check if the email exists in the database
        $query = $this->db->get_where('register2', array('email' => $email));
        return $query->num_rows() > 0;
    }
 
}


