<?php

	abstract class DB
	{
		public abstract function getAllUsers();
		public abstract function saveUser(User $oneUser);
		public abstract function emailExist($email);
		public abstract function getUserByEmail($email);
	}
