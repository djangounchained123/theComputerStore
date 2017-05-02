<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title></title>

    <link href="bootstrap.min.css" rel="stylesheet">


    <link href="ie10-viewport-bug-workaround.css" rel="stylesheet">


    <link href="dashboard.css" rel="stylesheet">

    <script src="ie-emulation-modes-warning.js"></script>

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">My Computer</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Control-Desk</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="Computer Stores.php">Categories</a></li>
            <li><a href="Our Branches.php">Our Branches</a></li>
            <li class="active"><a href="Purchase A Product.php">Purchase A Product<span class="sr-only">(current)</span></a></li>
            <li><a href="Sell A Product.php">Sell A Product</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h3 class="page-header">Stock the Essentials!</h3>

          <div class="row placeholders">
            <div class="placeholder">
                  <a href="Purchase A Computer.php#JumpToForms"><img src="Purchase A Computer.jpg" width="700" height="100%" class="img-responsive" alt="Generic placeholder thumbnail" style="border-radius:30px;"></a>
                  <h4 id="JumpToForms">Our Purchases</h4>
                  <span class="text-muted">Computers</span>
                  <br/><br/><br/>
                  <h4>Have A Computer Purchase</h4>
            </div>
            <div style="align: center; position : relative; right: 34%">
                 <form class="navbar-form navbar-right" method="POST" style="position : relative;">
                      <table style="margin: 10px">
                      <div><input type="text" style="width: 100%;" class="form-control" name="StoreName" placeholder="Store Name" required></div>
                      <div><input type="text" style="width: 100%;" class="form-control" name="ProductName" placeholder="Computer Name" required></div>
                      <div><input type="text" style="width: 100%;" class="form-control" name="CompanyName" placeholder="Company Name" required></div>
                      <div><input type="number" style="width: 100%;" step="1" class="form-control" name="Quantity" placeholder="Quantity" required></div>
                      <div><input type="number" style="width: 100%;" step="1" class="form-control" name="PricePerPiece" placeholder="Price/Piece" required></div>
                      <div>Date<input type="date" style="width: 100%;" class="form-control" name="PurchaseDate" required></div><br/>
                      <div><input type = "submit" class="form-control" value="Make Purchase"/>
                      </table>
                </form>
             </div>
          </div>
          <Purchase>
              <?php
                    $link = mysqli_connect("localhost", "root", "", "DBMS_Mini_Project");
                    if($link === false)
                          die("ERROR: Could not connect. " . mysqli_connect_error());
                    $sql = "";
                    if(isset($_POST['StoreName']) && isset($_POST['ProductName']) && isset($_POST['CompanyName']) && isset($_POST['Quantity']) && isset($_POST['PricePerPiece']) && isset($_POST['PurchaseDate']))
                    {
                          $InsertStoreName = mysqli_real_escape_string($link, $_REQUEST['StoreName']);
                          $InsertProdtuctName = mysqli_real_escape_string($link, $_REQUEST['ProductName']);
                          $InsertCompanyName = mysqli_real_escape_string($link, $_REQUEST['CompanyName']);
                          $InsertQuantityString = mysqli_real_escape_string($link, $_REQUEST['Quantity']);
                          $InsertQuantity = (is_numeric($_POST['Quantity']) ? (int)$_POST['Quantity'] : 0);
                          $InsertPriceString = mysqli_real_escape_string($link, $_REQUEST['PricePerPiece']);
                          $InsertPrice = (is_numeric($_POST['PricePerPiece']) ? (int)$_POST['PricePerPiece'] : 0);
                          $InsertDate = mysqli_real_escape_string($link, $_REQUEST['PurchaseDate']);

                          $InsertedStoreNameExistssql = "SELECT StoreID FROM Store WHERE Store_Name='$InsertStoreName'";
                          $InsertedStoreNameExists = mysqli_query($link, $InsertedStoreNameExistssql);
                          $InsertedStoreName = mysqli_fetch_array($InsertedStoreNameExists);
                          $InsertedStoreNameValue = $InsertedStoreName['StoreID'];

                          $InsertedProductNameExistssql = "SELECT ProductID FROM Product WHERE Product_Name='$InsertProdtuctName'";
                          $InsertedProductNameExists = mysqli_query($link, $InsertedProductNameExistssql);
                          $InsertedProductName = mysqli_fetch_array($InsertedProductNameExists);
                          $InsertedProductNameValue = $InsertedProductName['ProductID'];

                          $InsertedCompanyNameExistssql = "SELECT CompanyID FROM Company WHERE Company_Name='$InsertCompanyName'";
                          $InsertedCompanyNameExists = mysqli_query($link, $InsertedCompanyNameExistssql);
                          $InsertedCompanyName = mysqli_fetch_array($InsertedCompanyNameExists);
                          $InsertedCompanyNameValue = $InsertedCompanyName['CompanyID'];

                          $MaxPurchaseIDsql = "SELECT max(PurchaseID) AS max FROM Product_Purchase";
                          $MaxPurchaseID = mysqli_query($link, $MaxPurchaseIDsql);
                          $MaxPurchaseIDsString = mysqli_fetch_array($MaxPurchaseID);
                          $MaxPurchaseIDsStringValue = $MaxPurchaseIDsString['max'];

                          $NumberOfrows = mysqli_num_rows($MaxPurchaseID);
                          $MaxPurchaseIDsINTstring = substr($MaxPurchaseIDsStringValue,3);
                          $MaxPurchaseIDsINTinteger = $MaxPurchaseIDsINTstring + 0;

                          if($MaxPurchaseIDsINTinteger < 1000)
                          {
                                $NextPurchaseIDsINTinteger = $MaxPurchaseIDsINTinteger + 1;
                                $NextPurchaseIDsINTstring = "$NextPurchaseIDsINTinteger"; //echo gettype($NextPurchaseIDsINTstring);
                                if($NextPurchaseIDsINTinteger < 10)
                                {
                                      $NextPurchaseID = "PUR00";
                                      $NextPurchaseID = $NextPurchaseID . $NextPurchaseIDsINTstring;
                                }
                                else if($NextPurchaseIDsINTinteger < 100)
                                {
                                      $NextPurchaseID = "PUR0";
                                      $NextPurchaseID = $NextPurchaseID . $NextPurchaseIDsINTstring;
                                }
                                else
                                {
                                      $NextPurchaseID = "PUR";
                                      $NextPurchaseID = $NextPurchaseID . $NextPurchaseIDsINTstring;
                                }
                          };
                                if ((mysqli_num_rows(mysqli_query($link, $InsertedProductNameExistssql)) > 0) && (mysqli_num_rows(mysqli_query($link, $InsertedCompanyNameExistssql)) > 0))
                                {
                                      $sql = "INSERT INTO Product_Purchase (PurchaseID, StoreID, ProductID, CompanyID, Quantity, Price_per_Piece, Purchase_Date) VALUES ('$NextPurchaseID', '$InsertedStoreNameValue', '$InsertedProductNameValue', '$InsertedCompanyNameValue', '$InsertQuantity', '$InsertPrice', '$InsertDate')";
                                      if(mysqli_query($link, $sql)){
                                            echo "<h4 align='center' style='font-family: serif;'>" . "Records inserted successfully." . "</h4>";
                                            echo "<h4 align='center' style='font-family: serif;'>" . $InsertStoreName . " Purchased " . $InsertQuantity . " quantities of the computer " . $InsertProdtuctName . " from the company " . $InsertCompanyName . " on " . $InsertDate . "." . "</h4>" . "<br/>";
                                      }
                                      else{
                                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                      }
                                }
                                else
                                      echo 'Insert Valid Names.' . "</br>" . 'Names inserted by you: "' . $InsertStoreName . "\", \"" . $InsertProdtuctName . "\", \"" . $InsertCompanyName . "\"";
                    }
                    mysqli_close($link);
              ?>
          </Purchase>
          <h2 class="sub-header">Purchase History
                <form class="navbar-form navbar-right" method="POST" style="position : relative; bottom : 15px;">
                     <input type="text" style="width: 300px;" class="form-control" name="search" placeholder="Custom List Purchase History">
                     <input type = "submit" class="form-control" value="Go" />
                </form>
          </h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th><h4 align="center" style="font-weight: bold; font-family: serif;">Store</h4></th>
                  <th><h4 align="center" style="font-weight: bold; font-family: serif;">Product</h4></th>
                  <th><h4 align="center" style="font-weight: bold; font-family: serif;">Company</h4></th>
                  <th><h4 align="center" style="font-weight: bold; font-family: serif;">Quantity</h4></th>
                  <th><h4 align="center" style="font-weight: bold; font-family: serif;">Price/Piece</h4></th>
                  <th><h4 align="center" style="font-weight: bold; font-family: serif;">Date</h4></th>
                </tr>
              </thead>
              <tbody>
                  <?php
                        $link1 = mysqli_connect("localhost", "root", "", "DBMS_Mini_Project");
                        if($link1 === false)
                        	die("ERROR: Could not connect. " . mysqli_connect_error());
                        if(isset($_POST['search']))
                        {
                        	$searchq = $_POST['search'];
                        	$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
                        	$sql1 = "SELECT DISTINCT Store_Name, Product_Name, Company_Name, Quantity, Price_per_Piece, Purchase_Date FROM Store AS s, Product AS p, Company AS c, Product_Purchase as pp WHERE pp.StoreID=s.StoreID AND pp.StoreID=s.StoreID AND pp.ProductID=p.ProductID AND pp.CompanyID=c.CompanyID AND (Store_Name LIKE '%$searchq%' OR Product_Name LIKE '%$searchq%' OR Company_Name LIKE '%$searchq%') ORDER BY Purchase_Date DESC" ;
                        }
                        else
                              $sql1 = "SELECT DISTINCT Store_Name, Product_Name, Company_Name, Quantity, Price_per_Piece, Purchase_Date FROM Store AS s, Product AS p, Company AS c, Product_Purchase as pp WHERE pp.StoreID=s.StoreID AND pp.StoreID=s.StoreID AND pp.ProductID=p.ProductID AND pp.CompanyID=c.CompanyID ORDER BY Purchase_Date DESC";
                        if($result1 = mysqli_query($link1, $sql1))
                        {
                              if(mysqli_num_rows($result1) > 0)
                              {
                                   while($row = mysqli_fetch_array($result1))
                                   {
                                        echo "<tr>";
                                        echo "<td align='center' style='font-weight: bold; font-family: serif;'>" . $row['Store_Name'] . "</td>";
                                        echo "<td align='center' style='font-family: serif;'>" . $row['Product_Name'] . "</td>";
                                        echo "<td align='center' style='font-family: serif;'>" . $row['Company_Name'] . "</td>";
                                        echo "<td align='center' style='font-family: serif;'>" . $row['Quantity'] . "</td>";
                                        echo "<td align='center' style='font-family: serif;'>" . $row['Price_per_Piece'] . "</td>";
                                        echo "<td align='center' style='font-family: serif;'>" . $row['Purchase_Date'] . "</td>";
                                        echo "</tr>";
                                  }
                                  mysqli_free_result($result1);
                              }
                              else
                                    echo "No records matching your query were found.";
                        }
                        else
                              echo "ERROR: Could not able to execute $sql1. " . mysqli_error($link1);
                  	mysqli_close($link1);
                  ?>
            </tbody>
          </table>
         </div>
        </div>
      </div>
    </div>
  </body>
</html>
