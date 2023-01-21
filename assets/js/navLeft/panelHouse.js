/**
 * File panelHouse.js
 */

const scroll_panel_house = new ScrollBar(document.getElementById('scrollbar-panel-house'), { offsetContainer: -20, offsetContent: 0 });
scroll_panel_house.init()

const search_houses = panelHouse.querySelector('#search_houses');

/**
 * Permet de cacher le menu en cliquant à coté
 * 
 * @param {Event} event 
 */
const outsidePanelHouseClickListener = event => {
    if (btnDatabase != null) {
        if (btnDatabase.contains(event.target) && isVisible(panel)) {
            panelHouse.dataset.status = "hidden";
    
            document.removeEventListener("click", outsidePanelHouseClickListener);
            return;
        }
    }
    if (btnAppartements != null) {
        if (btnAppartements.contains(event.target) && isVisible(panel)) {
            panelHouse.dataset.status = "hidden";
    
            document.removeEventListener("click", outsidePanelHouseClickListener);
            return;
        }
    }
    if (!btnHouses.contains(event.target) && !panelHouse.contains(event.target) && isVisible(panel)) {
        panel.dataset.status = "hidden";
        panelHouse.dataset.status = "hidden";
        navLeft.querySelector('[data-status="selected"]').dataset.status = "unselected";
        navLeft.dataset.status = "extended";
        if (revertSelectedElement) {
            revertSelectedElement.dataset.status = 'selected';
        }
        
        document.removeEventListener("click", outsidePanelHouseClickListener);
    }
}

const house_list = panelHouse.querySelector('#house-list');

btnHouses.addEventListener("click", function(event) {
    if (isVisible(panel) && (!isVisible(panelApartment) && !isVisible(databasePanel))) {
        document.dispatchEvent(new Event("click"));
        return;
    }
    document.addEventListener("click", outsidePanelHouseClickListener);
    selected = navLeft.querySelector('[data-status="selected"]');
    if (!isVisible(panel)) revertSelectedElement = selected;
    if (selected) {
        selected.dataset.status = "unselected";
    }
    this.dataset.status = "selected";
    navLeft.dataset.status = "small";
    panel.dataset.status = "visible";
    panelHouse.dataset.status = "visible";
    search_houses.value = "";

    for (let button of house_list.children) {
        button.style.display = "flex";
    }

    search_houses.addEventListener('input', animateSearchHouse)

    scroll_panel_house.refresh();
})

const search_house_button = panelHouse.querySelector('#search-house-button');
const querry_house_display = panelHouse.querySelector('#querry-house-display');

let timeoutIDHouse = [];
/**
 * Permet l'animation quand on cherche un appartement
 * 
 * @param {Event} event 
 */
const animateSearchHouse = function(event) {
    if (timeoutIDHouse.length > 0) { clearTimeout(timeoutIDHouse.shift()); }
    timeoutIDHouse.push(setTimeout(() => {
        timeoutIDHouse = [];
        querry_house_display.textContent = this.value;
        search_house_button.setAttribute("href", "/search/houses/?q="+this.value);
        if (this.value == "") {
            scroll_panel_house.sbContainer.dataset.status = "show";
            for (let button of house_list.children) {
                button.style.display = "flex";
            }
        } else {
            scroll_panel_house.sbContainer.dataset.status = "search";
            searchHouse(this.value);
        }
        scroll_panel_house.refresh();
    }, 500));
}

/**
 * Permet de ne pas afficher les Appartements qui ne correspondent pas à la recherche
 * 
 * @param {String} value 
 */
const searchHouse = function(value) {
    for (let button of house_list.children) {
        if (!isMatch(button.querySelector('.primary').textContent, value)) {
            button.style.display = "none";
        } else {
            button.style.display = "flex";
        }
    }
}