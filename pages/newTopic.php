<?php
  session_start();
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
    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Comfortaa|Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Thambi|Nova+Flat&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/topic.css">
  
</head>
<body>

<nav class="navbar navbar-default navbar-expand-lg navbar-dark bg-dark sticky-top">
<a class="navbar-brand" href="#">
    <img src="thread_img/gyuszi.png" width="60" height="60" class="d-inline-block align-top" alt="">
  </a>
            <a class="navbar-brand" href="index.html">Bion</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="index.html">Főoldal <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="HTML/about.html">Az oldalról</a>
                </li>
                
              </ul>
             
            </div>
          </nav>
<div class="container-fluid my-5 topicContainer">
    <div class="row">
          <div class="col-6">
          <form id="postForm" method="POST">
              <div class="form-group">
              <label for="">A poszt címe</label>

                <input type="text" class="form-control" id="topicTitle" required> 

              </div>
              <div class="form-group">
              <select id="category" name="category" required>
                  <option value="chemistry">Kémia</option>
                  <option value="maths">Matematika</option>
                  <option value="literature">Irodalom és nyelvtan</option>
                  <option value="history">Történelem</option>
                  <option value="physics">Fizika</option>
                  <option value="biology">Biológia</option>
                  <option value="language">Idegen nyelv</option>
                  <option value="geography">Földrajz</option>
                  <option value="information_technology">Informatika</option>
              </select>

              </div>
              <div class="form-group">
              <textarea name="comment" id="" cols="60" rows="10" form="postForm" required placeholder="yeet"></textarea>
              </div>
              
            <button type="submit" class="btn btn-primary">Poszt létrehozása</button>
            </form>

          </div>

    </div>



</div>
</body>
</html>