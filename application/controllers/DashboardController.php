<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->data = [];
		$this->data['title'] = 'Home';
		$this->data['form_action'] = "DashboardController/index";

		$this->form_validation->set_rules('id_kategori', 'Nama kategori', 'callback_kategori_check');
		$this->form_validation->set_rules('nama_kategori', 'Nama kategori', 'required',
			array('required' => 'Nama kategori wajib diisi')
		);
        $this->form_validation->set_rules('isi_post', 'Isi Post', 'required',
	        array('required' => 'Isi post wajib diisi')
	    );

        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

        if ($this->form_validation->run() == FALSE)
        {
			return view('home/index', $this->data);
        }
        else
        {
        	echo '<pre>';
			print_r($_POST);
			echo '</pre>';
        }

		
	}

	public function kategori_check($str)
    {
    	$cek = $this->db->get_where('kategori', ['id' => $str]);

    	if ($cek->num_rows() > 0) {
    		return TRUE;
    	} else {
    		$this->form_validation->set_message('kategori_check', '{field} tidak ada di database.');
            return FALSE;
    	}
    }

	public function ajax_list()
	{
		$this->load->model('Dashboard_model');
		$list = $this->Dashboard_model->get_datatables();
		$data = array();
		$no = $_POST['start'];

		foreach ($list as $value) {

			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $value->nama_kategori;
			$row[] = '<button class="btn btn-primary" id="select"
		data-id="'.$value->id.'"
		data-name="'.$value->nama_kategori.'"
		>
			<i class="fa fa-check" aria-hidden="true"></i> Pilih
		</button>';

			$data[] = $row;
		}

		$output = array(
					"draw" => $_POST['draw'],
					"recordsTotal" => $this->Dashboard_model->count_all(),
					"recordsFiltered" => $this->Dashboard_model->count_filtered(),
					"data" => $data,
				);
		
		echo json_encode($output);
	}

	public function simpan()
	{
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';
	}

}

/* End of file DashboardController.php */
/* Location: ./application/controllers/DashboardController.php */