<div class="navLeft" id="navLeft" data-status="extended">
    <div class="main">
        <a href="/" class="navLeft-button" id="Home" data-status="unselected">
            <div class="show-selected"></div>
            <i style="background-image: url(https://static.xx.fbcdn.net/rsrc.php/v3/yG/r/YHLvfJvVfG6.png);background-position:0 0;background-size:auto;width:20px;height:20px;background-repeat:no-repeat;display:inline-block"></i>
            <span>Accueil</span>
            <div class="button-hover"></div>
        </a>
        <a href="#" class="navLeft-button" id="Profil" data-status="unselected">
            <div class="show-selected" data-status="unselected"></div>
            <img src="assets/image/user-default-photo.png" style="height: 24px;width: 24px;border-radius: 50%;">
            <span style="margin-left: 12px;"><?= $_SESSION["user"]["firstname"] . " " . $_SESSION["user"]["lastname"] ?></span>
            <div class="button-hover"></div>
        </a>
    </div>
    <div class="navLeft-section houses">
        <div class="navLeft-button" id="Maisons" data-status="unselected">
            <div class="show-selected"></div>
            <div class="icon">
                <i class="fa-solid fa-building fa-lg" style="background-position:0 0;background-size:auto;background-repeat:no-repeat;display:inline-block"></i>
            </div>
            <span>Maisons</span>
            <div class="button-hover"></div>
        </div>
    </div>
<?php if ($_SESSION['user']['is_admin']) { ?>
    <div class="navLeft-section database">
        <div class="navLeft-button" id="Database" data-status="unselected">
            <div class="show-selected"></div>
            <div class="icon">
                <img width="16px" height="16px" src="assets/image/database.png" style="background-position:0 0;background-size:auto;background-repeat:no-repeat;display:inline-block">
            </div>
            <span>Base de données</span>
            <div class="button-hover"></div>
        </div>
    </div>
    <div class="navLeft-section analytics">
        <a href="analytics" class="navLeft-button" id="Analytics" data-status="unselected">
            <div class="show-selected"></div>
            <div class="icon">
                <img width="16px" height="16px" src="assets/image/analytics.png" style="background-position:0 0;background-size:auto;background-repeat:no-repeat;display:inline-block">
            </div>
            <span>Statistiques</span>
            <div class="button-hover"></div>
        </a>
    </div>
<?php } ?>
</div>
<div id="panel" data-status="hidden">
    <div class="navLeft-border"></div>
    <div class="navLeft-cloud"></div>
    <?php 
        include ROOT."/Views/navbar/navLeft/panelHouse.php";
        if ($_SESSION['user']['is_admin']) {
            include ROOT."/Views/navbar/navLeft/panelDatabase.php";
        }
    ?>
</div>