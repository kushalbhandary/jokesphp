<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class KushalJokes extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('header');
		$this->load->view('index');
		$this->load->view('footer');
	}
	public function add()
	{
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('add');
		$this->load->view('footer');
	}
	
	public function save()
	{
		$title = $_REQUEST['title'];
		$description = $_REQUEST['description'];
		$rating  = $_REQUEST['rating'];
		$created = $_REQUEST['created'];

		$this->load->database();
		$input = array('title' => $title , 'description' => $description,
				'rating' => $rating,'created'=> $created);
		
		$this->db->insert('joke', $input);
		
		//if user submitted data, then save to database
		$this->load->view('header');
		$this->load->view('add');
		$this->load->view('footer');
	}
	
	public function all()
	{
		$this->load->helper('url');
		$this->load->database();
		//read from database
		//send to view
		$query = $this->db->get('joke');
		$records = $query->result_array();
		$data['records'] = $records;
		$this->load->view('header');
		$this->load->view('list', $data);
		$this->load->view('footer');
	}
	public function view($id)
	{
		$this->load->helper('url');
		$this->load->database();
		//read from database
		//send to view
		$query = $this->db->get_where('joke',  array('id' => $id));
		$records = $query->result_array();
		$data['records'] = $records;
		$this->load->view('header');
		$this->load->view('show', $data);
		$this->load->view('footer');
	}
	public function update($firstName)
	{
		$this->load->database();
		//query = $this->db->get('contacts')->where('first_name', $firstName);
		//$record = $query->result();
		//$data['record'] = $record;
		$data['title'] = $title;
		$this->load->view('header');
		$this->load->view('update', $data);
		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */