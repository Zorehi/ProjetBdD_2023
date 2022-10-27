<div class="navLeft extended" id="navLeft">
    <div class="navLeft__head">
        <a href="/" class="selected navLeft__button">
            <div></div>
            <i style="background-image: url(https://static.xx.fbcdn.net/rsrc.php/v3/yG/r/YHLvfJvVfG6.png);background-position:0 0;background-size:auto;width:20px;height:20px;background-repeat:no-repeat;display:inline-block"></i>
            <span>Accueil</span>
            <div></div>
        </a>
        <a href="" class="navLeft__button">
            <div></div>
            <img src="https://scontent.fbod1-1.fna.fbcdn.net/v/t1.30497-1/143086968_2856368904622192_1959732218791162458_n.png?_nc_cat=1&ccb=1-7&_nc_sid=7206a8&_nc_ohc=D4MkQJTW3IMAX9AQGAE&_nc_ht=scontent.fbod1-1.fna&oh=00_AT9MhxjvbOepN3BUs7ycUyYNL0ZFUPSJN4QuN_ZmovoBdw&oe=6364B778" style="height: 24px;width: 24px;border-radius: 50%;">
            <span style="margin-left: 12px;"><?= $_SESSION["user"]["prenom"] . " " . $_SESSION["user"]["nom"] ?></span>
            <div></div>
        </a>
    </div>
    <div class="navLeft__houses">
        <div class="navLeft__button" id="Maisons">
            <div></div>
            <div class="icon">
                <i class="fa-solid fa-building fa-lg" style="background-position:0 0;background-size:auto;background-repeat:no-repeat;display:inline-block"></i>
            </div>
            <span>Maisons</span>
            <div></div>
        </div>
    </div>
</div>
<div id="panel" style="visibility: hidden;">
    <div class="navLeft-border"></div>
    <div class="navLeft-cloud"></div>
    <div class="housesPanel" id="housesPanel">
        <div class="housesPanel__title">
            <h1>Maisons</h1>
        </div>
        <div>
            <div class="housesPanel__search">
                <label for="search_houses">
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
                    <input type="text" id="search_houses" placeholder="Rechercher des Maisons">
                </label>
            </div>
            <div>
                <div class="housesPanel__search-button display-none" id="searchGlobalContainer">
                    <a class="housesPanel__button" href="#" id="searchHousesGlobal">
                        <div class="img">
                            <i data-visualcompletion="css-img" style="background-image: url(&quot;https://static.xx.fbcdn.net/rsrc.php/v3/y2/r/QouyfNuGrAZ.png&quot;); background-position: -170px -187px; background-size: auto; width: 16px; height: 16px; background-repeat: no-repeat; display: inline-block;"></i>
                        </div>
                        <div class="text">
                            <span>Rechercher <strong></strong> dans les maisons</span>
                        </div>
                        <div class="opacity-0 background-hover"></div>
                    </a>
                </div>
                <div class="housesPanel__create display-true" id="createContainer">
                    <a href="/houses/create" id="btnCreateHouse">
                        <span>
                            <i data-visualcompletion="css-img" style="background-image: url(&quot;https://static.xx.fbcdn.net/rsrc.php/v3/yT/r/i14dpO3gzZZ.png&quot;); background-position: 0px -1659px; background-size: auto; width: 16px; height: 16px; background-repeat: no-repeat; display: inline-block;"></i>
                            <span>Créer une nouvelle maison</span>
                        </span>
                        <div class="background-hover opacity-0"></div>
                    </a>
                </div>
                <div class="housesPanel__separator display-true" id="separator"></div>
                <div class="housesPanel__show">
                    <div id="pinHouses" class="display-true">
                        <span>Epinglés</span>
                        <div>
                            <a class="housesPanel__button" href="#">
                                <div class="img">
                                    <svg aria-hidden="true" class="" data-visualcompletion="ignore-dynamic" role="none" style="height: 36px; width: 36px;">
                                        <mask id="jsc_c_34x">
                                            <rect cy="18" fill="white" height="36" rx="8" ry="8" width="36" x="0" y="0"></rect>
                                        </mask>
                                        <g mask="url(#jsc_c_34x)">
                                            <image x="0" y="0" style="width: 36px;height: 36px;" xlink:href="https://scontent.fbod1-1.fna.fbcdn.net/v/t1.6435-9/42087349_1865028706923568_966827946130014208_n.jpg?stp=c12.0.50.50a_cp0_dst-jpg_p50x50&amp;_nc_cat=100&amp;ccb=1-7&amp;_nc_sid=70495d&amp;_nc_ohc=j9Ie4DhMcswAX8c63W3&amp;_nc_ht=scontent.fbod1-1.fna&amp;oh=00_AT-dDh0bys5IxfaCbVQ1w004BvdRsCANmJuB-YCYlw-5Tg&amp;oe=637B716D" style="height: 36px; width: 36px;"></image>
                                            <rect class="" cy="18" fill="none" height="36" rx="8" ry="8" width="36" x="0" y="0"></rect>
                                        </g>
                                    </svg>
                                </div>
                                <div class="text">
                                    <span>Pharmatech</span>
                                    <span>En ligne il y a 6 heures</span>
                                </div>
                                <div class="pin-icon">
                                    <i data-visualcompletion="css-img" class="" style="background-image: url(https://static.xx.fbcdn.net/rsrc.php/v3/yi/r/XwHPmbqCLP0.png);background-position: 0px -373px; background-size: auto; width: 16px; height: 16px; background-repeat: no-repeat; display: inline-block;"></i>
                                    <div class="opacity-0 background-hover"></div>
                                </div>
                                <div class="opacity-0 background-hover"></div>
                            </a>
                        </div>
                    </div>
                    <div id="myHouses" class="display-true"> 
                        <span>Maisons dont vous êtes propriétaire</span>
                        <div>
                            <a class="housesPanel__button" href="#">
                                <div class="img">
                                    <svg style="height: 36px; width: 36px;">
                                        <mask id="jsc_c_35x">
                                            <rect cy="18" fill="white" height="36" rx="8" ry="8" width="36" x="0" y="0"></rect>
                                        </mask>
                                        <g mask="url(#jsc_c_35x)">
                                            <image style="width: 36px;height: 36px;" xlink:href="https://scontent.fbod1-1.fna.fbcdn.net/v/t1.6435-9/42087349_1865028706923568_966827946130014208_n.jpg?stp=c12.0.50.50a_cp0_dst-jpg_p50x50&amp;_nc_cat=100&amp;ccb=1-7&amp;_nc_sid=70495d&amp;_nc_ohc=j9Ie4DhMcswAX8c63W3&amp;_nc_ht=scontent.fbod1-1.fna&amp;oh=00_AT-dDh0bys5IxfaCbVQ1w004BvdRsCANmJuB-YCYlw-5Tg&amp;oe=637B716D" style="height: 36px; width: 36px;"></image>
                                            <rect class="" cy="18" fill="none" height="36" rx="8" ry="8" width="36" x="0" y="0"></rect>
                                        </g>
                                    </svg>
                                </div>
                                <div class="text">
                                    <span>Pharmatech</span>
                                    <span>En ligne il y a 6 heures</span>
                                </div>
                                <div class="pin-icon">
                                    <i data-visualcompletion="css-img" class="" style="background-image: url(&quot;https://static.xx.fbcdn.net/rsrc.php/v3/yT/r/lM3wJmRoC7j.png&quot;); background-position: 0px -38px; background-size: auto; width: 16px; height: 16px; background-repeat: no-repeat; display: inline-block;"></i>
                                    <div class="opacity-0 background-hover"></div>
                                </div>
                                <div class="opacity-0 background-hover"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>