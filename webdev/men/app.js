// Contentfull

const client = contentful.createClient({
    // This is the space ID. A space is like a project folder in Contentful terms
    space: "nk4ydn0zsr16",
    // This is the access token for this space. Normally you get both ID and the token in the Contentful web app
    accessToken: "_7E1RdX02tUz9cCeRk_3gnQjLRYzDod5_poY7O2XpRQ"
  });

// Contentfull
const cartBtn = document.querySelector('.cart-btn');
const closeCartBtn = document.querySelector('.close-cart');
const clearCartBtn = document.querySelector('.clear-cart');
const cartDOM = document.querySelector('.cart');
const cartOverlay = document.querySelector('.cart-overlay');
const cartItems = document.querySelector('.cart-items');
const cartTotal = document.querySelector('.cart-total');
const cartContent = document.querySelector('.cart-content');
const productsDOM = document.querySelector('.products-center');

let cart = [];
let buttonsDOM = [];


class Products{
    async getProducts() {
        try {
            let contentFul = await client.getEntries({
                content_type: 'jsShoppingCart'
            });
            // console.log(contentFul);
            let result = await fetch('products.json');
            let data = await result.json();
            let products = data.items;
            // let products = contentFul.items;
            products = products.map(item => { 
                const { title, price } = item.fields;
                const { id } = item.sys;
                const image = item.fields.image.fields.file.url;
                return { id, title, price, image };
            });
            return products;
        } catch (err) {
            console.log(err);
        }

    }
}

class UI{
    displayProducts(products) {
        let result = '';
        products.forEach(product => { 
            let { id, title, price, image } = product;
            result += `
            <article class="product">
            <div class="img-container">
                <img src= ${image} alt="product" class="product-img">
                <button class="bag-btn" data-id=${id}>
                    <i class="fas fa-shopping-cart"></i>
                    Add to cart
                </button>
            </div>
            <h3>${title}</h3>
            <h4>Rs${price}</h4>
        </article>
            `;
        });
        productsDOM.innerHTML = result;
    }
    getBagButtons() {
        const buttons = [...document.querySelectorAll('.bag-btn')];
        buttonsDOM = buttons;
        buttons.forEach(button => { 
            let id = button.dataset.id;
            let inCart = cart.find(item => item.id === id);
            if (inCart) {
                button.innerText = 'In Cart';
                button.disabled = true;
            }
            button.addEventListener('click', e => { 
                e.target.innerText = 'In Cart';
                e.target.disabled = true;
                let cartItem = { ...Storage.getProduct(id), amount: 1 };
                cart = [...cart, cartItem];
                Storage.saveCart(cart);
                this.setCartValues(cart);
                this.addCartItems(cartItem);
                this.showCart();
            });
        });
    }
    setCartValues(cart) {
        let tempTotal = 0;
        let itemsTotal = 0;
        cart.map(item => { 
            let { price, amount } = item;
            tempTotal += price * amount; itemsTotal += amount;
        });
        cartTotal.innerText = parseFloat(tempTotal.toFixed(2));
        cartItems.innerText = itemsTotal;
        // console.log(cartTotal, cartItems);
    }
    addCartItems(item) {
        const div = document.createElement('div');
        div.classList.add('cart-item');
        div.innerHTML = `
        <img src=${item.image} alt="product">
        <div>
            <h4>${item.title}</h4>
            <h5>Rs${item.price}</h5>
            <span class="remove-item" data-id = ${item.id}>remove</span>
        </div>
        <div>
            <i class="fas fa-chevron-up" data-id = ${item.id}></i>
            <p class="item-amount">${item.amount}</p>
            <i class="fas fa-chevron-down" data-id = ${item.id}></i>
        </div>
        `;
        cartContent.appendChild(div);
    }
    showCart() {
        cartOverlay.classList.add('transparentBcg');
        cartDOM.classList.add('showCart');
    }
    setUpApp() {
        cart = Storage.getCart();
        this.setCartValues(cart);
        this.populateCart(cart);
        cartBtn.addEventListener('click', this.showCart);
        closeCartBtn.addEventListener('click', this.hideCart);
    }
    populateCart(cart) {
        cart.forEach(item => { 
            this.addCartItems(item);
        });
    }
    hideCart() {
        cartOverlay.classList.remove('transparentBcg');
        cartDOM.classList.remove('showCart');
    }
    cartLogic() {
        clearCartBtn.addEventListener('click', () => {
            this.clearCart();
        });
        cartContent.addEventListener('click', e => {
            if (e.target.classList.contains('remove-item')) {
                let Target = e.target;
                let removeItemId = e.target.dataset.id;
                cartContent.removeChild(Target.parentElement.parentElement);
                this.removeItem(removeItemId);
            } else if (e.target.classList.contains('fa-chevron-up')) {
                let addAmount = e.target;
                let id = addAmount.dataset.id;
                let tempItem = cart.find(item => item.id === id);
                tempItem.amount += 1;
                Storage.saveCart(cart);
                this.setCartValues(cart);
                addAmount.nextElementSibling.innerText = tempItem.amount;
            } else if (e.target.classList.contains('fa-chevron-down')) {
                let lowerAmount = e.target;
                let id = lowerAmount.dataset.id;
                let tempItem = cart.find(item => item.id === id);
                tempItem.amount -= 1;
                if (tempItem.amount > 0) {
                    Storage.saveCart(cart);
                    this.setCartValues(cart);
                    lowerAmount.previousElementSibling.innerText = tempItem.amount;
                } else {
                    cartContent.removeChild(lowerAmount.parentElement.parentElement);
                    this.removeItem(id);
                }
            }
        });
    };
    
    clearCart() {
        let cartItems = cart.map(item => item.id);
        cartItems.forEach(id => this.removeItem(id));
        while (cartContent.children > 0) {
            cartContent.removeChild(cartContent.children[0]);
        }
        this.hideCart();
    }
    removeItem(id) {
        cart = cart.filter(item => item.id !== id);
        this.setCartValues(cart);
        Storage.saveCart(cart);
        let button = this.getSingleButton(id);
        button.disabled = false;
        button.innerHTML = `<i class='fas fa-shopping-cart'></i> add to cart`;
    }
    getSingleButton(id) {
        return buttonsDOM.find(button => button.dataset.id === id);
    }
}

class Storage{
    static saveProducts(products) {
        localStorage.setItem('products', JSON.stringify(products));
    }
    static getProduct(id) {
        let products = JSON.parse(localStorage.getItem('products'));
        return products.find(product => product.id === id);
    }
    static saveCart(cartArr) {
        localStorage.setItem('cart', JSON.stringify(cartArr));
    }
    static getCart() {
        return localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : []; 
    }
}

document.addEventListener('DOMContentLoaded', () => { 
    const ui = new UI();
    const products = new Products();
    ui.setUpApp();
    products.getProducts()
        .then(products => {
            ui.displayProducts(products);
            Storage.saveProducts(products);
        })
        .then(() => {
            ui.getBagButtons();
            ui.cartLogic();
        });
});