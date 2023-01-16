<div class="panel-section panel-manage" id="manage-device">
    <div class="panel-manage-header">
        <div class="panel-manage-profil">
            <img src="" alt="">
            <div class="text">
                <span class="primary"><?= $device->getDevice_name() ?></span>
                <span class="secondary"><?= "Type d'appareil : {$device_type->getType_name()}" ?></span>
            </div>
        </div>
        <div class="panel-manage-btn-create-container">
            <a class="panel-section-button">
                <div class="text unselectable">
                    <span class="primary">Allumer</span>
                </div>
                <div class="hover"></div>
            </a>
        </div>
    </div>
    <div class="panel-section-content">
        <div class="scrollbar-container" id="scrollbar-manage-device">
            <div class="scrollbar-content" data-transition="yes">
                <div class="panel-section-separator"></div>
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
                    <a href="devices/<?= $device->getId_device() ?>/edit" id="edit_device" class="panel-section-button" data-status="unselected">
                        <i class="image" style="background-position-y: -44px;"></i>
                        <div class="text unselectable">
                            <span class="primary">Paramètres de l'appareil</span>
                            <span class="secondary">Gérez le nom et </span>
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
                    <a href="devices/<?= $device->getId_device() ?>/insights/?section=consume" id="device_consume" class="panel-section-button" data-status="unselected">
                        <i class="image" style="background-position-y: -66px;"></i>
                        <div class="text unselectable">
                            <span class="primary">Consommation</span>
                        </div>
                        <div class="hover"></div>
                    </a>
                    <a href="devices/<?= $device->getId_device() ?>/insights/?section=emit" id="device_emit" class="panel-section-button" data-status="unselected">
                        <i class="image" style="background-position-y: -88px;"></i>
                        <div class="text unselectable">
                            <span class="primary">Emission</span>
                        </div>
                        <div class="hover"></div>
                    </a>
                </div>
            </div>
            <div class="scrollbar-track"></div>
            <div class="scrollbar-thumb" data-transition="yes" draggable="false" ondragstart="return false;">
                <div></div>
            </div>
        </div>
    </div>
</div>