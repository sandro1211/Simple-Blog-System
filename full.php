<?php
include 'config.php';
if(isset($_GET['news_id']) && !empty($_GET['news_id']))
        {
            $id=$_GET[ 'news_id'];
            $stmt_eidt=$db_conn->prepare('SELECT * FROM news_table WHERE id=:uid');
            $stmt_eidt->execute(array(':uid'=>$id));
            $full=$stmt_eidt->fetch(PDO::FETCH_ASSOC);
            extract($full);
        }else 

        {
            header("Location: index.php");
        }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>News</title>
  </head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add.php">Add News</a>
      </li>
    </ul>
  </div>
</nav>
<br><br>
<div class="container-fluid">
  <div class="row content">

    <div class="col-sm-9">
      <h2><?php echo $full['title']; ?></h2>
      <h5><span class="glyphicon glyphicon-time"></span> <?php echo $full['cur_date']; ?></h5>
      <span class="label label-primary"><img src="uploads/<?php echo $full['img_name']; ?>" width="300px" height="300px" alt="thumbnail" class="img-thumbnail"></span><br>
      <p><?php echo $full['long_desc']; ?></p>
  </div>
</div>
</body>
</html>
