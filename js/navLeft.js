const navbar_buttons = document.getElementsByClassName("navLeft__button");
const btnHouses = document.getElementById("Maisons");
const navLeft = document.getElementById("navLeft");
const panel = document.getElementById("panel");
const housesPanel = document.getElementById("housesPanel");
const btnCreateHouse = document.getElementById("btnCreateHouse");
const search_houses = document.getElementById("search_houses");
const searchHousesGlobal = document.getElementById("searchHousesGlobal");
const myHouses = document.getElementById("myHouses");
const pinHouses = document.getElementById("pinHouses");
const separator = document.getElementById("separator");
const searchGlobalContainer = document.getElementById("searchGlobalContainer");
const createContainer = document.getElementById("createContainer");
const housesPanel_buttons = document.getElementsByClassName("housesPanel__button");
const pin_icons = document.getElementsByClassName("pin-icon");

for (var i = 0; i < navbar_buttons.length; i++) {
    navbar_buttons[i].addEventListener("mouseenter", function(event) { event.target.children[3].style.opacity = "1"; });
    navbar_buttons[i].addEventListener("mouseleave", function(event) { event.target.children[3].style.opacity = "0"; });
}

/**
 * Permet de savoir si un element est affiché
 * 
 * @param {HTMLElement} elem Element HTML à tester
 * @returns Booleen
 */
const isVisible = elem => elem.style.visibility == "visible" ? true : false;

/**
 * Permet de cacher le menu en cliquant à coté
 * 
 * @param {Event} event 
 */
const outsideClickListener = event => {
    if (!btnHouses.contains(event.target) && !housesPanel.contains(event.target) && isVisible(panel)) {
        panel.style.visibility = "hidden";
        for (let button of navbar_buttons) {
            button.classList.remove("selected");
            button.children[2].style.display = "block";
        }
        navLeft.classList.replace("small", "extended");
        navbar_buttons[0].classList.add("selected");
        btnHouses.children[3].style.borderRadius = "";
        btnHouses.children[3].style.inset = "";

        search_houses.value = "";
        hideSearch();

        document.removeEventListener("click", outsideClickListener);
        removeAllEventForPanelHouses();
    }
}

btnHouses.addEventListener("click", function(event) {
    if (isVisible(panel)) {
        document.dispatchEvent(new Event("click"));
        return;
    }
    document.addEventListener("click", outsideClickListener);
    for (var i = 0; i < navbar_buttons.length; i++) {
        navbar_buttons[i].classList.remove("selected");
        navbar_buttons[i].children[2].style.display = "none";
    }
    this.children[3].style.borderRadius = "16px";
    this.children[3].style.inset = "4px 14px";
    this.classList.add("selected");
    navLeft.classList.replace("extended", "small");
    panel.style.visibility = "visible";

    addAllEventForPanelHouses();
})


/**
 * Ajoute tous les évenement liés au panel maisons
 */
const addAllEventForPanelHouses = function() {
    btnCreateHouse.addEventListener("mouseup", animateBtnCreateHouse);
    btnCreateHouse.addEventListener("mouseleave", animateBtnCreateHouse);
    btnCreateHouse.addEventListener("mouseenter", animateBtnCreateHouse);
    btnCreateHouse.addEventListener("mousedown", animateBtnCreateHouse);

    search_houses.addEventListener("keydown", animateSearch);
    
    for (let button of housesPanel_buttons) {
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
    
    for (let button of housesPanel_buttons) {
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
        searchHousesGlobal.children[1].children[0].children[0].textContent = this.value;
        searchHousesGlobal.setAttribute("href", "/houses/search?s"+this.value);
        if (this.value == "") {
            hideSearch();
        } else {
            searchGlobalContainer.classList.replace("display-none", "display-true");
            pinHouses.classList.replace("display-true", "display-none");
            separator.classList.replace("display-true", "display-none");
            createContainer.classList.replace("display-true", "display-none");
            searchHouse(this.value);
        }
    }, 500));
}

const hideSearch = function() {
    searchGlobalContainer.classList.replace("display-true", "display-none");
    pinHouses.classList.replace("display-none", "display-true");
    separator.classList.replace("display-none", "display-true");
    createContainer.classList.replace("display-none", "display-true");
    for (let button of myHouses.children[1].children) { button.style.display = "flex" }
}

const searchHouse = function(value) {
    for (let button of myHouses.children[1].children) {
        if (!isMatch(button, value)) {
            button.style.display = "none";
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

//btnHouses.dispatchEvent(new Event("click"));

