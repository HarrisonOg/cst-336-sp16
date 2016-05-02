 <?php

 include '../../database.inc.php';
 $conn = getDatabaseConnection();
 
 function getProductById(){
     global $conn;
    $sql = "SELECT * FROM oe_product WHERE productId = :productId";
    $namedParameters = array();
    $namedParameters[':productId'] = $_GET['productId'];
    $statement = $conn->prepare($sql);    
    $statement->execute($namedParameters);
    $record = $statement->fetch();
    return $record;
 }

if (isset($_GET['updateForm'])) {  //admin submitted the Update Form
    
    $sql = "UPDATE oe_product
            SET productName = :productName,
            productDescription = :productDescription,
            price = :price,
            categoryId = :categoryId
            WHERE productId = :productId";
    $namedParameters = array();
    $namedParameters[':productName'] = $_GET['productName'];
    $namedParameters[':productDescription'] = $_GET['productDescription'];
    $namedParameters[':price'] = $_GET['price'];
    $namedParameters[':categoryId'] = $_GET['categoryId'];
    $namedParameters[':productId'] = $_GET['productId'];

    $conn = getDatabaseConnection();    
    $statement = $conn->prepare($sql);
    $statement->execute($namedParameters);    
      echo "Record has been updated!";    
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>updateProduct</title>
  <meta name="description" content="">
  <meta name="author" content="lara4594">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>

<body>
  <div>
    <header>
      <h1>Update Product</h1>
    </header>

    <div>
        
        <?$product = getProductById()?>

      <form>
          
          Product Name: <input type="text" name="productName" value="<?=$product['productName']?>" /> <br />
          Description: <textarea rows="4" cols="20" name="productDescription"></textarea><br />
          Price: <input type="text" name="price" /> <br />
          Category: <select name="categoryId">
                       <option value="1">Soft Drinks</option>
                       <option value="2">Snacks </option>
                       <option value="3">Sandwiches </option>
                    </select>
          <br />          
          <input type="hidden" name="productId" value="<?=$product['productId']?>" />
          <input type="submit" value="Update Product" name="updateForm" />
          
      </form>

      
    </div>

    <footer>
    </footer>
  </div>
</body>
</html>
