<?php
 $con=mysqli_connect("localhost","root","Chandler","bing");
 ?>

<!DOCTYPE html>
<head>
  <title>Details | Bing!</title>
   <link rel="stylesheet" type="text/css" href="cart.css">
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="cart.css">
</head>
<body>
	<div class="navbarx"><div class="bing_title"><a href="index.php"><img src="images/bing_title.png" width="137" height="60" alt=""/></a></div>
<div class="shop"><a style="color:white;" href="cart.php">SHOP</a></div><div class="about">ABOUT</div><div class="contact">CONTACT</div></div>

    <br><br><br>
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


     if(isset($_GET['id'])):
       $product_id=$_GET['id'];
       

    

      $query="SELECT * FROM cart WHERE id='$product_id'";


      $result=mysqli_query($con,$query);

     if($result):

      if(mysqli_num_rows($result)>0):
        while($product = mysqli_fetch_array($result)):
          ?>

          <div class="col-lg-12">
            <form method="post" action="cart1.php?action=add&id=
             <?php echo $product['id']; ?>">
                     <div class="products">
						 <div class="body-block">
                      
                      <img src="<?php   echo  
                           $product['image']; ?>" alt="poster"
                           class="img-fluid mb-2" style="max-height:600px;text-align: center!important;"/>

                    <div style="floatt:right">

                     <h6 class="card-title bg-info text-white p-2 text-uppercase"> Name:
                           <?php echo $product['name'];?> </h6>
                              <h6 class="card-title bg-info text-white p-2 text-uppercase"> Price:
                           <?php echo "$".$product['price'];?> </h6>
                             <h6 class="card-title bg-info text-white p-2 text-uppercase"> Category:
                           <?php echo $product['category'];?> </h6>
                            <h6 class="card-title bg-info text-white p-2 text-uppercase"> Franchise:
                           <?php echo $product['franchise'];?> </h6>
                           <h6 class="card-title bg-info text-white p-2 text-uppercase"> Available:
                           <?php echo $product['quantity'];?> </h6>
                         </div>

                        
              

                 
                  
       
       
                     <a href="cart.php" class="btn btn-danger">GO BACK</a>

               
                 
                  

              
                   
             <br><br> <br><br>
                
                </div>
				</div>
               

            </form>

          </div>


       <?php 

        endwhile;
        endif;
        endif;
    endif;
      


      ?>



