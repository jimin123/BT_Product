<?php 
class Upload_library
	{
		var $CI = ''; 

		// Create supper variable
		function __construct()
		{
			$this->CI = & get_instance();
		}
		
		/**
		 * Upload file
		 * @param  $upload_path
		 * @param  $file_name
		 * @return Array | Oject 
		 */
		function upload($upload_path, $file_name)
		{
			// Get information config upload
			$config = $this->config($upload_path);
            
			$this->CI->load->library('upload', $config);

			// Install upload
			if ($this->CI->upload->do_upload($file_name)) {
				$data = $this->CI->upload->data();

			} else {
				// If upload don't successful show error
				$data = $this->CI->upload->display_errors();
			}
			return $data;
		}

		/**
		 * Upload many file
		 * @param  $upload_path
		 * @param  $file_name 
		 * @return array
		 */
		function upload_many_file($upload_path, $file_name)
		{
			$config = $this->config($upload_path);
			
			$file = $_FILES['image_list'];

			$count = count($file['name']);

			$image_list = array();

			for ($i = 0; $i <= $count - 1; $i++) {
				$_FILES['userfile']['name'] = $file['name'][$i];
				$_FILES['userfile']['type'] = $file['type'][$i];
				$_FILES['userfile']['tmp_name'] = $file['tmp_name'][$i];
				$_FILES['userfile']['error'] = $file['error'][$i];
				$_FILES['userfile']['size'] = $file['size'][$i];

				$this->CI->load->library('upload', $config);

				if ($this->CI->upload->do_upload()) {
					$data = $this->CI->upload->data();
					//pre($data); exit();
					$image_list[] = $data['file_name'];
				} 
			} 
			return $image_list;

		}


		/*
		 * Config Upload file
		 */
		function config($upload_path)
		{
			//khai báo biến cấu hình
			$config = array();
			//Thư mục chứa file.
			$config['upload_path'] = $upload_path;
			//Định dạng file được phép tải.
			$config['allowed_types'] = 'jpg|png|gif|jpeg';
			//Dung lượng tối đa
			$config['max_size'] = '1200';
			//Chiều rộng tối đa
			$config['max_width'] = '1028';
			//Chiều cao tối đa
			$config['max_height'] = '1028';

			return $config;
		}
	}


?>