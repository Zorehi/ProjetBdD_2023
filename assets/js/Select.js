class Select
{
    value = false;
    selectedIndex = 0;
    type = 'select';

    constructor (selectContainer, type = 'select', selectedIndex = 0) {
        this.selectedIndex = selectedIndex;
        this.type = type;
        this.selectContainer = selectContainer;
        this.select = selectContainer.querySelector('.select.button');
        this.select_text = this.select.querySelector('.text.primary');
        this.icon = this.select.querySelector('i.icon');
        this.popup = selectContainer.querySelector('.pop-up-select');
        this.options = this.popup.querySelectorAll('.option.button');
        this.input = this.select.querySelector('input[data-for="select_value"]');

        switch (this.type) {
            case 'select':
                this.value = this.options[this.selectedIndex].dataset.value;
                this.options[this.selectedIndex].dataset.status = 'selected';
                this.select_text.textContent = this.options[this.selectedIndex].querySelector('.text.primary').textContent;
                break;
            case 'filter':
                this.select_defaultText = this.select_text.textContent;
                break;
        }
        
        this.input.value = this.value;

        this.select.addEventListener('click', this.clickOnSelectBind);
        this.options.forEach(element => {
            element.addEventListener('click', () => {
                this.clickOnOptionBind(element);
            });
        });
    }

    clickOnSelect(event) {
        if (!this.icon.contains(event.target) || this.select.dataset.status != 'selected') {
            if (this.popup.dataset.status != 'hidden') {
                document.dispatchEvent(new Event("click"));
                return;
            }

            this.popup.dataset.status = '';

            document.addEventListener('click', this.outsideClickListenerBind);
        } else if (this.icon.contains(event.target) && this.select.dataset.status == 'selected') {
            this.select.dataset.status = '';
            this.icon.style.height = '16px'
            this.icon.style.width = '16px'
            this.icon.style.backgroundPosition = '0px -20px';
            this.select_text.textContent = this.select_defaultText;
            const element_selected = this.popup.querySelector('[data-status="selected"]');
            this.value = false;
            this.input.value = false;
            this.input.dispatchEvent(new Event('change'));
            if (element_selected) element_selected.dataset.status = '';
        }
    }
    clickOnSelectBind = this.clickOnSelect.bind(this);

    clickOnOption(element) {
        this.options.forEach((value, index) => {
            if (value.dataset.value == element.dataset.value) return this.setSelectedIndex(index);
        })

        document.dispatchEvent(new Event("click"));
    }
    clickOnOptionBind = this.clickOnOption.bind(this);

    outsideClickListener(event) {
        if (!this.popup.contains(event.target) && !this.select.contains(event.target) && this.popup.dataset.status != 'hidden') {
            this.popup.dataset.status = 'hidden';

            document.removeEventListener('click', this.outsideClickListenerBind);
        }

    }
    outsideClickListenerBind = this.outsideClickListener.bind(this);

    setSelectedIndex(selectedIndex) {
        this.selectedIndex = selectedIndex;
        this.value = this.options[selectedIndex].dataset.value;
        this.input.value = this.value;
        this.input.dispatchEvent(new Event('change'));

        const element_selected = this.popup.querySelector('[data-status="selected"]');
        if (element_selected) element_selected.dataset.status = '';
        this.options[selectedIndex].dataset.status = 'selected';

        this.select_text.textContent = this.options[selectedIndex].querySelector('.text.primary').textContent;

        if (this.type == 'filter') {
            this.select.dataset.status = 'selected';
            this.icon.style.height = '20px'
            this.icon.style.width = '20px'
            this.icon.style.backgroundPosition = '0px -36px';
        }
    }

    setSelectedValue(selectedValue) {
        this.options.forEach((value, index) => {
            if (value.dataset.value == selectedValue) return this.setSelectedIndex(index);
        })
    }
}