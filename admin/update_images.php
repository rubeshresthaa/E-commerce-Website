<?php include('../connection.php');


  if(isset($_POST['update_images'])){
    $product_name=$_POST['product_name'];
    $product_id=$_POST['product_id'];
    

    $image1=$_FILES['image1']['tmp_name'];
    $image2=$_FILES['image2']['tmp_name'];
    $image3=$_FILES['image3']['tmp_name'];
    $image4=$_FILES['image4']['tmp_name'];
    $image5=$_FILES['image5']['tmp_name'];

    $image_name1=$product_name."1.jpg";
    $image_name2=$product_name."2.jpg";
    $image_name3=$product_name."3.jpg";
    $image_name4=$product_name."4.jpg";
    $image_name5=$product_name."5.jpg";

    move_uploaded_file($image1,"../imgs/".$image_name1);
    move_uploaded_file($image2,"../imgs/".$image_name2);
    move_uploaded_file($image3,"../imgs/".$image_name3);
    move_uploaded_file($image4,"../imgs/".$image_name4);
    move_uploaded_file($image5,"../imgs/".$image_name5);

    //create new user

    $stmt=$conn->prepare("UPDATE products SET product_image=?,product_image1=?,product_image2=?,product_image3=?,
                            product_image4=? WHERE product_id=?") ;
    
    $stmt->bind_param('sssssi',$image_name1,$image_name2,$image_name3,$image_name4,
                                  $image_name5,$product_id);
     
    if($stmt->execute()){
        header('location:products.php?images_updated=Image have been updated successfully');

    }else{
        header('location:products.php?images_failed=error occured, try again');
    }                             
  } 




?>