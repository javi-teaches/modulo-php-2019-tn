<?php

	namespace Project\Admin;

	require_once "Traits/Shareable.php";

	class User
	{
		use \Traits\Whatever\Shareable;

		public function sayHello()
		{
			return "Soy la clase USER dentro de ADMIN";
		}
	}
