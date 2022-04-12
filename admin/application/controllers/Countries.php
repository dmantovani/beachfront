<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Countries extends CI_Controller {
	 
	function __construct()
	{
       parent::__construct();
       // testing load model
       $this->load->model('page_model');
	   // Load form helper library
	   $this->load->helper('form');
	   $this->load->helper('url');
	   // Load form validation library
	   $this->load->library('form_validation');

	   // Load session library
	   $this->load->library('session');
	} 
	 
	
	public function index()
	{
		// ----------------------------
		// testing templating method
		// ----------------------------
	
		//como hemos creado el grupo registro podemos utilizarlo
	    $this->template->set_template('template');
	    
		//añadimos los archivos css que necesitemoa
		$this->template->add_css('asset/css/countries.css');
		
		//añadimos los archivos js que necesitemoa
		$this->template->add_js('asset/js/marcas.js');


	    
		//la sección header será el archivo views/registro/header_template
	    $this->template->write_view('header', 'layout/header');
		$this->template->write_view('nav', 'layout/nav');
	    
		//desde aquí también podemos setear el título
		$this->template->write('title', 'Administrador', TRUE);
		$this->template->write('description', 'Administrador de contenidos', TRUE);
		$this->template->write('keywords', '', TRUE);

		$CI =& get_instance();

		$info =  $this->page_model->get_countries();
		$data['info']=$info;
		

		//el contenido de nuestro formulario estará en views/registro/formulario_registro,
		//de esta forma también podemos pasar el array data a registro/formulario_registro
	    $this->template->write_view('content', 'layout/countries/list', $data, TRUE); 
	    
		//la sección footer será el archivo views/registro/footer_template
	    //$this->template->write_view('footer', 'layout/footer');   
	    
		//con el método render podemos renderizar y hacer que se visualice la template
	    $this->template->render();
	
		 //$this->load->view('welcome_message');
	}

	public function add(){
		
		//como hemos creado el grupo registro podemos utilizarlo
	    $this->template->set_template('template');
	    
		//añadimos los archivos css que necesitemoa
		$this->template->add_css('asset/css/countries.css');
		
		//añadimos los archivos js que necesitemoa
		$this->template->add_js('asset/js/countries.js');
		
		//la sección header será el archivo views/registro/header_template
	    $this->template->write_view('header', 'layout/header');
		$this->template->write_view('nav', 'layout/nav');
	    
		//desde aquí también podemos setear el título
		$this->template->write('title', 'Administrador', TRUE);
		$this->template->write('description', 'Administrador de contenidos', TRUE);
		$this->template->write('keywords', '', TRUE);

		$CI =& get_instance();
		
//		$countries =  $this->page_model->get_full_countries();
		$data['countries']=array(); // $countries;
		
		$this->template->write_view('content', 'layout/countries/add', $data, TRUE); 
		$this->template->render();
	}
	
	
	public function edit()
	{
		//como hemos creado el grupo registro podemos utilizarlo
	    $this->template->set_template('template');
	    
		//añadimos los archivos css que necesitemoa
		$this->template->add_css('asset/css/countries.css');
		
		//añadimos los archivos js que necesitemoa
		$this->template->add_js('asset/js/countries.js');
		
		//la sección header será el archivo views/registro/header_template
	    $this->template->write_view('header', 'layout/header');
		$this->template->write_view('nav', 'layout/nav');
	    
		//desde aquí también podemos setear el título
		$this->template->write('title', 'Administrador', TRUE);
		$this->template->write('description', 'Administrador de contenidos', TRUE);
		$this->template->write('keywords', '', TRUE);

		$CI =& get_instance();	
		
		$info =  $this->page_model->get_countries_id($this->uri->segment(3));
		$data['info']=$info;
				
		
		$this->template->write_view('content', 'layout/countries/edit', $data, TRUE); 
		$this->template->render();
	}
	public function save()
	{
		if (isset($this->session->userdata['logged_in'])) {
			
			$data = array(
				'titulo' 	=> $_POST['shortname'],
				'abr' 		=> $_POST['abr'],
				'lang_name' => $_POST['lang_name'],
			);
			$this->page_model->insert_countries($data);
			redirect('countries/');
		}else{
			redirect('login/');
		}
		
	}
	public function update(){
		if (isset($this->session->userdata['logged_in'])) {
			
			$data = array(
				'titulo' 	=> $_POST['shortname'],
				'abr' 		=> $_POST['abr'],
				'lang_name' => $_POST['lang_name'],
			);
			$this->page_model->update_countries($data);
			redirect('countries/');
		}else{
			redirect('login/');
		}
		
	}
	public function remove(){
		if (isset($this->session->userdata['logged_in'])) {
			$this->page_model->remove_countries();
			redirect('countries/');
		}else{
			redirect('login/');
		}
		
	}
}
