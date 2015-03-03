<?php

	interface IController {}
	
	class FrontController
	{
		protected $_controller,
		$_action,
		$_params,
		$_body;
		static $_instance;
	
		public static function getInstance()
		{
			if(!(self::$_instance instanceof self) )
			{
				self::$_instance = new self();
			}
			return self::$_instance;
		}
	
		private function __construct()
		{
			$request = $_SERVER['REQUEST_URI'];
			$splits = explode('/', trim($request,'/'));
			$this->_controller = !empty($splits[0])?$splits[0]:'index';
			$this->_action = !empty($splits[1])?$splits[1]:'index';
			
			if(!empty($splits[2])) 
			{
				$keys = $values = array();
				for($idx=2, $cnt = count($splits); $idx<$cnt; $idx++)
				{
					if($idx % 2 == 0)
					{
						//key
						$keys[] = $splits[$idx];
					} 
					else
					{
						//value;
						$values[] = $splits[$idx];
					}
				}
				$this->_params = array_combine($keys, $values);
			}
		}
	
		public function route() 
		{
			$file = 'ctrl/' . $this->_controller . '.php';
			if(file_exists($file))
			{
				require_once $file;
			}
			if(class_exists($this->getController()))
			{
				$rc = new ReflectionClass($this->getController());
				if($rc->implementsInterface('IController'))
				{
					if($rc->hasMethod($this->getAction()))
					{
						$controller = $rc->newInstance();
						$method = $rc->getMethod($this->getAction());
						$method->invoke($controller);
					}
					else
					{
						throw new Exception("Action");
					}
				}
				else
				{
					throw new Exception("Interface");
				}
			}
			else
			{
				throw new Exception("Controller");
			}
		}
	
		
		public function getParams()
		{
			return $this->_params;
		}
	
		public function getController()
		{
			return $this->_controller;
		}
	
		public function getAction()
		{
			return $this->_action;
		}
	
		public function getBody()
		{
			return $this->_body;
		}
	
		public function setBody($body)
		{
			$this->_body = $body;
		}
	}

	
	
	class ctrl
	{
		public function __construct() {}
		
		public function render($act, $data=array())
		{
			$fc = FrontController::getInstance();
			$ctrl = $fc->getController();
			$act = $fc->getAction();
			ob_start();
			require_once 'lib/head.php';
			require_once 'view/'  . $ctrl . '/' . $act . '.php';
			$result= ob_get_clean();
			$fc->setBody($result);
			return true;
		}
	}






function include_icon() {}

function include_head_css($ctrl, $act) {}

function include_head_js($ctrl, $act) {}

function include_foot_js($ctrl, $act) {}
