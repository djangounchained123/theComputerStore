
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
                <li class="active"><a href="Products.php">Categories<span class="sr-only">(current)</span></a></li>
                <li><a href="Our Branches.php">Our Branches</a></li>
                <li><a href="Purchase A Product.php">Purchase A Product</a></li>
                <li><a href="Sell A Product.php">Sell A Product</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h3 class="page-header">My Computer Over View</h3>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 ,placeholder">
                  <a href="Computer Stores.php"><img src="im1.jpg" width="350" height="300" class="img-responsive" alt="Generic placeholder thumbnail"></a>
                 <h4>Computer Stores</h4>
                 <span class="text-muted">My Computers</span>
               </div>
               <div class="col-xs-6 col-sm-3 ,placeholder">
                 <a href="Products.php"><img src="im2.jpg" width="350" height="300" class="img-responsive" alt="Generic placeholder thumbnail"></a>
                 <h4>Products</h4>
                 <span class="text-muted">All Range Of Computers</span>
               </div>
               <div class="col-xs-6 col-sm-3 ,placeholder">
                 <a href="Accessories.php"><img src="im3.jpg" width="350" height="300" class="img-responsive" alt="Generic placeholder thumbnail"></a>
                 <h4>Accessories</h4>
                 <span class="text-muted">Compatibility Guarenteed</span>
               </div>
               <div class="col-xs-6 col-sm-3 ,placeholder">
                 <a href="Employees.php"><img src="im4.jpg" width="300" height="300" class="img-responsive" alt="Generic placeholder thumbnail"></a>
                 <h4>Employees</h4>
              <span class="text-muted">Our Team</span>
            </div>
          </div>
          <h2 class="sub-header">Products
          <form class="navbar-form navbar-right" method="POST" style="position : relative; bottom : 15px;">
            <input type="text" style="width: 300px;" class="form-control" name="search" placeholder="Custom List Your Items Here">
                  <input type = "submit" class="form-control" value="Go" />
          </form>
          </h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th><h4 align='center' style='font-weight: bold; font-family: serif;'>Name</h4></th>
			<th><h4 align='center' style='font-weight: bold; font-family: serif;'>Brand</h4></th>
		      <th><h4 align='center' style='font-weight: bold; font-family: serif;'>RAM</h4></th>
                  <th><h4 align='center' style='font-weight: bold; font-family: serif;'>Storage Type</h4></th>
                  <th><h4 align='center' style='font-weight: bold; font-family: serif;'>MRP</h4></th>
                </tr>
              </thead>
              <tbody>
            <?php
                  $link = mysqli_connect("localhost", "root", "", "DBMS_Mini_Project");
                  if($link === false)
                        die("ERROR: Could not connect. " . mysqli_connect_error());
                  if(isset($_POST['search']))
                  {
                        $searchq = $_POST['search'];
                        $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
                        $sql = "SELECT Product_Name, Company_Name, Ram_GB, Storage_Type_HDD_or_SSD, MRP FROM Product p, Company c, ProductSpec ps WHERE p.ProductID=ps.ProductID AND p.CompanyID=c.CompanyID AND (Product_Name LIKE '%$searchq%' OR Company_Name LIKE '%$searchq%')";
                  }
                  else
                        $sql = "SELECT Product_Name, Company_Name, Ram_GB, Storage_Type_HDD_or_SSD, MRP FROM Product p, Company c, ProductSpec ps WHERE p.ProductID=ps.ProductID AND p.CompanyID=c.CompanyID";
                  if($result = mysqli_query($link, $sql))
                  {
                        if(mysqli_num_rows($result) > 0)
                        {
                              while($row = mysqli_fetch_array($result))
                              {
                                    echo "<tr>";
                                          echo "<td align='center' style='font-weight: bold; font-family: serif;'>" . $row['Product_Name'] . "</td>";
                                          echo "<td align='center' style='font-family: serif;'>" . $row['Company_Name'] . "</td>";
                                          echo "<td align='center' style='font-family: serif;'>" . $row['Ram_GB'] . "</td>";
                                          echo "<td align='center' style='font-family: serif;'>" . $row['Storage_Type_HDD_or_SSD'] . "</td>";
                                          echo "<td align='center' style='font-family: serif;'>" . $row['MRP'] . "</td>";
                                    echo "</tr>";
                              }
                              mysqli_free_result($result);
                        }
                        else
                              echo "No records matching your query were found.";
                  }
                  else
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                  mysqli_close($link);
            ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
