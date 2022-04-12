<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends CI_Controller {
	 
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
	 

	
	public function index(){
		//como hemos creado el grupo registro podemos utilizarlo
	    $this->template->set_template('template');
	    
		//añadimos los archivos css que necesitemoa
		$this->template->add_css('asset/css/usuarios.css');
		
		//añadimos los archivos js que necesitemoa
		$this->template->add_js('asset/js/usuarios.js?v='.time().'');
		
		//la sección header será el archivo views/registro/header_template
	    $this->template->write_view('header', 'layout/header');
		$this->template->write_view('nav', 'layout/nav');
	    
		//desde aquí también podemos setear el título
		$this->template->write('title', 'Administrador - Pauny', TRUE);
		$this->template->write('description', 'Administrador de contenidos', TRUE);
		$this->template->write('keywords', '', TRUE);

		$CI =& get_instance();

		$data["lang"] =  $this->page_model->get_countries();

		$info =  $this->page_model->get_config();		
		$data['info']=$info;

		$this->template->write_view('content', 'layout/config/edit', $data, TRUE); 
		$this->template->render();
	}
	  
	public function update(){
		if (isset($this->session->userdata['logged_in'])) {
			if(isset($_POST['administrator'])){$adminn = 1;}else{$adminn = 0;}

			$lang = $this->page_model->get_lang();

			foreach ($lang as $lan)
			{
				$data = array(
    				'page_title' => $_POST['title_'.$lan->{"abr"}.''],
                    'page_desc' => $_POST['desc_'.$lan->{"abr"}.''],
                    'hero_title' => $_POST['hero_title_'.$lan->{"abr"}.''],
                    'hero_desc' => $_POST['hero_desc_'.$lan->{"abr"}.''],
                    'intro_text' => $_POST['intro_text_'.$lan->{"abr"}.''],
                    'our_yatch_title' => $_POST['our_yatch_title_'.$lan->{"abr"}.''],
                    'our_yatch_desc' => $_POST['our_yatch_desc_'.$lan->{"abr"}.''],                    
                    
				);

				$this->db->where('uniq', $this->uri->segment(3));
				$this->db->where('lang', $_POST['id_idioma_'.$lan->{"abr"}.'']);
                $this->db->update('config', $data);
			} 

			redirect('config/');
		}else{
			redirect('login/');
		}
		
	}
 
	
	// Logout from admin page
	public function logout() {
		// Removing session data
		$sess_array = array(
		'username' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Successfully Logout';
		redirect('home/');
	}
	
	public function SendForm()
	{
		$parmsJSON = (isset($_POST['_p']))?$_POST['_p']:$_GET['_p'];
		$parmsJSON = urldecode(base64_decode ( $parmsJSON ));
		$JSON = new Services_JSON();
		$parmsJSON = $JSON->decode($parmsJSON);
		$asunto = $parmsJSON->{'asunto'};
		$mensaje = rawURLdecode($parmsJSON->{'mensaje'});
		$name = $parmsJSON->{'name'};
		$email = $parmsJSON->{'email'};
		$para = $parmsJSON->{'para'};
			
		$mAIL = new MAIL;
		$mAIL->From($email,$name);
        							
		$mAIL->AddTo($para);
		 $mAIL->Subject(utf8_encode($asunto));
									
	     $contact['message_body'] = $mensaje;
							        
		$mAIL->Html($contact['message_body']);
									
	 
		$cON = $mAIL->Connect("smtp.gmail.com", (int)465, "diego.mantovani@gmail.com", "p4t0f30p4t0f30", "tls") or die(print_r($mAIL->Result));
        $mAIL->Send($cON) ? $sent = true : $sent = false;
		$mAIL->Disconnect();
		
		
		if(!$sent) {
		 print '{"resultado":"NO","error":"'.$mAIL->Result.'"}';
		} else {
		  print '{"resultado":"OK"}';
		}

		exit;
			
	}
}
