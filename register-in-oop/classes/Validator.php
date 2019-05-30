<?php

	abstract class Validator
	{
		protected $errors;

		public function __construct()
		{
			$this->errors = [];
		}

		public function setError(string $field, string $error)
		{
			$this->errors[$field] = $error;
		}

		public function getError($field)
		{
			return $this->errors[$field];
		}

		public function hasError($field)
		{
			return isset($this->errors[$field]);
		}

		public function getAllErrors()
		{
			return $this->errors;
		}

		abstract public function isValid();
	}
