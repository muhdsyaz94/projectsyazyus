<?php
session_start();



?>
<!DOCTYPE html>
<html>
	<head>
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="icon" type="image/png" sizes="192x192"  href="img/dasha_logo.jpg">
    <title>Dasha Empire | Official Site</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/business-casual.min.css" rel="stylesheet">
    

		 
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
	
	</head>
	<body>
    
    
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
      <div class="container">
       <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="home1.php"><img src="img/dasha_logo.jpg" width="100%" height="" alt="Dasha Logo"/></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="home1.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="about.php">About</a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="products.php">Products</a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="store.php">Store</a>
            </li>
              <li class="nav-item active px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="cart.php">Cart</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
		
     <section class="page-section about-heading">
      <div class="container">
        <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="img/.jpg" alt="">
        <div class="about-heading-content">
          <div class="row">
            <div class="col-xl-12 col-lg-10 mx-auto">
              <div class="bg-faded rounded p-5">
                <h2 class="section-heading mb-4">
         
                  <br>
                  <span class="section-heading-lower" align="center">Cart</span>
                
                </h2>
    
                
                <div class="container" ng-app="shoppingCart" ng-controller="shoppingCartController" ng-init="loadProduct(); fetchCart();">
			
  
			<form method="post">
				<div class="row">
					<div class="col-md-3" style="margin-top:12px;" ng-repeat = "product in products">
						<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; height:350px;" align="center">
							<img ng-src="images/{{product.image}}" class="img-responsive" /><br />
							<h4 class="text-info">{{product.name}}</h4>
							<h4 class="text-danger">{{product.price}}</h4>
							<input type="button" name="add_to_cart" style="margin-top:5px;" class="btn btn-success form-control" value="Add to Cart" ng-click="addtoCart(product)" />
						</div>
					</div>
				</div>
			</form>
			<br />
       
			 <div class="alert alert-warning" align="center">
    <strong>Your Cart Detail</strong>
  			</div>
      
			<div class="table-bordered table-responsive" id="order_table">
				<table class="table table-bordered">
					<tr>  
						<th width="40%">Product Name</th>  
						<th width="10%">Quantity</th>  
						<th width="20%">Price (RM)</th>  
						<th width="15%">Total (RM)</th>  
						<th width="5%">Action</th>  
					</tr>
					<tr ng-repeat = "cart in carts">
						<td>{{cart.product_name}}</td>
						<td>{{cart.product_quantity}}</td>
						<td>{{cart.product_price}}</td>
						<td>{{cart.product_quantity * cart.product_price}}</td>
						<td><button type="button" name="remove_product" class="btn btn-danger btn-xs" ng-click="removeItem(cart.product_id)">Remove</button></td>
					</tr>
					<tr>
						<td colspan="3" align="right">Total (RM)</td>
						<td colspan="2">{{ setTotals() }}</td>
					</tr>
				</table>
			</div>
      <!-- <form action="email.php" method="post">
        <input type="hidden" name="product_name" value={{cart.product_name}} />
        <input type="hidden" name="product_quantity" value="12345" />
        <input type="hidden" name="product_price" value="12345" />
        <input type="hidden" name="priceitem" value="12345" />
        <input type="hidden" name="total" value="12345" />
      <button  style="margin-left: 600px" type="submit" name="remove_product" class="btn btn-success btn-xs">Send</button>
      </form> -->
		</div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
      

           <footer class="footer text-faded text-center py-5">
      <div class="container">
        <p class="m-0 small">Copyright &copy; 
        
         <!-- auto year -->
    <script language="javascript" type="text/javascript">
    var today = new Date()
    var year = today.getFullYear()
    document.write(year)
    </script>
    <!-- auto year ENDS-->
        
        . All rights reserved. <a href="www.dashaempire.com.my">www.dashaempire.com.my</a></p>
      </div>
    </footer>
          <noscript>
      Please enable javascript.
      </noscript>
	</body>
</html>

<script>

var app = angular.module('shoppingCart', []);

app.controller('shoppingCartController', function($scope, $http){
	
	$scope.loadProduct = function(){
		$http.get('fetch.php').success(function(data){
            $scope.products = data;
        })
	};
	
	$scope.carts = [];
	
	$scope.fetchCart = function(){
		$http.get('fetch_cart.php').success(function(data){
            $scope.carts = data;
        })
	};
	
	$scope.setTotals = function(){
		var total = 0;
		for(var count = 0; count<$scope.carts.length; count++)
		{
			var item = $scope.carts[count];
			total = total + (item.product_quantity * item.product_price);
		}
		return total;
	};
	
	$scope.addtoCart = function(product){
		$http({
            method:"POST",
            url:"add_item.php",
            data:product
        }).success(function(data){
			$scope.fetchCart();
        });
	};
	
	$scope.removeItem = function(id){
		$http({
            method:"POST",
            url:"remove_item.php",
            data:id
        }).success(function(data){
			$scope.fetchCart();
        });
	};
	
});

</script>
   <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    