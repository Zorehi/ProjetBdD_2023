/**
 * File navLeft.js
 */

const navbar_buttons = document.getElementsByClassName("navLeft-button");
const btnHouses = document.getElementById("Maisons");
const navLeft = document.getElementById("navLeft");
const panel = document.getElementById("panel");
const panelHouse = document.getElementById("panelHouse");
const btnCreateHouse = document.getElementById("btnCreateHouse");
const search_houses = document.getElementById("search_houses");
const searchHousesButton = document.getElementById("searchHousesButton");
const myHouses = document.getElementById("myHouses");
const panelHouse_button = document.getElementsByClassName("panelHouse-button");
const panelHouse_scroll = document.getElementById("panelHouse-scroll");
const pin_icons = document.getElementsByClassName("pin-icon");
const databasePanel = document.getElementById("databasePanel");
const btnDatabase = document.getElementById("Database");

for (var i = 0; i < navbar_buttons.length; i++) {
    navbar_buttons[i].addEventListener("mouseenter", function(event) { event.target.children[3].dataset.status = "visible"; });
    navbar_buttons[i].addEventListener("mouseleave", function(event) { event.target.children[3].dataset.status = "hidden"; });
}

/**
 * Permet de cacher le menu en cliquant à coté
 * 
 * @param {Event} event 
 */
const outsidePanelHouseClickListener = event => {
    if (btnDatabase.contains(event.target) && isVisible(panel)) {
        panelHouse.dataset.status = "hidden";

        document.removeEventListener("click", outsidePanelHouseClickListener);
        removeAllEventForPanelHouses();
    } else if (!btnHouses.contains(event.target) && !panelHouse.contains(event.target) && isVisible(panel)) {
        panel.dataset.status = "hidden";
        panelHouse.dataset.status = "hidden";
        navLeft.querySelector('[data-status="selected"]').dataset.status = "unselected";
        navLeft.dataset.status = "extended";
        navbar_buttons[0].dataset.status = "selected";
        
        document.removeEventListener("click", outsidePanelHouseClickListener);
        removeAllEventForPanelHouses();
    }
}

btnHouses.addEventListener("click", function(event) {
    if (isVisible(panel) && !isVisible(databasePanel)) {
        document.dispatchEvent(new Event("click"));
        return;
    }
    document.addEventListener("click", outsidePanelHouseClickListener);
    navLeft.querySelector('[data-status="selected"]').dataset.status = "unselected";
    this.dataset.status = "selected";
    navLeft.dataset.status = "small";
    panel.dataset.status = "visible";
    panelHouse.dataset.status = "visible";
    search_houses.value = "";
    panelHouse_scroll.dataset.status = "show";
    for (let button of myHouses.children[1].children) {
        button.style.display = "flex";
    }

    addAllEventForPanelHouses();
})

/**
 * Permet de cacher le menu en cliquant à coté
 * 
 * @param {Event} event 
 */
 const outsidePanelDatabaseClickListener = event => {
    if (btnHouses.contains(event.target) && isVisible(panel)) {
        databasePanel.dataset.status = "hidden";

        document.removeEventListener("click", outsidePanelDatabaseClickListener);
    } else if (!btnDatabase.contains(event.target) && !databasePanel.contains(event.target) && isVisible(panel)) {
        panel.dataset.status = "hidden";
        databasePanel.dataset.status = "hidden";
        navLeft.querySelector('[data-status="selected"]').dataset.status = "unselected";
        navLeft.dataset.status = "extended";
        navbar_buttons[0].dataset.status = "selected";
        
        document.removeEventListener("click", outsidePanelDatabaseClickListener);
    }
}

btnDatabase.addEventListener("click", function(event) {
    if (isVisible(panel) && !isVisible(panelHouse)) {
        document.dispatchEvent(new Event("click"));
        return;
    }
    document.addEventListener("click", outsidePanelDatabaseClickListener);
    navLeft.querySelector('[data-status="selected"]').dataset.status = "unselected";
    this.dataset.status = "selected";
    navLeft.dataset.status = "small";
    panel.dataset.status = "visible";
    databasePanel.dataset.status = "visible";

    //addAllEventForPanelHouses();
})