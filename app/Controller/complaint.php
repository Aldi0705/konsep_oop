<?php

	class Customers
	{
		private $servername = "localhost";
		private $username   = "root";
		private $password   = "";
		private $database   = "penjualan";
		public  $con;


		// Database Connection 
		public function __construct()
		{
		    $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
		    if(mysqli_connect_error()) {
				trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
		    }else{
				return $this->con;
		    }
		}

		// Insert customer data into customer table
		public function insertData($post)
		{
			$name = $this->con->real_escape_string($_POST['name']);
			$nik = $this->con->real_escape_string($_POST['nik']);
			$email = $this->con->real_escape_string($_POST['email']);
			$password = $this->con->real_escape_string(md5($_POST['password']));
			$telp = $this->con->real_escape_string($_POST['telp']);
			$rule = $this->con->real_escape_string($_POST['rule']);
			$bod = $this->con->real_escape_string($_POST['bod']);
			$address = $this->con->real_escape_string($_POST['address']);
			$query="INSERT INTO customers(name,nik,email,password,telp,rule,bod,address) VALUES('$name','$nik','$email','$password','$telp','$rule','$bod','$address')";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:index.php?msg1=insert");
			}else{
			    echo "Registration failed try again!";
			}
		}

		// Fetch customer records for show listing
		public function displayData()
		{
		    $query = "SELECT cs.id as customer_id, cs.name as customer_name, cs.nik as customer_nik, cp.* FROM complaint cp Join customers cs on  cp.customers_id = cs.id";
		    $result = $this->con->query($query);
			if ($result->num_rows > 0) {
				$data = array();
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
			 	return $data;
		    }else{
				return null;
		    }
		}

		// Fetch single data for edit from customer table
		public function displyaRecordById($id)
		{
		    $query = "SELECT * FROM customers WHERE id = '$id'";
		    $result = $this->con->query($query);
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				return $row;
				}else{
				echo "Record not found";
				}
		}

		// Update customer data into customer table
		public function updateRecord($postData)
		{
		    $name = $this->con->real_escape_string($_POST['name']);
		    $email = $this->con->real_escape_string($_POST['email']);
			if (isset($_POST['password']) && $_POST['password'] !== '') {
				$password = $this->con->real_escape_string(md5($_POST['password']));
				$query = "UPDATE customers SET name = '$name', email = '$email', password = '$password', rule = '$rule' WHERE id = '$id'";
				$sql = $this->con->query($query);
			} else {
				$query = "UPDATE customers SET name = '$name', email = '$email', rule = '$rule' WHERE id = '$id'";
				$sql = $this->con->query($query);
			}
			$rule = $this->con->real_escape_string($_POST['rule']);
		    $id = $this->con->real_escape_string($_POST['id']);
			if (!empty($id) && !empty($postData)) {
				if ($sql==true) {
					header("Location:index.php?msg2=update");
				} else{
					echo "Registration updated failed try again!";
				}
		    }
			
		}


		// Delete customer data from customer table
		public function deleteRecord($id)
		{
		    $query = "DELETE FROM customers WHERE id = '$id'";
		    $sql = $this->con->query($query);
				if ($sql==true) {
					header("Location:index.php?msg3=delete");
				} else{
					echo "Record does not delete try again";
				}
		}

	}
?>