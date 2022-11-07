/**
 * Permet de savoir si un element est affiché
 * 
 * @param {HTMLElement} elem Element HTML à tester
 * @returns Booleen
 */
 const isVisible = elem => elem.getAttribute("data-status") == "visible" ? true : false;