<?php
session_start();
?>
<!doctype html>
<html lang="hu">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--Fonts-->
  <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Comfortaa|Lobster&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Baloo+Thambi|Nova+Flat&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css">


  <title>Tanulj és Taníts!</title>
</head>

<body>


  <nav class="navbar navbar-default navbar-expand-lg navbar-dark bg-dark sticky-top">
    <a class="navbar-brand" href="index.php"><img id="menuLogo" src="../img/bion.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="about.html">Az oldalról</a>
        </li>
        <?php
        if (isset($_SESSION['id'])) :
        ?>
          <li class="nav-item">
            <a class="nav-link" href="about.html">Poszt létrehozása</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">Keresés</a>
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
                <form class="px-4 py-3">
                  <div class="form-group">
                    <label for="exampleDropdownFormEmail1">Email cím</label>
                    <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com">
                  </div>
                  <div class="form-group">
                    <label for="exampleDropdownFormPassword1">Jelszó</label>
                    <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Jelszó">
                  </div>
                  <button type="submit" class="btn btn-primary">Bejelentkezés</button>
                </form>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" id="registerLink" href="register.php">Új vagy még itt? Regisztrálj</a>
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
                <a class="dropdown-item" href="#">Profilom megtekintése</a>
                <a class="dropdown-item" href="#">Kijelentkezés</a>
              </div>
            </div>
          </li>
        </ul>
      <?php endif; ?>
    </div>
  </nav>
  <div class="jumbotron jumbotron-fluid justify-content-center dzsumbi">
    <div class="container">
      <h1 class="display-4 justify-content-center">Bion</h1>
      <p class="lead">Tanulj és taníts!</p>
    </div>
  </div>
  <div class="container">


    <div class="row">
      <div class="col-6 picture-wborder-right">
        <img src="../img/szila.jpg" alt="" class="img-fluid float-left" id="szila">
      </div>
      <div class="col-6">
        <h2 class="text_1">Ha félsz kérdezni a tanáraidtól, vagy nem vagy megelégedve a magyarázattal,
          nem érted az anyagot, akkor megtaláltad a helyed!</h2>
      </div>
    </div>
    <div class="row">
    </div>

    <div class="row">

    </div>
    <div class="row top-buffer">
      <div class="col-6">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tincidunt aliquet ex nec posuere. Sed lorem felis,
        auctor ornare hendrerit id, posuere dapibus leo. Duis sit amet metus at tellus pulvinar porta. In hac habitasse
        platea dictumst. Nullam aliquam nibh leo, ac placerat quam sodales ac. Nulla facilisi. Vestibulum vulputate dui
        sed mauris luctus, iaculis laoreet arcu maximus. Aliquam vestibulum ipsum at nisl vulputate facilisis. Praesent
        lacus lectus, tincidunt at feugiat vel, ultrices sit amet felis. Morbi vel diam venenatis, commodo mauris nec,
        mattis felis. In dictum ligula vitae fringilla tempus. Aenean et condimentum mauris. Phasellus neque nibh,
        tincidunt sit amet porta at, maximus a diam.
        Sed mauris magna, congue non nisi ac, maximus dignissim massa. Duis gravida bibendum tempor. Sed auctor rutrum
        tellus nec tempus. Cras quis rutrum odio. Praesent quis tellus efficitur, molestie arcu vel, elementum quam.
        Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce maximus risus a lacus convallis vestibulum.
        Vivamus quis condimentum sapien.
      </div>
      <div class="col-6 picture-wborder-left">
        <img src="../img/hjelp.jpg" alt="" class="img-fluid float-left">
      </div>

    </div>
  </div>



  <footer class="page-footer font-small blue" id="footer">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3 footer_text bg-dark text-white">©Pavlényi Gyula Márk 2020
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>