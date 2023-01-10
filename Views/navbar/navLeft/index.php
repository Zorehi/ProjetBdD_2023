<div class="navLeft" id="navLeft" data-status="extended">
    <div class="main">
        <a href="/" class="navLeft-button" id="Home" data-status="unselected">
            <div class="show-selected"></div>
            <img src="/assets/image/home.png" alt="" class="image">
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
        <div class="navLeft-section-separator"></div>
    <?php foreach ($house_array as $key => $value) { if ($key > 2) break; ?>
        <a class="navLeft-button redirect" id="<?= $value['id_house'] . '-' . $value['house_name'] ?>" href="/houses/<?= $value['id_house'] ?>">
            <div class="show-selected"></div>
            <img src="assets/image/house-default-min-photo.png" alt="">
            <span><?= $value['house_name'] ?></span>
            <div class="button-hover"></div>
        </a>
    <?php } ?>
        <div class="navLeft-button" id="Maisons" data-status="unselected">
            <div class="show-selected"></div>
            <div class="icon-container">
                <i class="image" style="background-position-y: 0px;"></i>
            </div>
            <span>Maisons</span>
            <div class="button-hover"></div>
        </div>
    </div>
<?php if (count($apart_array) > 0) { ?>
    <div class="navLeft-section houses">
        <div class="navLeft-section-separator"></div>
    <?php foreach ($apart_array as $key => $value) { if ($key > 2) break; ?>
        <a class="navLeft-button redirect" id="<?= $value['id_apartment'] . '-' . $value['num'] ?>" href="/aparts/<?= $value['id_apartment'] ?>">
            <div class="show-selected"></div>
            <img src="assets/image/apart-default-min-photo.png" alt="">
            <span><?= $value['num'].' - '.$value['house_name'] ?></span>
            <div class="button-hover"></div>
        </a>
    <?php } ?>
        <div class="navLeft-button" id="Appartements" data-status="unselected">
            <div class="show-selected"></div>
            <div class="icon-container">
                <i class="image" style="background-position-y: 0px;"></i>
            </div>
            <span>Appartements</span>
            <div class="button-hover"></div>
        </div>
    </div>
<?php } if ($_SESSION['user']['is_admin']) { ?>
    <div class="navLeft-section database">
        <div class="navLeft-section-separator"></div>
        <div class="navLeft-button" id="Database" data-status="unselected">
            <div class="show-selected"></div>
            <div class="icon-container">
                <i class="image" style="background-position-y: -32px;"></i>
            </div>
            <span>Base de données</span>
            <div class="button-hover"></div>
        </div>
    </div>
    <div class="navLeft-section analytics">
        <div class="navLeft-section-separator"></div>
        <a href="analytics" class="navLeft-button" id="Analytics" data-status="unselected">
            <div class="show-selected"></div>
            <div class="icon-container">
                <i class="image" style="background-position-y: -48px;"></i>
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
        if (count($apart_array) > 0) {
            include ROOT."/Views/navbar/navLeft/panelApartment.php";
        }
        if ($_SESSION['user']['is_admin']) {
            include ROOT."/Views/navbar/navLeft/panelDatabase.php";
        }
    ?>
</div>