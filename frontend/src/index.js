const openPopupButton = document.querySelectorAll('.protien')

// ---------------- POPUP ---------------------- //
class Popup {
    constructor(popupSelector) {
        this._popup = document.querySelector(popupSelector);
        this._handleEscClose = this._handleEscClose.bind(this);
        this._image = this._popup.querySelector('.popup__image')
        this.__description = this._popup.querySelector('#popup_description')
        this.__price = this._popup.querySelector('#popup_price')
        this.__name = this._popup.querySelector('#popup_name')

        this.setEventListeners()
    }

    open(image, description, price, name, product_id) {
        this._popup.classList.add('popup_opened');
        this._image.src = image;
        this.__description.innerHTML = description;
        this.__price.innerHTML = "Price: " + price;
        this.__name.innerHTML = "Name: " + name;
        window.current_product = product_id;
        document.addEventListener('keydown', this._handleEscClose);
    }

    close() {
        this._popup.classList.remove('popup_opened');
        document.removeEventListener('keydown', this._handleEscClose);
    }

    _handleEscClose(evt) {
        if (evt.key === 'Escape'){
            this.close();
        }
    }

    setEventListeners() {
        this._closeButton = this._popup.querySelector('.popup__close');
        this._closeButton.addEventListener('click', () => {
            this.close();
        });
        this._popup.addEventListener('mousedown', (evt) => {
            if(evt.target === this._popup){
                this.close();
            }
        })
    }
}

const popup = new Popup('.popup');


function openNav() {
    document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
    document.getElementById("myNav").style.width = "0%";
}
function login() {
    window.location = "pages/login.html"
}

function openMain() {
    window.location = "../index.php"
}

function openProfile() {
    window.location = "pages/UserProfile.php"
}

function openBasket() {
    window.location = "pages/basket.php"
}

function openBasketFromProfile() {
    window.location = "basket.php"
}

function openProfileFromBasket() {
    window.location = "UserProfile.php"
}

function openCheckout() {
    window.location = "Checkout.html"
}


// function openPopup (event) {
//     const button = event.currentTarget;
//     const imageUrl = button.dataset.img;
//     window.current_product = button.dataset.product_id;
//     popup.open(imageUrl);
// }

// openPopupButton.forEach((button) => {
//     button.addEventListener('click', openPopup)
// })
