class ScrollBar
{
    #scroll = 0; #scrollThumb = 0;

    /**
     * 
     * @param {HTMLElement} scrollbarContainer 
     * @param {Object} param1 
     */
    constructor(scrollbarContainer, { offsetContainer = 0, offsetContent = 0 } = {}) {
        this.sbContainer = scrollbarContainer;
        this.sbContent = scrollbarContainer.querySelector('.scrollbar-content');
        this.sbThumb = scrollbarContainer.querySelector('.scrollbar-thumb');
        this.mouseDown = false;
        this.offset = {
            content: typeof(offsetContent) == 'undefined' ? 0 : offsetContent,
            container: typeof(offsetContainer) == 'undefined' ? 0 : offsetContainer
        }
        this.isBindFunction = true;
    }

    /**
     * 
     * @returns 
     */
    init() {
        this.sbContainerHeight = this.sbContainer.clientHeight + this.offset.container;
        this.sbContentHeight = this.sbContent.clientHeight + this.offset.content;
        
        this.sbContainer.addEventListener('wheel', this.wheelEventListener.bind(this));
        this.sbThumb.addEventListener('mousedown', this.mouseDownEventListener.bind(this));
        document.addEventListener('mouseup', this.mouseUpEventListener.bind(this));
        document.addEventListener('mousemove', this.mouseMoveEventListener.bind(this));
        window.addEventListener('resize', this.resizeEventListener.bind(this));
        
        if (this.sbContentHeight < this.sbContainerHeight) return this;
        this.sbThumbHeight =  (this.sbContainerHeight / this.sbContentHeight) * this.sbContainerHeight;
        this.sbThumb.style.height = this.sbThumbHeight + 'px';

        return this;
    }

    /**
     * 
     * @param {Boolean} forceZero 
     */
    refresh(forceZero = false) {
        this.sbContainerHeight = this.sbContainer.clientHeight + this.offset.container;
        this.sbContentHeight = this.sbContent.clientHeight + this.offset.content;
        
        if (this.sbContentHeight < this.sbContainerHeight) {
            this.sbThumb.style.height = 0 + 'px';
        } else {
            this.sbThumbHeight =  (this.sbContainerHeight / this.sbContentHeight) * this.sbContainerHeight;
            this.sbThumb.style.height = this.sbThumbHeight + 'px';
        }

        if (forceZero) {
            this.#scroll = 0;
            this.#scrollThumb = 0;
            this.sbContent.style.transform =  `translateY(-${this.#scroll}px)`;
            this.sbThumb.style.transform =  `translateY(${this.#scrollThumb}px)`;
        }
    }

    /**
     * 
     * @param {Event} event 
     */
    wheelEventListener = (event) => {
        this.#scroll += event.deltaY;

        if (this.#scroll < 0) {
            this.#scroll = 0;
        } else if (this.#scroll > this.sbContentHeight-this.sbContainerHeight) {
            this.#scroll = this.sbContentHeight-this.sbContainerHeight;
        }

        this.#scrollThumb = (this.sbContainerHeight / this.sbContentHeight) * this.#scroll;
        this.sbContent.style.transform =  `translateY(-${this.#scroll}px)`;
        this.sbThumb.style.transform =  `translateY(${this.#scrollThumb}px)`;
    }

    /**
     * 
     * @param {Event} event 
     */
    mouseDownEventListener = (event) => {
        this.mouseDown = true;
        this.sbThumb.dataset.transition = 'no';
        this.sbContent.dataset.transition = 'no';
        this.sbContent.classList.add('unselectable');
    }

    /**
     * 
     * @param {Event} event 
     */
    mouseUpEventListener = (event) => {
        this.mouseDown = false;
        this.sbThumb.dataset.transition = 'yes';
        this.sbContent.dataset.transition = 'yes';
        this.sbContent.classList.remove('unselectable');
    }

    /**
     * 
     * @param {Event} event 
     */
    mouseMoveEventListener = (event) => {
        if (!this.mouseDown) return;
        this.#scrollThumb += event.movementY;

        if (this.#scrollThumb < 0) {
            this.#scrollThumb = 0;
        } else if (this.#scrollThumb > this.sbContainerHeight-this.sbThumbHeight) {
            this.#scrollThumb = this.sbContainerHeight-this.sbThumbHeight;
        }

        this.#scroll = this.#scrollThumb / (this.sbContainerHeight/this.sbContentHeight);
        this.sbContent.style.transform =  `translateY(-${this.#scroll}px)`;
        this.sbThumb.style.transform =  `translateY(${this.#scrollThumb}px)`;
    }

    /**
     * 
     * @param {Event} event 
     */
    resizeEventListener = (event) => {
        console.log("resize");
        this.refresh(true);
    }
}