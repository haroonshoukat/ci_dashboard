<?php
class Product_model extends CI_Model
{

    public function insert_user($data)
    {

        $this->db->insert('register2', $data);
    }

    public function get_user($username, $password)
    {

        $query = $this->db->get_where('register2', array('name' => $username, 'password' => $password));

        return $query->row();
    }
    public function insertFormData($data) {
        // Insert data into the 'table2' table
        $this->db->insert('table2', $data);
    }
    

    public function getUsers() {
        // Database se data ko fetch karen
        $query = $this->db->get('table2');
        return $query->result_array();
    }
    
  

    public function get_item($id) {
        // Fetch item from the database by its ID
        return $this->db->get_where('table2', array('id' => $id))->row();
    }

    public function update_item($id, $data) {
        // Update the item in the database
        $this->db->where('id', $id);
        $this->db->update('table2', $data);
    }
    public function checkUsernameExists($username)
{
    // Query the database to check if the username exists
    $this->db->where('name', $username);
    $query = $this->db->get('register2');

    // Check if any rows are returned (username exists)
    if ($query->num_rows() > 0) {
        return true;
    } else {
        return false;
    }
}
public function update_password($username, $data) {
    // Update the item in the database
    $this->db->where('name', $username);
    $this->db->update('register2', $data);
}


}
