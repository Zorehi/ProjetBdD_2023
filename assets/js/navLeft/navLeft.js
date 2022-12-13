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
const search_tables = document.getElementById("search_tables");
const searchHousesButton = document.getElementById("searchHousesButton");
const myHouses = document.getElementById("myHouses");
const panelHouse_scroll = document.getElementById("panelHouse-scroll");
const pin_icons = document.getElementsByClassName("pin-icon");
const databasePanel = document.getElementById("panelDatabase");
const btnDatabase = document.getElementById("Database");

const scroll_database = new ScrollBar(document.getElementById('scrollbar-1'), { offsetContainer: -20, offsetContent: 0 });
scroll_database.init()

/**
 * Permet de cacher le menu en cliquant à coté
 * 
 * @param {Event} event 
 */
const outsidePanelHouseClickListener = event => {
    if (btnDatabase.contains(event.target) && isVisible(panel)) {
        panelHouse.dataset.status = "hidden";

        document.removeEventListener("click", outsidePanelHouseClickListener);
    } else if (!btnHouses.contains(event.target) && !panelHouse.contains(event.target) && isVisible(panel)) {
        panel.dataset.status = "hidden";
        panelHouse.dataset.status = "hidden";
        navLeft.querySelector('[data-status="selected"]').dataset.status = "unselected";
        navLeft.dataset.status = "extended";
        if (navLeft.dataset.always != 'small') {
            navbar_buttons[0].dataset.status = "selected";
        }
        
        document.removeEventListener("click", outsidePanelHouseClickListener);
    }
}

btnHouses.addEventListener("click", function(event) {
    if (isVisible(panel) && !isVisible(databasePanel)) {
        document.dispatchEvent(new Event("click"));
        return;
    }
    document.addEventListener("click", outsidePanelHouseClickListener);
    selected = navLeft.querySelector('[data-status="selected"]');
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

/**
 * Permet de cacher le menu en cliquant à coté
 * 
 * @param {Event} event 
 */
 const outsidePanelDatabaseClickListener = event => {
    if (btnHouses.contains(event.target) && isVisible(panel)) {
        databasePanel.dataset.status = "hidden";
        
        search_tables.addEventListener('keydown', animateSearchDatabase);
        document.removeEventListener("click", outsidePanelDatabaseClickListener);
    } else if (!btnDatabase.contains(event.target) && !databasePanel.contains(event.target) && isVisible(panel)) {
        panel.dataset.status = "hidden";
        databasePanel.dataset.status = "hidden";
        navLeft.querySelector('[data-status="selected"]').dataset.status = "unselected";
        navLeft.dataset.status = "extended";
        if (navLeft.dataset.always != 'small') {
            navbar_buttons[0].dataset.status = "selected";
        }

        search_tables.addEventListener('keydown', animateSearchDatabase);
        document.removeEventListener("click", outsidePanelDatabaseClickListener);
    }
}

btnDatabase.addEventListener("click", function(event) {
    if (isVisible(panel) && !isVisible(panelHouse)) {
        document.dispatchEvent(new Event("click"));
        return;
    }
    document.addEventListener("click", outsidePanelDatabaseClickListener);
    selected = navLeft.querySelector('[data-status="selected"]');
    if (selected) {
        selected.dataset.status = "unselected";
    }
    search_tables.addEventListener('keydown', animateSearchDatabase);
    btnDatabase.dataset.status = "selected";
    navLeft.dataset.status = "small";
    panel.dataset.status = "visible";
    databasePanel.dataset.status = "visible";
    scroll_database.refresh();
})

//btnDatabase.dispatchEvent(new Event('click'));