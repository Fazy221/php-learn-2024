<?php
class News_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_news($slug = FALSE)
    {
        if ($slug === FALSE) // If slugs aren't found then fetch all the results
        {
            $query = $this->db->get('news'); // This will run the query: SELECT * FROM news;
            return $query->result_array(); // Will return assoc array
        }

        $query = $this->db->get_where('news', array('slug' => $slug)); // As slug found, it'll run query: SELECT * FROM news WHERE slug = '$slug' 
        return $query->row_array(); // Returns a single row as an associative array
    }
}
