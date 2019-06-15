<?php
 $con=mysqli_connect("localhost","root","Chandler","bing");
 ?>

<!DOCTYPE html>
<head>
  <title>Bing! | Harry Potter</title>
   <link rel="stylesheet" type="text/css" href="cart.css">
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="cart.css">
</head>
<body>
<a href="details4.php">Harry Potter</a>
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



      $query1="SELECT * FROM cart WHERE franchise='harry potter'";
//      $query2="SELECT * FROM cart WHERE category='music'";
//      $query3="SELECT * FROM cart WHERE category='crime'";
//   
//
//      $query4="SELECT * FROM cart WHERE franchise='Friends'";
//        $query5="SELECT * FROM cart WHERE franchise='Sherlock'";
//         $query6="SELECT * FROM cart WHERE franchise='Music'";
  
             

        
         $result1=mysqli_query($con,$query1);
//        $result2=mysqli_query($con,$query2);
//          $result3=mysqli_query($con,$query3);
//            $result4=mysqli_query($con,$query4);
//              $result5=mysqli_query($con,$query5);
//                $result6=mysqli_query($con,$query6);
              
     if($result1):

      if(mysqli_num_rows($result1)>0):
        while($product = mysqli_fetch_array($result1)):
          ?>

          

            <div class="col-lg-3 col-md-4 col-sm-12">
            <form method="post" action="category.php?action=add&id=
             <?php echo $product['id']; ?>">
                     <div class="products">
                       <h6 class="card-title bg-info text-white p-2 text-uppercase"> 
                           <?php echo $product['name'];?>  </h6>
                      <img src="<?php   echo  
                           $product['image']; ?>" alt="poster"
                           class="img-fluid mb-2" style="max-height:300px"/><br>


                         
                        
                      <h6>$ <?php echo $product['price']; ?></h6>
                        
                      <input type="text" name="quantity" class="form-control"
                   value="1"/>
                 
                   <input type="hidden" name="name" value="<?php
                   echo $product['name'];?>" />
                   <input type="hidden" name="price" value="<?php
                   echo $product['price']; ?>" />
                <!-- <a href='details.php?pro_id=id'
                
            
                 >Details</a>
               -->
           


                         
                        
                <!-- <a href='details.php?pro_id=id'
                
            
                 >Details</a>
               -->
              
        

               
                   
             <br><br> 
                
                </div>
               

            </form>

          </div>


                   
             <br><br> <br><br>





                   
             <br><br> 
                
                </div>
               

            </form>

          </div>



         
       

               
             


       <?php 

        endwhile;
        endif;
        endif;
 
      ?>


   



 