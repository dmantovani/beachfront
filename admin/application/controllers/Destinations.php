<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Destinations extends CI_Controller {
	 
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
	   
	   	ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
	} 
	 
	
	public function index()
	{
		// ----------------------------
		// testing templating method
		// ----------------------------
	
		//como hemos creado el grupo registro podemos utilizarlo
	    $this->template->set_template('template');
	    
		//a?adimos los archivos css que necesitemoa
		$this->template->add_css('asset/css/usuarios.css');
		
		//a?adimos los archivos js que necesitemoa
		$this->template->add_js('asset/js/banner.js');
	    
		//la secci?n header ser? el archivo views/registro/header_template
	    $this->template->write_view('header', 'layout/header');
		$this->template->write_view('nav', 'layout/nav');
	    
		//desde aqu? tambi?n podemos setear el t?tulo
		$this->template->write('title', 'Administrador', TRUE);
		$this->template->write('description', 'Administrador de contenidos', TRUE);
		$this->template->write('keywords', '', TRUE);

		$CI =& get_instance();

		$info =  $this->page_model->get_destinations();
		$data['info']=$info;
		
		//el contenido de nuestro formulario estar? en views/registro/formulario_registro,
		//de esta forma tambi?n podemos pasar el array data a registro/formulario_registro
	    $this->template->write_view('content', 'layout/destinations/list', $data, TRUE); 
	    
		//la secci?n footer ser? el archivo views/registro/footer_template
	    //$this->template->write_view('footer', 'layout/footer');   
	    
		//con el m?todo render podemos renderizar y hacer que se visualice la template
	    $this->template->render();
	
		 //$this->load->view('welcome_message');
	}

	public function add(){
		
		//como hemos creado el grupo registro podemos utilizarlo
	    $this->template->set_template('template');
	    
		//a?adimos los archivos css que necesitemoa
		$this->template->add_css('asset/css/usuarios.css');
		
		//a?adimos los archivos js que necesitemoa
		$this->template->add_js('asset/js/banner.js?v='.time().'');
		
		//la secci?n header ser? el archivo views/registro/header_template
	    $this->template->write_view('header', 'layout/header');
		$this->template->write_view('nav', 'layout/nav');
		
		$data["lang"] =  $this->page_model->get_countries();
	    
		//desde aqu? tambi?n podemos setear el t?tulo
		$this->template->write('title', 'Administrador', TRUE);
		$this->template->write('description', 'Administrador de contenidos', TRUE);
		$this->template->write('keywords', '', TRUE);

		$CI =& get_instance();
		
		$this->template->write_view('content', 'layout/destinations/add', $data, TRUE); 
		$this->template->render();
	}
	
	public function save(){
		if (isset($this->session->userdata['logged_in'])) {
			
				$lang = $this->page_model->get_lang();
				$last_insert_id=0;
			
				foreach ($lang as $lan)
				{
					$data = array(
						'title' => $_POST['nombre_'.$lan->{"abr"}.''],
						'description' => $_POST['descripcion_'.$lan->{"abr"}.''],
                        'image' => basename($_POST["galeria7_input"]),
                        'image_home' => basename($_POST["galeria8_input"]),
						'lang' => $_POST['id_idioma_'.$lan->{"abr"}.'']
					);
					if($last_insert_id > 0)
					{
						$data["uniq"] = $last_insert_id;
					}
					
					if($last_insert_id <= 0) 
					{
						$last_insert_id = $this->page_model->insert_destination($data);
						
						$this->db->set("uniq",$last_insert_id);
	    				$this->db->where('id', $last_insert_id);
	                    $this->db->update('destinations', $data);
					}
					else
					{
						$this->page_model->insert_destination($data);
					}
				}
				
				redirect('destinations/');
		}else{
			redirect('login/');
		}
		
	}
	public function update(){
		if (isset($this->session->userdata['logged_in'])) {

			$lang = $this->page_model->get_lang();

			foreach ($lang as $lan)
			{
				$data = array(
					'title' => $_POST['nombre_'.$lan->{"abr"}.''],
					'description' => $_POST['descripcion_'.$lan->{"abr"}.''],
                    'image' => basename($_POST["galeria7_input"]),
                    'image_home' => basename($_POST["galeria8_input"]),
				);

				$this->db->where('uniq', $this->uri->segment(3));
				$this->db->where('lang', $_POST['id_idioma_'.$lan->{"abr"}.'']);
                $this->db->update('destinations', $data);
			}
			
			redirect('destinations/');
		}else{
			redirect('login/');
		}
		
	}
	public function remove(){
		if (isset($this->session->userdata['logged_in'])) {
			$this->page_model->remove_destination();
			redirect('destinations/');
		}else{
			redirect('login/');
		}
		
	}
	
	public function edit(){
		//como hemos creado el grupo registro podemos utilizarlo
	    $this->template->set_template('template');
	    
		//a?adimos los archivos css que necesitemoa
		$this->template->add_css('asset/css/usuarios.css');
		
		//a?adimos los archivos js que necesitemoa
		$this->template->add_js('asset/js/banner.js?v='.time().'');
		
		//la secci?n header ser? el archivo views/registro/header_template
	    $this->template->write_view('header', 'layout/header');
		$this->template->write_view('nav', 'layout/nav');
		
		$data["lang"] =  $this->page_model->get_countries();
	    
		//desde aqu? tambi?n podemos setear el t?tulo
		$this->template->write('title', 'Administrador', TRUE);
		$this->template->write('description', 'Administrador de contenidos', TRUE);
		$this->template->write('keywords', '', TRUE);

		$CI =& get_instance();
		$info =  $this->page_model->get_destination_id($this->uri->segment(3));	
		
		$data['info']=$info;
		
		$this->template->write_view('content', 'layout/destinations/edit', $data, TRUE); 
		$this->template->render();
	}
	
}
