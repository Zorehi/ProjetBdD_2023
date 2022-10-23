document.addEventListener("DOMContentLoaded", function(event) {
    // Les éléments html qu'on a besoin
    const profil = document.getElementById("profil");
    const profilHover = document.getElementById("profilHover");
    const downHover = document.getElementById("downHover");
    const circle = document.getElementById("circle");
    const card = document.getElementById("card-profil");
    const displayButton = document.getElementById("displayButton");
    const goBack = document.getElementById("goBack");
    const html = document.getElementById("projetbdd");
    const inputRadio = {
        "DISABLED": document.getElementById("DISABLED"),
        "ENABLED": document.getElementById("ENABLED"),
        "USE_SYSTEME": document.getElementById("USE_SYSTEME")
    }
    const className = {
        "DISABLED": "__pj-light-mode",
        "ENABLED": "__pj-dark-mode",
        "USE_SYSTEME": "__pj"
        
    }
    const inputKeys = Object.keys(inputRadio);
    const classValues = Object.values(className);

    /**
     * Créer un cookie ou le met à jour
     * 
     * @param {String} name nom du cookie
     * @param {String} value Valeur du cookie
     * @param {Number} days Jour avant que le cookie expire
     */
    const setCookie = function(name, value, days) {
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days*24*60*60*1000));
            var expires = ";expires="+date.toTimeString();
        } else {
            var expires = "";
        }

        document.cookie = name + "=" + value + expires + ";path=/";
    }

    inputKeys.forEach(input => {
        if (html.classList.contains(className[input])) {
            inputRadio[input].checked = true;
            document.getElementById("ICON_" + input).style.backgroundPosition = "-21px -145px";
            document.getElementById("ICON_" + input).classList.add("checked");
            setCookie("color-scheme", className[input], 365);
        }
    })

    /**
     * Change le color-theme de la page et l'aspect des input radio
     * 
     * @param {Event} event 
     */
    const clickInputListener = function(event) {
        html.classList.remove(...classValues);
        html.classList.add(className[this.id]);
        
        inputKeys.forEach(index => {
            if (index == this.id) {
                document.getElementById("ICON_" + index).style.backgroundPosition = "-21px -145px";
                document.getElementById("ICON_" + index).classList.add("checked");
                setCookie("color-scheme", className[index], 365);
            } else {
                document.getElementById("ICON_" + index).style.backgroundPosition = "-42px -145px";
                document.getElementById("ICON_" + index).classList.remove("checked");
            }
        })
    }
    
    /**
     * Supprime un Listener
     * 
     * @param {HTMLElement} element Element HTML sur lequel enlever le listener
     * @param {Function} listener la fonction du listener
     * @param {String} eventName le nom de l'event
     */
    const removeListener = (element, listener, eventName) => {
        element.removeEventListener(eventName, listener);
    }

    /**
     * Permet de savoir si un element est affiché
     * 
     * @param {HTMLElement} elem Element HTML à tester
     * @returns Booleen
     */
    const isVisible = elem => elem.style.visibility == "visible" ? true : false;


    /**
     * Permet de revenir sur le menu principal
     * 
     * @param {Event} event 
     */
    const goBackListener = event => {
        card.style.height = card.children[0].clientHeight + 8 + "px";
        card.children[1].style.transform = ("translateX(100%) translateZ(1px)");
        card.children[0].style.transform = ("translateX(0%) translateZ(1px)");

        removeListener(displayButton, goBackListener, "click");
        inputKeys.forEach(input => {
            removeListener(inputRadio[input], clickInputListener, "click");
        })

        displayButton.addEventListener("click", showDisplayListener);
    }

    /**
     * Permet d'afficher le menu display
     * 
     * @param {Event} event 
     */
    const showDisplayListener = event => {
        card.style.height = card.children[1].clientHeight + 8 + "px";
        card.children[0].style.transform = ("translateX(-100%) translateZ(1px)");
        card.children[1].style.transform = ("translateX(0%) translateZ(1px)");

        goBack.addEventListener("click", goBackListener);
        inputKeys.forEach(input => {
            inputRadio[input].addEventListener("click", clickInputListener)
        })
    }

    /**
     * Permet de cacher le menu en cliquant à coté
     * 
     * @param {Event} event 
     */
    const outsideClickListener = event => {
        if (!profil.contains(event.target) && !card.contains(event.target) && isVisible(card)) {
            card.style.visibility = "hidden";
            card.children[1].style.transform = ("translateX(100%) translateZ(1px)");
            card.children[0].style.transform = ("translateX(0%) translateZ(1px)");

            removeListener(document, outsideClickListener, "click");
            removeListener(displayButton, outsideClickListener, "click");
        }
    }

    profil.addEventListener("click", function(event) {
        document.addEventListener("click", outsideClickListener);
        displayButton.addEventListener("click", showDisplayListener);
        
        // Affiche le menu principal
        card.style.height = card.children[0].clientHeight + 8 + "px";
        if (card.style.visibility == "visible") {
            card.style.visibility = "hidden";
            card.children[1].style.transform = ("translateX(100%) translateZ(1px)");
            card.children[0].style.transform = ("translateX(0%) translateZ(1px)");

            removeListener(document, outsideClickListener, "click");
            removeListener(displayButton, outsideClickListener, "click");
        } else {
            card.style.visibility = "visible";
        }
    })

    profil.addEventListener("mouseup", function(event) {
        profil.classList.remove("scale-96");
        profilHover.classList.remove("background-pressed");
        profilHover.classList.add("background-hover");
        downHover.classList.remove("opacity-1");
        downHover.classList.add("opacity-0");
        circle.classList.remove("fill-media");
        circle.classList.add("fill-none");
    })
    profil.addEventListener("mouseleave", function(event) {
        profil.classList.remove("scale-96");
        profilHover.classList.add("opacity-0");
        profilHover.classList.remove("opacity-1");
        profilHover.classList.remove("background-pressed");
        profilHover.classList.add("background-hover");
        downHover.classList.remove("opacity-1");
        downHover.classList.add("opacity-0");
        circle.classList.remove("fill-media");
        circle.classList.add("fill-none");
    })
    profil.addEventListener("mouseenter", function(event) {
        profilHover.classList.add("opacity-1");
        profilHover.classList.remove("opacity-0");
    })
    profil.addEventListener("mousedown", function(event) {
        profil.classList.add("scale-96");
        profilHover.classList.add("background-pressed");
        profilHover.classList.remove("background-hover");
        downHover.classList.add("opacity-1");
        downHover.classList.remove("opacity-0");
        circle.classList.add("fill-media");
        circle.classList.remove("fill-none");
    })
});