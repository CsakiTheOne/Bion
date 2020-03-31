<?php
session_start();
include "../php/db/connection.php";
include "../php/db/execute.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Poszt</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--Fonts-->
  <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Comfortaa|Lobster&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Baloo+Thambi|Nova+Flat&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <script src="https://kit.fontawesome.com/a866d5ef98.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/topic.css">

</head>

<body>

  <nav class="navbar navbar-default navbar-expand-lg navbar-dark bg-dark sticky-top">
    <a class="navbar-brand" href="../index.php"><img id="menuLogo" src="../img/bion.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="about.php">Az oldalról</a>
        </li>
        <?php
        if (isset($_SESSION['id'])) :
        ?>
          <li class="nav-item">
            <a class="nav-link" href="newTopic.php">Poszt létrehozása</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="allTopic.php">Posztok megtekintése</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="search.php">Keresés</a>
          </li>
        <?php endif; ?>
      </ul>
      <?php
      if (isset($_SESSION['id'])) :
      ?>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <div class="btn-group">
              <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Profilom
              </button>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Profilom megtekintése</a>
                <a class="dropdown-item" href="../php/logout/logout.php">Kijelentkezés</a>
              </div>
            </div>
          </li>
        </ul>
      <?php endif; ?>
    </div>
  </nav>

  <form method="post">
    <button type="submit" name="back" id="back" class="btn btn-primary ml-3 mt-3">Vissza</button>
  </form>
  <form method="post">
    <button type="submit" id="refresh" title="Go to top"><i class="fas fa-sync-alt"></i></button>
  </form>
  <?php
  $data = callProc("ThemeGetByIdWithCategoryAndCreator", "'{$_SESSION["postId"]}'");
  ?>
  <div class="w-50 mx-auto">
    <p class="lead"><i class="fa fa-user"></i> szerző <?php echo $data[0]['username'] ?></p>
    <hr>
    <p><i class="fa fa-calendar"></i> <?php echo $data[0]['date'] ?> </p>
    <p><i class="fa fa-tags"></i> Tags: <span class="badge badge-info"><?php echo $data[0]['name'] ?></span></p>
    <textarea class="form-control textarea" id="postText" name="postText" rows="6" readonly><?php echo $data[0]['text']; ?></textarea>
  </div>
  <form id="postComment" method="POST">
    <input type="hidden" name="postId" value="{<?php $_SESSION["postId"] ?>}">
    <div class="well w-50 mx-auto">
      <hr>
      <h4><i class="fa fa-paper-plane-o"></i> Szólj hozzá:</h4>
      <form role="form">
        <div class="form-group">
          <textarea class="form-control" style="resize:none;overflow:hidden;" name="postText" id="comment" rows="3" oninput="resize();"></textarea>
        </div>
        <button type="submit" name="comment" class="btn btn-primary"><i class="fa fa-reply"></i> Küldés</button>
      </form>
      <hr>
    </div>
  </form>
  <?php
  unset($data);

  $data = callProc("CommentGetByThemeIdWithCreator", "'{$_SESSION["postId"]}'");
  foreach ($data as $value) {
    include "../php/comment/commentComponent.php";
  }

  ?>

  <?php
  if (isset($_POST['comment'])) {
    $date = date("Y-m-d H:i:s");
    $data = callProc("CommentCreate", "'{$_SESSION["id"]}','{$_POST["postText"]}','{$date}','{$_SESSION["postId"]}'");
    if ($data != null) {
      echo "<label>Komment sikeressen létrehozva!</label>";
    } else {
      echo "<label>Komment létrehozása sikertelen!</label>";
    }
    echo "<meta http-equiv='refresh' content='0'>";
  }

  if (isset($_POST['back'])) {
    echo "<script> window.location.assign('allTopic.php'); </script>";
  }

  if (isset($_POST['update'])) {
    echo "<meta http-equiv='refresh' content='0'>";
  }
  ?>

  <script>
    function resize () {
        document.getElementById('comment').style.height = 'auto';
        document.getElementById('comment').style.height = document.getElementById('comment').scrollHeight+'px';
    }
  </script>


  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>