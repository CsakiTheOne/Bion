<?php function showNav($icon, $index, $about, $theme, $register, $myprofile, $logout) { ?>

<nav class="navbar navbar-default navbar-expand-lg navbar-dark bg-dark sticky-top">
<a class="navbar-brand" href="<?php echo $index ?>"><img id="menuLogo" src="<?php echo $icon ?>"></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="<?php echo $about ?>">Az oldalról</a>
    </li>
    <?php
    if (isset($_SESSION['id'])) :
    ?>
        <li class="nav-item">
        <a class="nav-link" href="<?php echo $theme ?>">Téma indítása</a>
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
            <a class="dropdown-item" id="registerLink" href="<?php echo $register ?>">Új vagy még itt? Regisztrálj</a>
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
            <a class="dropdown-item" href="<?php echo $myprofile ?>">Profilom megtekintése</a>
            <a class="dropdown-item" href="<?php echo $logout ?>">Kijelentkezés</a>
            </div>
        </div>
        </li>
    </ul>
    <?php endif; ?>
</div>
</nav>

<?php } ?>