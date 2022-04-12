<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
/**
* Language Identifier
* 
* Adds a language identifier prefix to all site_url links
* 
* @copyright     Copyright (c) 2011 Wiredesignz
* @version         0.29
* 
* Permission is hereby granted, free of charge, to any person obtaining a copy
* of this software and associated documentation files (the "Software"), to deal
* in the Software without restriction, including without limitation the rights
* to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
* copies of the Software, and to permit persons to whom the Software is
* furnished to do so, subject to the following conditions:
* 
* The above copyright notice and this permission notice shall be included in
* all copies or substantial portions of the Software.
* 
* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
* IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
* FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
* AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
* LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
* OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
* THE SOFTWARE.
*/
class MY_Lang extends CI_Lang
{
	
    function __construct() {
		parent::__construct();
		
        global $URI, $CFG, $IN;
		
		require_once( BASEPATH .'database/DB.php');
		$db =& DB();
		$query = $db->query( 'SELECT * FROM countries');
		$result = $query->result();
		
		$ct = array();
		foreach ( $result as $row ){
			$ct[$row->{'shortname'}] = $row->{'language'};
		}
		
        $config =& $CFG->config;
		
        $index_page    = $config['index_page'];
        $lang_ignore   = $config['lang_ignore'];
        $default_abbr  = $config['language_abbr'];    
		$lang_uri_abbr = $ct;
		
		
        /* get the language abbreviation from uri */
        $uri_abbr = $URI->segment(1);
		
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
				
				$uri_country="us";
				// $uri_country =  @file_get_contents("http://ipinfo.io/{$ip}/country");


						
//              if(isset($json->{'country_code'}))		
//              {
//					$uri_country = strtolower ($json->{'country_code'});
					$default_abbr = $uri_country;
//				}


						
				if( !isset($default_abbr) or strlen($default_abbr) <= 0) $default_abbr = "ar";


		}
		
		$IN->set_cookie('user_ip', $ip, $config['sess_expiration']);		

        /* adjust the uri string leading slash */
        $URI->uri_string = preg_replace("|^\/?|", '/', $URI->uri_string);
        
        if ($lang_ignore) {
            if (isset($lang_uri_abbr[$uri_abbr])) {
				
                /* set the language_abbreviation cookie */
                $IN->set_cookie('user_lang', $uri_abbr, $config['sess_expiration']);
                
            } else {
                
                /* get the language_abbreviation from cookie */
                $lang_abbr = $IN->cookie($config['cookie_prefix'].'user_lang');
            
            }
            
            if (strlen($uri_abbr) == 2) {
                
                /* reset the uri identifier */
                $index_page .= empty($index_page) ? '' : '/';
                
                /* remove the invalid abbreviation */
                $URI->uri_string = preg_replace("|^\/?$uri_abbr\/?|", '', $URI->uri_string);
                
                /* redirect */
                // force to conserv the get
                $url = $_SERVER['QUERY_STRING'];
                $url = "/?".$url;
                
                /* redirect */
                header('Location: '.$config['base_url'].$index_page.$URI->uri_string.$url);
//                header('Location: '.$config['base_url'].$index_page.$URI->uri_string);
                exit;
            }
            
        } else {
            /* set the language abbreviation */
            $lang_abbr = $uri_abbr;
        }

        /* check validity against config array */
        if (isset($lang_uri_abbr[$lang_abbr])) {
        	
           /* reset uri segments and uri string */
           $URI->segment(array_shift($URI->segments));
           $URI->uri_string = preg_replace("|^\/?$lang_abbr|", '', $URI->uri_string);
           
           /* set config language values to match the user language */
           $config['language'] = $lang_uri_abbr[$lang_abbr];
           $config['language_abbr'] = $lang_abbr;
		   foreach ( $result as $row ){
				if($row->{'shortname'}==$lang_abbr){
					$config['country'] = $row->{'country'};
					$config['country_id'] = $row->{'id'};
				}
		   }
		   
		  $lang_ignore = false;	
		   
           /* if abbreviation is not ignored */
           if ( ! $lang_ignore) {
                   
                   /* check and set the uri identifier */
                   $index_page .= empty($index_page) ? $lang_abbr : "/$lang_abbr";
                
                /* reset the index_page value */
                $config['index_page'] = $index_page;
           }

           /* set the language_abbreviation cookie */               
           $IN->set_cookie('user_lang', $lang_abbr, $config['sess_expiration']);
           
        } else {
                       
            /* if abbreviation is not ignored */   
            if ( ! $lang_ignore) {                   

                /* check and set the uri identifier to the default value */    
				if(strlen($IN->cookie($config['cookie_prefix'].'user_lang'))==2){
					$default_abbr = $IN->cookie($config['cookie_prefix'].'user_lang');
				}else{
						if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
							$ip = $_SERVER['HTTP_CLIENT_IP'];
						} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
							$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
						} else {
							$ip = $_SERVER['REMOTE_ADDR'];
						}
						
						//return file_get_contents("http://ipinfo.io/{$ip}/country");
						// $json =  json_decode(file_get_contents("https://ipstack.com/ipstack_api.php?ip=".$ip));
						
						$json =  json_decode(file_get_contents("http://extreme-ip-lookup.com/json/".$ip.""));
						
                        if(isset($json->{'countryCode'}))		
                        {
							$uri_country = strtolower ($json->{'countryCode'});
							$default_abbr = $uri_country;
						}
						
						if( !isset($default_abbr) or strlen($default_abbr) <= 0) $default_abbr = "ar";
				}
				
                $index_page .= empty($index_page) ? $default_abbr : "/$default_abbr";
                
                if (strlen($lang_abbr) == 2) {                   
                    /* remove invalid abbreviation */
                    $URI->uri_string = preg_replace("|^\/?$lang_abbr|", '', $URI->uri_string);
                }
                
                // force to conserv the get
                $url = $_SERVER['QUERY_STRING'];
                $url = "/?".$url;
                
                if($url == "/?") $url = "/";
                
                $IN->set_cookie('user_lang', $default_abbr, $config['sess_expiration']);
            	
                /* redirect */
                header('Location: '.$config['base_url'].$index_page.$URI->uri_string.$url);
                exit;
            }

            /* set the language_abbreviation cookie */       
            $IN->set_cookie('user_lang', $default_abbr, $config['sess_expiration']);
        }
        
    }
}

/* translate helper */
function t($line) {
    global $LANG;
    return ($t = $LANG->line($line)) ? $t : $line;
}

function get_ip_address() {
    $ip_keys = array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED','SERVER_ADDR', 'REMOTE_ADDR');
    foreach ($ip_keys as $key) {
        if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                // trim for safety measures
                $ip = trim($ip);
                // attempt to validate IP
                if (validate_ip($ip)) {
                    return $ip;
                }
            }
        }
    }
    return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : false;
}
function validate_ip($ip)
{
    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
        return false;
    }
    return true;
}
?>