<?php

/**
*	User
*
*	A person or enity that can login into the site
**/
class User
{
	/**
	* Unicode Identifier
	*	@var Integer
	**/
	public $id;
	/**
	* Unique username
	*	@var String
	**/
	public $username;
	/**
	* Password
	*	@var String
	**/
	public $password;

	/**
	* Authenticate user by username and password
	*
	* @param object $conn connection to the database
	*	@param string $username Username
	*	@param string $password Password
	*
	*	@return boolean true is credentials are correct ,null otherwise
	**/
	public static function authenticate($conn, $username, $password)
	{
		$sql = "SELECT *
					  FROM user
					  WHERE username = :username";

		$stmt = $conn->prepare($sql);
		$stmt->bindValue(':username', $username, PDO::PARAM_STR);

		$stmt->setFetchMode(PDO::FETCH_CLASS, 'User');		// this will return object of the User class

		$stmt->execute();

		// $user = $stmt->fetch();		// this return array but we are dealing with objects but above LOC at #44 changes it into object

		// if($user)
		// {
			if($user = $stmt->fetch())		// Checking Boolean value
			{
				return password_verify($password, $user->password);
			}
		// }
	}
}
