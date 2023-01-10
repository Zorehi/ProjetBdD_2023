/**
 * File panelHouse.js
 */

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
    panelHouse_scroll.dataset.status = "show";
    for (let button of myHouses.children[1].children) {
        button.style.display = "flex";
    }
})

let timeoutIDHouse = [];
/**
 * Permet l'animation quand on cherche une maison
 * 
 * @param {Event} event 
 */
const animateSearchHouse = function(event) {
    if (timeoutIDHouse.length > 0) { clearTimeout(timeoutIDHouse.shift()); }
    timeoutIDHouse.push(setTimeout(() => {
        timeoutIDHouse = [];
        searchHousesButton.children[1].children[0].children[0].textContent = this.value;
        searchHousesButton.setAttribute("href", "/houses/search?s"+this.value);
        if (this.value == "") {
            panelHouse_scroll.dataset.status = "show";
            for (let button of myHouses.children[1].children) {
                button.style.display = "flex";
            }
        } else {
            panelHouse_scroll.dataset.status = "search";
            searchHouse(this.value);
        }
    }, 500));
}

/**
 * Permet de ne pas afficher les Maisons qui ne correspondent pas à la recherche
 * 
 * @param {String} value 
 */
const searchHouse = function(value) {
    for (let button of myHouses.children[1].children) {
        if (!isMatch(button, value)) {
            button.style.display = "none";
        } else {
            button.style.display = "flex";
        }
    }
}