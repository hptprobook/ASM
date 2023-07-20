


window.addEventListener("load", () => {

    const $ = document.querySelector.bind(document);
    const $$ = document.querySelectorAll.bind(document);

    var products = [
        { name: "Modern Hat", price: 41, rate: 4, img: "public/img/html-shop/pr1.jpg" },
        { name: "Skis", price: 760, rate: 5, img: "public/img/html-shop/pr2.jpg" },
        { name: "Camera", price: 760, rate: 5, img: "public/img/html-shop/pr3.jpg" },
        { name: "Backpack", price: 190, rate: 5, img: "public/img/html-shop/pr4.jpg" },
        { name: "Towel", price: 30, rate: 3, img: "public/img/html-shop/pr5.jpg" },
        { name: "Compass", price: 240, rate: 5, img: "public/img/html-shop/pr6.jpg" },
        { name: "Thermos", price: 100, rate: 4, img: "public/img/html-shop/7.jpg" },
        { name: "Sunglasses", price: 120, rate: 4, img: "public/img/html-shop/8.jpg" },
        { name: "Summer Hat", price: 96, rate: 3, img: "public/img/html-shop/9.jpg" },
        { name: "Star", price: 109, rate: 5, img: "public/img/html-shop/10.jpg" },
        { name: "Flip-flops", price: 39, rate: 4, img: "public/img/html-shop/11.jpg" },
        { name: "Rope", price: 70, rate: 5, img: "public/img/html-shop/12.jpg" },
        { name: "Lamp", price: 29, rate: 3, img: "public/img/html-shop/13.jpg" },
        { name: "Skateboard", price: 300, rate: 3, img: "public/img/html-shop/14.jpg" },
        { name: "Bag", price: 98, rate: 5, img: "public/img/html-shop/15.jpg" },
        { name: "Tent", price: 560, rate: 4, img: "public/img/html-shop/16.jpg" },
        { name: "Power Bank", price: 193, rate: 3, img: "public/img/html-shop/17.jpg" },
        { name: "Umbrella", price: 186, rate: 5, img: "public/img/html-shop/18.jpg" },
        { name: "Summer Hat", price: 96, rate: 3, img: "public/img/html-shop/9.jpg" },
        { name: "Star", price: 109, rate: 5, img: "public/img/html-shop/10.jpg" },
        { name: "Flip-flops", price: 39, rate: 4, img: "public/img/html-shop/11.jpg" },
        { name: "Rope", price: 70, rate: 5, img: "public/img/html-shop/12.jpg" },
        { name: "Lamp", price: 29, rate: 3, img: "public/img/html-shop/13.jpg" },
        { name: "Skateboard", price: 300, rate: 3, img: "public/img/html-shop/14.jpg" },
        { name: "Bag", price: 98, rate: 5, img: "public/img/html-shop/15.jpg" },
        { name: "Tent", price: 560, rate: 4, img: "public/img/html-shop/16.jpg" },
        { name: "Power Bank", price: 193, rate: 3, img: "public/img/html-shop/17.jpg" },
        { name: "Umbrella", price: 186, rate: 5, img: "public/img/html-shop/18.jpg" },
    ];

    var shopCart = $(".header__cart--more");

    const productsPerPage = 12;
    var currentPage = 1;

    const productSort = $(".shop-container__heading--select");

    productSort.onchange = function() {
        var productSortValue = this.value;

        if (productSortValue === "name") {
            sortProductsByName();
        } else if (productSortValue === "average") {
            sortProductsByAvg();
        } else if (productSortValue === "asc") {
            sortProductsLowToHigh();
        } else if (productSortValue === "desc") {
            sortProductsHighToLow();
        }
    }

    // Sort products by name
    function sortProductsByName() {
        products.sort((a, b) => {
            const startName = a.name.toLowerCase();
            const nextName = b.name.toLowerCase();

            if (startName < nextName) {
                return -1;
            } else if (startName > nextName) {
                return 1;
            } else {
                return 0;
            }
        });

        renderProductsOnPage(currentPage, products);
    }

    // Sort products by average
    function sortProductsByAvg() {
        products.sort( (a, b) => {
            const startAvg = a.rate;
            const nextAvg = b.rate;

            if (startAvg < nextAvg) {
                return 1;
            } else if (startAvg > nextAvg) {
                return -1;
            } else {
                return 0;
            }
        });
        renderProductsOnPage(currentPage, products);
    }

    // Sort products by Price: low to high
    function sortProductsLowToHigh() {
        products.sort( (a, b) => {
            const startPrice = a.price;
            const nextPrice = b.price;

            if (startPrice < nextPrice) {
                return -1;
            } else if (startPrice > nextPrice) {
                return 1;
            } else {
                return 0;
            }
        });
        renderProductsOnPage(currentPage, products);
    }

    function sortProductsHighToLow() {
        products.sort( (a, b) => {
            const startPrice = a.price;
            const nextPrice = b.price;

            if (startPrice < nextPrice) {
                return 1;
            } else if (startPrice > nextPrice) {
                return -1;
            } else {
                return 0;
            }
        });
        renderProductsOnPage(currentPage, products);
    }

    // Filter products by Price
    function filterProductsByPrice() {
        var filterValue = parseFloat($(".shop-container__filter--input").value);

        filteredProducts = products.filter(product => {
            return parseFloat(product.price) <= filterValue;
        });

        if (filteredProducts.length === 0) {
            alert("No products match");
            renderProductsOnPage(currentPage, products);
            renderPagination(products);
        }

        renderProductsOnPage(currentPage, filteredProducts);
        renderPagination(filteredProducts);
    }

    $(".shop-container__filter--submit").onclick = (e) => {
        e.preventDefault();
        filterProductsByPrice();
    };

    // Search for products
    var formSearch = $(".shop-container__search");
    var formSearchInput = $(".shop-container__search--input");

    formSearch.addEventListener("submit", (e) => {
        e.preventDefault();

        searchValue = formSearchInput.value.trim().toLowerCase();

        var filteredProducts = products.filter( product => {
            const productName = product.name.trim().toLowerCase();
            return productName.includes(searchValue);
        });

        if (filteredProducts.length === 0) {
            alert("No products match");
            renderProductsOnPage(currentPage, products);
            renderPagination(products);
        }

        renderProductsOnPage(currentPage, filteredProducts);
        renderPagination(filteredProducts);
    });

    const TODOS_STORAGE_KEY = "CartItem";
    function get() {
        return JSON.parse(localStorage.getItem(TODOS_STORAGE_KEY)) || [];
    };

    function set(cartItem) {
        localStorage.setItem(TODOS_STORAGE_KEY, JSON.stringify(cartItem));
    };

    function addToCart(product) {
        var cartItem = get();

        var newCartItem = {
            name: product.name,
            price: product.price,
            img: product.img,
            quantity: 1
        };

        cartItem.push(newCartItem);
        set(cartItem);
    }

    function updateShopCart() {
        var shopCartItem = get();


        shopCartItem.forEach( (item, index) => {
            var cartContainer = document.createElement("div");
            cartContainer.classList.add("header__cart--product");
            cartContainer.setAttribute("data-id", index);

            cartContainer.innerHTML = `
                <div class="header__cart--img">
                    <img src="${item.img}" alt="">
                </div>
                <div class="header__cart--info">
                    <h2>${item.name}</h2>
                    <span class="cart__quantity">Quantity: </span> <input type="number" min="0" value="1">
                    <p>$${item.price}</p>
                    <i class="bi bi-x"></i>
                </div>
            `;

            shopCart.appendChild(cartContainer);
        });
    }

    updateShopCart();


    function renderProductsOnPage(pageNumber, currentProducts) {
        const container = $(".shop-container__product .row");
        container.innerHTML = "";

        var startIndex = (pageNumber - 1) * productsPerPage;
        var endIndex = pageNumber * productsPerPage;

        for (let i = startIndex; i < endIndex && i < currentProducts.length; i++) {
            const product = currentProducts[i];


            const productElement = document.createElement("div");
            productElement.classList.add("col", "l-4", "m-6", "c-12");

            const productContainer = document.createElement("div");
            productContainer.classList.add("shop-container__product--list");

            const productImage = document.createElement("div");
            productImage.classList.add("shop-container__product--img");
            const image = document.createElement("img");
            image.src = product.img;
            image.alt = "";
            productImage.appendChild(image);

            const addToCartButton = document.createElement("div");
            addToCartButton.classList.add("shop-container__product--btn");
            addToCartButton.textContent = "ADD TO CART";

            addToCartButton.addEventListener("click", function() {
                addToCart(product);
                var cartContainer = document.createElement("div");
                cartContainer.classList.add("header__cart--product");

                var cartItem = get();

                if (cartItem.length === 0) {
                    $(".header__cart--message").classList.remove("d-none");
                } else {
                    $(".header__cart--message").classList.add("d-none");

                    cartItem.forEach( (item, index) => {
                        cartContainer.setAttribute("data-id", index);

                        cartContainer.innerHTML = `
                            <div class="header__cart--img">
                                <img src="${item.img}" alt="">
                            </div>
                            <div class="header__cart--info">
                                <h2>${item.name}</h2>
                                <span class="cart__quantity">Quantity: </span> <input type="number" min="0" value="1">
                                <p>$${item.price}</p>
                                <i class="bi bi-x"></i>
                            </div>
                        `;

                    });

                    shopCart.appendChild(cartContainer);
                    alert("Success!");
                }
            });

            productContainer.appendChild(productImage);
            productImage.appendChild(addToCartButton);

            const productInfo = document.createElement("div");
            productInfo.classList.add("shop-container__product--info");

            const productName = document.createElement("h2");
            productName.classList.add("shop-container__product--name");
            productName.textContent = product.name;

            const priceAndRatingContainer = document.createElement("div");
            priceAndRatingContainer.classList.add(
                "d-flex",
                "justify-content-between",
                "align-items-center"
            );

            const productPrice = document.createElement("p");
            productPrice.classList.add("shop-container__product--price");
            productPrice.textContent = `$${product.price}`;

            const productRating = document.createElement("div");
            productRating.classList.add("shop-container__product--rate");

            for (let j = 0; j < product.rate; j++) {
                const starIcon = document.createElement("i");
                starIcon.classList.add("bi", "bi-star-fill");
                productRating.appendChild(starIcon);
            }

            for (let j = product.rate; j < 5; j++) {
                const starIcon = document.createElement("i");
                starIcon.classList.add("bi", "bi-star");
                productRating.appendChild(starIcon);
            }

            priceAndRatingContainer.appendChild(productPrice);
            priceAndRatingContainer.appendChild(productRating);

            productInfo.appendChild(productName);
            productInfo.appendChild(priceAndRatingContainer);

            productElement.appendChild(productContainer);
            productElement.appendChild(productInfo);

            container.appendChild(productElement);
        }

    }

    function renderPagination(currentProducts) {
        const totalPages = Math.ceil(currentProducts.length / productsPerPage);
        const paginationContainer = $(".shop-container__product--pagination");
        paginationContainer.innerHTML = "";

        for (let i = 1; i <= totalPages; i++) {
            const pageLink = document.createElement("a");
            pageLink.href = "#";
            pageLink.textContent = i;

            if (i === currentPage) {
                pageLink.classList.add("active");
            }

            pageLink.addEventListener("click", function () {
                currentPage = i;
                renderProductsOnPage(currentPage, currentProducts);
                renderPagination(currentProducts);
            });

            paginationContainer.appendChild(pageLink);
        }
    }

    renderProductsOnPage(currentPage, products);
    renderPagination(products);

    var inputRange = $(".shop-container__filter--input");
    inputRange.oninput = function() {
        var percentage = (inputRange.value - inputRange.min) / (inputRange.max - inputRange.min) * 100;
        inputRange.style.setProperty('--thumb-percentage', percentage + '%');
        var number = $(".shop-container__filter--info span");
    number.innerHTML = inputRange.value;
};


});

