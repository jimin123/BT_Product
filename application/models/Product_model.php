<?php
    class Product_model extends CI_Model
    {
        var $table = 'tbl_product';
        

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
                return true; 
            }
        }

        /**
         * Delete data
         * @param  $id
         * @return  Boolean 
         */
        public function delete($product_id)
        {

            if (!$product_id || !is_numeric($product_id)) {
                return FALSE;
            }

            return $this->db->delete($this->table, ['product_id' => $product_id]);  
        }

        /**
         * Update data 
         * @param  $id
         * @param $data
         * @return  Boolean
         */
        public function update($product_id, $data)
        { 
            if (!$product_id || !is_numeric($product_id)) {
                return FALSE;
            }

            return $this->db->update($this->table, $data, ['product_id' => $product_id]);
        }

        /**
         * Get total
         * @return int
         */
        public function get_total()
        {
            $query = $this->db->get($this->table);
            return $query->num_rows();
        }

        /**
         * Get detail one record by id
         * @param   $id
         * @return  Oject [<description>]
         */
        public function get_detail_by_id($product_id)
        {
            if(!$product_id || !is_numeric($product_id)) {
                return FALSE;
            }

            $query = $this->db->get_where($this->table, ['product_id' => $product_id]);

            if ($query->num_rows() > 0) {
                return $query->row();
            }
        }

        /**
        * Get list by id condition
        * @param  $id
        * @return array()
        */
        public function get_list_by_where_id($id)
        {
           if (!$id || !is_numeric($id)) {
                return FALSE;
           }
           return $this->db->get_where($this->table, ['product_id' => $id])->result();
        }

        /**
        * Get list by like condition
        * @param  $name
        * @return array()
        */
        public function get_list_by_where_like($name)
        {
            if (!$name) {
                return FALSE;
            }
            $this->db->like('name', $name);
            $query = $this->db->get($this->table);
            return $query->result();
        }

        /**
        * Get list by condition catalog_id = $catalog_id form table tbl_catalog 
        * @param  $catalog_id
        * @return array()
        */
        public function get_list_by_where_catalog_id($catalog_id)
        {
           if (!$catalog_id || !is_numeric($catalog_id)) {
                return FALSE;
           }
           return $this->db->get_where($this->table, ['catalog_id' => $catalog_id])->result();
        }


        /**
        * Get list by limit condition
        * @param  $limit
        * @return array()
        */
        public function get_list_by_where_limit($limit='')
        {
            $where = array();
            if (!$limit) {
                return FALSE;
            }
            return $this->db->get_where($this->table, $this->db->limit($limit))->result();
        }

         /**
        * Get list by limit condition
        * @param  $input = array()
        * @return array()
        */
        public function get_list_by_where_param()
        {
            return $this->db->get_where($this->table, ['parent_id' => 0])->result();
        }


    }
?>