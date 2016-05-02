 <?php
session_start();

if (!isset($_SESSION['username'])) {  //checks whether user has logged in
    
    header("Location: login.php");
    
}

include '../../database.inc.php';

$conn = getDatabaseConnection();

function displayAllProducts(){
    $sql = "SELECT productId, productName FROM oe_product ORDER BY productName";
    $records = getDataBySQL($sql);

    /* //Using HTML Links
    foreach ($records as $record) {
        echo $record['productName']; 
        echo " <a href='updateProduct.php?productId=".$record['productId']."'> Update </a> ";
        echo " <a href='deleteProduct.php'> Delete </a>";
        echo "<br />";
    }
    */

     //Using Form Buttons
         echo "<table>";
        foreach ($records as $record) {
          echo "<tr>"; 
          echo "<td>" . $record['productName'] . "</td>"; 
          echo "<td> <form action=updateProduct.php>";
          echo "<input type='hidden' name='productId' value='".$record['productId'] . "'/>";
          echo "<input type='submit' value='Update'/></form> </td>";
          echo "</tr>";
        } //endForeach
        echo "</table>";
     
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

</head>

<body>
  <div>
    <header>
      <h1>Product Administration</h1>
    </header>

   
    <div>
     <strong> Welcome <?=$_SESSION['adminName']?>! </strong>
     
     <form action="logout.php">
        <input type="submit" value="Logout" />    
     </form>
         
     <form action="addProduct.php">
        <input type="submit" value="Add New Product" />    
     </form>
         
      <br /><br />    
      <?=displayAllProducts()?>
      
      
      
      
    </div>

    <footer>

    </footer>
  </div>
</body>
</html>
