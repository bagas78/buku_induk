<?php
class Import extends CI_Controller{

	function __construct(){
		parent::__construct();
	}  
	function index(){
		if ( $this->session->userdata('login') == 1) {
			$data['import'] = 'class="active"';
		    $data['title'] = 'Import Excel';

		    $data['data'] = $this->db->query("SELECT * FROM t_import WHERE import_hapus = 0")->result_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('import/index',$data);
		    $this->load->view('v_template_admin/admin_footer',$data);

		} 
		else{
			redirect(base_url('login'));
		} 
	} 
	function add(){
		
		$path = 'assets/';
        require_once APPPATH . "/third_party/PHPExcel.php";
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['remove_spaces'] = TRUE;
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('uploadFile')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }

        if(empty($error)){
          if (!empty($data['upload_data']['file_name'])) {
            $import_xls_file = $data['upload_data']['file_name'];
        } else {
            $import_xls_file = 0;
        }

        $inputFileName = $path . $import_xls_file;
         
        try {

            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
            $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
            $flag = true;
            $i=0;

            foreach ($allDataInSheet as $value) {
              if($flag){
                $flag =false;
                continue;
              }
              
              	$set = array(
							'import_nama' => $value['A'], 
							'import_umur' => $value['B'], 
							'import_tinggi' => $value['C'],
							'import_berat' => $value['D']
						);

	            $this->query_builder->add('t_import',$set);

              $i++;
            
            } 

            //hapus file
            unlink($path . $import_xls_file);

            $this->session->set_flashdata('success','Data berhasil di tambah');

			redirect(base_url('import'));   

      } catch (Exception $e) {
           die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                    . '": ' .$e->getMessage());
        }
      }else{
          echo $error['error'];
        }
	}
	function delete($id){
		//hapus user
        $this->db->set('import_hapus',1);
        $this->db->where('import_id',$id);
        $this->db->update('t_import');

		$this->session->set_flashdata('success','Data berhasil di hapus');

		redirect(base_url('import'));
	}
}