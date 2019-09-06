<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$productname = $_POST['productname'];
	$price = $_POST['price'];
    $stocks = $_POST['stocks'];
    $category = $_POST['category'];
    $supplier = $_POST['supplier'];
		
	// checking empty fields
	if(empty($productname) || empty($price) || empty($stocks)|| empty($category) || empty($supplier)) {
				
		if(empty($productname)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($price)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}
		
		if(empty($stocks)) {
			echo "<font color='red'>Stocks field is empty.</font><br/>";
        }
        if(empty($category)) {
			echo "<font color='red'>Category field is empty.</font><br/>";
        }
        if(empty($supplier)) {
			echo "<font color='red'>Supplier field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO tbl_products (productname, price, stocks, category, supplier) VALUES (:productname, :price, :stocks, :category, :supplier)";
		$query = $Conn->prepare($sql);
				
		$query->bindparam(':productname', $productname);
		$query->bindparam(':price', $price);
        $query->bindparam(':stocks', $stocks);
        $query->bindparam(':category', $category);
        $query->bindparam(':supplier', $supplier);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		
		//display success message
		echo "<font color='green'><center>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
