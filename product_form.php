<link rel="stylesheet" href="css/product_form.css">

<form action="add_product.php" method="post" enctype="multipart/form-data">
    <h2>Product Page Creator</h2>

    <label for="name">Product Name:</label>
    <input type="text" id="name" name="name" value="Apple AirPods (2nd Generation) Wireless Ear Buds, Bluetooth Headphones with Lightning Charging Case Included, Over 24 Hours of Battery Life, Effortless Setup for iPhone" required><br><br>

    <label for="description">Description:</label>
    <textarea id="description" name="description" required>HIGH-QUALITY SOUND — Powered by the Apple H1 headphone chip, AirPods (2nd generation) deliver rich, vivid sound.
EFFORTLESS SETUP — After a simple one-tap setup, AirPods are automatically on and always connected. They sense when they’re in your ears and pause when you take them out. And sound seamlessly switches between your iPhone, Apple Watch, Mac, iPad, and Apple TV.
VOICE CONTROL WITH SIRI — Just say “Hey Siri” for assistance without having to reach for your iPhone.
24-HOUR BATTERY LIFE — More than 24 hours total listening time with the Charging Case.
AUDIO SHARING — Easily share audio between two sets of AirPods on your iPhone, iPad, iPod touch, or Apple TV.
LEGAL DISCLAIMERS — This is a summary of the main product features. See “Additional information” to learn more.</textarea><br><br>

    <label for="price">Price:</label>
    <input type="text" id="price" name="price" value="89.00" required><br><br>

    <label for="stock_quantity">Stock Quantity:</label>
    <input type="number" id="stock_quantity" name="stock_quantity" value="1" required><br><br>

    <label for="category">Category:</label>
    <input type="text" id="category" name="category" value="Electronics"><br><br>

    <label for="image_link">Product Image URL:</label>
    <input type="text" id="image_link" name="image_link" value="https://m.media-amazon.com/images/I/7120GgUKj3L._AC_SL1500_.jpg"><br><br> 

    <label for="brand">Brand:</label>
    <input type="text" id="brand" name="brand" value="Apple"><br><br>

    <input type="submit" name="submit" value="Add Product">
</form>
