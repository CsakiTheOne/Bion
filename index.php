<!doctype html>
<html lang="en">

<head>
  <!--#region Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--#endregion -->

  <!--#region Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!--#endregion -->

  <title>Persely</title>

  <link rel="stylesheet" href="css/index.css">
  <link rel="icon" href="kepek/pushy.png" type="image/gif" sizes="16x16">
</head>

<body style="background-color: #e8e9c7">

  <!--#region NAVBAR  -->
  <nav class="navbar navbar-expand-lg" style="background-color: #d4d5b3">
    <img src="kepek/pushy.png" alt="" class="malac">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item px-3">
          <a class="nav-link disabled" href="" aria-disabled="true" style="color: #2e7148">
            <h5>Tranzakciók</h5>
          </a>
        </li>
        <li class="nav-item px-3">
          <a class="nav-link disabled" href="" aria-disabled="true" style="color: #2e7148">
            <h5>Számlák</h5>
          </a>
        </li>
        <li class="nav-item px-3">
          <a class="nav-link disabled" href="" aria-disabled="true" style="color: #2e7148">
            <h5>Áttekintés</h5>
          </a>
        </li>
      </ul>
    </div>
    <ul class="navbar-nav">
      <li class="nav-item">
        <button class="btn btn-outline-success my-2 my-sm-0" id="regisztracio">Regisztráció</button>
      </li>
    </ul>
  </nav>
  <!--#endregion -->

  <!--#region BEJELENTKEZŐS FORM -->
  <div class="fluid-container p-0 m-0 text-light" style="background-color: #2e7148">
    <div class="row no-gutters">
      <div class="penz col-12 col-md-6" id=""></div>
      <div class="col-12 col-md-6" id="field">
        <h1 class="display-4" style="color: #e8e9c7">Bejelentkezés</h1>
        <p class="lead">
          <form action="" method="POST">
            <label for="email" class="" style="color: #e8e9c7">Email cím</label><br>
            <input type="email" name="email" id="email" class="form-control"><br>
            <label for="jelszo" class="" style="color: #e8e9c7">Jelszó</label><br>
            <input type="password" name="jelszo" id="jelszo" class="form-control"><br>

            <div class="form-row">
              <div class="from-group col">
                <input type="submit" name="login" value="Bejelentkezés" style="background-color: #e8e9c7" class="form-control">
              </div>
          </form>
      </div>
      <?php
      function bejelentkezes($email, $jelszo)
      {
        if (empty($email) || empty($jelszo)) 
        {
          echo "<div id='hibasAdatok' class='alert alert-danger mx-4'>
          <a id='hibax'>
            Mezők kitöltése kötelező!
            <img src='kepek/x.png' alt='Bezárás' style='height:28px' class='float-right'>
          </a>
          </div>";
          return false;
        } 
        else 
        {
          include 'php/db_kapcsolat.php';

          $solekeres = "SELECT So FROM felhasznalo WHERE Email = '{$email}'";
          $result = $db->query($solekeres) or die($db->error);
          if ($result->num_rows != 0) 
          {
            $so = $result->fetch_array();
            $jelszo .= $so["So"];

            $query = "SELECT ID FROM felhasznalo WHERE Email = '{$email}' AND Jelszo = '" . hash("sha256", $jelszo) . "'";
            $result = $db->query($query) or die($db->error);

            if ($result->num_rows != 0) {
              $id = $result->fetch_array();
              session_start();
              $_SESSION["id"] = $id["ID"];
              header("Location:pages/szamlak.php");
            } else {
              echo "<div id='hibasAdatok' class='alert alert-danger mx-4'>
              <a id='hibax'>
              Nem megfelelő adatok!
              <img src='kepek/x.png' alt='Bezárás' style='height:28px' class='float-right'>
              </a>
              </div>";
            }
          }
          else
          {
            echo "<div id='hibasAdatok' class='alert alert-danger mx-4'>
            <a id='hibax'>
            Nem megfelelő adatok!
            <img src='kepek/x.png' alt='Bezárás' style='height:28px' class='float-right'>
            </a>
            </div>";
          }
        }
      }

      if (isset($_POST["email"]) && isset($_POST["jelszo"])) :
        bejelentkezes($_POST["email"], $_POST["jelszo"]);
      endif;
      ?>

      <br>
      </p>
    </div>
  </div>
  </div>


  <!--#endregion -->

  <div class="m-0" id="bemutatkozas" style="background-color: #e8e9c7">
    <h1 class="display-4 text-center" style="color: #2e7148">Bemutatkozás</h1>
  </div>


  <div id="carouselExampleCaptions" class="carousel slide mb-5 d-none d-md-block" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="asd carousel-item active">
        <img src="kepek/iro2.jpg" class="kepek d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h1 class="carouselText">Vezesse költségeit egyszerűen!</h1>
        </div>
      </div>
      <div class="asd carousel-item">
        <img src="kepek/chart2.jpg" class="kepek d-block w-100" alt="...">
        <div class="carousel-caption d-block">
          <h1 class="carouselText">Grafikonok segítségével átláthatóvá tesszük pénzügyeit!</h1>
        </div>
      </div>
      <div class="asd carousel-item">
        <img src="kepek/szamitas2.jpg" class="kepek d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h1 class="carouselText">Legyen naprakész családi költségvetése</h1>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <div class="container my-5">
    <h3 class="display-4">Tudnivalók</h3>
    <div class="row align-items-center my-5">
        <div class="col-10 col-md-4">
            <img src="kepek/creditcard.jpg" class="rounded w-100">
        </div>
        <div class="col-10 col-md-6">
            <p class="bekezdes">Amikor pénzt költesz, add meg mennyit költöttél, milyen kategóriában és melyik számládról. 
            A kategóriákat átnevezheted, törölheted, és újakat hozhatsz létre. Akármennyi számlád lehet, akármilyen névvel. A számla jelenthet egy bankkártyát, vagy akár tartalék pénzt, amit gyűjtesz egy nagyobb beruházásra.
            Minden pénzköltés mellé írhatsz egy egyedi megjegyzést, amiből pontosabban tudod, mire is költötted el. </p>
        </div>
    </div>
        
    <div class="row align-items-center my-5">  
        <div class="col-10 col-md-6">            
            <p class="bekezdes">Az, hogy mennyire bontod le a váráslásaidat több elemre, a te döntésed. Van lehetőséged egy vásárlás után akár minden elemet egyesével felvinni, de könnyen összevonhatsz több költekezést egy elemre, csak érdemes ezt a megjegyzésben magadnak leírni, hogy bele ne kavarodj. 
              A honlapon nyilván nem csak a költést tudod vezetni, hanem a pénz növekedését is. Akármikor felvihetsz plusz pénzt, amit kapsz, és megadhatod melyik számlához adódik ez hozzá.</p>
        </div>
        <div class="col-10 col-md-4">
            <img src="kepek/coins.jpg" class="rounded w-100">
        </div>
    </div>
  </div>

  <!-- <div class="container my-5">
  <img src="kepek/creditcard.jpg" class="kepek2 img-fluid p-1 float-left mr-2">
  <p class="bekezdes text-justify">Amikor pénzt költesz, add meg mennyit költöttél, milyen kategóriában és melyik számládról. 
  A kategóriákat átnevezheted, törölheted, és újakat hozhatsz létre. </p>
  <p class="bekezdes text-justify">Akármennyi számlád lehet akármilyen névvel. A számla jelenthet egy bankkáryát, vagy akár tartalék pénzt amit gyűjtesz egy nagyobb beruházásra.
  Minden pénzköltés mellé írhatsz egy egyedi megjegyzést, amiből pontosabban tudod mire is költötted el. </p>
  <p class="bekezdes text-justify">Az hogy mennyire bontod le a váráslásaidat több elemre, az a te döntésed. Van lehetőséged egy vásárlás után akár minden elemet egyesével felvinni, de könnyen összevonhatsz több költekezést egy elemre, csak érdemes ezt a megjegyzésben magadnak leírni, hogy bele ne kavarodj. </p>
  <p class="bekezdes text-justify">A honlapon nyilván nem csak a költést tudod vezetni, hanem a pénz növekedést is. Akármikor felvihetsz plusz pénz amit kapsz, és megadhatod melyik számlához adódik ez hozzá.</p>
  </div>
    -->
  <footer class="page-footer font-small black pt-4" style="background-color: #2e7148; color: #e8e9c7" id="footertop">
    <div class="container-fluid text-center text-md-left">
      <div class="row">

        <div class="col" id="footer1" class="col-lg-6 mt-md-0 mt-3">
          <h3 class="text-uppercase">Elérhetőségek</h3>
        </div>
        <hr class="clearfix w-100 d-md-none">
        <div class="col">
          <img src="kepek/phone.png" alt="" class="icon">
          <h3>+36 30 420 69 69</h3>
        </div>
        <div class="col">
          <img src="kepek/mail.png" alt="" class="icon">
          <h3>support@persely.com</h3>
        </div>
      </div>

      <div class="row">
        <div class="footer-copyright mx-auto py-3">
          <h4>Minden jog fenntartva</h4>
        </div>
      </div>
    </div>
  </footer>

  <?php
  include 'pages/components/bootstrap.php';
  ?>
  <script src="js/index.js"></script>
</body>

</html>