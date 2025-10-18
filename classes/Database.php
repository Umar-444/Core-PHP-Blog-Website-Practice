<?php

/**
* Database
*
* A connection to the Database
**/

class Database
	{
		/**
		* Host Name
		* @var String
		**/
		protected $db_host;

		/**
		* Database Name
		* @var String
		**/
		protected $db_name;

		/**
		* Username
		* @var String
		**/
		protected $db_user;

		/**
		* Password
		* @var String
		**/
		protected $db_pass;

		/**
		*	Constructor
		*
		*	@param string $host Hostname
		* @param string $name Database name
		* @param string $user Username
		* @param string $password Password
		*
		* @return void
		**/
		public function __construct($host, $name, $user, $password)
		{
			$this->db_host = $host;
			$this->db_name = $name;
			$this->db_user = $user;
			$this->db_pass = $password;
		}

		/**
		* Get the Database connection
		*
		* @return PDO object Connection to the database server
		**/
		public function getConn()
		{

			$dsn = 'mysql:host=' . $this->db_host . ';dbname=' . $this->db_name . ';charset=utf8';

			try
			{
				$db = new PDO($dsn, $this->db_user, $this->db_pass);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $db;
			} catch(PDOException $e)
			{
				echo $e->getMessage();
				exit;
			}
		}
	}
