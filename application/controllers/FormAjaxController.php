<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormAjaxController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->data = [];
		$this->data['title'] = 'Form Ajax';
		$this->data['form_action'] = "FormAjaxController/index";

		return view('form_ajax/index', $this->data);
	}

	public function load_form()
	{
		// $id = $this->input->post('id');

		$this->data = [];
		$this->data['form_action'] = "FormAjaxController/simpan";

		return view('form_ajax/form_add', $this->data);
	}

	public function simpan()
	{
		$this->data = [];
		$this->data['form_action'] = "FormAjaxController/load_form";

		$this->form_validation->set_rules('nama_kategori', 'Nama kategori', 'required|min_length[5]|callback_kategori_check',
			array('required' => 'Nama kategori wajib diisi', 'min_length' => 'Nama kategori harus lebih dari 5 karakter')
		);

        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

        if ($this->form_validation->run() == FALSE)
        {
			$pesan = '<div class="alert alert-danger font-weight-bold">'.validation_errors().'</div>';
			$msg = ['validasi' => $pesan];
			echo json_encode($msg);
        }
        else
        {
        	$object = [
        		'nama_kategori' => $this->input->post('nama_kategori')
        	];

        	$this->db->insert('kategori', $object);

        	$pesan = 'Data berhasil disimpan';
			$msg = ['sukses' => $pesan];
			echo json_encode($msg);
        }
	}

	public function kategori_check($str)
    {
    	$cek = $this->db->get_where('kategori', ['nama_kategori' => $str]);

    	if ($cek->num_rows() > 0) {
    		$this->form_validation->set_message('kategori_check', '{field} sudah ada di database.');
            return FALSE;
    	} else {
    		return TRUE;
    	}
    }

	public function sukses()
	{
		$this->data = [];
		$this->data['title'] = 'Sukses';

		return view('form_ajax/form_success', $this->data);
	}

}

/* End of file FormAjaxController.php */
/* Location: ./application/controllers/FormAjaxController.php */