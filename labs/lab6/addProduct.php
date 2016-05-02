<?php

if (!isset($_SESSION['username'])) {  //checks whether user has logged in
    $_SESSION['message'] = "Your session has expired"; 
    header("Location: login.php");
    exit;
}
else if (isset($_GET['addForm'])) {  //admin submitted form to add product
    include 'includes/database.php';
    
    $sql = "INSERT INTO product ( productName, productDescription, price, categoryId) 
          VALUES ( :productName, :productDescription, :price, :categoryId)";
          
    $namedParameters = array();
    $namedParameters[':productName'] = $_GET['productName'];
    $namedParameters[':productDescription'] = $_GET['productDescription'];
    $namedParameters[':price'] = $_GET['price'];
    $namedParameters[':categoryId'] = $_GET['categoryId'];
    
    $conn = getDatabaseConnection();    
    $statement = $conn->prepare($sql);
    $statement->execute($namedParameters);    
      
    $_SESSION['message'] = 'Product added successfully';
    header("Location: products.php"); 
}
else {
    unset($_SESSION['message']);
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Add new Product</title>
  <meta name="description" content="">
  <meta name="author" content="harrisonog">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>

<body>
  <div>
    <header>
      <h1>Adding New Product</h1>
    </header>

    <div>
      
      <form>
          
          Product Name: <input type="text" name="productName" /> <br />
          Description: <textarea rows="4" cols="20" name="productDescription"></textarea><br />
          Price: <input type="text" name="price" /> <br />
          Category: <select name="categoryId">
                       <option value="1">Soft Drinks</option>
                       <option value="2">Snacks </option>
                       <option value="3">Sandwiches </option>
                    </select>
          <br />          
          <input type="submit" value="Add Product" name="addForm" />
          
      </form>
      
      
    </div>

    <footer>
    </footer>
  </div>
</body>
</html>