<?php

include('DBConfig.php');

class DBConnection 
{
	static private $PDOInstance; 

	public static function get()
	{
		if ( !self::$PDOInstance )
		{
			try
			{
				$db_config = new DBConfig();
				self::$PDOInstance = new PDO($db_config->dsn, 
											$db_config->db_user,
											$db_config->db_password,
											$db_config->opt);
			} catch (PDOException $e)
			{ 
				die( $e->getMessage() );
			}
    	}
      	return self::$PDOInstance;    
	}	

	private function __construct()
	{
	}
}