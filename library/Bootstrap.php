<?php

/* 
*
 * @author Shipul Andrey 
 *  @position Nod-4 ivc
 * 
 */

class Bootstrap {
	public function __construct() {
                if (session_start()) {
                   if(!$_SESSION['reg']) {
                       $_SESSION['reg']= true;
                       $mapper = new BrowserMapper();
                       $uap = new UserAgentParser();
                       $result = $uap->parse_user_agent();
                       $mapper->save($result['platform'],$result['browser'],$result['version']);
                       $_SESSION['browser']['platform']=$result['platform'];
                       $_SESSION['browser']['name']=$result['browser'];
                       $_SESSION['browser']['version']=$result['version'];
                   }
                } else { 
                     die('Не работает сессия');
                }
                

		$url = isset($_GET['route']) ? $_GET['route'] : null;
		$url = rtrim($url, '/');
		$url = filter_var($url, FILTER_SANITIZE_URL);
		$url = explode('/', $url);
		if (empty($url[0])) {
			require 'controllers/index.php';
			$controller = new Index();
			$controller->index();
			return false;
		}
		$file = 'controllers/' . $url[0] . '.php';
		if (file_exists($file)) {
			require $file;
		} else {
			$this->error();
			return false;
		}
		$controller = new $url[0];
		if (isset($url[2])) {
			if (method_exists($controller, $url[1])) {
				$controller->{$url[1]}($url[2]);
			} else {
				$this->error();
			}
		} else {
			if (isset($url[1])) {
				if (method_exists($controller, $url[1])) {
					$controller->{$url[1]}();
				} else {
					$this->error();
				}
			} else {
				$controller->index();
			}
		}
		
		
	}
	
	public function error() {
		require 'controllers/error.php';
		$controller = new Error();
		$controller->index();
		return false;
	}
}
