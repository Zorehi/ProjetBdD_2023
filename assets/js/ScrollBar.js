class ScrollBar
{
    constructor(scrollbarContainer, { offset = 0 }) {
        this.sbContainer = scrollbarContainer;
        this.sbContent = this.sbContainer.querySelector('.scrollbar-content');
        this.sbThumb = this.sbContainer.querySelector('.scrollbar-thumb');
        this.scroll = 0;
        this.scrollThumb = 0;
        this.mouseDown = false;
        console.log(offset);
        this.init(offset);
    }

    /**
     * 
     * @param {HTMLElement} scrollbarContainer
     */
    init(offset) {
        this.sbContainerHeight = this.sbContainer.clientHeight - offset;
        this.sbContentHeight = this.sbContent.clientHeight;
        if (this.sbContentHeight < this.sbContainerHeight) return;

        this.sbThumbHeight =  (this.sbContainerHeight / this.sbContentHeight) * this.sbContainerHeight;
        this.sbThumb.style.height = this.sbThumbHeight + 'px';

        this.sbContainer.addEventListener('wheel', this.wheelEventListener.bind(this));
        this.sbThumb.addEventListener('mousedown', this.mouseDownEventListener.bind(this));
        document.addEventListener('mouseup', this.mouseUpEventListener.bind(this));
        document.addEventListener('mousemove', this.mouseMoveEventListener.bind(this));
    }

    /**
     * 
     * @param {Event} event 
     */
    wheelEventListener = (event) => {
        this.scroll += event.deltaY;

        if (this.scroll < 0) {
            this.scroll = 0;
        } else if (this.scroll > this.sbContentHeight-this.sbContainerHeight) {
            this.scroll = this.sbContentHeight-this.sbContainerHeight;
        }

        this.scrollThumb = (this.sbContainerHeight / this.sbContentHeight) * this.scroll;
        this.sbContent.style.transform =  `translateY(-${this.scroll}px)`;
        this.sbThumb.style.transform =  `translateY(${this.scrollThumb}px)`;
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
        this.scrollThumb += event.movementY;

        if (this.scrollThumb < 0) {
            this.scrollThumb = 0;
        } else if (this.scrollThumb > this.sbContainerHeight-this.sbThumbHeight) {
            this.scrollThumb = this.sbContainerHeight-this.sbThumbHeight;
        }

        this.scroll = this.scrollThumb / (this.sbContainerHeight/this.sbContentHeight);
        this.sbContent.style.transform =  `translateY(-${this.scroll}px)`;
        this.sbThumb.style.transform =  `translateY(${this.scrollThumb}px)`;
    }
}