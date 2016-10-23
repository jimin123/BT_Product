<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    /**
    * This is model process data in table catalog
    */
    class Product_q_model extends CI_Model
    {

        function __construct()
        {
            parent :: __construct();
        }

        
        /**
         * Add new data
         * @param   $data
         * @return  boolean 
         */
        function create_product($data)
        {
            return $this->db
                ->from(Constants_helper:: TBL_PRODUCTS)
                ->insert($data);
        }


        /**
         * Delete data
         * @param   $id
         * @return  boolean 
         */
        function delete_product($id)
        {
            if (!$id && is_numeric($id)) {
                return FALSE;
            }
            return $this->db
                ->from(Constants_helper:: TBL_PRODUCTS)
                ->where(['id'] => $id)
                ->delete();
        }

         /**
         * Update data
         * @param   $id
         * @param   $data
         * @return  boolean 
         */
        function Update_product($id, $data)
        {
            if (!$id && is_numeric($id)) {
                return FALSE;
            }
            return $this->db
                ->from(Constants_helper:: TBL_PRODUCTS)
                ->where(['id']=>$id)
                ->update($data);
        }

         /**
         * Get list data
         * @return  array 
         */
        function get_list_product()
        {
            return $this->db
                ->selete()
                ->from(Constants_helper:: TBL_PRODUCTS)
                ->get()
                ->results();
        }

        /**
         * Get detail data
         * @param   $id
         * @return  oject || boolean
         */
        function get_detail_product_by_id($id)
        {
            $query = $this->db
                    ->selete()
                    ->from(Constants_helper:: TBL_PRODUCTS)
                    ->get()
                    ->where(['id'=>$id])
            if ($query->num_rows > 0) {
                return $query->row();
            }
            return FALSE;
        }
    }
?>