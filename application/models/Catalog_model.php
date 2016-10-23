<?php
    class Catalog_model extends CI_Model
    {
        var $table = 'tbl_catalog';

        /**
         * Construct data
         */
        public function __construct()
        {
            parent :: __construct();
        }

        /**
         * Add new data
         * @param   $data
         * @return  boolean 
         */
        public function create($data)
        {

            if ($this->db->insert($this->table, $data)) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

        /**
         * Delete data
         * @param  $id
         * @return  Boolean 
         */
        public function delete($catalog_id)
        {

            if (!$catalog_id || !is_numeric($catalog_id)) {
                return FALSE;
            }

            return $this->db->delete($this->table, ['catalog_id' =>$catalog_id]);
        }

        /**
         * Update data 
         * @param  $id
         * @param  $data
         * @return  Boolean 
         */
        public function update($catalog_id, $data)
        { 

            if (!$catalog_id || !is_numeric($catalog_id)) {
                return FALSE;

            } 
            return $this->db->update($this->table, $data, ['catalog_id' => $catalog_id]);
        }

        /**
         * Get list
         * @return  array
         */
        public function get_list()
        {
            
            $query = $this->db->get($this->table);
            return $query->result();
        }

        /**
         * Get list by catalog_id
         * @param   $id
         * @return  array
         */
        public function get_list_by_catalog_id($catalog_id)
        {
            if (!$catalog_id || !is_numeric($catalog_id)) {
                return FALSE;

            }

            $query = $this->db->get_where($this->table, ['catalog_id' => $catalog_id]);
            return $query->result();

        }

         /**
         * Get list by parent_id
         * @param   $catalog_id
         * @return  array
         */
        public function get_list_by_parent_id($catalog_id)
        {
            if (!$catalog_id || !is_numeric($catalog_id)) {
                return FALSE;
            }

            $query = $this->db->get_where($this->table, ['parent_id' => $catalog_id]);
            return $query->result();

        }

        /**
         * Get total record catalog
         * @param   $table
         * @return  int
         */
        public function get_total()
        {
            $query = $this->db->get($this->table);
            return $query->num_rows();
        }

        /**
         * Get detail one record catalog by id_catalog to table product
         * @param  $catalog_id 
         * @return  oject | Boolean 
         */
        public function get_detail_by_id_catalog($catalog_id)
        {
            if(!$catalog_id) {
                return FALSE;
            }
            
            $query = $this->db->get_where($this->table, ['parent_id' => $catalog_id])->result();

            /*if ($query->num_rows() > 0) {
                return $query->row();
            }*/
        }

          /**
         * Get list by a lot condition
         * @param  $input = array()
         * @return $array
         */
        public function get_list_by_where($input = array())
        {
            if (isset($input['where']) && $input['where']) {
                $this->db->where($input['where']);
            }
            if (isset($input['like']) && $input['like']) {
                $this->db->like($input['like'][0],$input['like'][1]);
            }

            if (isset($input['limit'][0]) && isset($input['limit'][1])) {
                $this->db->limit($input['limit'][0],$input['limit'][1]);
            }

            $query = $this->db->get($this->table);
            return $query->result();
        }

        /**
        * Get list by condition
        * @return array()
        */
        public function get_list_by_where_parent_id()
        {
            return $this->db->get_where($this->table, ['parent_id' => 0])->result();
        }

    }
?>