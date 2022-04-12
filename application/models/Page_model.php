<?php

class page_model extends CI_Model
{


		public function __construct()
        {
			parent::__construct();
			// Your own constructor code
			$this->tblName = 'posts';
        }
        
        public $title;
        public $content;
        public $date;
		
		public function get_gallery_cat()
        {	
        	$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
			$this->db->select('gallery_cat.*');
				
			$this->db->order_by("gallery_cat.id","desc");
			$this->db->group_by("gallery_cat.uniq");
				
            $query = $this->db->get('gallery_cat');
            return $query->result();
        }		
		
		public function get_gallery($cat_id)
        {	
        	$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
			$this->db->select('gallery.*');
			
			$this->db->where("cat_id",$cat_id);
				
			$this->db->order_by("gallery.id","desc");
			$this->db->group_by("gallery.uniq");
				
            $query = $this->db->get('gallery');
            
            return $query->result();
        }
        
        public function get_destinations()
        {	
        	$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
				$this->db->select('destinations.*');
				
				$this->db->order_by("destinations.id","asc");
				$this->db->group_by("destinations.uniq");
				
                $query = $this->db->get('destinations');
                return $query->result();
        }
        
		public function get_procedimiento_id($id,$lang)
        {
				$this->db->where('uniq', $id);
				
				$this->db->where('lang.lang_name', $lang);
				$this->db->join('lang', 'lang.id = subcategorias.lang');
			
                $query = $this->db->get('subcategorias');
                return $query->result();
        }	
        
		public function get_mailing_id($id)
        {
				$this->db->where('id', $id);
                $query = $this->db->get('productos');
                return $query->result();
        }	


        public function insert_lead($data)
        {
        	$this->db->insert('leads', $data);
        }

        public function get_producto($id)
        {
        	$this->db->where('id', $id);
        	$result = $this->db->get('productos');
        	return $result->result();

        }
        
		public function get_mailings_blocks($email_id,$procedimiento)
        {
				$this->db->select('productos_modulos.*');
				$this->db->select("modulos.modulo");
				$this->db->select("modulos.html");
				$this->db->select("modulos.image");
				
				// where email
				$this->db->where("productos_modulos.email_id",$email_id);
				$this->db->where("(productos_modulos.id_procedimiento = 0 or productos_modulos.id_procedimiento ='".$procedimiento."')");
				
				
				$this->db->join("productos","productos.id = productos_modulos.email_id","inner");
				
				// join con modulos
				$this->db->join("modulos","modulos.id = productos_modulos.modulo_id","inner");


                $this->db->order_by("productos_modulos.orden","asc");
                
                
                $this->db->group_by("productos_modulos.id");
                				
				// joineo el pais
                $query = $this->db->get('productos_modulos');
                
                return $query->result();
        }
        
		// ---		
		// Obtengo las variables para renderizar
		// ---
		public function get_emailing_variables_render($email_id,$modulo_id, $lang)
		{
			$this->db->select("productos_modulos_variables.*");
			$this->db->select("modulos_variables.code");

			$this->db->where('lang.lang_name', $lang);
			$this->db->join('lang', 'lang.id = productos_modulos_variables.lang');

			$this->db->join("productos_modulos em","em.id = productos_modulos_variables.modulo_id","inner");
			
			$this->db->join("modulos_variables","modulos_variables.modulo_id = em.modulo_id and modulos_variables.id = productos_modulos_variables.variable_id","inner");
			
			$this->db->where("em.email_id",$email_id);
			$this->db->where("productos_modulos_variables.modulo_id",$modulo_id);
			
			// $this->db->group_by("emailing_modulos_variables.id");
			
			$query = $this->db->get('productos_modulos_variables');
			
//			print $this->db->last_query();
			
            $var = $query->result();
            
            
            
            return $var;
		}

		public function get_product_id($id, $lang)
		{	
			$this->db->select('productos.*');
			$this->db->where('productos.uniq', $id);

			$this->db->where('lang.lang_name', $lang);
			$this->db->join('lang', 'lang.id = productos.lang');


			$result = $this->db->get('productos');
			return $result->result();
		} 

		public function get_posicion_id($id, $lang)
		{	
			$this->db->select('posicionamientos_componentes.*');
			$this->db->where('posicionamientos_componentes.uniq', $id);

			$this->db->where('lang.lang_name', $lang);
			$this->db->join('lang', 'lang.id = posicionamientos_componentes.lang');


			$result = $this->db->get('posicionamientos_componentes');
			return $result->result();
		}  


		public function get_componente_id($id, $lang)
		{	
			$this->db->select('componentes.*');
			$this->db->where('componentes.uniq', $id);

			$this->db->where('lang.lang_name', $lang);
			$this->db->join('lang', 'lang.id = componentes.lang');


			$result = $this->db->get('componentes');
			return $result->result();
		}  


		public function get_componentes_producto($posicion, $producto, $lang)
		{	

			$this->db->select('componentes.nombre as componente');
			$this->db->select('componentes.codigo as codigo');
			$this->db->select('componentes.imagenes as imagenes');

			$this->db->where('producto_componentes.id_producto', $producto);
			$this->db->where('producto_componentes.id_posicionamiento', $posicion);

			$this->db->join('componentes','componentes.uniq = producto_componentes.id_componente');

			$this->db->where('lang.lang_name', $lang);
			$this->db->join('lang', 'lang.id = componentes.lang');

			$result = $this->db->get('producto_componentes');
			return $result->result();
		} 

		public function get_pads($posicion, $lang)
		{	

			$this->db->select('pads.*');

			$this->db->where('pads.id_posicionamiento', $posicion);


			$this->db->where('lang.lang_name', $lang);
			$this->db->join('lang', 'lang.id = pads.lang');

			$result = $this->db->get('pads');
			return $result->result();
		} 

		public function get_componentes_producto_posicionamiento($id, $id_procedimiento,$lang)
		{	
			$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
			$this->db->select('posicionamientos_componentes.nombre as posicion');
			$this->db->select('posicionamientos_componentes.uniq as uniq');
			$this->db->select('posicionamientos_componentes.imagen as imagen');
			$this->db->where('producto_componentes.id_producto', $id);
			$this->db->where('posicionamientos_componentes.id_procedimiento', $id_procedimiento);
			$this->db->group_by('producto_componentes.id_posicionamiento');
			$this->db->join('posicionamientos_componentes','posicionamientos_componentes.uniq = producto_componentes.id_posicionamiento');

			$this->db->where('lang.lang_name', $lang);
			$this->db->join('lang', 'lang.id = posicionamientos_componentes.lang');

			$result = $this->db->get('producto_componentes');
			return $result->result();
		}

		public function get_pads_posicionamiento($id_procedimiento,$lang)
		{	
			$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");

			$this->db->select('posicionamientos_componentes.nombre as posicion');
			$this->db->select('posicionamientos_componentes.uniq as uniq');
			$this->db->select('posicionamientos_componentes.imagen as imagen');

			$this->db->where('posicionamientos_componentes.id_procedimiento', $id_procedimiento);
			$this->db->group_by('pads.id_posicionamiento');
			$this->db->join('posicionamientos_componentes','posicionamientos_componentes.uniq = pads.id_posicionamiento');

			$this->db->where('lang.lang_name', $lang);
			$this->db->join('lang', 'lang.id = posicionamientos_componentes.lang');

			$result = $this->db->get('pads');
			return $result->result();
		}        
                
                
        public function get_posicionamientos($procedimiento=0,$producto_id=0,$lang)
        {	
        	$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
			$this->db->select('posicionamientos_componentes.*');
			
			if($procedimiento > 0) $this->db->where("posicionamientos_componentes.id_procedimiento",$procedimiento);

			$this->db->group_by('posicionamientos_componentes.uniq');
			$this->db->where('lang.lang_name', $lang);
			
			$this->db->where('producto_componentes.id_producto', $producto_id);

			$this->db->join('posicionamientos_componentes', 'posicionamientos_componentes.uniq = producto_componentes.id_posicionamiento');
			$this->db->join('lang', 'lang.id = posicionamientos_componentes.lang');

            $query = $this->db->get('producto_componentes');
            return $query->result();
        }
        
		// ---		
		// Build html
		// ---
		public function buildHTMLTemplate($email_id, $lang, $procedimiento)
		{
			$html = "";
			
			$mailing_info = $this->get_mailing_id($email_id);
 			
			$pais_id = $mailing_info[0]->pais_id;
			$pais_info = array(); // $this->get_paises_id($pais_id);
			
			
			$html.= "";
			
			// ---			
			// OK build body
			// ---
			$blocks = $this->get_mailings_blocks($email_id, $procedimiento);
			
			foreach($blocks as $b)
			{
				$html_modulo = "";
				$html_modulo = $b->html;
				
				// ---				
				// Reemplazo variables -- EN CONSTRUCCION
				// ---
				$variables = $this->get_emailing_variables_render($email_id,$b->id, $lang);
				
//				print_r($variables);
				foreach($variables as $v)
				{
					$html_modulo = str_replace("%".$v->code."%",$v->valor,$html_modulo);
				}
				
				
				// --
				// Parseo el procedimiento para buscar todos los posicionamiento
				if($b->id_procedimiento > 0)
				{
					$html_posicionamiento = "";
					$posic = $this->get_posicionamientos($b->id_procedimiento,$email_id,$lang);
					
					// obtengo la imagen del tipo de cirugia
					$procedimiento_array = $this->get_procedimiento_id($b->id_procedimiento,$lang);
					
					$background = base_url().'asset/img/uploads/'.$procedimiento_array[0]->background;
					
					foreach($posic as $pos){
						
						$html_posicionamiento.= '
							<div class="item">
								<a href="'.base_url().'componentes?ver='.$email_id.'&procedmiento='.$b->id_procedimiento.'&quiofano='.$_GET["quiofano"].'&posicion='.$pos->uniq.'" class="content-procd">
								<h3>'.$pos->nombre.'</h3>
								<div class="background-img-posi" style="background:url(\''.base_url().'asset/img/uploads/'.$pos->imagen.'\')"></div>
								</a>
							</div>
						';
					}
				}

				$html_modulo = str_replace("%base_url%",base_url(),$html_modulo);
				$ver = explode( '_g_', "_g_ver");	
				$procedmiento = explode( '_g_', "_g_procedmiento");	
				$quiofano = explode( '_g_', "_g_quiofano");	
				$html_modulo = str_replace("%_g_ver%",$_GET[$ver[1]],$html_modulo);				
				$html_modulo = str_replace("%_g_procedmiento%",$_GET[$procedmiento[1]],$html_modulo);				
				$html_modulo = str_replace("%_g_quiofano%",$_GET[$quiofano[1]],$html_modulo);
							
				// background del procedimiento
				$html_modulo = str_replace("%_g_background_procedimiento%",$background,$html_modulo);			
						
					
				// ---				
				// Deberia generar el eval, para sacar lo q no tenga texto
				// ---
				
				
				//$html_final = eval($html_modulo);

    			$html.= eval($html_modulo);
    			$html = str_replace("%_g_posicionamientos%",$html_posicionamiento,$html);
    			//$html .= $html_modulo;
			}
			 
			
			// ---			
			// Reemplazo los legales del footer.
			
			// legales del mailing
			$legales = "";
			
//			$legales.= "<br>";
			
			// agrego legales del pais
//			$legales.= $pais_info[0]->legales;
			
//			$pais_info[0]->footer = str_replace("%legales%",$legales,$pais_info[0]->footer);
			
			$html.= "";	
			
			
		 	
			// ---
			// ACA deberia reemplazar todos los links con sus respectivos UTM
			// --
			preg_match_all('/<a href="(.*?)"/s', $html, $matches);
			
			
			// ---
			// Reemplazo $matches[1] con los UTM_sources correspondientes
			if(false):
			foreach($matches[1] as $link)
			{
				$link_final = $link;
				
				// ok veo si tengo que poner UTM, sino lo pongo.
				$pos = strpos($link, "utm_source");
				if ($pos === false)
				{
					$start = "?";
					// ---
					// no esta, lo tengo que agregar
					// ---	
					// veo si lo agrego con ? o con &
					$pos2 = strpos($link, '&');
					if ($pos2 === false)
					{
						$start="?";
					}
					
					
					if(strlen(trim($link)) <=1)
					{
						
						   
					}
					else
					{
						$link_final = $link.$start."utm_medium=".$mailing_info[0]->utm_medium."&utm_source=".$mailing_info[0]->utm_source."-".$mailing_info[0]->version;
					}
					
					// ok reemplazo
					$html = str_ireplace('"'.$link.'"','"'.$link_final.'"',$html);					
				}
				else
				{
					// ---
					// ya lo tiene, no hago nada
					// 	..
					
				}
			}
			endif;
			return $html;
		}
		
		public function get_config($lang)
        {		
        		$this->db->select('config.*');
        		$this->db->where('lang.lang_name', $lang);
        		$this->db->join('lang', 'lang.id = config.lang');
                $query = $this->db->get('config');
                return $query->result();
        }	
        
        public function get_categories($lang)
        {		
	        return "";
        		$this->db->select('categorias.*');
                $this->db->where("lang.lang_name", $lang);
                $this->db->join('lang', 'lang.id = categorias.lang');
                $query = $this->db->get('categorias');
                return $query->result();
        }

        public function get_procedimiento($id,$lang)
        {		
        		$this->db->select('subcategorias.*');
                $this->db->where("subcategorias.uniq", $id);
                $this->db->where("lang.lang_name", $lang);
                $this->db->join('lang', 'lang.id = subcategorias.lang');
                $query = $this->db->get('subcategorias');
                return $query->result();
        }

        public function get_quirofanos($lang)
        {		
        		$this->db->select('quirofanos.*');
                $this->db->where("lang.lang_name", $lang);
                $this->db->join('lang', 'lang.id = quirofanos.lang');
                $query = $this->db->get('quirofanos');
                return $query->result();
        }

        public function get_quirofano($id,$lang)
        {		
        		$this->db->select('quirofanos.*');
                $this->db->where("quirofanos.uniq", $id);
                $this->db->where("lang.lang_name", $lang);
                $this->db->join('lang', 'lang.id = quirofanos.lang');
                $query = $this->db->get('quirofanos');
                return $query->result();
        }	
        
		public function get_subcategoria_id($id,$lang)
        {	
        	$this->db->select('subcategorias.*');
    		$this->db->where('uniq', $id);
            $this->db->where("lang.lang_name", $lang);
            $this->db->join('lang', 'lang.id = subcategorias.lang');
            $query = $this->db->get('subcategorias');
            return $query->result();
        }
        
		public function get_categoria_id($id, $lang)
        {
    		$this->db->where('uniq', $id);
            $this->db->where("lang.lang_name", $lang);
            $this->db->join('lang', 'lang.id = categorias.lang');
            $query = $this->db->get('categorias');
            return $query->result();
        }
        
		public function get_productos_subcategoria($id)
        {
    		$this->db->where('subcategoria_id', $id);
            $this->db->where("lang",5);
            $query = $this->db->get('productos');
            return $query->result();
        }

        public function get_tipos($lang)
        {	
        	$this->db->select('tipos.*');
        	$this->db->where('lang.lang_name', $lang);
        	$this->db->group_by('uniq');
        	$this->db->join('lang', 'lang.id = tipos.lang');
        	$result = $this->db->get('tipos');
        	return $result->result();
        }
        public function get_all_superficies($lang)
        {

        	$this->db->select('productos.*');
        	if(isset($_GET['superficie'])):
        		$this->db->where('tipo', $_GET['superficie']);
        	endif;

        	if(isset($_GET['nivel'])):
        		$this->db->where('niveles_superficies.nivel', $_GET['nivel']);
        		$this->db->join('niveles_superficies', 'niveles_superficies.id_superficie = productos.uniq');
        	endif;

        	$this->db->order_by('productos.orden', 'asc');

        	$this->db->where('lang.lang_name', $lang);
        	$this->db->join('lang', 'lang.id = productos.lang');

            $query = $this->db->get('productos');
            return $query->result();
        }

        public function get_productos($lang)
        {

        	$this->db->select('productos.*');
        	if(isset($_GET['superficie'])):
        		$this->db->where('tipo', $_GET['superficie']);
        	endif;

        	if(isset($_GET['nivel'])):
        		$this->db->where('niveles_superficies.nivel', $_GET['nivel']);
        		$this->db->join('niveles_superficies', 'niveles_superficies.id_superficie = productos.uniq');
        	endif;

        	$this->db->order_by('productos.orden', 'asc');

        	$this->db->where('lang.lang_name', $lang);
        	$this->db->join('lang', 'lang.id = productos.lang');

            $query = $this->db->get('productos');
            return $query->result();
        }	        	
        
		public function get_sub_categorias($categoria_id, $lang)
        {
        	$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
				$this->db->select('subcategorias.*');	
				$this->db->order_by('subcategorias.nombre', 'asc');
				
				$this->db->where("categoria_id",$categoria_id);
                
                $this->db->where("lang.lang_name", $lang);
                $this->db->join('lang', 'lang.id = subcategorias.lang');
				
				$this->db->order_by("subcategorias.id","desc");
				$this->db->group_by("subcategorias.uniq");
				
                $query = $this->db->get('subcategorias');
                return $query->result();
        }
        
        
		// ---		
		// Save newsletters into database
		// ---
		public function save_newsletter($post)
		{
			if(isset($post["email"]) && strlen($post["email"]) > 0)
			{
				$this->db->set("email",$_POST["email"]);
				$this->db->set("added_at",time());
				$this->db->set("modified_at",time());
				$this->db->insert('newsletters');		
			}
		}

		public function get_categorias()
        {
				$this->db->select('categorias.*');
				
				$this->db->order_by("categorias.id","desc");
				
                $query = $this->db->get('categorias');
                return $query->result();
        }

 

		public function get_logos()
        {
				$this->db->select('logos.*');
				$this->db->order_by("logos.id","desc");
                $query = $this->db->get('logos');
                return $query->result();
        }
        
		public function getRows($params = array()){
	        $this->db->select('*');
	        $this->db->from($this->tblName);
	        
	        //fetch data by conditions
	        if(array_key_exists("where",$params)){
	            foreach ($params['where'] as $key => $value){
	                $this->db->where($key,$value);
	            }
	        }
	        
	        if(array_key_exists("order_by",$params)){
	            $this->db->order_by($params['order_by']);
	        }
	        
	        if(array_key_exists("id",$params)){
	            $this->db->where('id',$params['id']);
	            $query = $this->db->get();
	            $result = $query->row_array();
	        }else{
	            //set start and limit
	            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
	                $this->db->limit($params['limit'],$params['start']);
	            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
	                $this->db->limit($params['limit']);
	            }
	            
	            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
	                $result = $this->db->count_all_results();
	            }else{
	                $query = $this->db->get();
	                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
	            }
	        }

	        //return fetched data
	        return $result;
	    }
		
}

?>