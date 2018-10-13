<?php
include 'config.php';
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
<div class="container">
    <div class="row">
        <?php 
            $stmt=$db_conn->prepare('SELECT * FROM news_table ORDER BY id DESC');
                $stmt->execute();
                if($stmt->rowCount()>0)
                {
                    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        extract($row);
                        ?>
        <div class="col col-xs-12">
                        <div class="blog-grids">
                            <div class="grid">
                                <div class="entry-media">
                                    <img src="uploads/<?php echo $row['img_name']; ?>" alt="">
                                </div>
                                <div class="entry-body">
                                    <h3><a href="#"><?php echo $row['title']; ?></a></h3>
                                    <p><?php echo $row['short_desc']; ?></p>
                                    <div class="read-more-date">
                                        <a href="full.php?news_id=<?php echo $row['id']?>">Read More..</a>
                                        <span class="date"><?php echo $row['cur_date']; ?></span>
                                    </div>
                                                    </div>
                                                    <?php 

                }
            }
            ?>
                 
                            </div>
    </div>
   
</div>
  </body>
</html>