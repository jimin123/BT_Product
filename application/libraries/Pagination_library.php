<?php
    class Pagination_library
    {
        /**
         * Pagination
         */
        function pagination()
        {
            // Get total
            $total_rows = $this->Product_model->get_total();
            $this->data['total_rows'] = $total_rows;

            // Get uri segment
            $segment = $his->uri->rsegment(4);
            $segment = intval($segment);

            // Config pagination
            $config['total_rows']  = $total_rows;
            $config['page_url']    = admin_url('product/index');
            $config['per_page']    = 4;
            $config['uri_segment'] = $segment;
            $config['next_link']   = 'Next';
            $config['prev_link']   = 'Prev';

            // Create config pagination
            $this->pagination->initialize($config);
        } 
    }
?>