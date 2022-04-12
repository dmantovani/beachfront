<?php

class page_model extends CI_Model
{


		public function __construct()
        {
			parent::__construct();
			// Your own constructor code
        }
		
		public function fix_orden_nulo($email_id)
		{
			$this->db->where("email_id",$email_id);
			$this->db->where("orden is null");
			$query = $this->db->get('productos_modulos');
            $var = $query->result();
            
            foreach($var as $v)
            {
	            
	            // getting ultimo bloque, para poner el ultimo +1
	            $ultimo = $this->page_model->get_ultimo_orden($email_id);
	            
	            // ok update
				$this->db->where('id', $v->id);
				$this->db->set('orden', ($ultimo+1));
				$this->db->update('productos_modulos');	            
            }
		}
        
		public function remove_mailing_block()
        {
				$this->db->where('id', $this->uri->segment(3));
                $this->db->delete('productos_modulos');
        }

        public function remove_producto_opcioanl()
        {
				$this->db->where('id', $this->uri->segment(3));
                $this->db->delete('producto_opcionales');
        }

        public function remove_producto_componente()
        {
				$this->db->where('id', $this->uri->segment(3));
                $this->db->delete('producto_componentes');
        }
		
        
		public function update_order_banner($data)
        {
				$orden = explode(',',$data['orden']);
				$ids = explode(',',$data['ids']);
				$i=0;
				foreach ( $ids as $id ){
					$this->db->set('orden', $orden[$i]);
					$this->db->where('id', $id);
					$this->db->update('productos_modulos');
					$i++;
				}
        }
        
		public function get_value_module_id($lang,$module_id,$variable_id)
		{
			$this->db->where("lang",$lang);
			$this->db->where("modulo_id",$module_id);
			$this->db->where("uniq",$variable_id);
			$this->db->where("variable_id",$variable_id);
			$query = $this->db->get('productos_modulos_variables');
			if($query->num_rows() != 0):
	            $var = $query->result();
	            return $var[0]->valor;
        	else:
        		//$this->db->where("lang",0);
        		$this->db->where("modulo_id",$module_id);
        		$this->db->where("variable_id",$variable_id);
        		$query2 = $this->db->get('productos_modulos_variables');
        		$var = $query2->result();
        		return $var[0]->valor;
        	endif;
		}
        
        public function get_block_variables($block_id)
        {
        	$this->db->select("modulos_variables.*");
        	
        	$this->db->where('productos_modulos.id', $block_id);
        	$this->db->join("productos_modulos","productos_modulos.modulo_id = modulos_variables.modulo_id","inner");
        	
        	$query = $this->db->get('modulos_variables');
            return $query->result();	        
        }
        

                
        public function get_all_modules()
        {
			$this->db->select('modulos.*');
            $query = $this->db->get('modulos');
            return $query->result();	        
        }
         
        
		public function get_mailings_blocks($email_id)
        {
				$this->db->select('productos_modulos.*');
				$this->db->select("modulos.modulo");
				$this->db->select("modulos.html");
				$this->db->select("modulos.image");
				
				// where email
				$this->db->where("productos_modulos.email_id",$email_id);
				
				
				$this->db->join("productos","productos.id = productos_modulos.email_id","inner");
				
				// join con modulos
				$this->db->join("modulos","modulos.id = productos_modulos.modulo_id","inner");


                $this->db->order_by("productos_modulos.orden","asc");
                				
				// joineo el pais
                $query = $this->db->get('productos_modulos');
                
                return $query->result();
        }
        
		// --
		public function get_ultimo_orden($email_id)
		{
			$this->db->where("email_id",$email_id);
			$this->db->order_by("orden","desc");
			
			$this->db->limit(1);
			$query = $this->db->get('productos_modulos');
            $var = $query->result();

            if($query->num_rows() > 0)
            {
	            return $var[0]->orden;
	        }
			
			return 0;
		}
        
        
		public function update_modulo($data)
        {
			$this->db->set('modulo', $data['modulo']);
			$this->db->set('html', $data['html']);
			$this->db->where('id', $this->uri->segment(3));
            $this->db->update('modulos');
        }


        public function update_producto_componente($data)
        {
			$this->db->where('id', $this->uri->segment(3));
            $this->db->update('producto_componentes', $data);
        }

        public function update_producto_opcional($data)
        {
			$this->db->where('id', $this->uri->segment(3));
            $this->db->update('producto_opcionales', $data);
        }
        
		public function get_modulo_variables_id($id)
		{
			$this->db->where("id",$id);
			$query = $this->db->get('modulos_variables');
            return $query->result();
		}
        
	public function remove_modulo()
        {
				$this->db->where('id', $this->uri->segment(3));
                $this->db->delete('modulos');
        }
                
		public function get_modulo_variables($modulo_id)
		{
			$this->db->where("modulo_id",$modulo_id);
			$query = $this->db->get('modulos_variables');
            return $query->result();
		}
        
		public function get_modulo_id($id)
        {
				$this->db->where('id', $id);
                $query = $this->db->get('modulos');
                return $query->result();
        }
        
		public function get_modulos()
        {
				$this->db->select('modulos.*');
                $query = $this->db->get('modulos');
                return $query->result();
        }
		
		
		public function get_contacts()
		{
			$query = $this->db->get('contacts');			
			return $query->result();			
		}
		/*COUNTRIES*/
		public function get_countries() {	
			$query = $this->db->get('lang');			
			return $query->result();
		}
		
		public function get_full_countries() {
			$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
			$this->db->group_by('country_name');
			$this->db->where('continent_code','SA');
			$this->db->or_where('continent_code','NA');
			$query = $this->db->get('states');			
			return $query->result();
		}
		
		//
		public function get_mail_asignado($email)
		{
			$this->db->select("*");
			$this->db->where("email",$email);
			$this->db->where("vendedor_id > 0");
			$query = $this->db->get('presupuestos');
            
            $presupuesto = $query->result();
            
            if(isset($presupuesto[0]->vendedor_id) && $presupuesto[0]->vendedor_id > 0)
            {
            	return $this->get_vendedor_name_by_id($presupuesto[0]->vendedor_id);
            }
			
			return false;            
		}


		public function countDashboard()
        {
                // $this->db->select("(select count(*) as eventos from presupuestos_eventos where presupuestos_eventos.presupuesto_id = presupuestos.id) as eventoskount");
                // $this->db->select('presupuestos.*');
                // $this->db->select("pe.estado");
                // $this->db->select("pe.color");
                // $this->db->select("user_login.name as user_name");
                // $this->db->select("user_login.lastname as user_lastname");
                // $this->db->select("vend.nombre as inspector");
                // $this->db->select("con.nombre as consecionaria");
                
                $this->db->select("presupuestos.estado_id");
                
                $this->db->select("count(*) as kant_total");

                // --
				// si es vendedor de la mutual
				// --
                if($this->session->userdata['logged_in']['administrator']==0)
                {
    				$this->db->where("presupuestos.vendedor_id",$this->session->userdata['logged_in']['vendedor_id']);
                } else {
                	//$this->db->where("presupuestos.vendedor_id",$this->session->userdata['logged_in']['vendedor_id']);
                }
                	
				if(isset($_POST["fecha_inicio"]) && strlen($_POST["fecha_inicio"]) > 0)
				{
					$this->db->where("presupuestos.added_at >= ".strtotime($_POST["fecha_inicio"]));
				}
				
				if(isset($_POST["fecha_fin"]) && strlen($_POST["fecha_fin"]) > 0)
				{
					$this->db->where("presupuestos.added_at <= ".strtotime($_POST["fecha_fin"]));
				}
				
				if(isset($_POST["estado"]) && $_POST["estado"] > 0)
				{
					$this->db->where("presupuestos.estado_id",$_POST["estado"]);
				}
				
				if(isset($_POST["inspector"]) && $_POST["inspector"] > 0)
				{
					$this->db->where("vend.id",$_POST["inspector"]);
				}
				
				// para 
				if(isset($_POST["vendedor_id"]) && $_POST["vendedor_id"] > 0)
				{
					$this->db->where("presupuestos.vendedor_id",$_POST["vendedor_id"]);
				}
				
				if(isset($_GET["concesionario"]) && $_GET["concesionario"] > 0)
				{
					$this->db->where("con.id",$_GET["concesionario"]);
				}

				$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
				$this->db->group_by("presupuestos.email");
                $this->db->order_by('presupuestos.modified_at', 'DESC');
                
                $query = $this->db->get('presupuestos');
                return $query->result();
        }

        public function countDashboardSinAsignar()
        {
                // $this->db->select("(select count(*) as eventos from presupuestos_eventos where presupuestos_eventos.presupuesto_id = presupuestos.id) as eventoskount");
                // $this->db->select('presupuestos.*');
                // $this->db->select("pe.estado");
                // $this->db->select("pe.color");
                // $this->db->select("user_login.name as user_name");
                // $this->db->select("user_login.lastname as user_lastname");
                // $this->db->select("vend.nombre as inspector");
                // $this->db->select("con.nombre as consecionaria");
                
                $this->db->select("presupuestos.estado_id");
                
                $this->db->select("count(*) as kant_total");

                if(isset($_POST["fecha_inicio"]) && strlen($_POST["fecha_inicio"]) > 0)
				{
					$this->db->where("presupuestos.added_at >= ".strtotime($_POST["fecha_inicio"]));
				}
				
				if(isset($_POST["fecha_fin"]) && strlen($_POST["fecha_fin"]) > 0)
				{
					$this->db->where("presupuestos.added_at <= ".strtotime($_POST["fecha_fin"]));
				}

                $this->db->where("presupuestos.vendedor_id", NULL);
				$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
				$this->db->group_by("presupuestos.email");
                $this->db->order_by('presupuestos.modified_at', 'DESC');
                
                $query = $this->db->get('presupuestos');
                return $query->result();
        }
		
		
		
		// ---		
		// Get clientes presupuestos
		// ---
		public function get_clientes_presupuestos()
		{
				$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
        		$this->db->select("(select count(*) as eventos from presupuestos_eventos where presupuestos_eventos.presupuesto_id = presupuestos.id) as eventoskount");
				$this->db->select('presupuestos.*');
				$this->db->select("pe.estado");
				$this->db->select("pe.color");
				$this->db->select("user_login.name as user_name");
				$this->db->select("user_login.lastname as user_lastname");
//                $this->db->select("vend.nombre as inspector");
//				$this->db->select("con.nombre as consecionaria");

				$this->db->join("user_login","user_login.id = presupuestos.vendedor_id","left");
				$this->db->join("presupuestos_estados pe","pe.id = presupuestos.estado_id","left");
				
				$this->db->where("presupuestos.vendedor_id > 0");

				$this->db->where("presupuestos.mostrar", "si");

				// --
				// si es vendedor de la mutual
				// --
                if($this->session->userdata['logged_in']['administrator']==0)
                {
    				$this->db->where("presupuestos.vendedor_id",$this->session->userdata['logged_in']['vendedor_id']);
                } else {
                	//$this->db->where("presupuestos.vendedor_id",$this->session->userdata['logged_in']['vendedor_id']);
                }
                	
				if(isset($_POST["desde"]) && strlen($_POST["desde"]) > 0)
				{
					$this->db->where("presupuestos.added_at >= ".strtotime($_POST["desde"]));
				}
				
				if(isset($_POST["hasta"]) && strlen($_POST["hasta"]) > 0)
				{
					$this->db->where("presupuestos.added_at <= ".strtotime($_POST["hasta"]));
				}
				
				if(isset($_POST["estado"]) && $_POST["estado"] > 0)
				{
					$this->db->where("presupuestos.estado_id",$_POST["estado"]);
				}
				
				if(isset($_POST["inspector"]) && $_POST["inspector"] > 0)
				{
					$this->db->where("vend.id",$_POST["inspector"]);
				}

				if(isset($_POST["search_text"]) && strlen($_POST["search_text"]) > 1)
				{
    				$this->db->group_start();
    				$this->db->like('presupuestos.cliente', $_POST["search_text"]);
    				$this->db->or_like('nombre', $_POST["search_text"]);
    				$this->db->or_like('apellido', $_POST["search_text"]);
    				$this->db->or_like('provincia', $_POST["search_text"]);
    				$this->db->or_like('localidad', $_POST["search_text"]);
    				$this->db->or_like('telefono', $_POST["search_text"]);
    				$this->db->or_like('email', $_POST["search_text"]);
	    			$this->db->group_end();
				}
				
				// para 
				if(isset($_POST["vendedor_id"]) && $_POST["vendedor_id"] > 0)
				{
					$this->db->where("presupuestos.vendedor_id",$_POST["vendedor_id"]);
				}
				
				if(isset($_GET["concesionario"]) && $_GET["concesionario"] > 0)
				{
					$this->db->where("con.id",$_GET["concesionario"]);
				}

				
				$this->db->group_by("presupuestos.email");
                $this->db->order_by('presupuestos.modified_at', 'DESC');
				
				$query = $this->db->get('presupuestos');
                return $query->result();
		}

		public function insert_registro($data)
        {	
        
        	// insert into database
        	$this->db->insert('presupuestos', $data);
        }
		
		
		public function insert_producto_componente($data)
		{
		    $this->db->insert('producto_componentes', $data);
		}

		public function insert_producto_opcioanl($data)
		{
		    $this->db->insert('producto_opcionales', $data);
		}

		
		public function insert_countries($data)
		{
        	$this->db->insert('lang', $data);			
		}
		
		// --
		/// Presupuestos sin asignar
		// --
		public function get_clientes_presupuestos_sin_asignar()
		{
				$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
        		$this->db->select("(select count(*) as eventos from presupuestos_eventos where presupuestos_eventos.presupuesto_id = presupuestos.id) as eventoskount");
				$this->db->select('presupuestos.*');
				$this->db->select("pe.estado");
				$this->db->select("pe.color");
				$this->db->select("user_login.name as user_name");
				$this->db->select("user_login.lastname as user_lastname");
//                $this->db->select("vend.nombre as inspector");
//				$this->db->select("con.nombre as consecionaria");


				$this->db->join("user_login","user_login.id = presupuestos.vendedor_id","left");
				$this->db->join("presupuestos_estados pe","pe.id = presupuestos.estado_id","left");
				
				
				$this->db->where("presupuestos.vendedor_id is null");
				
				// joineo inspector.
//				$this->db->join("consecionarios con","con.id = user_login.consecionario_id","inner");
//				$this->db->join("vendedores vend","vend.id = con.vendedor_agrometal");
				
				// vendedor consecionaria, solamente vé sus presupuestos
				/*
				if($this->session->userdata['logged_in']['rol_id']==5)
				{
					$this->db->where("presupuestos.vendedor_id",$this->session->userdata['logged_in']['id']);
				}
                
                // si es inspector de zona
                if($this->session->userdata['logged_in']['rol_id']==2)
                {
    				$this->db->where("vend.user_id",$this->session->userdata['logged_in']['id']);
                }

                if($this->session->userdata['logged_in']['rol_id']==4)
                {
                    $this->db->where("con.id",$this->session->userdata['logged_in']['consecionario_id']);
                }
				*/
				if(isset($_POST["desde"]) && strlen($_POST["desde"]) > 0)
				{
					$this->db->where("presupuestos.added_at >= ".strtotime($_POST["desde"]));
				}
				
				if(isset($_POST["hasta"]) && strlen($_POST["hasta"]) > 0)
				{
					$this->db->where("presupuestos.added_at <= ".strtotime($_POST["hasta"]));
				}
				
				if(isset($_POST["estado"]) && $_POST["estado"] > 0)
				{
					$this->db->where("presupuestos.estado_id",$_POST["estado"]);
				}
				
				if(isset($_POST["inspector"]) && $_POST["inspector"] > 0)
				{
					$this->db->where("vend.id",$_POST["inspector"]);
				}
				
				// para 
				if(isset($_POST["concesionario"]) && $_POST["concesionario"] > 0)
				{
					$this->db->where("con.id",$_POST["concesionario"]);
				}
				
				if(isset($_GET["concesionario"]) && $_GET["concesionario"] > 0)
				{
					$this->db->where("con.id",$_GET["concesionario"]);
				}

				$this->db->group_by("presupuestos.email");
                $this->db->order_by('presupuestos.modified_at', 'DESC');
				
				$query = $this->db->get('presupuestos');
                return $query->result();
		}
		
        public function get_pasos_id($presupuesto_id)
        {
        	$this->db->select("*");
        	$this->db->where('presupuesto_id', $presupuesto_id);
        	
        	$query = $this->db->get('presupuestos_pasos');
            return $query->result();
        }
        
        public function get_presupuesto_id($id)
        {
				$this->db->where('id', $id);
                $query = $this->db->get('presupuestos');
                return $query->result();
        }
        
        public function get_motivos_estados($evento_id)
        {
			 $this->db->select('*');
			 $this->db->where("evento_id",$evento_id);
			 $this->db->order_by("id","desc");
			 $query = $this->db->get('motivos');
             return $query->result();  
        }

		public function add_evento($data)
        {
            $this->db->insert('presupuestos_eventos', $data);
        }
        
        public function log_eventos($presupuesto_id)
        {
				$this->db->select("presupuestos_eventos.*");
				$this->db->select("pe.estado");
				$this->db->select("pe.color");
				
                $this->db->where("presupuesto_id",$presupuesto_id);
                
                $this->db->join("presupuestos_estados pe","pe.id = presupuestos_eventos.estado_id","inner");
                $this->db->order_by("presupuestos_eventos.added_at","desc");
                
                $query = $this->db->get('presupuestos_eventos');
                return $query->result();
        }
		
		public function get_presupuestos($email)
        {	
        	$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
        		$this->db->select("(select count(*) as eventos from presupuestos_eventos where presupuestos_eventos.presupuesto_id = presupuestos.id) as eventoskount");
				$this->db->select('presupuestos.*');
				$this->db->select("pe.estado");
				$this->db->select("pe.color");
				$this->db->select("user_login.name as user_name");
				$this->db->select("user_login.lastname as user_lastname");
				$this->db->select("motivos.nombre as motivo_nombre");
//				$this->db->select("productos.nombre as nombre_producto");
				
//				$this->db->select("vend.nombre as inspector");

//				$this->db->select("distancia_entre_hileras.modelo as modelo");
				$this->db->select("'' as modelo2");
				
//				$this->db->join("productos","productos.id = presupuestos.producto_id","left");
//				$this->db->join("distancia_entre_hileras","distancia_entre_hileras.id = presupuestos.distancia_hileras_id","left");
				
				$this->db->join("user_login","user_login.id = presupuestos.vendedor_id","left");
				$this->db->join("presupuestos_estados pe","pe.id = presupuestos.estado_id","left");
				
				// joineo inspector.
//				$this->db->join("consecionarios con","con.id = user_login.consecionario_id","inner");
//				$this->db->join("vendedores vend","vend.id = con.vendedor_agrometal");
				
				/*
				if(isset($_POST["desde"]) && strlen($_POST["desde"]) > 0)
				{
					$this->db->where("presupuestos.added_at >= ".strtotime($_POST["desde"]));
				}
				
				if(isset($_POST["hasta"]) && strlen($_POST["hasta"]) > 0)
				{
					$this->db->where("presupuestos.added_at <= ".strtotime($_POST["hasta"]));
				}
				
				if(isset($_POST["estado"]) && $_POST["estado"] > 0)
				{
					$this->db->where("presupuestos.estado_id",$_POST["estado"]);
				}
				*/
				
				
				if(isset($email) && strlen($email) >= 0)
				{
					$this->db->where("presupuestos.email",$email);
				}
				/*
                if($this->session->userdata['logged_in']['rol_id']==5)
                {
                    $this->db->where("presupuestos.vendedor_id",$this->session->userdata['logged_in']['id']);
                }
                
                if($this->session->userdata['logged_in']['rol_id']==2)
                {
    				$this->db->where("vend.user_id",$this->session->userdata['logged_in']['id']);
                }
				*/
				
				//if($this->session->userdata['logged_in']['administrator']==0)
				//{
				//	$this->db->where("presupuestos.vendedor_id",$this->session->userdata['logged_in']['id']);
				//}
				
				$this->db->join("motivos","motivos.id = presupuestos.motivo_id","left");
				

				$this->db->group_by("presupuestos.id");
				
				$query = $this->db->get('presupuestos');
                return $query->result();
        }
        
		public function get_presupuestos_sin_asignar($email)
        {
        		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
        		$this->db->select("(select count(*) as eventos from presupuestos_eventos where presupuestos_eventos.presupuesto_id = presupuestos.id) as eventoskount");
				$this->db->select('presupuestos.*');
				$this->db->select("pe.estado");
				$this->db->select("pe.color");
				$this->db->select("user_login.name as user_name");
				$this->db->select("user_login.lastname as user_lastname");
				$this->db->select("motivos.nombre as motivo_nombre");
//				$this->db->select("productos.nombre as nombre_producto");
				
//				$this->db->select("vend.nombre as inspector");

//				$this->db->select("distancia_entre_hileras.modelo as modelo");
				$this->db->select("'' as modelo2");
				
//				$this->db->join("productos","productos.id = presupuestos.producto_id","left");
//				$this->db->join("distancia_entre_hileras","distancia_entre_hileras.id = presupuestos.distancia_hileras_id","left");
				
				$this->db->join("user_login","user_login.id = presupuestos.vendedor_id","left");
				$this->db->join("presupuestos_estados pe","pe.id = presupuestos.estado_id","left");
				if($this->session->userdata['logged_in']['rol_id'] != 0){
					$this->db->where("vendedor_id is null");
				}
				
				// joineo inspector.
//				$this->db->join("consecionarios con","con.id = user_login.consecionario_id","inner");
//				$this->db->join("vendedores vend","vend.id = con.vendedor_agrometal");
				
				/*
				if(isset($_POST["desde"]) && strlen($_POST["desde"]) > 0)
				{
					$this->db->where("presupuestos.added_at >= ".strtotime($_POST["desde"]));
				}
				
				if(isset($_POST["hasta"]) && strlen($_POST["hasta"]) > 0)
				{
					$this->db->where("presupuestos.added_at <= ".strtotime($_POST["hasta"]));
				}
				
				if(isset($_POST["estado"]) && $_POST["estado"] > 0)
				{
					$this->db->where("presupuestos.estado_id",$_POST["estado"]);
				}
				*/
				
				
				if(isset($email) && strlen($email) >= 0)
				{
					$this->db->where("presupuestos.email",$email);
				}
				/*
                if($this->session->userdata['logged_in']['rol_id']==5)
                {
                    $this->db->where("presupuestos.vendedor_id",$this->session->userdata['logged_in']['id']);
                }
                
                if($this->session->userdata['logged_in']['rol_id']==2)
                {
    				$this->db->where("vend.user_id",$this->session->userdata['logged_in']['id']);
                }
				*/
				
				//if($this->session->userdata['logged_in']['administrator']==0)
				//{
				//	$this->db->where("presupuestos.vendedor_id",$this->session->userdata['logged_in']['id']);
				//}
				
				$this->db->join("motivos","motivos.id = presupuestos.motivo_id","left");
				

				$this->db->group_by("presupuestos.id");
				
				$query = $this->db->get('presupuestos');
                return $query->result();
        }
		
        public function get_presupuestos_estados()
        {
			 $this->db->select('*');
			 $this->db->order_by("id","asc");
			 $query = $this->db->get('presupuestos_estados');
             return $query->result();  
        }
        
		
        public function login($data) {

			$condition = "user_login.user_name =" . "'" . $data['username'] . "' AND " . "user_login.user_password =" . "'" . $data['password'] . "'";
			$this->db->select('user_login.*');
//			$this->db->join('provincia', 'provincia.id = user_login.provinciaId', 'left');
			$this->db->from('user_login');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() == 1) {
				return true;
			} else {
				return false;
			}
		}
		public function checkuser($user) {

			$condition = "user_name =" . "'" . $user . "'";
			$this->db->select('*');
			$this->db->from('user_login');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() == 1) {
				return true;
			} else {
				return false;
			}
		}

			// Read data from database to show data in admin page
		public function read_user_information($username) {
			$condition = "user_name =" . "'" . $username . "'";
			$this->db->select('user_login.*');
//			$this->db->join('provincia', 'provincia.id = user_login.provinciaId', 'left');
			$this->db->from('user_login');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() == 1) {
				return $query->result();
			} else {
				return false;
			}
		}
			
		public function get_banners()
        {
				$this->db->select('banner.*, provincia.provincia');
				if($this->session->userdata['logged_in']['administrator']==0){
					$this->db->where('sede.provinciaId',$this->session->userdata['logged_in']['provinciaId']);
				}
				$this->db->join('provincia', 'provincia.id = banner.provinciaId', 'left');
                $query = $this->db->get('banner');
                return $query->result();
        }
		public function get_banner_id($id)
        {
				$this->db->where('id', $id);
                $query = $this->db->get('banner');
                return $query->result();
        }	
		
		public function get_sedes()
        {
				$this->db->select('sede.*, provincia.provincia');
				if($this->session->userdata['logged_in']['administrator']==0){
					$this->db->where('sede.provinciaId',$this->session->userdata['logged_in']['provinciaId']);
				}
				$this->db->join('provincia', 'provincia.id = sede.provinciaId', 'left');
                $query = $this->db->get('sede');
                return $query->result();
        }
        
        public function get_countries_id($id)
        {
				$this->db->where('id', $id);
                $query = $this->db->get('lang');
                return $query->result();	        
        }
        
        
		public function get_sede_id($id)
        {
				$this->db->where('id', $id);
                $query = $this->db->get('sede');
                return $query->result();
        }	
		public function get_cursos()
        {	
        	$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
				$this->db->select('curso.*, categoria.categoria');
				if($this->session->userdata['logged_in']['administrator']==0){
					$this->db->where('curso_provincia.provinciaId',$this->session->userdata['logged_in']['provinciaId']);
				}
				$this->db->join('curso_provincia', 'curso_provincia.cursoId = curso.id', 'left');
				$this->db->join('categoria', 'categoria.id = curso.categoriaId', 'left');
                $this->db->order_by('curso.destacado','desc');
				$this->db->group_by('curso.id');
				$query = $this->db->get('curso');
                return $query->result();
        }
		public function get_curso_id($id)
        {
				$this->db->where('id', $id);
                $query = $this->db->get('curso');
                return $query->result();
        }	
		public function get_sede_curso($id)
        {
				$this->db->select('sede_curso.*, sede.sede');
				$this->db->where('sede_curso.cursoId', $id);
				$this->db->join('sede', 'sede.id = sede_curso.sedeId', 'left');
                $query = $this->db->get('sede_curso');
                return $query->result();
        }	
		public function get_sede_curso_id($id)
        {
				$this->db->select('sede_curso.*, sede.provinciaId');
				$this->db->where('sede_curso.id', $id);
				$this->db->join('sede', 'sede.id = sede_curso.sedeId', 'left');
                $query = $this->db->get('sede_curso');
                return $query->result();
        }
		
		public function get_profesores()
        {
                $query = $this->db->get('profesor');
                return $query->result();
        }
		public function get_profesor_id($id)
        {
				$this->db->where('id', $id);
                $query = $this->db->get('profesor');
                return $query->result();
        }	
		public function get_profesor_curso($id)
        {
				$this->db->where('cursoId', $id);
                $query = $this->db->get('profesor_curso');
                return $query->result();
        }	
		public function get_profesor_sede($id)
        {
				$this->db->where('sedeId', $id);
                $query = $this->db->get('profesor_sede');
                return $query->result();
        }	
		       
		public function get_subcategoria_id($id)
        {
    		$this->db->where('uniq', $id);
            $query = $this->db->get('subcategorias');
            return $query->result();
        }	
        
 		public function get_producto_id($id)
        {
    		$this->db->where('uniq', $id);
            $query = $this->db->get('productos');
            return $query->result();
        }
        
		public function get_tipos_id($id)
        {
    		$this->db->where('uniq', $id);
            $query = $this->db->get('tipos');
            return $query->result();
        }
        
        
		public function get_gallery_cat_id($id)
        {
    		$this->db->where('uniq', $id);
            $query = $this->db->get('gallery_cat');
            return $query->result();
        }
                        
		public function get_gallery_id($id)
        {
    		$this->db->where('uniq', $id);
            $query = $this->db->get('gallery');
            return $query->result();
        }
        
		public function get_categoria_id($id)
        {
    		$this->db->where('uniq', $id);
            $query = $this->db->get('categorias');
            return $query->result();
        }

        public function get_quirofano_id($id)
        {
    		$this->db->where('uniq', $id);
            $query = $this->db->get('quirofanos');
            return $query->result();
        }	

        public function get_destination_id($id)
        {
    		$this->db->where('uniq', $id);
            $query = $this->db->get('destinations');
            return $query->result();
        }

        public function get_pad_id($id)
        {
    		$this->db->where('uniq', $id);
            $query = $this->db->get('pads');
            return $query->result();
        }

        public function get_opcional_id($id)
        {
    		$this->db->where('uniq', $id);
            $query = $this->db->get('opcionales');
            return $query->result();
        }

        public function get_producto_componentes($id)
        {
        	$this->db->where('id_producto', $id);
            $query = $this->db->get('producto_componentes');
            return $query->result();
        }

        public function get_producto_opcionales($id)
        {
        	$this->db->where('id_producto', $id);
            $query = $this->db->get('producto_opcionales');
            return $query->result();
        }

        public function get_posicion_id($id)
        {
    		$this->db->where('uniq', $id);
            $query = $this->db->get('posicionamientos_componentes');
            return $query->result();
        }

        public function get_producto_componente_id($id, $id_producto)
        {
    		$this->db->where('id', $id);
    		$this->db->where('id_producto', $id_producto);
            $query = $this->db->get('producto_componentes');
            return $query->result();
        }

        public function get_producto_opcional_id($id, $id_producto)
        {
    		$this->db->where('id', $id);
    		$this->db->where('id_producto', $id_producto);
            $query = $this->db->get('producto_opcionales');
            return $query->result();
        }	
		
		public function get_provincias()
        {	
				if($this->session->userdata['logged_in']['administrator']==0){
					$this->db->where('id',$this->session->userdata['logged_in']['provinciaId']);
				}
                $query = $this->db->order_by('provincia','asc');
				$query = $this->db->get('provincia');
                return $query->result();
        }
		public function get_active_provinces()
        {
        	$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
			$this->db->select('provincia.*');
			if($this->session->userdata['logged_in']['administrator']==0){
				$this->db->where('provincia.id',$this->session->userdata['logged_in']['provinciaId']);
			}
			$this->db->join('sede','sede.provinciaId = provincia.id');
			$this->db->group_by('provincia.id');
			$query = $this->db->get('provincia');
			return $query->result();				
        }
		public function get_provincia_curso($id)
        {
				$this->db->where('cursoId', $id);
                $query = $this->db->get('curso_provincia');
                return $query->result();
        }	
		
		public function get_noticias()
        {
				$this->db->select('noticias.*');
				$this->db->order_by('id','desc');
                $query = $this->db->get('noticias');
                return $query->result();		
        }
		public function get_noticia_id($id)
        {
				$this->db->where('id', $id);	
                $query = $this->db->get('noticias');
                return $query->result();		
        }
		public function get_provincia_noticia($id)
        {
				$this->db->select('noticias_provincia.*, provincia.provincia');
				$this->db->where('noticiaId', $id);
				$this->db->join('provincia', 'provincia.id = noticias_provincia.provinciaId', 'left');
                $query = $this->db->get('noticias_provincia');
                return $query->result();
        }		
		
		public function get_vendedores()
        {
				$this->db->select('vendedores.*');
				$this->db->select("(select count(*) from presupuestos where presupuestos.vendedor_id = vendedores.id) as kantt");
				
                $query = $this->db->get('vendedores');
                return $query->result();
        }

        public function get_vendedores_est()
        {	
        	$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
				$this->db->select('vendedores.*');
				$this->db->select("count(*) as kantt");

				if(isset($_POST["fecha_inicio"]) && strlen($_POST["fecha_inicio"]) > 0)
				{
					$this->db->where("presupuestos.added_at >= ".strtotime($_POST["fecha_inicio"]));
				}
				
				if(isset($_POST["fecha_fin"]) && strlen($_POST["fecha_fin"]) > 0)
				{
					$this->db->where("presupuestos.added_at <= ".strtotime($_POST["fecha_fin"]));
				}

				$this->db->join('presupuestos', 'presupuestos.vendedor_id = vendedores.id', 'left');
				$this->db->group_by("presupuestos.vendedor_id");
                $this->db->order_by('presupuestos.modified_at', 'DESC');
				
                $query = $this->db->get('vendedores');
                return $query->result();
        }
        
        public function get_vendedor_name_by_id($id)
        {
			$this->db->select("*");
			$this->db->where("id",$id);
            $query = $this->db->get('vendedores');
            $array = $query->result();
            
            return $array[0]->vendedor;
        }
        
		public function get_newsletters()
        {
				$this->db->select('newsletters.*');
				
				$this->db->order_by("newsletters.id","desc");
				
                $query = $this->db->get('newsletters');
                return $query->result();
        }
        
        
		public function get_logos()
        {
				$this->db->select('logos.*');
				$this->db->order_by("logos.id","desc");
                $query = $this->db->get('logos');
                return $query->result();
        }
        
        
		public function get_productos()
        {
        		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
				$this->db->select('productos.*');
                $this->db->select("subcategorias.nombre as subcat");
                
                $this->db->where("productos.lang",5);
                
                $this->db->join("subcategorias","subcategorias.id = productos.subcategoria_id and subcategorias.lang = 5","left");
				
				$this->db->order_by("productos.id","desc");
				
				$this->db->group_by("productos.uniq");
				
                $query = $this->db->get('productos');
                return $query->result();
        }
        
		public function get_tipos()
        {
			$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
				$this->db->select('tipos.*');
				
				$this->db->order_by("tipos.id","desc");
				$this->db->group_by("tipos.uniq");
				
                $query = $this->db->get('tipos');
                return $query->result();
        }
        
        
		public function get_gallery_categories()
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
				
				$this->db->order_by("destinations.id","desc");
				$this->db->group_by("destinations.uniq");
				
                $query = $this->db->get('destinations');
                return $query->result();
        }

        public function get_pads()
        {	
        	$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
				$this->db->select('pads.*');
				
				$this->db->order_by("pads.id","desc");
				$this->db->group_by("pads.uniq");
				
                $query = $this->db->get('pads');
                return $query->result();
        }


        public function get_opcionales()
        {	
        	$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
				$this->db->select('opcionales.*');
				
				$this->db->order_by("opcionales.id","desc");
				$this->db->group_by("opcionales.uniq");
				
                $query = $this->db->get('opcionales');
                return $query->result();
        }


        public function get_posicionamientos()
        {	
        	$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
				$this->db->select('posicionamientos_componentes.*');
				$this->db->select('subcategorias.nombre as procedimiento');

				$this->db->order_by("posicionamientos_componentes.id","desc");
				$this->db->group_by("posicionamientos_componentes.uniq");
				
				$this->db->join('subcategorias', 'subcategorias.uniq = posicionamientos_componentes.id_procedimiento');

                $query = $this->db->get('posicionamientos_componentes');
                return $query->result();
        }

        public function get_quirofanos()
        {	
        	$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
				$this->db->select('quirofanos.*');
				
				$this->db->order_by("quirofanos.id","desc");
				$this->db->group_by("quirofanos.uniq");
				
                $query = $this->db->get('quirofanos');
                return $query->result();
        }
        
		public function get_sub_categorias_all()
        {
        	$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
				$this->db->select('subcategorias.*');
				
				$this->db->order_by("subcategorias.id","desc");
				$this->db->group_by("subcategorias.uniq");
				
                $query = $this->db->get('subcategorias');
                return $query->result();
        }
        
        
		public function get_sub_categorias()
        {
        		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
				$this->db->select('subcategorias.*');
				
				$this->db->where("categoria_id",$this->session->userdata("categoria_id"));
				
				$this->db->order_by("subcategorias.id","desc");
				$this->db->group_by("subcategorias.uniq");
				
                $query = $this->db->get('subcategorias');
                return $query->result();
        }
        
		public function get_usuarios()
        {
				$this->db->select('user_login.*');
//				$this->db->join('provincia', 'provincia.id = user_login.provinciaId', 'left');
                $query = $this->db->get('user_login');
                return $query->result();
        }
		public function get_usuarios_id($id)
        {
				$this->db->where('id', $id);
                $query = $this->db->get('user_login');
                return $query->result();
        }
        
        
		public function get_config()
        {
                $query = $this->db->get('config');
                return $query->result();
        }			
        
		public function get_vendedor_id($id)
        {
				$this->db->where('id', $id);
                $query = $this->db->get('vendedores');
                return $query->result();
        }
			
		public function get_imagenes_archivo($entidad,$id)
        {
				$this->db->where('refId', $id);
				$this->db->where('entidad', $entidad);
                $query = $this->db->get('archivos');
                return $query->result();		
        }
		
		
		
		
		
		
		/*INSERTS*/
		
		public function insert_logo($data)
        {
                $this->db->insert('logos', $data);
        }
		
		
		public function insert_cupon($data)
        {
                $this->db->insert('cupones', $data);
        }
        
		public function insert_usuario($data)
        {
                $this->db->insert('user_login', $data);
        }
        
        
		public function insert_producto($data)
        {
                $this->db->insert('productos', $data);
                return $this->db->insert_id();
        }
        
		public function insert_tipos($data)
        {
                $this->db->insert('tipos', $data);
                return $this->db->insert_id();
        }
        
        
		public function insert_gallery_cat($data)
        {
                $this->db->insert('gallery_cat', $data);
                return $this->db->insert_id();
        }
        
		public function insert_gallery($data)
        {
                $this->db->insert('gallery', $data);
                return $this->db->insert_id();
        }
                
		public function insert_categoria($data)
        {
                $this->db->insert('categorias', $data);
                return $this->db->insert_id();
        }

        public function insert_destination($data)
        {
                $this->db->insert('destinations', $data);
                return $this->db->insert_id();
        }

        public function insert_pad($data)
        {
                $this->db->insert('pads', $data);
                return $this->db->insert_id();
        }

        public function insert_opcional($data)
        {
                $this->db->insert('opcionales', $data);
                return $this->db->insert_id();
        }

        public function insert_posicion($data)
        {
                $this->db->insert('posicionamientos_componentes', $data);
                return $this->db->insert_id();
        }

        public function insert_quirofano($data)
        {
                $this->db->insert('quirofanos', $data);
                return $this->db->insert_id();
        }
        
		public function insert_subcategoria($data)
        {
                $this->db->insert('subcategorias', $data);
                return $this->db->insert_id();
        }
        
		public function insert_vendedor($data)
        {
                $this->db->insert('vendedores', $data);
        }
		
		
		public function insert_banner($data)
        {
                $this->db->insert('banner', $data);
        }
		
		public function insert_sede($data)
        {
                $this->db->insert('sede', $data);
				$insert_id = $this->db->insert_id();
				
				/*PROFESORES*/
				if(isset($_POST['profesor'])){
					foreach ( $_POST['profesor'] as $servicio ){
						$this->db->set('profesorId', $servicio);
						$this->db->set('sedeId', $insert_id);		
						$this->db->insert('profesor_sede');					
					}
				}
				
				/*GALERIA*/
				if(isset($_POST['galeria1_input'])){
					$galeria =explode(",",$_POST['galeria1_input']);
					foreach ( $galeria as $gal ){
						$this->db->set('entidad', 'galeria_sede');
						$this->db->set('refId', $insert_id);
						$this->db->set('archivo', $gal);					
						$this->db->insert('archivos');					
					}
				}
        }
		
		public function insert_profesor($data)
        {
                $this->db->insert('profesor', $data);
        }
        
        
        
        public function distribuir_presupuesto($presupuesto_id,$vendedor_id)
        {
				$this->db->where('id', $presupuesto_id);
				$this->db->set('vendedor_id', $vendedor_id);
				$this->db->update('presupuestos');
        }
		
		public function insert_curso($data)
        {
                $this->db->insert('curso', $data);
				$insert_id = $this->db->insert_id();
				
				if(isset($_POST['profesor'])){
					foreach ( $_POST['profesor'] as $servicio ){
						$this->db->set('profesorId', $servicio);
						$this->db->set('cursoId', $insert_id);		
						$this->db->insert('profesor_curso');					
					}
				}
				
				if(isset($_POST['provincia'])){
					foreach ( $_POST['provincia'] as $provincia ){
						$this->db->set('provinciaId', $provincia);
						$this->db->set('cursoId', $insert_id);		
						$this->db->insert('curso_provincia');					
					}
				}
				
				/*ACTUALIZAR ID EN VARIANTE PROUDUCTO*/
				$this->db->set('cursoId', $insert_id);
				$this->db->where('cursoId', $this->input->get('tempid'));
				$this->db->update('sede_curso');
        }
		public function insert_sede_curso($data)
        {
                $this->db->insert('sede_curso', $data);
        }
		
		public function insert_noticia($data)
        {
                $this->db->insert('noticias', $data);
				$insert_id = $this->db->insert_id();
				
				
				if(isset($_POST['provincia'])){
					foreach ( $_POST['provincia'] as $provincia ){
						$this->db->set('provinciaId', $provincia);
						$this->db->set('noticiaId', $insert_id);		
						$this->db->insert('noticias_provincia');					
					}
				}
				
				/*GALERIA*/
				if(isset($_POST['galeria2_input'])){
					$galeria =explode(",",$_POST['galeria2_input']);
					foreach ( $galeria as $gal ){
						$this->db->set('entidad', 'galeria_noticia');
						$this->db->set('refId', $insert_id);
						$this->db->set('archivo', $gal);					
						$this->db->insert('archivos');					
					}
				}
        }
		
        public function get_lang()
        {
        	$query = $this->db->get('lang');
        	return $query->result();
        }
		
		/*UPDATES*/
		
		public function update_countries($data)
		{
				$this->db->where('id', $this->uri->segment(3));
                $this->db->update('lang', $data);			
		}
		public function update_banner($data)
        {
				$this->db->where('id', $this->uri->segment(3));
                $this->db->update('banner', $data);
        }

		public function update_sede($data)
        {
				$this->db->where('id', $this->uri->segment(3));
				$this->db->update('sede', $data);
				
				$this->db->where('sedeId', $this->uri->segment(3));
                $this->db->delete('profesor_sede');
				
				$this->db->where('refId', $this->uri->segment(3));
				$this->db->where('entidad', 'galeria_sede');
                $this->db->delete('archivos');
				
				if(isset($_POST['profesor'])){
					foreach ( $_POST['profesor'] as $servicio ){
						$this->db->set('profesorId', $servicio);
						$this->db->set('sedeId', $this->uri->segment(3));		
						$this->db->insert('profesor_sede');					
					}
				}
				
				/*GALERIA*/
				if(isset($_POST['galeria1_input'])){
					$galeria =explode(",",$_POST['galeria1_input']);
					foreach ( $galeria as $gal ){
						$this->db->set('entidad', 'galeria_sede');
						$this->db->set('refId', $this->uri->segment(3));
						$this->db->set('archivo', $gal);					
						$this->db->insert('archivos');					
					}
				}
        }
		public function update_profesor($data)
        {
				$this->db->where('id', $this->uri->segment(3));
				$this->db->update('profesor', $data);
        }
		public function update_curso($data)
        {
				$this->db->where('id', $this->uri->segment(3));
				$this->db->update('curso', $data);
				
				$this->db->where('cursoId', $this->uri->segment(3));
                $this->db->delete('profesor_curso');
				
				$this->db->where('cursoId', $this->uri->segment(3));
                $this->db->delete('curso_provincia');
				
				if(isset($_POST['profesor'])){
					foreach ( $_POST['profesor'] as $servicio ){
						$this->db->set('profesorId', $servicio);
						$this->db->set('cursoId', $this->uri->segment(3));		
						$this->db->insert('profesor_curso');					
					}
				}
				
				if(isset($_POST['provincia'])){
					foreach ( $_POST['provincia'] as $provincia ){
						$this->db->set('provinciaId', $provincia);
						$this->db->set('cursoId', $this->uri->segment(3));		
						$this->db->insert('curso_provincia');					
					}
				}
        }
		public function update_sede_curso($data)
        {
				$this->db->where('id', $this->uri->segment(3));
				$this->db->update('sede_curso', $data);
        }
		
		public function update_vendedor($data)
        {
				$this->db->set('vendedor', $data['vendedor']);
				$this->db->where('id', $this->uri->segment(3));
                $this->db->update('vendedores');
        }
        
        
		public function update_config($data)
        {
	           $this->db->where('id', 1);
				$this->db->update('config', $data);
        }
        
		public function update_usuario($data)
        {
				$this->db->set('name', $data['name']);
				$this->db->set('provinciaId', $data['provinciaId']);
				$this->db->set('vendedor_id', $data['vendedor_id']);
				$this->db->set('administrator', $data['administrator']);
				$this->db->set('lastname', $data['lastname']);
				$this->db->set('user_email', $data['user_email']);
				if($data['user_password']<>''){
					$this->db->set('user_password', $data['user_password']);
				}
				$this->db->where('id', $this->uri->segment(3));
                $this->db->update('user_login');
        }
		public function update_producto($data)
        {
				$this->db->where('id', $this->uri->segment(3));
                $this->db->update('productos', $data);
        }
        
		public function update_categoria($data)
        {
				$this->db->where('id', $this->uri->segment(3));
                $this->db->update('categorias', $data);
        }
		
		public function update_distribuidores($data)
		{	
			$this->db->where('id', $this->uri->segment(3));
			$this->db->update('distribuidores', $data);
	
			
			$this->db->where('distribuidorId', $this->uri->segment(3));
            $this->db->delete('distribuidor_categoria');
			
			/*CATEGORIAS*/ 	
			if(isset($_POST['categoria'])){
				foreach ( $_POST['categoria'] as $servicio ){
					$this->db->set('categoriaId', $servicio);
					$this->db->set('distribuidorId', $this->uri->segment(3));		
					$this->db->insert('distribuidor_categoria');					
				}
			}
			
			
		}
		
		public function update_noticia($data)
        {
				$this->db->where('id', $this->uri->segment(3));
                $this->db->update('noticias', $data);
				$insert_id = $this->uri->segment(3);
				
				$this->db->where('refId', $this->uri->segment(3));
				$this->db->where('entidad', 'galeria_noticia');
                $this->db->delete('archivos');
				
				$this->db->where('noticiaId', $this->uri->segment(3));
                $this->db->delete('noticias_provincia');
				
				if(isset($_POST['provincia'])){
					foreach ( $_POST['provincia'] as $provincia ){
						$this->db->set('provinciaId', $provincia);
						$this->db->set('noticiaId', $insert_id);		
						$this->db->insert('noticias_provincia');					
					}
				}
				
				/*GALERIA*/
				if(isset($_POST['galeria2_input'])){
					$galeria =explode(",",$_POST['galeria2_input']);
					foreach ( $galeria as $gal ){
						$this->db->set('entidad', 'galeria_noticia');
						$this->db->set('refId', $insert_id);
						$this->db->set('archivo', $gal);					
						$this->db->insert('archivos');					
					}
				}
        }
		
		
		/*REMOVES*/
		public function remove_countries()
		{
				$this->db->where('id', $this->uri->segment(3));
                $this->db->delete('lang');			
		}
		
		public function remove_noticia()
        {
				$this->db->where('id', $this->uri->segment(3));
                $this->db->delete('noticias');
				
				$this->db->where('refId', $this->uri->segment(3));
				$this->db->where('entidad', 'galeria_noticia');
                $this->db->delete('archivos');
        }
		
		public function remove_banner()
        {
				$this->db->where('id', $this->uri->segment(3));
                $this->db->delete('banner');
        }
		
		public function remove_profesor()
        {
				$this->db->where('id', $this->uri->segment(3));
                $this->db->delete('profesor');
				
				$this->db->where('profesorId', $this->uri->segment(3));
                $this->db->delete('profesor_curso');
        }
	
		public function remove_producto()
        {
				$this->db->where('uniq', $this->uri->segment(3));
                $this->db->delete('productos');
        }
        	
            
		public function remove_tipo()
        {
				$this->db->where('uniq', $this->uri->segment(3));
                $this->db->delete('tipos');
        }
        
        
		public function remove_gallery()
        {
				$this->db->where('uniq', $this->uri->segment(3));
                $this->db->delete('gallery');
        }
        
		public function remove_gallery_cat()
        {
				$this->db->where('uniq', $this->uri->segment(3));
                $this->db->delete('gallery_cat');
        }

        public function remove_destination()
        {
				$this->db->where('uniq', $this->uri->segment(3));
                $this->db->delete('destinations');
        }

        public function remove_pad()
        {
				$this->db->where('uniq', $this->uri->segment(3));
                $this->db->delete('pads');
        }

        public function remove_opcional()
        {
				$this->db->where('uniq', $this->uri->segment(3));
                $this->db->delete('opcionales');
        }

        public function remove_posicion()
        {
				$this->db->where('uniq', $this->uri->segment(3));
                $this->db->delete('posicionamientos_componentes');
        }
        
		public function remove_subcategoria()
        {
				$this->db->where('uniq', $this->uri->segment(3));
                $this->db->delete('subcategorias');
        }
        
		public function remove_curso()
        {
				$this->db->where('id', $this->uri->segment(3));
                $this->db->delete('curso');
				
				$this->db->where('cursoId', $this->uri->segment(3));
                $this->db->delete('profesor_curso');
				
				$this->db->where('cursoId', $this->uri->segment(3));
                $this->db->delete('sede_curso');
        }
		public function remove_sede()
        {
				$this->db->where('id', $this->uri->segment(3));
                $this->db->delete('sede');
        }
		public function remove_sede_curso()
        {
				$this->db->where('id', $this->uri->segment(3));
                $this->db->delete('sede_curso');
        }
		
		
		public function remove_logo()
        {
				$this->db->where('id', $this->uri->segment(3));
                $this->db->delete('logos');
        }
        
		public function remove_usuario()
        {
				$this->db->where('id', $this->uri->segment(3));
                $this->db->delete('user_login');
        }
        
		public function remove_cupon()
        {
				$this->db->where('id', $this->uri->segment(3));
                $this->db->delete('cupones');
        }
        
		public function remove_vendedores()
        {
				$this->db->where('id', $this->uri->segment(3));
                $this->db->delete('vendedores');
        }

        public function remove_presupuesto($data)
        {
				$this->db->where('id', $this->uri->segment(3));
				$this->db->update('presupuestos', $data);
        }
		
		/*CHANGE*/
		public function change_status_curso()
        {
				$this->db->set('destacado', $this->uri->segment(4));
				$this->db->where('id', $this->uri->segment(3));
                $this->db->update('curso');
				print $this->db->last_query();
        }
		
}

?>