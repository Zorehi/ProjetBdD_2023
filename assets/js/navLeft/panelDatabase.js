/**
 * File panelDatabase.js
 */

let timeoutIDDatabase = [];
/**
 * Permet l'animation quand on cherche une maison
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
 * Permet de ne pas afficher les Maisons qui ne correspondent pas à la recherche
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