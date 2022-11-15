/**
 * File panelHouse.js
 */

/**
 * Ajoute tous les évenement liés au panel maisons
 */
 const addAllEventForPanelHouses = function() {
    btnCreateHouse.addEventListener("mouseup", animateBtnCreateHouse);
    btnCreateHouse.addEventListener("mouseleave", animateBtnCreateHouse);
    btnCreateHouse.addEventListener("mouseenter", animateBtnCreateHouse);
    btnCreateHouse.addEventListener("mousedown", animateBtnCreateHouse);

    search_houses.addEventListener("keydown", animateSearch);
    
    for (let button of panelHouse_button) {
        button.addEventListener("mouseenter", animateButtons);
        button.addEventListener("mouseleave", animateButtons);
        button.addEventListener("mousedown", animateButtons);
        button.addEventListener("mouseup", animateButtons);
    }
    for (let pin_icon of pin_icons) {
        pin_icon.addEventListener("mouseenter", animatePinIcon);
        pin_icon.addEventListener("mouseleave", animatePinIcon);
        pin_icon.addEventListener("mousedown", animatePinIcon);
        pin_icon.addEventListener("mouseup", animatePinIcon);
    }
}

/**
 * Enlève tous les évenement liés au panel maisons
 */
const removeAllEventForPanelHouses = function() {
    btnCreateHouse.removeEventListener("mouseup", animateBtnCreateHouse);
    btnCreateHouse.removeEventListener("mouseleave", animateBtnCreateHouse);
    btnCreateHouse.removeEventListener("mouseenter", animateBtnCreateHouse);
    btnCreateHouse.removeEventListener("mousedown", animateBtnCreateHouse);
    
    search_houses.removeEventListener("keydown", animateSearch);
    
    for (let button of panelHouse_button) {
        button.removeEventListener("mouseenter", animateButtons);
        button.removeEventListener("mouseleave", animateButtons);
        button.removeEventListener("mousedown", animateButtons);
        button.removeEventListener("mouseup", animateButtons);
    }
    for (let pin_icon of pin_icons) {
        pin_icon.removeEventListener("mouseenter", animatePinIcon);
        pin_icon.removeEventListener("mouseleave", animatePinIcon);
        pin_icon.removeEventListener("mousedown", animatePinIcon);
        pin_icon.removeEventListener("mouseup", animatePinIcon);
    }
}

/**
 * Permet le hover des buttons
 * 
 * @param {Event} event 
 */
const animateButtons = function(event) {
    switch (event.type) {
        case "mouseenter":
            this.children[this.children.length-1].classList.replace("opacity-0", "opacity-1");
            if (this.id != "searchHousesGlobal") this.children[2].children[1].classList.replace("opacity-1", "opacity-0");
            break;
        case "mouseleave":
            this.children[this.children.length-1].classList.replace("opacity-1", "opacity-0");
        case "mouseup":
            this.children[this.children.length-1].classList.replace("background-pressed", "background-hover");
            break;
        case "mousedown":
            this.children[this.children.length-1].classList.replace("background-hover", "background-pressed");
            break;
    }
}

/**
 * Permet d'animer les icon épingler sur les buttons 
 * 
 * @param {Event} event 
 */
const animatePinIcon = function(event) {
    switch (event.type) {
        case "mouseenter":
            this.children[1].classList.replace("opacity-0", "opacity-1");
            this.parentNode.children[3].classList.replace("opacity-1", "opacity-0");
            break;
        case "mouseleave":
            this.parentNode.children[3].classList.replace("opacity-0", "opacity-1");
            this.children[1].classList.replace("opacity-1", "opacity-0");
        case "mouseup":
            this.classList.remove("scale-96");
            this.children[1].classList.replace("background-pressed", "background-hover");
            break;
        case "mousedown":
            this.classList.add("scale-96");
            this.children[1].classList.replace("background-hover", "background-pressed");
            break;
    }
}

/**
 * Permet d'animer le bouton createHouse
 * 
 * @param {Event} event 
 */
const animateBtnCreateHouse = function(event) {
    switch (event.type) {
        case "mouseup":
        case "mouseleave":
            this.classList.remove("scale-96");
            this.children[1].classList.replace("opacity-1", "opacity-0");
            this.children[1].classList.replace("background-pressed", "background-hover");
            break;
        case "mousedown":
            this.classList.add("scale-96");
            this.children[1].classList.replace("background-hover", "background-pressed");
            break;
        case "mouseenter":
            this.children[1].classList.replace("opacity-0", "opacity-1");
            break;
    }
}

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