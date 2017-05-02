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

    <style>
      #panel, .flip {
            font-size: 10px;
            padding: 5px;
            text-align: center;
            margin: auto;
      }

      #panel {
            display: none;
      }
      </style>
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
            <li><a href="Purchase A Product.php">Purchase A Product</a></li>
            <li class="active"><a href="Sell A Product.php">Sell A Product<span class="sr-only">(current)</span></a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h3 class="page-header">Give The Best!</h3>

          <div class="row placeholders">
            <div class="placeholder">
                  <a href="Sell A Computer.php#JumpToForms"><img src="Sell A Computer.jpg" width="700" height="100%" class="img-responsive" alt="Generic placeholder thumbnail" style="border-radius:30px;"></a>
                  <h4 id="JumpToForms">Our Sales</h4>
                  <span class="text-muted">Computer</span>
                  <br/><br/><br/>
                  <h4>Sell A Computer</h4>
            </div>
            <div style="align: center; position : relative; right: 34%">
                 <form class="navbar-form navbar-right" method="POST" style="position : relative;">
                      <table style="margin: 10px">
                      <div><input type="text" style="width: 100%;" class="form-control" name="StoreName" placeholder="Store Name" required></div>
                      <div><input type="text" style="width: 100%;" class="form-control" name="ProductName" placeholder="Computer Name" required></div>
                      <div><input type="text" style="width: 100%;" class="form-control" name="EmployeeName" placeholder="Employee Name" required></div>
                      <div><input type="text" style="width: 100%;" class="form-control" name="CustomerName" placeholder="Customer Name" required></div>
                      <p class="flip" onclick="myFunction()" style="cursor:pointer">Click here if new customer</p>
                      <div id="panel">
                            <div style="align: center; position : relative; right: -20%"><input type="text" style="width: 100%;" class="form-control" name="CustomerDesignation" placeholder="Designation"></div>
                            <div style="align: center; position : relative; right: -20%"><input type="text" style="width: 100%;" class="form-control" name="CustomerPhone" placeholder="Phone Number"></div>
                            <div style="align: center; position : relative; right: -20%"><input type="text" style="width: 100%;" class="form-control" name="CustomerEmail" placeholder="Email"></div>
                            <div style="align: center; position : relative; right: -20%"><input type="text" style="width: 100%;" class="form-control" name="CustomerCity" placeholder="City"></div>
                            <div style="align: center; position : relative; right: -20%"><input type="text" style="width: 100%;" class="form-control" name="CustomerAreaOrBlock" placeholder="Area/Block"></div>
                            <div style="align: center; position : relative; right: -20%"><input type="text" style="width: 100%;" class="form-control" name="CustomerStreet" placeholder="Street"></div>
                            <div style="align: center; position : relative; right: -20%"><input <input type="number" style="width: 100%;" step="1" class="form-control" name="DoorNumber" placeholder="Door Number"></div>
                            <div style="align: center; position : relative; right: -20%"><input <input type="number" style="width: 100%;" step="1" class="form-control" name="PIN" placeholder="PIN Code"></div>
                            <p class="flip" onclick="myFunction1()" style="cursor:pointer; align: center; position : relative; right: -20%">Click here if not a new customer</p>
                      </div>
                      <div><input type="number" style="width: 100%;" step="1" class="form-control" name="Commission" placeholder="Commission"></div>
                      <div><input type="number" style="width: 100%;" step="1" class="form-control" name="Quantity" placeholder="Quantity" required></div>
                      <div><input type="number" style="width: 100%;" step="1" class="form-control" name="PricePerPiece" placeholder="Price/Piece" required></div>
                      <div>Date<input type="date" style="width: 100%;" class="form-control" name="PurchaseDate" required></div><br/>
                      <div><input type = "submit" class="form-control" value="Sell"/>
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
                    if(isset($_POST['StoreName']) && isset($_POST['ProductName']) && isset($_POST['EmployeeName']) && isset($_POST['Quantity']) && isset($_POST['PricePerPiece']) && isset($_POST['PurchaseDate']))
                    {
                          $InsertStoreName = mysqli_real_escape_string($link, $_REQUEST['StoreName']);
                          $InsertProdtuctName = mysqli_real_escape_string($link, $_REQUEST['ProductName']);
                          $InsertEmployeeName = mysqli_real_escape_string($link, $_REQUEST['EmployeeName']);
                          $InsertCustomerName = mysqli_real_escape_string($link, $_REQUEST['CustomerName']);
                          $InsertCommissionString = mysqli_real_escape_string($link, $_REQUEST['Commission']);
                          $InsertCommission = (is_numeric($_POST['Commission']) ? (int)$_POST['Commission'] : 0);
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

                          $InsertedEmployeeNameExistssql = "SELECT EmpID FROM Employee WHERE Emp_Name='$InsertEmployeeName'";
                          $InsertedEmployeeNameExists = mysqli_query($link, $InsertedEmployeeNameExistssql);
                          $InsertedEmployeeName = mysqli_fetch_array($InsertedEmployeeNameExists);
                          $InsertedEmployeeNameValue = $InsertedEmployeeName['EmpID'];

                          $InsertedCustomerNameExistssql = "SELECT CustomerID FROM Customer WHERE Customer_Name='$InsertCustomerName'";
                          $InsertedCustomerNameExists = mysqli_query($link, $InsertedCustomerNameExistssql);
                          $InsertedCustomerName = mysqli_fetch_array($InsertedCustomerNameExists);
                          $NextCustomerID = $InsertedCustomerName['CustomerID'];

                          if (mysqli_num_rows($InsertedCustomerNameExists) > 0)
                          {
                                $OldCustomer = TRUE;
                                //echo "New CustomerID = " . $NextCustomerID;
                          }
                          else
                          {
                                $OldCustomer = FAlSE;
                                $InsertCustomerDesignation = mysqli_real_escape_string($link, $_REQUEST['CustomerDesignation']);
                                $InsertCustomerPhone = mysqli_real_escape_string($link, $_REQUEST['CustomerPhone']);
                                $InsertCustomerEmail = mysqli_real_escape_string($link, $_REQUEST['CustomerEmail']);
                                $InsertCustomerCity = mysqli_real_escape_string($link, $_REQUEST['CustomerCity']);
                                $InsertCustomerAreaOrBlock = mysqli_real_escape_string($link, $_REQUEST['CustomerAreaOrBlock']);
                                $InsertCustomerStreet = mysqli_real_escape_string($link, $_REQUEST['CustomerStreet']);
                                $InsertDoorNumber = (is_numeric($_POST['DoorNumber']) ? (int)$_POST['DoorNumber'] : 0);
                                $InsertPIN = (is_numeric($_POST['PIN']) ? (int)$_POST['PIN'] : 0);

                                $MaxCustomerIDsql = "SELECT max(CustomerID) AS maxCustomerID FROM Customer";
                                $MaxCustomerID = mysqli_query($link, $MaxCustomerIDsql);
                                $MaxCustomerIDsString = mysqli_fetch_array($MaxCustomerID);
                                $MaxCustomerIDsStringValue = $MaxCustomerIDsString['maxCustomerID'];
                                $NumberOfrows = mysqli_num_rows($MaxCustomerID);
                                $MaxCustomerIDsINTstring = substr($MaxCustomerIDsStringValue,3);
                                $MaxCustomerIDsINTinteger = $MaxCustomerIDsINTstring + 0;

                                if($MaxCustomerIDsINTinteger < 1000)
                                {
                                     $NextCustomerIDsINTinteger = $MaxCustomerIDsINTinteger + 1;
                                     $NextCustomerIDsINTstring = "$NextCustomerIDsINTinteger"; //echo gettype($NextPurchaseIDsINTstring);
                                     if($NextCustomerIDsINTinteger < 10)
                                     {
                                           $NextCustomerID = "CST00";
                                           $NextCustomerID = $NextCustomerID . $NextCustomerIDsINTstring;
                                     }
                                     else if($NextCustomerIDsINTinteger < 100)
                                     {
                                           $NextCustomerID = "CST0";
                                           $NextCustomerID = $NextCustomerID . $NextCustomerIDsINTstring;
                                     }
                                     else
                                     {
                                           $NextCustomerID = "CST";
                                           $NextCustomerID = $NextCustomerID . $NextCustomerIDsINTstring;
                                     }
                               }
                               //echo "New CustomerID = " . $NextCustomerID;
                          }

                          $MaxSoldIDsql = "SELECT max(SoldID) AS maxSoldID FROM Product_Sells";
                          $MaxSoldID = mysqli_query($link, $MaxSoldIDsql);
                          $MaxSoldIDsString = mysqli_fetch_array($MaxSoldID);
                          $MaxSoldIDsStringValue = $MaxSoldIDsString['maxSoldID'];

                          $NumberOfrows = mysqli_num_rows($MaxSoldID);
                          $MaxSoldIDsINTstring = substr($MaxSoldIDsStringValue,3);
                          $MaxSoldIDsINTinteger = $MaxSoldIDsINTstring + 0;

                          if($MaxSoldIDsINTinteger < 1000)
                          {
                                $NextSoldIDsINTinteger = $MaxSoldIDsINTinteger + 1;
                                $NextSoldIDsINTstring = "$NextSoldIDsINTinteger"; //echo gettype($NextPurchaseIDsINTstring);
                                if($NextSoldIDsINTinteger < 10)
                                {
                                      $NextSoldID = "SOL00";
                                      $NextSoldID = $NextSoldID . $NextSoldIDsINTstring;
                                }
                                else if($NextSoldIDsINTinteger < 100)
                                {
                                      $NextSoldID = "SOL0";
                                      $NextSoldID = $NextSoldID . $NextSoldIDsINTstring;
                                }
                                else
                                {
                                      $NextSoldID = "SOL";
                                      $NextSoldID = $NextSoldID . $NextSoldIDsINTstring;
                                }
                          };
                                if ((mysqli_num_rows(mysqli_query($link, $InsertedProductNameExistssql)) > 0) && (mysqli_num_rows(mysqli_query($link, $InsertedEmployeeNameExistssql)) > 0))
                                {
                                      if($OldCustomer == True)
                                      {
                                            $sql = "INSERT INTO Product_Sells (SoldID, StoreID, EmpID, ProductID, CustomerID, Quantity, Price_per_Piece, Commission_in_Percentage, Sold_Date) VALUES ('$NextSoldID', '$InsertedStoreNameValue', '$InsertedEmployeeNameValue', '$InsertedProductNameValue', '$NextCustomerID', '$InsertQuantity', '$InsertPrice', $InsertCommission, '$InsertDate')";
                                            if(mysqli_query($link, $sql))
                                            {
                                                 echo "<h4 align='center' style='font-family: serif;'>" . "Records inserted successfully." . "</h4>";
                                                 echo "<h4 align='center' style='font-family: serif;'>" . $InsertStoreName . " sold " . $InsertQuantity . " number of the computer(s) " . $InsertProdtuctName . " to the customer " . $InsertCustomerName . " through the employee " . $InsertEmployeeName . " on " . $InsertDate . "." . "</h4>" . "<br/>";
                                            }
                                            else
                                                 echo "<h4 align='center' style='font-family: serif;'>" . "Product selling records insertion failed. " . mysqli_error($link) . "</h4>";

                                      }
                                      else if ($OldCustomer == False)
                                      {
                                            $sql2 = "INSERT INTO Customer (CustomerID, Customer_Name, Customer_Designation, Customer_Phone, Customer_Email) VALUES ('$NextCustomerID', '$InsertCustomerName', '$InsertCustomerDesignation', '$InsertCustomerPhone', '$InsertCustomerEmail')";
                                            $sql3 = "INSERT INTO Customer_Address (CustomerID, City, Area_or_Block, Street, Door_Number, PIN) VALUES ('$NextCustomerID', '$InsertCustomerCity', '$InsertCustomerAreaOrBlock', '$InsertCustomerStreet', '$InsertDoorNumber', '$InsertPIN')";
                                            //echo "<br/>" . $InsertedEmployeeNameValue;
                                            if((mysqli_query($link, $sql2)) && (mysqli_query($link, $sql3)))
                                            {
                                                 $sql4 = "INSERT INTO Product_Sells (SoldID, StoreID, EmpID, ProductID, CustomerID, Quantity, Price_per_Piece, Commission_in_Percentage, Sold_Date) VALUES ('$NextSoldID', '$InsertedStoreNameValue', '$InsertedEmployeeNameValue', '$InsertedProductNameValue', '$NextCustomerID', '$InsertQuantity', '$InsertPrice', $InsertCommission, '$InsertDate')";
                                                 if(mysqli_query($link, $sql4))
                                                 {
                                                       echo "<h4 align='center' style='font-family: serif;'>" . "Records inserted successfully." . "</h4>";
                                                       echo "<h4 align='center' style='font-family: serif;'>" . $InsertStoreName . " sold " . $InsertQuantity . " number of the computer(s) " . $InsertProdtuctName . " to the customer " . $InsertCustomerName . " through the employee " . $InsertEmployeeName . " on " . $InsertDate . "." . "</h4>";
                                                 }
                                                 else
                                                       echo "<h4 align='center' style='font-family: serif;'>" . "Product selling records insertion failed. " . mysqli_error($link) . "</h4>";
                                                 echo "<h4 align='center' style='font-family: serif;'>" . $InsertCustomerName . " is our new customer." . "</h4>";
                                                 echo "<h4 align='center' style='font-family: serif;'>" . "Customer Details inserted successfully." . "</h4>";
                                            }
                                            else
                                                 echo "<h4 align='center' style='font-family: serif;'>" . "Customer Details insertion failed." . mysqli_error($link) . "</h4>";
                                      }
                                      else
                                      {
                                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                      }
                                }
                                else
                                      echo 'Insert Valid Names.' . "</br>" . 'Names inserted by you: "' . $InsertStoreName . "\", \"" . $InsertProdtuctName . "\", \"" . $InsertEmployeeName . "\"";
                    }
                    mysqli_close($link);
              ?>
          </Purchase>
          <h2 class="sub-header">Sales History
                <form class="navbar-form navbar-right" method="POST" style="position : relative; bottom : 15px;">
                     <input type="text" style="width: 300px;" class="form-control" name="search" placeholder="Custom List Computer Purchase History">
                     <input type = "submit" class="form-control" value="Go" />
                </form>
          </h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th><h4 align="center" style="font-weight: bold; font-family: serif;">Store</h4></th>
                  <th><h4 align="center" style="font-weight: bold; font-family: serif;">Computer</h4></th>
                  <th><h4 align="center" style="font-weight: bold; font-family: serif;">Company</h4></th>
                  <th><h4 align="center" style="font-weight: bold; font-family: serif;">Employee</h4></th>
                  <th><h4 align="center" style="font-weight: bold; font-family: serif;">Customer</h4></th>
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
                        	$sql1 = "SELECT DISTINCT Store_Name, Product_Name, Company_Name, Emp_Name, Customer_Name, Quantity, Price_per_Piece, Sold_Date FROM Store AS s, Product AS p, Company AS c, Employee AS e, Customer AS c1, Product_Sells AS pp WHERE pp.StoreID=s.StoreID AND pp.EmpID=e.EmpID AND pp.CustomerID=c1.CustomerID AND pp.StoreID=s.StoreID AND pp.ProductID=p.ProductID AND p.CompanyID=c.CompanyID AND (Store_Name LIKE '%$searchq%' OR Customer_Name LIKE '%$searchq%' OR Emp_Name LIKE '%$searchq%' OR Product_Name LIKE '%$searchq%' OR Company_Name LIKE '%$searchq%') ORDER BY Sold_Date DESC" ;
                        }
                        else
                              $sql1 = "SELECT DISTINCT Store_Name, Product_Name, Company_Name, Emp_Name, Customer_Name, Quantity, Price_per_Piece, Sold_Date FROM Store AS s, Product AS p, Company AS c, Employee AS e, Customer AS c1, Product_Sells AS pp WHERE pp.StoreID=s.StoreID AND pp.EmpID=e.EmpID AND pp.CustomerID=c1.CustomerID AND pp.StoreID=s.StoreID AND pp.ProductID=p.ProductID AND p.CompanyID=c.CompanyID ORDER BY Sold_Date DESC";
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
                                        echo "<td align='center' style='font-family: serif;'>" . $row['Emp_Name'] . "</td>";
                                        echo "<td align='center' style='font-family: serif;'>" . $row['Customer_Name'] . "</td>";
                                        echo "<td align='center' style='font-family: serif;'>" . $row['Quantity'] . "</td>";
                                        echo "<td align='center' style='font-family: serif;'>" . $row['Price_per_Piece'] . "</td>";
                                        echo "<td align='center' style='font-family: serif;'>" . $row['Sold_Date'] . "</td>";
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
    <script>
      function myFunction() {
          document.getElementById("panel").style.display = "block";
      }
      function myFunction1() {
          document.getElementById("panel").style.display = "none";
      }
      </script>
  </body>
</html>
