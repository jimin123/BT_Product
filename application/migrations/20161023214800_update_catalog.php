<?php defined('BASEPATH') OR exit('No direct script access allowed');
    /**
    * 
    */
    class Migration_Update_catalog extends CI_Migration
    {
        function up()
        {
            $this->db->forge();
            $arr_field = array(
                'id'        => $this->$field->$primary_key,
                'name'      => $this->$field->$small_text,
                'parent_id' => $this->$field->
            );
            $this->db->add_field()
        }   
        
    }
?>