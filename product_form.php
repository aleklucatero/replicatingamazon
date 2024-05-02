<link rel="stylesheet" href="css/product_form.css">

<form action="crud/add_product.php" method="post" enctype="multipart/form-data">
<h2>Product Page Creator</h2>

    <label for="name">Product Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea><br><br>

    <label for="price">Price:</label>
    <input type="text" id="price" name="price" required><br><br>

    <label for="stock_quantity">Stock Quantity:</label>
    <input type="number" id="stock_quantity" name="stock_quantity" required><br><br>

    <label for="category">Category:</label>
    <input type="text" id="category" name="category"><br><br>

    <label for="image_link">Product Image URL:</label>
    <input type="text" id="image_link" name="image_link"><br><br> 

    <label for="brand">Brand:</label>
    <input type="text" id="brand" name="brand"><br><br>

    <input type="submit" name="submit" value="Add Product">
</form>
