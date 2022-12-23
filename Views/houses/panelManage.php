<div class="panel-section panel-manage" id="manage-house">
    <div class="panel-manage-header">
        <div class="panel-manage-profil">
            <img src="assets/image/house-default-min-photo.png" alt="">
            <div class="text">
                <span class="primary"><?= $house->getHouse_name() ?></span>
                <span class="secondary">1 appartement · 1 appartement libre</span>
            </div>
        </div>
    <?php if ($_SESSION['user']['is_admin'] || $_SESSION['user']['id'] == "") { ?><!-- à tester si propriétaire -->
        <div class="panel-manage-btn-create-container">
            <a href="aparts/create/?id=<?= $house->getId_house() ?>" class="panel-section-button">
                <img src="assets/image/plus.png" class="unselectable"></i>
                <div class="text unselectable">
                    <span class="primary">Ajouter un appartement</span>
                </div>
                <div class="hover"></div>
            </a>
        </div>
    <?php } ?>
    </div>
    <div class="panel-section-content">
        <div class="scrollbar-container" id="scrollbar-12">
            <div class="scrollbar-content" data-transition="yes">
                <div class="panel-manage-main">
                    <a href="houses/<?= $house->getId_house() ?>" class="panel-section-button" id="Home_house" data-status="unselected">
                        <i class="image"></i>
                        <div class="text unselectable">
                            <span class="primary">Accueil de la maison</span>
                        </div>
                        <div class="hover"></div>
                    </a>
                </div>
            <?php if ($_SESSION['user']['is_admin'] || $_SESSION['user']['id'] == "") { ?><!-- à tester si propriétaire -->
                <div class="panel-section-separator"></div>
                <div class="panel-manage-wrapper" data-status="shown">
                    <div class="panel-section-button" onclick="onClickDropDown(this.parentElement)" draggable="false" ondragstart="return false;">
                        <div class="text unselectable">
                            <span class="secondary">Outils d'administration</span>
                        </div>
                        <div class="icon">
                            <i class="image"></i>
                            <div class="hover"></div>
                        </div>
                        <div class="hover"></div>
                    </div>
                    <a href="houses/<?= $house->getId_house() ?>/house_aparts" id="house_aparts" class="panel-section-button" data-status="unselected">
                        <i class="image" style="background-position-y: -22px;"></i>
                        <div class="text unselectable">
                            <span class="primary">Appartements de la maison</span>
                            <span class="secondary">1 appartement</span>
                        </div>
                        <div class="hover"></div>
                    </a>
                </div>
                <div class="panel-manage-wrapper" data-status="shown">
                    <div class="panel-section-button" onclick="onClickDropDown(this.parentElement)" draggable="false" ondragstart="return false;">
                        <div class="text unselectable">
                            <span class="secondary">Paramètres</span>
                        </div>
                        <div class="icon">
                            <i class="image"></i>
                            <div class="hover"></div>
                        </div>
                        <div class="hover"></div>
                    </div>
                    <a href="houses/<?= $house->getId_house() ?>/edit" id="edit_house" class="panel-section-button" data-status="unselected">
                        <i class="image" style="background-position-y: -44px;"></i>
                        <div class="text unselectable">
                            <span class="primary">Paramètres de la maison</span>
                            <span class="secondary">Gérez le nom et l'adresse</span>
                        </div>
                        <div class="hover"></div>
                    </a>
                </div>
                <div class="panel-manage-wrapper" data-status="shown">
                    <div class="panel-section-button" onclick="onClickDropDown(this.parentElement)" draggable="false" ondragstart="return false;">
                        <div class="text unselectable">
                            <span class="secondary">Statistiques</span>
                        </div>
                        <div class="icon">
                            <i class="image"></i>
                            <div class="hover"></div>
                        </div>
                        <div class="hover"></div>
                    </div>
                    <a href="houses/<?= $house->getId_house() ?>/insights/?section=consume" id="house_consume" class="panel-section-button" data-status="unselected">
                        <i class="image" style="background-position-y: -66px;"></i>
                        <div class="text unselectable">
                            <span class="primary">Consommation</span>
                        </div>
                        <div class="hover"></div>
                    </a>
                    <a href="houses/<?= $house->getId_house() ?>/insights/?section=emit" id="house_emit" class="panel-section-button" data-status="unselected">
                        <i class="image" style="background-position-y: -88px;"></i>
                        <div class="text unselectable">
                            <span class="primary">Emission</span>
                        </div>
                        <div class="hover"></div>
                    </a>
                </div>
            <?php } ?>
            </div>
            <div class="scrollbar-track"></div>
            <div class="scrollbar-thumb" data-transition="yes" draggable="false" ondragstart="return false;">
                <div></div>
            </div>
        </div>
    </div>
</div>