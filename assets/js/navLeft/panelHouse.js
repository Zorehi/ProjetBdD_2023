/**
 * File panelHouse.js
 */

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