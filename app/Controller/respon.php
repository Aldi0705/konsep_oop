<?php

	class respon
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
			// var_dump($this->con->error);
			// exit;
		    if($this->con->connect_errno) {
				echo 'tet';
				trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
		    }else{
				return $this->con;
		    }
		}

		// Insert customer data into customer table
		public function insertData($post)
		{
			$customer_id = $this->con->real_escape_string($_POST['customer_id']);
			$complaint_id = $this->con->real_escape_string($_POST['complaint_id']);
			$target_dir = "assets/uploads/";
			$description = $this->con->real_escape_string($_POST['description']);
			$target_file = $target_dir . basename($_FILES["foto"]["name"]);
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			
			$query="INSERT INTO respons(custumers_id, complaint_id,description) VALUES('$customer_id','$complaint_id','$description')";
			$queryComplaint = "UPDATE complaint SET status = 'Sedang Diproses' where id = $complaint_id";
			$check = getimagesize($_FILES["foto"]["tmp_name"]);
			$sql = $this->con->query($query) or die(mysqli_error($this->con).$query);
			$this->con->query($queryComplaint) or die(mysqli_error($this->con).$queryComplaint);
			if ($sql==true) {
				if($check !== false) {
					move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
				} else {
					echo "File is not an image.";
				}
			    header("Location:index.php?page=complaint");
			}else{
			    echo "Registration failed try again!";
			}
		}

		// Fetch customer records for show listing
		public function displayData($customer_id = null)
		{
			$query = "SELECT c.name as customer_name, c.id as customer_id, cs.foto as complaint_foto, cs.description as complaint_description, rs.* FROM respons rs Join complaint cs on rs.complaint_id = cs.id Join customers c on rs.custumers_id = c.id";
		    if (!is_null($customer_id)) {
				$query = $query . " where rs.complaint_id = " . $customer_id;
			}
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
		    $query = "SELECT * FROM complaint WHERE id = '$id'";
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
			$target_dir = "assets/uploads/";
			$description = $this->con->real_escape_string($_POST['description']);
			$target_file = $target_dir . basename($_FILES["foto"]["name"]);
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			$custumer_id = $_POST['custumer_id'];
			$id = $_POST['id'];
			
			$query="UPDATE complaint SET foto = '$target_file', custumers_id = '$custumer_id' WHERE id = '$id'";
			$check = getimagesize($_FILES["foto"]["tmp_name"]);
			$sql = $this->con->query($query) or die(mysqli_error($this->con).$query);
			if ($sql==true) {
				if($check !== false) {
					move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
				} else {
					echo "File is not an image.";
				}
			    header("Location:index.php?page=complaint");
			}else{
			    echo "updated failed try again!";
			}
		    
			
		}


		// Delete customer data from customer table
		public function deleteRecord($id)
		{
		    $query = "DELETE FROM complaint WHERE id = '$id'";
		    $sql = $this->con->query($query);
				if ($sql==true) {
					header("Location:index.php?page=complaint");
				} else{
					echo "Record does not delete try again";
				}
		}

	}
?>