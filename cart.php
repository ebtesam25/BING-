<?php
session_start();
 $con=mysqli_connect('localhost','root','Chandler');
      mysqli_select_db($con,'bing');
$product_ids =array();
//session_destroy();
//check if addrto cart button submitted>?
if(filter_input(INPUT_POST,'add_to_cart')){
	
  if(isset($_SESSION['shopping_cart'])){

    $count=count($_SESSION['shopping_cart']);

    //create sequential arrays for matching array key to product ids
    $product_ids=array_column($_SESSION['shopping_cart'],'id');
	  

    //pre_r($product_ids);
	  

    if(!in_array(filter_input(INPUT_GET,'id'),$product_ids)){
		$pid=filter_input(INPUT_GET,'id');
					$uq=filter_input(INPUT_POST,'quantity');
			//echo $uq;
				  
			//echo $pid;
		$sql2="SELECT quantity as quan FROM cart WHERE id=$pid";
		$res=mysqli_query($con,$sql2);
		$quant=$res->fetch_object()->quan;
		//echo $quant;
		if($quant-$uq>=0){
				   $sql = "UPDATE cart SET quantity=quantity-$uq WHERE id=$pid";
				  mysqli_query($con, $sql);
			 $_SESSION['shopping_cart'][$count] =array
    (
      'id'=>filter_input(INPUT_GET,'id'),
      'name'=>filter_input(INPUT_POST,'name'),
      'price'=>filter_input(INPUT_POST,'price'),
      'discount'=>filter_input(INPUT_POST,'discount'),
      'quantity'=>filter_input(INPUT_POST,'quantity')	   

    );
		}
		else{
			echo '<script type="text/javascript">alert("Sorry we do not have enough posters in stock at the moment!");</script>';
			
			
		}
    				
					

    }
    //if already exits in cart increase quantity
    else{
      for($i=0;$i<count($product_ids); $i++){
        if($product_ids[$i]==filter_input(INPUT_GET,'id')){
          //add item quantity to the existing product in array
			$uq=filter_input(INPUT_POST,'quantity');
			//echo $uq;
				  $pid=filter_input(INPUT_GET,'id');
			//echo $pid;
			$sql2="SELECT quantity as quan FROM cart WHERE id=$pid";
		$res=mysqli_query($con,$sql2);
		$quant=$res->fetch_object()->quan;
		//echo $quant;
			if($quant-$uq>=0){
				   $sql = "UPDATE cart SET quantity=quantity-$uq WHERE id=$pid";
				  mysqli_query($con, $sql);
          $_SESSION['shopping_cart'][$i]['quantity']+=
          filter_input(INPUT_POST,'quantity');
		}
		  else{
			  echo '<script type="text/javascript">alert("Sorry we do not have enough posters in stock at the moment!");</script>';
		  }
			
        }
      }

    }



  }
  else{//shopping cart doesnt exist, product with 0
    $_SESSION['shopping_cart'][0] =array
    (
      'id'=>filter_input(INPUT_GET,'id'),
      'name'=>filter_input(INPUT_POST,'name'),
      'price'=>filter_input(INPUT_POST,'price'),
      'discount'=>filter_input(INPUT_POST,'discount'),
      'quantity'=>filter_input(INPUT_POST,'quantity'),

    );
  
	  $pid=filter_input(INPUT_GET,'id');
					$uq=filter_input(INPUT_POST,'quantity');
			//echo $uq;
				  
			//echo $pid;
		$sql2="SELECT quantity as quan FROM cart WHERE id=$pid";
		$res=mysqli_query($con,$sql2);
		$quant=$res->fetch_object()->quan;
		//echo $quant;
		if($quant-$uq>=0){
				   $sql = "UPDATE cart SET quantity=quantity-$uq WHERE id=$pid";
				  mysqli_query($con, $sql);
		}
		else{
			echo '<script type="text/javascript">alert("Sorry we do not have enough posters in stock at the moment!");</script>';
		}

  }
}
if(filter_input(INPUT_GET,'action'))
{
if(filter_input(INPUT_GET,'action')=='delete'){
  //loop thrpugh all products until it matches get varobale

  foreach($_SESSION['shopping_cart']as $key => $product){
    if ($product['id']== filter_input(INPUT_GET,'id')){
      //remove product from cart
		$rq=$product['quantity'];
			//echo $rq;
				  $pid=$product['id'];
			//echo $pid;
				   $sql = "UPDATE cart SET quantity=quantity+$rq WHERE id=$pid";
				  mysqli_query($con, $sql);
      unset($_SESSION['shopping_cart'][$key]);

    }
  }
  //reset session array keys so that they match with product 

  $_SESSION['shopping_cart']=array_values($_SESSION['shopping_cart']);

}
}

//pre_r($_SESSION);

function pre_r($array){
  echo'<pre>';
  print_r($array);
  echo'</pre>';
}


?> 




<!DOCTYPE html>
<html>
<head>
  <title>Bing | Shop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <link rel="stylesheet" type="text/css" href="cart.css">
	<link href="cart.js" rel="script" type="text/javascript">
</head>

<body>
 
	<div class="navbarx"><div class="bing_title"><a href="index.php"><img src="images/bing_title.png" width="137" height="60" alt=""/></a></div>
<div class="shop"><a href="cart.php">SHOP</a></div><div class="about"><a href="#">ABOUT</a></div><div class="contact">CONTACT</div></div>
	<div class="dropdownx">
  <button class="dropbtnx"><img src="images/usericon.png" class="user" width="26" height="28" alt=""/></button>
  <div class="dropdownx-content">
    <a href="login.php">Login</a>
    <a href="register.php">Sign Up</a>
    
	<a href="logout.php">Logout</a>
  </div>
	 </div>
<div class="carttop"><a href="cart.php"><img src="images/cart.png" width="30" height="30" alt=""/></a></div>
	
	
	<div class="body-block">
  <div class="container">
  
     <div class="row"> 
  <?php

      $con=mysqli_connect('localhost','root','Chandler');
      mysqli_select_db($con,'bing');
     /* if($con)
      {
        echo "CONNECTION SUCCESSFUL";

      }
      else
      {
        echo "no connection";
      }
      */
   


      $query="SELECT * FROM cart WHERE quantity>0 ORDER BY id DESC";

      $result=mysqli_query($con,$query);

     if($result):

      if(mysqli_num_rows($result)>0):
        while($product = mysqli_fetch_array($result)):
          ?>

          <div class="col-lg-3 col-md-4 col-sm-12">
            <form method="post" action="cart.php?action=add&id=
             <?php echo $product['id']; ?>">
                     <div class="products">
                       <h6 class="card-title bg-info text-white p-2 text-uppercase"> 
                           <?php echo $product['name'];?>  </h6>
                      <img src="<?php   echo  
                           $product['image']; ?>" alt="poster"
                           class="img-fluid mb-2" style="max-height:180px"/><br>


                         
                        
                      <h6>$ <?php echo $product['price']; ?></h6>
						 
                        
                      <input type="text" name="quantity" class="form-control"
                   value="1"/>
                   <input type="hidden" name="name" value="<?php
                   echo $product['name'];?>" />
                   <input type="hidden" name="price" value="<?php
                   echo $product['price']; ?>" />
					
					
                  
       
          <input type="submit" name="add_to_cart";
                   class="btn btn-danger flex-fill text atc" value="Add to Cart">
						 <a style="margin-top:10px margin-bottom:20px;" class="btn btn-info" href="details.php?id=<?php
                echo $product['id'];?>">Details</a>
             <br><br>
                
                </div>
               

            </form>

          </div>


       <?php         
        endwhile;
        endif;
        endif;
     
      


      ?>

      <div style="clear:both"></div>
      <br>
		 
      <div class="table-responsive"id="shoppingc">
        <table class="table text">
			
          <tr><th colspan="12"><h3 class="text">Your Order</h3></th></tr>
			
          <tr>
            <th width="40%">Product Name</th>
            <th width="10%">Quantity</th>
            <th width="20%">Price</th>
            <th width="15%">Total</th>
            <th width="5%">Action</th>
          </tr>
          <?php
          if(!empty($_SESSION['shopping_cart'])):
            $total=0;
            foreach($_SESSION['shopping_cart'] as $key =>$product):
              ?>
            <tr class="text" >


				<?php 
				$pid=$product['id'];
				$dq=mysqli_query($con,"SELECT quantity AS dqua FROM cart WHERE id=$pid");
				$GLOBALS['dquantity']=$dq->fetch_object()->dqua;
				//echo $GLOBALS['dquantity'];
				?>


              <td><?php echo $product['name']; ?> </td>
              <td><?php echo $product['quantity'];
				  ?> </td>
              <td>$ <?php echo $product['price']; ?> </td>
              <td>$ <?php echo number_format($product['quantity']*
              $product['price'],2);
              ?> </td>
              <td>
                <a href="cart.php?action=delete&id=<?php
                echo $product['id'];?>">
                <div class="btn btn-danger">Remove</div>
              </a>
              </td>
            </tr>
            <?php
            $total=$total +($product['quantity'] *$product['price']) ;
            endforeach;
            ?>
            <tr>
              <td colspan="3" align="right">Total</td>
              <td align="right">$ <?php echo number_format($total,2);
              ?> </td>
              <td></td>
            </tr>
         </div>
              <tr>
              <td colspan="5">
				 
				  
                <?php
                  if(isset($_SESSION['shopping_cart'])):
                    if(count($_SESSION['shopping_cart'])>0):
                ?>
				  
              <a href="checkout.php" class="button btn btn-success" id="pro2c">Proceed to Checkout</a>
<!--			  <a href="clear_cart.php" class="btn btn-danger">Clear Cart</a>-->

             
            <?php endif; endif; ?>
          </td>
        </tr>
        <?php
        endif;
        ?>
			
      </table>
    </div>
  </div>

  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 </div>
</body>
</html>

