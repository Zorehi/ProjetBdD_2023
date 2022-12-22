const scroll_database = new ScrollBar(document.getElementById('scrollbar-1'), { offsetContainer: -20, offsetContent: 0 });
scroll_database.init()

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
        if (revertSelectedElement) {
            revertSelectedElement.dataset.status = 'selected';
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
    if (!isVisible(panel)) revertSelectedElement = selected;
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

let timeoutIDDatabase = [];
/**
 * Permet l'animation quand on cherche une table
 * 
 * @param {Event} event 
 */
const animateSearchDatabase = function(event) {
    if (timeoutIDDatabase.length > 0) { clearTimeout(timeoutIDDatabase.shift()); }
    timeoutIDDatabase.push(setTimeout(() => {
        timeoutIDDatabase = [];
        if (this.value == "") {
            for (let button of scroll_database.sbContent.children) {
                button.style.display = "flex";
            }
        } else {
            searchTable(this.value);
        }
        scroll_database.refresh(true);
    }, 500));
}

/**
 * Permet de ne pas afficher les Tables qui ne correspondent pas à la recherche
 * 
 * @param {String} value 
 */
const searchTable = function(value) {
    for (let button of scroll_database.sbContent.children) {
        console.log(button);
        console.log(value);
        if (!isMatch(button.children[0].children[0].textContent, value)) {
            button.style.display = "none";
        } else {
            button.style.display = "flex";
        }
    }
}