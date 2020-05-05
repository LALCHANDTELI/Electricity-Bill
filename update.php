
<html>
    <head>
        <title>Update_Form</title>
        <style>
            form{
                align-content: center;
                background-color:  coral;
                width: 30%;
                height: 30%;
                margin-top: 10%;
                margin-left: 30%;
                text-align: center;
                padding: 5%;
            }
        </style>
    </head>
    <body>
        <?php
        /*
         * To change this license header, choose License Headers in Project Properties.
         * To change this template file, choose Tools | Templates
         * and open the template in the editor.
         */
        include 'config.php';
        $idu = $_REQUEST['id'];
        $sql = "SELECT * FROM `register` WHERE `id`='$idu'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
//echo "<pre>";
//print_r($row);

        //echo "hello" . $_POST['idu'];

        if (isset($_POST['submit']) == 'update') {
            
            echo "<pre>";
            print_r($_POST);
            echo "</pre>";
            
            echo "<pre>";
            print_r($_FILES);
            echo "</pre>";
            
           echo $userimg=$_FILES['image']['name'];
            
           
            
            //$id = $_POST['idu'];
            $name = $_POST['name'];
            $mobile = $_POST['mobile'];
            $city = $_POST ['city'];
            $update_query = "UPDATE `register` SET `id`='" . $_POST['idu'] . "',`name`='$name',`mobile`='$mobile',`city`='$city',`picture='$userimg' WHERE id='$idu'";
            $result = $conn->query($update_query);
            //$row=$result->fetch_assoc();
            // print_r($result);
           // header("LOCATION:index.php");
        }
        ?>
        <form action="" method="post" enctype="multipart/form-data" >
            <label style="padding-right: 25%;">Id</label>            <input type="number" name="idu" value="<?php echo $row['id'] ?>" /> <br /><br />
            <label style="padding-right: 20%;">Name</label>          <input type="text" name="name" value="<?php echo $row['name'] ?>" /> <br /><br />
            <label style="padding-right: 5%;">Mobile number</label> <input type="number" name="mobile" value="<?php echo $row['mobile'] ?>" /> <br /><br />
            <label style="padding-right: 23%;">City</label>          <input type="text" name="city" value="<?php echo $row['city'] ?>" /> <br /><br />
            
            <label style="padding-right: 23%;">Profile Image</label>          <input type="file" name="image" value="" /> <br /><br />
            
            
            <input type="submit" name="submit" value="update" id="submit" /> <br /><br />
        </form>
        <?php
        ?>
    </body>
</html>