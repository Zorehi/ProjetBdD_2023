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
                    <a href="houses/?id=<?= $house->getId_house() ?>" class="panel-section-button" id="Home_house" data-status="unselected">
                        <svg fill="currentColor" viewBox="0 0 20 20" width="20px" height="20px">
                            <g fill-rule="evenodd" transform="translate(-446 -398)">
                                <path fill-rule="nonzero" d="M457.507 411v5.55c0 .525.426.95.95.95h3.5a1.55 1.55 0 0 0 1.55-1.55v-7.507h1.271c.994 0 1.672-1.186.918-1.947l-8.772-8.14a1.361 1.361 0 0 0-1.823-.01l-8.714 8.122c-.784.699-.29 2.032.782 2.032h1.338v7.45c0 .856.695 1.55 1.55 1.55h3.5a.95.95 0 0 0 .95-.95V411h3zm-1.5-11.448 7.966 7.39h-1.216a.75.75 0 0 0-.75.75v8.258a.05.05 0 0 1-.05.05h-2.95v-5.35a1.15 1.15 0 0 0-1.15-1.15h-3.7a1.15 1.15 0 0 0-1.15 1.15V416h-2.95a.05.05 0 0 1-.05-.05v-8.2a.75.75 0 0 0-.75-.75h-1.24l7.99-7.448z"></path>
                            </g>
                        </svg>
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
                    <a href="houses/?id=<?= $house->getId_house() ?>&page=house_aparts" class="panel-section-button" data-status="unselected">
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
                    <a href="houses/?id=<?= $house->getId_house() ?>&page=edit" class="panel-section-button" data-status="unselected">
                        <div class="text unselectable">
                            <span class="primary">Paramètres de la maison</span>
                            <span class="secondary">Gérez le nom et adresse</span>
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
                    <a href="houses/?id=<?= $house->getId_house() ?>&page=consume" class="panel-section-button" data-status="unselected">
                        <div class="text unselectable">
                            <span class="primary">Consommation</span>
                        </div>
                        <div class="hover"></div>
                    </a>
                    <a href="houses/?id=<?= $house->getId_house() ?>&page=emit" class="panel-section-button" data-status="unselected">
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