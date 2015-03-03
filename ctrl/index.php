<?php
	

	class index extends ctrl implements IController 
	{
		public function __construct()
		{
		}
		
		public function index() 
		{
			$this->render('index');
		}
	}
