<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    /**
    * This is model process data in table catalog
    */
    class Catalog_q_model extends CI_Model
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
        function create_catlog($data)
        {
            return $this->db
                ->from(Constants_helper:: CATALOGS)
                ->insert($data);
        }


        /**
         * Delete data
         * @param   $id
         * @return  boolean 
         */
        function delete_catalog($id)
        {
            if (!$id && is_numeric($id)) {
                return FALSE;
            }
            return $this->db
                ->from(Constants_helper:: CATALOGS)
                ->where(['id'] => $id)
                ->delete();
        }

         /**
         * Update data
         * @param   $id
         * @param   $data
         * @return  boolean 
         */
        function Update_catalog($id, $data)
        {
            if (!$id && is_numeric($id)) {
                return FALSE;
            }
            return $this->db
                ->from(Constants_helper:: CATALOGS)
                ->where(['id']=>$id)
                ->update($data);
        }

         /**
         * Get list data
         * @return  array 
         */
        function get_list_catalog()
        {
            return $this->db
                ->selete()
                ->from(Constants_helper:: CATALOGS)
                ->get()
                ->results();
        }

        /**
         * Get detail data
         * @param   $id
         * @return  oject || boolean
         */
        function get_detail_catalog_by_id($id)
        {
            $query = $this->db
                    ->selete()
                    ->from(Constants_helper:: CATALOGS)
                    ->get()
                    ->where(['id'=>$id])
            if ($query->num_rows > 0) {
                return $query->row();
            }
            return FALSE;
        }

        /**
         * Count all products
         * @return  int
         */
        function count_all_catalog()
        {
            $query = $this->db
                    ->selete()
                    ->from(Constants_helper:: CATALOGS)
                    ->get();
            return $query->num_rows(); 
        }
    }
?>