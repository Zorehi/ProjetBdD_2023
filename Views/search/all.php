<?php include ROOT."/Views/search/panelSearch.php"; ?>

<div class="globalContainer">
    <div class="scrollbar-container" id="scrollbar-search-all">
        <div class="card-wrapper scrollbar-content" data-transition="yes">
            <div class="card">
                <div class="card-head">
                    <span class="card-head-title">Personnes</span>
                </div>
                <div class="card-content">
                    <div class="card-search">
                        <ul class="card-list">
                            <li class="card-list-row">
                                <a href="#" class="image-href people">
                                    <img src="assets/image/user-default-photo.png" alt="" class="image people">
                                </a>
                                <div class="text">
                                    <a href="#" class="primary">Jérémy Legrix</a>
                                </div>
                                <div class="button-container">
                                    <a href="#" class="button">
                                        <span class="text">Voir le profil</span>
                                        <div class="hover"></div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <div class="card-btn-container">
                            <a href=<?= "/search/people/?q=$querry" ?> class="button">
                                <span class="text">Voir tout</span>
                                <div class="hover"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-head">
                    <span class="card-head-title">Maisons</span>
                </div>
                <div class="card-content">
                    <div class="card-search">
                        <ul class="card-list">
                            <li class="card-list-row">
                                <a href="#" class="image-href">
                                    <img src="assets/image/house-default-min-photo.png" alt="" class="image">
                                </a>
                                <div class="text">
                                    <a href="#" class="primary">Pharmatech</a>
                                    <span class="secondary">1 appartement · 1 appartement libre</span>
                                </div>
                                <div class="button-container">
                                    <a href="#" class="button">
                                        <span class="text">Voir la maison</span>
                                        <div class="hover"></div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <div class="card-btn-container">
                            <a href=<?= "/search/houses/?q=$querry" ?> class="button">
                                <span class="text">Voir tout</span>
                                <div class="hover"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-head">
                    <span class="card-head-title">Appartements</span>
                </div>
                <div class="card-content">
                    <div class="card-search">
                        <ul class="card-list">
                            <li class="card-list-row">
                                <a href="#" class="image-href">
                                    <img src="assets/image/apart-default-min-photo.png" alt="" class="image">
                                </a>
                                <div class="text">
                                    <a href="#" class="primary">N°202 - Pharmatech</a>
                                    <span class="secondary">T1/F1/P1 · 1 pièce</span>
                                </div>
                                <div class="button-container">
                                    <a href="#" class="button">
                                        <span class="text">Voir l'appartement</span>
                                        <div class="hover"></div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <div class="card-btn-container">
                            <a href=<?= "/search/apartments/?q=$querry" ?> class="button">
                                <span class="text">Voir tout</span>
                                <div class="hover"></div>
                            </a>
                        </div>
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

<script text="text/javascript">
    document.getElementById('navLeft').dataset.always = 'small';
    const filter_all = document.getElementById('filter-all');
    filter_all.dataset.status = 'selected';
    filter_all.onclick = () => { return false };

    const scrollbar_search_all = new ScrollBar(document.getElementById('scrollbar-search-all'), { offsetContainer: -32, offsetContent: 0});
    scrollbar_search_all.init();
</script>