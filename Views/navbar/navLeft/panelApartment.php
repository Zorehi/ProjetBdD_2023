<div class="panel-section panelHouse" id="panelApartment" data-status="hidden">
    <div class="panel-section-title">
        <h1>Appartements</h1>
    </div>
    <div class="panel-section-content">
        <div class="panel-section-search">
            <label for="search_apartments">
                <div>
                    <svg fill="currentColor" viewBox="0 0 16 16" width="1em" height="1em">
                        <g fill-rule="evenodd" transform="translate(-448 -544)">
                            <g fill-rule="nonzero">
                                <path d="M10.743 2.257a6 6 0 1 1-8.485 8.486 6 6 0 0 1 8.485-8.486zm-1.06 1.06a4.5 4.5 0 1 0-6.365 6.364 4.5 4.5 0 0 0 6.364-6.363z" transform="translate(448 544)"></path>
                                <path d="M10.39 8.75a2.94 2.94 0 0 0-.199.432c-.155.417-.23.849-.172 1.284.055.415.232.794.54 1.103a.75.75 0 0 0 1.112-1.004l-.051-.057a.39.39 0 0 1-.114-.24c-.021-.155.014-.356.09-.563.031-.081.06-.145.08-.182l.012-.022a.75.75 0 1 0-1.299-.752z" transform="translate(448 544)"></path>
                                <path d="M9.557 11.659c.038-.018.09-.04.15-.064.207-.077.408-.112.562-.092.08.01.143.034.198.077l.041.036a.75.75 0 0 0 1.06-1.06 1.881 1.881 0 0 0-1.103-.54c-.435-.058-.867.018-1.284.175-.189.07-.336.143-.433.2a.75.75 0 0 0 .624 1.356l.066-.027.12-.061z" transform="translate(448 544)"></path>
                                <path d="m13.463 15.142-.04-.044-3.574-4.192c-.599-.703.355-1.656 1.058-1.057l4.191 3.574.044.04c.058.059.122.137.182.24.249.425.249.96-.154 1.41l-.057.057c-.45.403-.986.403-1.411.154a1.182 1.182 0 0 1-.24-.182zm.617-.616.444-.444a.31.31 0 0 0-.063-.052c-.093-.055-.263-.055-.35.024l.208.232.207-.206.006.007-.22.257-.026-.024.033-.034.025.027-.257.22-.007-.007zm-.027-.415c-.078.088-.078.257-.023.35a.31.31 0 0 0 .051.063l.205-.204-.233-.209z" transform="translate(448 544)"></path>
                            </g>
                        </g>
                    </svg>
                </div>
                <input type="text" id="search_apartments" placeholder="Rechercher des Appartements">
            </label>
        </div>
        <div class="panel-section-scroll scrollbar-container" id="scrollbar-panel-apart">
            <div class="scrollbar-content" data-transition="yes">
                <div class="search-button-container" style="padding: 0 8px;">
                    <a class="panel-section-button panelHouse-button search-button" href="#" id="search-apart-button">
                        <div class="img">
                            <i style="background-image: url(&quot;https://static.xx.fbcdn.net/rsrc.php/v3/y2/r/QouyfNuGrAZ.png&quot;); background-position: -170px -187px; background-size: auto; width: 16px; height: 16px; background-repeat: no-repeat; display: inline-block;"></i>
                        </div>
                        <div class="text">
                            <span>Rechercher <strong id="querry-apart-display"></strong> dans les appartements</span>
                        </div>
                        <div class="hover"></div>
                    </a>
                </div>
                <div class="panel-section-separator"></div>
                <div class="panel-section-list">
                    <div class="panel-section-list-wrapper">
                        <span class="panel-section-list-title">Appartements dont vous êtes locataire</span>
                        <div class="panel-section-list-container" id="apartment-list">
                        <?php foreach ($apart_array as $key => $value) { ?>
                            <a class="panel-section-button panelHouse-button" href="/aparts/<?= $value['id_apartment'] ?>">
                                <img class="image" src="assets/image/apart-default-min-photo.png" alt="">
                                <div class="text">
                                    <span class="primary">N°<?= $value['num'].' - '.$value['house_name'] ?></span>
                                    <span class="secondary"><?= "{$value['apartment_type']} · {$value['nbr_rooms']} pièce".($value['nbr_rooms'] > 1 ? "s" : "") ?></span>
                                </div>
                                <div class="hover"></div>
                            </a>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="scrollbar-track"></div>
            <div class="scrollbar-thumb" data-transition="yes" draggable="false" ondragstart="return false;">
                <div></div>
            </div>
        </div>
    </div>
</div>