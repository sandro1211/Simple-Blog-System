<?php
include 'config.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['submit'])) {
    /*
     * Read posted values.
     */
    $title =$_POST['title'];
    $short_desc = $_POST['short_desc'];
    $long_desc =$_POST['long_desc'];
    $images=$_FILES['tumbnail']['name'];
    $tmp_dir=$_FILES['tumbnail']['tmp_name'];
    $imageSize=$_FILES['tumbnail']['size'];
    $timestamp = date("Y-m-d H:i:s");

        $upload_dir='uploads/';
        $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
        $valid_extensions=array('jpeg', 'jpg', 'png', 'gif', 'pdf');
        $picProfile=rand(1000, 1000000).".".$imgExt;
        move_uploaded_file($tmp_dir, $upload_dir.$picProfile);
        $stmt=$db_conn->prepare('INSERT INTO news_table(title,short_desc,long_desc,img_name,cur_date) VALUES (:title, :short,:long,:upic,:cur_time )');
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':short', $short_desc);
        $stmt->bindParam(':long', $long_desc);
        $stmt->bindParam(':upic', $picProfile);
        $stmt->bindParam(':cur_time', $timestamp);
        if($stmt->execute())
        {
            ?>
            <script>
                alert("new record successul");
                window.location.href=('index.php');
            </script>
        <?php
        }else 

        {
            ?>
            <script>
                alert("Error");
                window.location.href=('index.php');
            </script>
        <?php
        }

    }
?>