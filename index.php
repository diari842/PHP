<?php
// Database connection setup
$host = 'localhost';
$db = 'product_management';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Handle form actions (CRUD operations)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) { // Create
        $name = htmlspecialchars($_POST['name']);
        $description = htmlspecialchars($_POST['description']);
        $price = (float)$_POST['price'];
        $quantity = (int)$_POST['quantity'];

        $stmt = $pdo->prepare("INSERT INTO products (name, description, price, quantity) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $description, $price, $quantity]);
    } elseif (isset($_POST['edit'])) { // Update
        $id = (int)$_POST['id'];
        $name = htmlspecialchars($_POST['name']);
        $description = htmlspecialchars($_POST['description']);
        $price = (float)$_POST['price'];
        $quantity = (int)$_POST['quantity'];

        $stmt = $pdo->prepare("UPDATE products SET name = ?, description = ?, price = ?, quantity = ? WHERE id = ?");
        $stmt->execute([$name, $description, $price, $quantity, $id]);
    } elseif (isset($_POST['delete'])) { // Delete
        $id = (int)$_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
        $stmt->execute([$id]);
    }
}

// Read all products
$products = $pdo->query("SELECT * FROM products")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Project - Product Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        form {
            margin-bottom: 20px;
        }
        input, button {
            margin: 5px;
        }
    </style>
</head>
<body>
    <h1>Product Management System (CRUD)</h1>

    <!-- Create Product -->
    <form method="POST" action="">
        <h2>Add Product</h2>
        <input type="text" name="name" placeholder="Product Name" required>
        <input type="text" name="description" placeholder="Description" required>
        <input type="number" step="0.01" name="price" placeholder="Price" required>
        <input type="number" name="quantity" placeholder="Quantity" required>
        <button type="submit" name="add">Add Product</button>
    </form>

    <!-- Products Table -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $product['id'] ?></td>
                <td><?= htmlspecialchars($product['name']) ?></td>
                <td><?= htmlspecialchars($product['description']) ?></td>
                <td><?= $product['price'] ?></td>
                <td><?= $product['quantity'] ?></td>
                <td>
                    <!-- Update Product -->
                    <form method="POST" action="" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $product['id'] ?>">
                        <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>
                        <input type="text" name="description" value="<?= htmlspecialchars($product['description']) ?>" required>
                        <input type="number" step="0.01" name="price" value="<?= $product['price'] ?>" required>
                        <input type="number" name="quantity" value="<?= $product['quantity'] ?>" required>
                        <button type="submit" name="edit">Update</button>
                    </form>

                    <!-- Delete Product -->
                    <form method="POST" action="" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $product['id'] ?>">
                        <button type="submit" name="delete">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>