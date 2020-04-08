<?php
session_start();
?>
<!doctype html>
<html lang="hu">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--Icon-->
  <link rel="icon" href="./favicon.ico" type="image/ico">
  <!--Fonts-->
  <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Comfortaa|Lobster&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Baloo+Thambi|Nova+Flat&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

  <title>Tanulj és Taníts!</title>
</head>

<body>

  <nav class="navbar navbar-default navbar-expand-lg navbar-dark bg-dark sticky-top">
    <a class="navbar-brand" href="index.php"><img id="menuLogo" src="img/bion.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="pages/about.php">Az oldalról</a>
        </li>
        <?php
        if (isset($_SESSION['id'])) :
        ?>
          <li class="nav-item">
            <a class="nav-link" href="pages/newTopic.php">Poszt létrehozása</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/allTopic.php">Posztok megtekintése</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/search.php">Keresés</a>
          </li>
        <?php endif; ?>
      </ul>
      <?php
      if (!isset($_SESSION['id'])) :
      ?>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <div class="dropdown show">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Bejelentkezés
              </button>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <form class="px-4 py-3" method="POST">
                  <div class="form-group">
                    <label for="exampleDropdownFormEmail1">Email cím</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleDropdownFormPassword1">Jelszó</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Jelszó" required>
                  </div>
                  <button type="submit" name="login" id="login" class="btn btn-primary">Bejelentkezés</button>
                </form>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" id="registerLink" href="pages/register.php">Új vagy még itt? Regisztrálj</a>
              </div>
            </div>
          </li>
        </ul>
      <?php else : ?>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <div class="btn-group">
              <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Profilom
              </button>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="pages/profile.php">Profilom megtekintése</a>
                <a class="dropdown-item" href="php/logout/logout.php">Kijelentkezés</a>
              </div>
            </div>
          </li>
        </ul>
      <?php endif; ?>
    </div>
  </nav>

  <div class="jumbotron jumbotron-fluid justify-content-center">
    <div class="container">
      <h1 class="display-4 text-center">Bion</h1>
      <p class="lead text-center">Tanulj és taníts!</p>
    </div>
  </div>
  <div class="container">

    <div class="row">
      <div class="col-6 picture-wborder-right">
        <img src="img/szila.jpg" alt="" class="img-fluid float-left" id="szila">
      </div>
      <div class="col-6 mt-5">
        <h2 class="text_1">Ha félsz kérdezni a tanáraidtól, vagy nem vagy megelégedve a magyarázattal,
          nem érted az anyagot, akkor megtaláltad a helyed!</h2>
      </div>
    </div>
    <div class="row">
    </div>

    <div class="row">

    </div>
    <div class="row top-buffer">
      <div class="col-6 mt-5">
        <h2 class="text_1">„ A tudatlanság vírus. Amikor terjedni kezd, csak az értelemmel gyógyítható. Az emberiség érdekében nekünk kell ennek a gyógyszernek lennünk. ”
          <br>-Neil deGrasse Tyson </h2>
      </div>
      <div class="col-6 picture-wborder-right">
        <img src="img/gyula.jpg" alt="" class="img-fluid float-left" id="szila">
      </div>

    </div>
  </div>
  <br>
  <?php include "php/footer/footerComponent.php"; ?>

  <?php
  if (isset($_POST['login'])) {
    include "php/login/login.php";
    echo "<meta http-equiv='refresh' content='0'>";
  }
  ?>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>