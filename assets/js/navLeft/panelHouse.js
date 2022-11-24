/**
 * File panelHouse.js
 */

let timeoutID = [];
/**
 * Permet l'animation quand on cherche une maison
 * 
 * @param {Event} event 
 */
const animateSearch = function(event) {
    if (timeoutID.length > 0) { clearTimeout(timeoutID.shift()); }
    timeoutID.push(setTimeout(() => {
        timeoutID = [];
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

/**
 * 
 * @param {HTMLElement} button 
 * @param {String} test 
 * @returns 
 */
const isMatch = (button, test) => button.children[1].children[0].textContent.toLocaleLowerCase().includes(test.toLowerCase());