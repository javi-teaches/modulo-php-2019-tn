<?php

	class User
	{
		private $name;
		private $email;
		private $password;
		private $country;
		private $avatar;
		private $id;

		public function __construct($theName, $theEmail, $theCountry, $theAvatar, $thePassword = null)
		{
			$this->name = $theName;
			$this->email = $theEmail;
			$this->country = $theCountry;
			$this->avatar = $theAvatar;
			$this->password = $thePassword; // NO USEN EL setPassword()
		}

		public function getName() {
			return $this->name;
		}

		public function getEmail() {
			return $this->email;
		}

		public function setPassword($thePassword) {
			$this->password = password_hash($thePassword, PASSWORD_DEFAULT);
		}

		public function getPassword() {
			return $this->password;
		}

		public function getCountry() {
			return $this->country;
		}

		public function getAvatar() {
			return $this->avatar;
		}

		public function setId($theId) {
			$this->id = $theId;
		}

		public function getId() {
			return $this->id;
		}

		public function getDataInArray()
		{
			return [
				'id' => $this->getId(),
				'name' => $this->getName(),
				'email' => $this->getEmail(),
				'country' => $this->getCountry(),
				'avatar' => $this->getAvatar(),
				'password' => $this->getPassword(),
			];
		}
	}
