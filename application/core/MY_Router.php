<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class MY_Router extends CI_Router {
     
	public function __construct()
   {
        parent::__construct();
        // Your own constructor code
   }
   
	var $error_controller = 'index';
	var $error_method_404 = 'my_404';
	
    function _validate_request($segments){
    
    	if(count($segments) <= 0 )
    	{
    		$segments = $this->uri->segments;
    	}

        //Permitir - en nombre function
        $segments = str_replace('-','_',$segments);
         
        // Does the requested controller exist in the root folder?
        if (file_exists(APPPATH.'controllers/'.$segments[0].'.php'))
        {
            if(isset($segments[1])) $this->set_method($segments[1]);
            // return $segments;
        }
        
        // Is the controller in a sub-folder?
        if (file_exists(APPPATH.'controllers/'.ucfirst($segments[0]).".php"))
        {      
        
            // Set the directory and remove it from the segment array
            $this->set_directory($segments[0]);
            $this->default_controller = $segments[0];
            
            if (count($segments) > 0)
            {

            	
                // Does the requested controller exist in the sub-folder?
                if ( ! file_exists(APPPATH.'controllers/'.ucfirst($segments[0]).'.php'))
                {
                    //show_404($this->fetch_directory().$segments[0]);
					return $this->error_404();
                }
            }
            //else
            //{
    	        // $segments = array_slice($segments, 1);
    	        
    	  
                $this->set_class($this->default_controller);
                 
                if (count($segments) >= 1 && isset($segments[1]))
                {
                	$this->directory = '';
	                $this->set_method($segments[1]);
	                return $segments;
                }
                else
                {
	                $this->set_method('index');                
                }
                

                // Does the default controller exist in the sub-folder?
                //if ( ! file_exists(APPPATH.'controllers/'.ucfirst($this->fetch_directory()).$this->default_controller.'.php'))
                //{
                    $this->directory = '';
                    return array();
                //}
                

            //}
            return $segments;
        }
 
        // Can't find the requested controller...
        return $this->error_404();
    }
	
	function error_404()
	{
		$this->directory = "";
		$segments = array();
		$segments[] = $this->error_controller;
		$segments[] = $this->error_method_404;
		return $segments;
	}
     
}