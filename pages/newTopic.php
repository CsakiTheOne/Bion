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
  <title>Poszt létrehozása</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--Icon-->
  <link rel="icon" href="../favicon.ico" type="image/ico">
  <!--Fonts-->
  <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Comfortaa|Lobster&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Baloo+Thambi|Nova+Flat&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS -->
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
            <a class="nav-link active" href="newTopic.php">Poszt létrehozása</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="allTopic.php">Posztok megtekintése</a>
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
                <a class="dropdown-item" href="profile.php">Profilom megtekintése</a>
                <a class="dropdown-item" href="../php/logout/logout.php">Kijelentkezés</a>
              </div>
            </div>
          </li>
        </ul>
      <?php endif; ?>
    </div>
  </nav>

  <div class="container-fluid my-5 topicContainer">
    <div class="row">
      <div class="col-12">
        <form id="postForm" method="POST">
          <div class="form-group">
            <label for="category">Válaszzon kategóriát:</label>
            <select class="form-control" id="category" name="category" required>
              <?php
              $data = callProc("CategoriesGetAll", "");
              foreach ($data as $value) {
                echo "<option value='{$value['id']}'>{$value['name']}</option>";
              }
              unset($value);
              ?>
            </select>
          </div>
          <label for="postText">Cím:</label>
          <textarea class="form-control textarea" id="postHeader" name="postHeader" maxlength="100" rows="3" required></textarea><br>
          <label for="postText">Szöveg:</label>
          <textarea class="form-control textarea" id="postText" name="postText" rows="6" required></textarea><br>
          <button type="submit" name="submit" id="submit" class="form-control btn btn-primary">Poszt létrehozása</button>
        </form>
        <?php
        if (isset($_POST['submit'])) {
          $date = date("Y-m-d H:i:s");
          $data = callProc("ThemeCreate", "'{$_POST['category']}','{$_SESSION['id']}','{$date}','{$_POST['postText']}','{$_POST['postHeader']}'");
          if ($data != null) {
            echo "<label>Poszt sikeressen létrehozva!</label>";
          } else {
            echo "<label>Poszt létrehozása sikertelen!</label>";
          }
        }
        ?>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>