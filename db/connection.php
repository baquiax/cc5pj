<?php 
class Connection {
	static $host;
	static $user;
	static $password;
	static $database;

	static function setConfig($host = "localhost", $user = "baquiax", $password = "admin", $database = "cc5") {
		self::$host = $host;
		self::$user = $user;
		self::$password = $password;
		self::$database = $database;
	}


	function bind_result_array($stmt){
	    $meta = $stmt->result_metadata();
	    $result = array();
	    while ($field = $meta->fetch_field()) {
	        $result[$field->name] = NULL;
	        $params[] = &$result[$field->name];
	    }
	 
	    call_user_func_array(array($stmt, 'bind_result'), $params);
	    return $result;
	}

	function getConnection() {
		if(!self::$host) {
			self::setConfig();
		}

		$connection = new mysqli(self::$host, self::$user, self::$password, self::$database);
		if ($connection->connect_error) {
			die('Connect Error (' . $connection->connect_errno . ') ' . $connection->connect_error);
		}
		return $connection;

		//Remember close the connection, use mysqli_close($var);
	}

	function doQuery($queryString = "", $parameters = array()) {
		$mysql = $this->getConnection();
		$statement = $mysql->prepare($queryString);
		if ($statement === FALSE) {
		    die ("ERROR: " . $mysql->error);
		}
		$allParams = [];
		$types = "";
		
		if (count($parameters)){
			for($i = 0; $i < count($parameters); $i++) {
				$allParams[] = &$parameters[$i]["value"];			
				$types .= (empty($parameters[$i]["type"])) ? "s" : $parameters[$i]["type"];
			}
			$allParams = array_merge(array(&$types), $allParams);	
			//Reference: http://php.net/manual/es/mysqli-stmt.bind-param.php				
			call_user_func_array(array($statement, 'bind_param'), $allParams);	
		}
		
		$statement->execute();
		$row = $this->bind_result_array($statement);
		$result = array();
	    while ($statement->fetch()) {
	    	$result[] = array_map(create_function('$a', 'return $a;'), $row);
	    }
		$statement->close();
		mysqli_close($mysql);
		return $result;
	}

	function execute($queryString, $parameters = array()) {
		$mysql = $this->getConnection();
		$statement = $mysql->prepare($queryString);
		if ($statement === FALSE) {
		    die ("ERROR: " . $mysql->error);
		}
		$allParams = [];
		$types = "";
		
		for($i = 0; $i < count($parameters); $i++) {
			$allParams[] = &$parameters[$i]["value"];			
			$types .= (empty($parameters[$i]["type"])) ? "s" : $parameters[$i]["type"];
		}
		$allParams = array_merge(array(&$types), $allParams);	
		//Reference: http://php.net/manual/es/mysqli-stmt.bind-param.php
		call_user_func_array(array($statement, 'bind_param'), $allParams);

		$statement->execute();
		$statement->close();
		mysqli_close($mysql);
		if ($statement)
			return true;
		else return false;
	}
}
?>
