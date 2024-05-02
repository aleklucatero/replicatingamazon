<link rel="stylesheet" href="css/cart.css">
<link rel="stylesheet" href="css/banner.css">
<link rel="stylesheet" href="css/navbar.css">

    <header>
        <?php include 'navbar.php'; ?>  
        <?php include 'banner.php'; ?>
        <script src="https://kit.fontawesome.com/349ffd27ca.js" crossorigin="anonymous"></script>  
    </header>

<div class="shopping-cart">
        <div class="cart-left">
            <h1>Shopping Cart</h1>
            <p class="price">Price</p>
            <hr>
            <div class="product-cart-list">
                <img src="images/macbook.jpg" width="180px" alt="">
                <div>
                    <div class="product-cart-titleprice">
                        <p>Apple 2024 MacBook Air 15-inch Laptop with M3 chip: 15.3-inch Liquid Retina Display, 8GB Unified Memory, 
                            256GB SSD Storage, Backlit Keyboard, 1080p FaceTime HD Camera, Touch ID; Silver
                        </p>
                        <p><b>$1,249.99</b></p>
                    </div>
                    <p class="product-cart-bestseller"><span>#1 Best Seller</span></p>
                    <p class="product-cart-stock">In Stock</p>
                    <p class="product-cart-delivery">FREE delivery <b>Sat, May 4</b> available at checkout
                    <p class="product-cart-returns">FREE Returns &#11191</p>
                    <p class="product-cart-giftoption">Gift options not available. <span>Learn more</span></p>
                    <div class="product-cart-specs">
                    </div>
                    <div class="product-cart-list-action">
                        <select>
                            <option value="Qty: 1">Qty: 1</option>
                            <option value="Qty: 2">Qty: 2</option>
                            <option value="Qty: 3">Qty: 3</option>
                            <option value="Qty: 4">Qty: 4</option>
                            <option value="Qty: 5">Qty: 5</option>
                        </select>
                        <hr>
                        <p class="action-btn">Delete</p>
                        <hr>
                        <p class="action-btn">Save for later</p>
                        <hr>
                        <p class="action-btn">Compare with similar items</p>
                        <hr>
                        <p class="action-btn">Share</p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="cart-list-subtotal">
                Subtotal (1 items): <b>$1,249.99</b>
            </div>
            </div>
        <div class="cart-right">
            <div class="cart-free-delivery">
                <p>&#x2705</p>
                <p>Your order qualifies for FREE Shipping. <br> Choose this option at checkout. <br> See details</p>
            </div>
            <p class="cart-subtotal">Subtotal (2 items):<b> $1,249.99</b></p>
            <p class="cart-right-gift"><input type="checkbox"> This order contains a gift</p>
            <button>Proceed to checkout</button>
        </div>
    </div>
    </section>

    <footer>
        <?php include 'footer.php'; ?> 
    </footer>