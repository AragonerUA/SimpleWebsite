const openPopupButton = document.querySelectorAll('.protien')

// ---------------- POPUP ---------------------- //
class Popup {
    constructor(popupSelector) {
        this._popup = document.querySelector(popupSelector);
        this._handleEscClose = this._handleEscClose.bind(this);
        this._image = this._popup.querySelector('.popup__image')
        this.setEventListeners()
    }

    open(image) {
        this._popup.classList.add('popup_opened');
        this._image.src = image;
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

function toCategoryPage() {
    window.location = "pages/CategoryPage.php"
}

function toAboutPage(){
    window.location = "pages/AboutPage.php"
}

function toTestimonialPage() {
    window.location = "pages/TestimonialPage.php"
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


function openPopup (event) {
    const button = event.currentTarget;
    const imageUrl = button.dataset.img;
    popup.open(imageUrl);
}

function printProducts(){
    const products = document.querySelectorAll('.col-md-3')
}

function increaseSort() {
    const products = document.querySelectorAll('.col-md-3');

    const productsArray = Array.from(products);

    productsArray.sort((a, b) => {
        const priceA = parseInt(a.querySelector('h3').innerText.slice(1));
        const priceB = parseInt(b.querySelector('h3').innerText.slice(1));
        return priceA - priceB;
    });

    const container = document.querySelector('.row');
    container.innerHTML = '';

    productsArray.forEach(product => {
        container.appendChild(product);
    });
}

function decreaseSort() {
    const products = document.querySelectorAll('.col-md-3');

    const productsArray = Array.from(products);

    productsArray.sort((a, b) => {
        const priceA = parseInt(a.querySelector('h3').innerText.slice(1));
        const priceB = parseInt(b.querySelector('h3').innerText.slice(1));
        return priceB - priceA;
    });

    const container = document.querySelector('.row');
    container.innerHTML = '';

    productsArray.forEach(product => {
        container.appendChild(product);
    });
}

function loadColumns() {
    // Получаем блок "row" из первого файла (index.html)
    const indexRow = document.querySelector('.row');

    // Получаем блок "row" из текущего файла (CategoryPage.html)
    const categoryRow = document.querySelector('.row');

    // Проверяем, что блок из первого файла существует
    if (indexRow) {
        // Клонируем содержимое блока "row" из первого файла
        const clonedRow = indexRow.cloneNode(true);

        // Добавляем клонированный блок в текущий файл
        categoryRow.appendChild(clonedRow);
    }
}

// Вызываем функцию для загрузки колонок при загрузке страницы
loadColumns();

openPopupButton.forEach((button) => {
    button.addEventListener('click', openPopup)
})
