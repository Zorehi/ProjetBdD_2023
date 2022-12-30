<div class="panel-section panel-manage" id="manage-apart">
    <div class="panel-manage-header">
        <div class="panel-manage-profil">
            <img src="assets/image/apart-default-min-photo.png" alt="">
            <div class="text">
                <span class="primary"></span>
                <span class="secondary">T1/F1/P1 · 1 pièce</span>
            </div>
        </div>
    <?php if (isset($is_admin_or_owner) && $is_admin_or_owner) { ?>
        <div class="panel-manage-btn-create-container">
            <a class="panel-section-button">
                <img src="assets/image/plus.png" class="unselectable"></i>
                <div class="text unselectable">
                    <span class="primary">Ajouter une pièce</span>
                </div>
                <div class="hover"></div>
            </a>
        </div>
    <?php } ?>
    </div>
    <div class="panel-section-content">
        <div class="scrollbar-container" id="scrollbar-manage-apart">
            <div class="scrollbar-content" data-transition="yes">
                <div class="panel-manage-main">
                    <a href="aparts/<?= $apart->getId_apartment() ?>" class="panel-section-button" id="Home_apart" data-status="unselected">
                        <i class="image"></i>
                        <div class="text unselectable">
                            <span class="primary">Accueil de l'appartement</span>
                        </div>
                        <div class="hover"></div>
                    </a>
                </div>
            <?php if (isset($is_admin_or_owner) && $is_admin_or_owner) { ?>
                <div class="panel-section-separator"></div>
                <!-- <div class="panel-manage-wrapper" data-status="shown">
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
                    <a href="houses/<?= $apart->getId_apartment() ?>/house_aparts" id="house_aparts" class="panel-section-button" data-status="unselected">
                        <i class="image" style="background-position-y: -22px;"></i>
                        <div class="text unselectable">
                            <span class="primary">Appartements de la maison</span>
                            <span class="secondary">1 appartement</span>
                        </div>
                        <div class="hover"></div>
                    </a>
                </div> -->
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
                    <a href="aparts/<?= $apart->getId_apartment() ?>/edit" id="edit_apart" class="panel-section-button" data-status="unselected">
                        <i class="image" style="background-position-y: -44px;"></i>
                        <div class="text unselectable">
                            <span class="primary">Paramètres de l'appartement</span>
                            <span class="secondary">Gérez le numéro et son nombre d'habitants</span>
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
                    <a href="aparts/<?= $apart->getId_apartment() ?>/insights/?section=consume" id="apart_consume" class="panel-section-button" data-status="unselected">
                        <i class="image" style="background-position-y: -66px;"></i>
                        <div class="text unselectable">
                            <span class="primary">Consommation</span>
                        </div>
                        <div class="hover"></div>
                    </a>
                    <a href="aparts/<?= $apart->getId_apartment() ?>/insights/?section=emit" id="apart_emit" class="panel-section-button" data-status="unselected">
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