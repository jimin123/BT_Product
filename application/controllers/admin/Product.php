<?php
    class Product extends CI_Controller
    {
        function __construct()
        {
            parent :: __construct();

            $id = $this->uri->rsegment(3);

            //Load model
            $this->load->model('Product_model');
            $this->load->model('Catalog_model');
        
        /**
         * Show list product
         */
        }
        function index()
        {

             // Get data request (id_product and name_product)
            $id = $this->input->get('id'); 
            $name = $this->input->get('name'); 
            $catalog_id = $this->input->get('catalog');

            // Get total
            $total_rows = $this->Product_model->get_total();
            $this->data['total_rows'] = $total_rows;

            // Get segment
            $segment = $this->uri->segment(4);
            $segment = intval($segment);

            // Config paginatio
            $config = array();
            $config['total_rows'] = $total_rows;
            $config['base_url']   = admin_url('product/index');
            $config['per_page']   = 3;
            $config['uri_segment']= $segment;
            $config['next_link']  = 'Next';
            $config['prev_link']  = 'Prev';

            //Create config pagination
            $this->pagination->initialize($config);
            $where = array();
            $where['limit'] = array($config['per_page'],$segment);
            $list_prod = $this->Product_model->get_list_by_where_limit($where['limit']);

            // Field data by codition id
            if ($id > 0) {
                $list_prod = $this->Product_model->get_list_by_where_id($id);
            }
            
            // Field data by condition like name
            if (isset($name) && !empty($name)) {
                $list_prod = $this->Product_model->get_list_by_where_like($name);
            }
           
            //Field data by comdition product_id = catalog_id
            if ($catalog_id > 0) {
                $list_prod = $this->Product_model->get_list_by_where_catalog_id($catalog_id);
            }
            
            // Get list catalog data
            $list_cate = $this->Catalog_model->get_list_by_where_parent_id();
            foreach ($list_cate as $row){
                $catalog_id = $row->catalog_id;
                $sub = $this->Catalog_model->get_list_by_parent_id($catalog_id);
                $row->sub = $sub;
            }

            // sent data to view 
            $this->data['list_cate'] = $list_cate;
            $this->data['list_prod'] = $list_prod; 
            $this->data['temp'] = 'admin/product/index';
            $this->load->view('admin/shared/main', $this->data);

        }

        /**
         * Add an new product
         */
        public function add_product()
        {

            if ($this->input->post()) {

                $this->form_validation->set_rules('name', 'Tên sản phẩm', 'Required');
                $this->form_validation->set_rules('price', 'Giá sản phẩm', 'Required');

                if ($this->form_validation->run()) {

                    // Get data to form
                    $catalog_id = $this->input->post('catalog');
                    $name = $this->input->post('name');
                    $price = $this->input->post('price');
                    $price = str_replace(',', '', $price);

                    // Get name file image upload
                    $this->load->library('upload_library');
                    $upload_path = './uploads';
                    $upload_data= $this->upload_library->upload($upload_path, 'image_link');
                    $image_link = '';
                    if (isset($upload_data['file_name'])) {
                        $image_link = $upload_data['file_name'];
                    }

                    // Get name many file image upload
                    $image_list = array();
                    $image_list = $this->upload_library->upload_many_file($upload_path, 'image_list');
                    $image_list = json_encode($image_list);


                    // Data save Database
                    $data = array('catalog_id' => $catalog_id,
                                  'name'       => $name,
                                  'price'      => $price,
                                  'image_link' => $image_link,
                                  'image_list' => $image_list);

                    if ($this->Product_model->create($data)) {
                        // Create content infomation
                        $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công.');

                    } else {

                            $this->session->set_flashdata('message', 'Thêm không thành công.');

                    }
                }

                // Redirect page list catalog
                redirect(admin_url('product'));

            }
            
            // Get list catalog data
            $input = array();
            $input['where'] = array('parent_id' => 0);
            $list_catalog = $this->Catalog_model->get_list_by_where($input);
            foreach ($list_catalog as $row){
                $input['where'] = array('parent_id' => $row->catalog_id);
                $sub = $this->Catalog_model->get_list_by_where($input);
                $row->sub = $sub;
            }

            $this->data['list_catalog'] = $list_catalog;

            // Layout master
            $this->data['temp'] = 'admin/product/add_product';
            $this->load->view('admin/shared/main', $this->data);

        }

        /**
         * Update product
         */
        public function update_product($id)
        {
            
            if ($this->input->post()) {
                $this->form_validation->set_rules('name', 'Tên sản phẩm', 'Required');
                $this->form_validation->set_rules('price', 'Giá sản phẩm', 'Required');

                if ($this->form_validation->run()) {
                    
                    // Get data to form
                    $name = $this->input->post('name');
                    $price = $this->input->post('price');
                    $price = str_replace(',', '', $price);
                    $catalog_id = $this->input->post('catalog');

                    // Get name file image upload
                    $this->load->library('upload_library');
                    $upload_path = './uploads';
                    $upload_data= $this->upload_library->upload($upload_path, 'image_link');
                    $image_link = '';
                    if (isset($upload_data['file_name'])) {
                        $image_link = $upload_data['file_name'];
                    }

                    // Get name many file image upload
                    $image_list = array();
                    $image_list = $this->upload_library->upload_many_file($upload_path, 'image_list');
                    $image_list = json_encode($image_list);

                    // Data save Database
                    $data = array('name'       => $name,
                                  'price'      => $price,
                                  'catalog_id' => $catalog_id,
                                  'image_link' => $image_link,
                                  'image_list' => $image_list);
                    if ($this->Product_model->update($id, $data)) {

                        // Create content infomation error
                        $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công.');
                        // Redirect page list catalog
                        redirect(admin_url('product'));

                    } else {

                        $this->session->set_flashdata('message', 'Cập nhật dữ liệu không thành công.');

                    }
                }

            }

            $product_id = $this->uri->rsegment(3);
            // Get detail one record product by id
            $row_product = $this->Product_model->get_detail_by_id($product_id);
            $this->data['row_product'] = $row_product;

            // Get catalog_id from table product
            $catalog_id = $row_product->catalog_id;

            // Get detail one record catalog by catalog_id
            $row_catalog = $this->Catalog_model->get_detail_by_id_catalog($catalog_id);
            $this->data['row_catalog'] = $row_catalog;

            // Layout master
            $this->data['temp'] = 'admin/product/update_product';
            $this->load->view('admin/shared/main', $this->data);

        }

        /**
         * Delete product
         */
        public function delete_product($id)
        {

            if ($this->Product_model->delete($id)) {

                // Create content infomation error
                $this->session->set_flashdata('message', 'Xóa dữ liệu thành công.');

            } else {

                $this->session->set_flashdata('message', 'Xóa dữ liệu không thành công.');

            }
            redirect(admin_url('product'));
        }
        
    }
?>