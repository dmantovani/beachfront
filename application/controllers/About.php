<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	function __construct()
	{
       parent::__construct();
       // testing load model
       $this->load->model('page_model');
	   $this->load->helper('url');
	   $this->load->helper('cookie');
	   
	   $this->load->library('session');
	} 
	 
	
	public function index()
	{
		//$this->load->library('GetResponse'); 
		//$this->getresponse->enterprise_domain = 'cloud.oxford.com.ar';
		
		//$result = $this->getresponse->getContacts();
		//$data['contactos']= $result;
		// ----------------------------
		// testing templating method
		// ----------------------------
	
		//como hemos creado el grupo registro podemos utilizarlo
	    $this->template->set_template('template');

		$this->template->add_css('asset/css/home.css');

		// --		
		// Save utm
		// --
	    if(isset($_GET["utm_medium"]) && strlen($_GET["utm_medium"]) > 1)
	    {
	    		$this->session->set_userdata("utm_medium",$_GET["utm_medium"]);	   
	    }
	   
	    if(isset($_GET["utm_source"])  && strlen($_GET["utm_source"]) > 1)
	    {
 	   	 	$this->session->set_userdata("utm_source",$_GET["utm_source"]);	   
 	    }
		
		//añadimos los archivos js que necesitemoa		
		//$this->template->add_js('asset/js/home.js');
        
        
	    
		//desde aquí también podemos setear el título
		
		$this->template->write('description', '', TRUE);
		$this->template->write('keywords', '', TRUE);
		$this->template->write('image', '', TRUE);
		$this->template->write('ogType', 'website', TRUE);
		//obtenemos los usuarios
		//$data['users'] = array("aaa" => "bbb"); // $this->page_model->get_users();	
		$CI =& get_instance();


		if(empty($this->session->userdata('language'))){
			$this->session->set_userdata('language', $_POST['language']);
		}
		$lenguage_session = $this->session->userdata('language');
		//Load form helper
		$this->load->helper('form');
		
		$load_pt = $this->lang->load('web_lang','portuguese');
		$load_es = $this->lang->load('web_lang','spanish');
		$load_en = $this->lang->load('web_lang','english');
		//Get the selected language
		//$language = $this->input->post('language');
		if(!empty($lenguage_session)){
			$language = $lenguage_session;
		}
			

		$leng = $this->config->item('language_abbr');
		//Choose language file according to selected lanaguage
		//print_r($language);
		//exit;
		if($language == "portuguese"):
			$this->lang->load('web_lang','portuguese');
			$data['shortname'] = "pt";
			$data['language'] = $language;
		elseif ($language == "spanish"):
			$this->lang->load('web_lang','spanish');
			$data['shortname'] = "es";
			$data['language'] = $language;
		elseif ($language == "english"):
			$load_en = $this->lang->load('web_lang','english');
			$data['shortname'] = "en";
			$data['language'] = $language;
		elseif ($language == "german"):
			$load_en = $this->lang->load('web_lang','german');
			$data['shortname'] = "de";
			$data['language'] = $language;
		else:
			
            if ($leng == 'ar'){
            	$this->lang->load('web_lang','spanish');
				$data['shortname'] = "es";
				$data['language'] = "spanish";
			}

			if ($leng == 'cl'){
            	$this->lang->load('web_lang','spanish');
				$data['shortname'] = "es";
				$data['language'] = "spanish";
			}

			if ($leng == 'mx'){
            	$this->lang->load('web_lang','spanish');
				$data['shortname'] = "es";
				$data['language'] = "spanish";
			}

			if ($leng == 'br'){
				$this->lang->load('web_lang','portuguese');
				$data['shortname'] = "pt";
				$data['language'] = "portuguese";
			}

			if ($leng == 'us'){
				$load_en = $this->lang->load('web_lang','english');
				$data['shortname'] = "en";
				$data['language'] = "english";
			}

		endif;

		$data["config"] = $this->page_model->get_config($data['language']);
		$this->template->write('title', $data["config"][0]->pageTitle, TRUE);
        
        $data["tipos"] = $this->page_model->get_categories($data['language']);
        
    
		$this->template->write_view('content', 'layout/about/about', $data);
		
		$this->template->write_view('header', 'layout/header', $data);
		 
	    
		$this->template->write_view('footer', 'layout/footer');   
	    
		
		//con el método render podemos renderizar y hacer que se visualice la template
	    $this->template->render();
	
		 //$this->load->view('welcome_message');
	}

	
}
