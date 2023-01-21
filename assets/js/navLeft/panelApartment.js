/**
 * File panelApartment.js
 */

const scroll_panel_apart = new ScrollBar(document.getElementById('scrollbar-panel-apart'), { offsetContainer: -20, offsetContent: 0 });
scroll_panel_apart.init()

const search_apartments = panelApartment.querySelector('#search_apartments');

/**
 * Permet de cacher le menu en cliquant à coté
 * 
 * @param {Event} event 
 */
const outsidePanelApartmentClickListener = event => {
    if (btnDatabase != null) {
        if (btnDatabase.contains(event.target) && isVisible(panel)) {
            panelApartment.dataset.status = "hidden";
    
            document.removeEventListener("click", outsidePanelApartmentClickListener);
            return;
        }
    }

    if (btnHouses.contains(event.target) && isVisible(panel)) {
        panelApartment.dataset.status = "hidden";

        document.removeEventListener("click", outsidePanelApartmentClickListener);
        return;
    }

    if (!btnAppartements.contains(event.target) && !panelApartment.contains(event.target) && isVisible(panel)) {
        panel.dataset.status = "hidden";
        panelApartment.dataset.status = "hidden";
        navLeft.querySelector('[data-status="selected"]').dataset.status = "unselected";
        navLeft.dataset.status = "extended";
        if (revertSelectedElement) {
            revertSelectedElement.dataset.status = 'selected';
        }
        
        document.removeEventListener("click", outsidePanelApartmentClickListener);
    }
}

const apartment_list = panelApartment.querySelector('#apartment-list');

btnAppartements.addEventListener("click", function(event) {
    if (isVisible(panel) && (!isVisible(databasePanel) && !isVisible(panelHouse))) {
        document.dispatchEvent(new Event("click"));
        return;
    }
    document.addEventListener("click", outsidePanelApartmentClickListener);
    selected = navLeft.querySelector('[data-status="selected"]');
    if (!isVisible(panel)) revertSelectedElement = selected;
    if (selected) {
        selected.dataset.status = "unselected";
    }
    this.dataset.status = "selected";
    navLeft.dataset.status = "small";
    panel.dataset.status = "visible";
    panelApartment.dataset.status = "visible";

    for (let button of apartment_list.children) {
        button.style.display = "flex";
    }

    search_apartments.addEventListener('input', animateSearchApart)

    scroll_panel_apart.refresh();
});


const search_apart_button = panelApartment.querySelector('#search-apart-button');
const querry_apart_display = panelApartment.querySelector('#querry-apart-display');

let timeoutIDApart = [];
/**
 * Permet l'animation quand on cherche un appartement
 * 
 * @param {Event} event 
 */
const animateSearchApart = function(event) {
    if (timeoutIDApart.length > 0) { clearTimeout(timeoutIDApart.shift()); }
    timeoutIDApart.push(setTimeout(() => {
        timeoutIDApart = [];
        querry_apart_display.textContent = this.value;
        search_apart_button.setAttribute("href", "/search/apartments/?q="+this.value);
        if (this.value == "") {
            scroll_panel_apart.sbContainer.dataset.status = "show";
            for (let button of apartment_list.children) {
                button.style.display = "flex";
            }
        } else {
            scroll_panel_apart.sbContainer.dataset.status = "search";
            searchHouse(this.value);
        }
        scroll_panel_apart.refresh();
    }, 500));
}

/**
 * Permet de ne pas afficher les Appartements qui ne correspondent pas à la recherche
 * 
 * @param {String} value 
 */
const searchApart = function(value) {
    for (let button of apartment_list.children) {
        if (!isMatch(button.querySelector('.primary').textContent, value)) {
            button.style.display = "none";
        } else {
            button.style.display = "flex";
        }
    }
}
