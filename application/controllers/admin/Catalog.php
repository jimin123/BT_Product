<?php
    class Catalog extends CI_Controller
    {
        public function __construct()
        {
            parent :: __construct();

            // Load model
            $this->load->model('catalog_q_model');
            
        }

        public function index()
        {
            // Get total
            $total = $this->catalog_q_model->count_all_products();
            $this->data['total'] = $total;

            // Get list catalog show view
            $list = $this->catalog_q_model->get_list_catalog();
            $this->data['list'] = $list;

            //Show message error
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;

            // Layout master
            $this->data['temp'] = 'admin/catalog/index';
            $this->load->view('admin/shared/main', $this->data);
        }

        /**
         * Add new catalog
         */
        public function add_catalog()
        {
            // Get data request
            
            // If user click submit
            if ($this->input->post())
            {
        
                $this->form_validation->set_rules('name','Name','required');
                $this->form_validation->set_rules('sort_order','Sort_order','required');

                // If not error install run()
                if ($this->form_validation->run()) {

                    // Get content to form
                    $name = $this->input->post('name');
                    $parent_id = $this->input->post('parent_id');
                    $sort_order = $this->input->post('sort_order');
                    $sort_order = intval($sort_order);
                    $active     = $this->input->post('active');
                    $data = array('name'     => $name,
                                  'parent_id'=> $parent_id,
                                  'sort_order' => $sort_order,
                                  'active' => $active);

                    if ($this->catalog_model->create($data)) {

                        // Save $username on session 
                        $this->session->set_userdata('username', $username);
                        // Create content infomation
                        $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công.');

                    } else {

                        $this->session->set_flashdata('message', 'Thêm không thành công.');

                    }

                    // Redirect page list catalog
                    redirect(admin_url('catalog'));
                }

            }
            // Get list parent_id
            $input = array();
            $input['where'] = array('parent_id' => 0);
            $list_catalog = $this->catalog_model->get_list_by_where($input);
            $this->data['list_catalog'] = $list_catalog;
            
            // Load view layout master
            $this->data['temp'] = 'admin/catalog/add_catalog';
            $this->load->view('admin/shared/main', $this->data);
        }

        /**
         * Update catalog
         */
        public function update_catalog()
        {
            // If user click submit
            if ($this->input->post())
            {

                $this->form_validation->set_rules('name','Tên','required');

                // If not error install run()
                if ($this->form_validation->run()) {

                    // Get content to form
                    $name       = $this->input->post('name');
                    $parent_id = $this->input->post('parent_id');
                    $sort_order = $this->input->post('sort_order');
                    $sort_order = intval($sort_order);
                    $active     = $this->input->post('active');

                    // Add data in Database
                    $data = array('name' => $name,
                                  'parent_id'=> $parent_id,
                                  'sort_order' => $sort_order,
                                  'active'     => $active);

                    // Get param id to url by rsegment()
                    $catalog_id = $this->uri->rsegment(3);

                    // Call update model 
                    if ($this->catalog_model->update($catalog_id, $data)) {

                        // Create content infomation
                        $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công.');
                        // Redirect page list catalog
                        redirect(admin_url('catalog'));
                    } else {

                        $this->session->set_flashdata('message', 'Cập nhật dữ liệu không thành công.');

                    }

                    
                }

            } 
            
            //Get data show browser page edit
            $id = $this->uri->rsegment(3);
            $list_where = $this->catalog_model->get_list_by_catalog_id($id);
            $this->data['list_where'] = $list_where;

            // Load view layout master
            $this->data['temp'] = 'admin/catalog/update_catalog';
            $this->load->view('admin/shared/main', $this->data);
        }

        /*
         * Edit catalog
         */
        public function delete_catalog()
        {
            $id = $this->uri->rsegment(3);
            if ($this->catalog_model->delete($id)) {

                $this->session->set_flashdata('message', 'Xóa dữ liệu thành công.');

            } else {

                $this->session->set_flashdata('message', 'Xóa dữ liệu không thành công.');

            }
            redirect(admin_url('catalog'));
        }
    }
?>