<?php
        $forder_path = 'uploads/';
        $file_path = $forder_path.$_FILES['upload_file']['name'];
        $flag = true;

        if(isset($_POST["submit"])) 
        {
          $check = getimagesize($_FILES['upload_file']['tmp_name']);
          if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $flag =true;
          } else {
          echo "File is not an image.";
          $flag = false;
          }
        }

        //check file bị trùng
        if(file_exists($file_path))
        {
            $flag = false;
        };
        // jpg, png, jpeg
        $ex = array('jpg','png','jpeg'); 

        $file_type = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
        if(!in_array($file_type,$ex))
        {
            echo 'Loại file ko hợp lệ <br>';
            $flag = false;
        };

        //check dung lượng
        if($_FILES['upload_file']['size']>500000)
        {
            echo 'FUng lượng file quá lớn';
            $flag = false;
        };
        
        /*if($flag)
        {
          move_uploaded_file($_FILES['upload_file']['tmp_name'],$file_path);
        }
        else{
          echo'Ko theẻ upload file';
        }*/
    ?>