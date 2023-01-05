<div class="panel-section panelSearch" style="z-index: -1;" id="panelSearch" data-status="show">
    <div class="panel-section-title">
        <h1>Résultats de la recherche</h1>
    </div>
    <div class="panel-section-separator"></div>
    <div>
        <div class="panel-section-list">
            <div id="filters" class="panel-section-list-wrapper">
                <span class="panel-section-list-title">Filtres</span>
                <div class="panel-section-list-container">
                    <a href="/search/all/?q=<?= $querry ?>" id="filter-all" class="panel-section-button">
                        <div class="icon-container">
                            <i class="icon" style="background-position-y: -44px;"></i>
                        </div>
                        <div class="text">
                            <span class="primary">Tous</span>
                        </div>
                        <div class="hover"></div>
                    </a>
                    <a href="/search/houses/?q=<?= $querry ?>" id="filter-houses" class="panel-section-button">
                        <div class="icon-container">
                            <i class="icon" style="background-position-y: 0px;"></i>
                        </div>
                        <div class="text">
                            <span class="primary">Maisons</span>
                        </div>
                        <div class="hover"></div>
                    </a>
                    <a href="/search/apartments/?q=<?= $querry ?>" id="filter-apartments" class="panel-section-button">
                        <div class="icon-container">
                            <i class="icon" style="background-position-y: -22px;"></i>
                        </div>
                        <div class="text">
                            <span class="primary">Appartements</span>
                        </div>
                        <div class="hover"></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>