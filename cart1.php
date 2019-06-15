
<?php


session_start();
$product_ids =array();
//session_destroy();
//check if addrto cart button submitted>?
if(filter_input(INPUT_POST,'add_to_cart')){
  if(isset($_SESSION['shopping_cart'])){

    $count=count($_SESSION['shopping_cart']);

    //create sequential arrays for matching array key to product ids
    $product_ids=array_column($_SESSION['shopping_cart'],'id');

    //pre_r($product_ids);

    if(!in_array(filter_input(INPUT_GET,'id'),$product_ids))
       {
       $_SESSION['shopping_cart'][$count] =array
    (
      'id'=>filter_input(INPUT_GET,'id'),
      'name'=>filter_input(INPUT_POST,'name'),
      'price'=>filter_input(INPUT_POST,'price'),
      'discount'=>filter_input(INPUT_POST,'discount'),
      'quantity'=>filter_input(INPUT_POST,'quantity')

    );

    }
    //if already exits in cart increase quantity
    else{
      for($i=0;$i<count($product_ids); $i++){
        if($product_ids[$i]==filter_input(INPUT_GET,'id'))
          //add item quantity to te exosting product in array
        {
          $_SESSION['shopping_cart'][$i]['quantity']+=
          filter_input(INPUT_POST,'quantity');
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
  


  }
}
if(filter_input(INPUT_GET,'action'))
{
if(filter_input(INPUT_GET,'action')=='delete'){
  //loop thrpugh all products until it matches get varobale

  foreach($_SESSION['shopping_cart']as $key => $product){
    if ($product['id']== filter_input(INPUT_GET,'id')){
      //remove product from cart
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
  <title>addtocart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="cart.css">
  
</head>

<body >
  <br><br><br>
  <div class="container">
  
     <div class="row"> 
  <?php

      $con=mysqli_connect('localhost','root');
      mysqli_select_db($con,'cart');
     /* if($con)
      {
        echo "CONNECTION SUCCESSFUL";

      }
      else
      {
        echo "no connection";
      }
      */
   


      $query="SELECT * FROM cart ORDER BY id ASC";

      $result=mysqli_query($con,$query);

     if($result):

      if(mysqli_num_rows($result)>0):
        while($product = mysqli_fetch_array($result)):
          ?>

          <div class="col-lg-3 col-md-4 col-sm-12">
            <form method="post" action="cart1.php?action=add&id=
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
              
               <input type="submit" name="add_to_cart"
                   class="btn btn-info flex-fill " value="Add to Cart">

               

                 <a href="details.php?id=<?php
                echo $product['id'];?>">Details</a>
                  
       
      
                   
             <br><br> <br><br>
                
                </div>
               

            </form>

          </div>


       <?php         
        endwhile;
        endif;
        endif;
     
      


      ?>



     

  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 
</body>
</html>

