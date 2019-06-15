<?php
include_once("config_open_db.php");
 
//define index
$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : "";
 
if( empty( $name )){
    // this will be displayed if search value is blank
   // echo "Please enter a name!";
}else{
    // this part will perform our database query
    //$query = "select * from cart where name like ?";
    $query = "select * from cart where name like ? OR franchise like ?";
 
    // prepare query statement
    $stmt = $conn->prepare($query);
 
    // bind  variables
    $query_search_term = "%{$name}%";
    $stmt->bindParam(1, $query_search_term);
    $stmt->bindParam(2, $query_search_term);
  
    // execute query
    //$stmt->execute(array(":name"=>$name));
    $stmt->execute();

    //$exec=$result->execute(array(":name"=>$name));
 
    // count number of categories returned
    $num = $stmt->rowCount();
 
    if($num>0){
        // this will display how many records found
        // and also the actual record
        echo "<div style='margin: 100px 0 10px 0; font-weight: bold;'>$num result(s) found!</div>";
 
        // loop through the categories and show details
        // while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        //     echo "<div>" . $row['firstname'] ."</div>";
        // }
         while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			 
            
			 echo"<a href=\"\bingdotcom/details.php?id=".$row['id']."\"\</a><div>".$row['name']."</div></a>";
			 
        }
    }else{
        // if no records found
        echo "<b>Sorry, no results found!</b>";
    }
}
?>