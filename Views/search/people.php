<?php include ROOT."/Views/search/panelSearch.php"; ?>

<div class="globalContainer">
    <div class="scrollbar-container" id="scrollbar-search-people">
        <div class="card-wrapper scrollbar-content" data-transition="yes">
            <div class="card">
                <div class="card-search">
                    <div class="card-list-row">
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
    const filter_people = document.getElementById('filter-people');
    filter_people.dataset.status = 'selected';
    filter_people.onclick = () => { return false };

    const scrollbar_search_people = new ScrollBar(document.getElementById('scrollbar-search-people'), { offsetContainer: -32, offsetContent: 0});
    scrollbar_search_people.init();
</script>