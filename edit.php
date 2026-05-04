<?php
include 'db.php';
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image_url'];
    
    $conn->query("UPDATE products SET name='$name', description='$desc', price='$price', image_url='$image' WHERE id=$id");
    header("Location: admin.php");
}
?>
<!-- Gunakan struktur HTML yang sama persis dengan form create.php, namun tambahkan value="<?= $data['...'] ?>" pada tiap input agar data lama muncul -->
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Produk</h2>
        <form method="POST">
            <div class="mb-3">
                <label>Nama Produk</label>
                <input type="text" name="name" class="form-control" value="<?= $data['name'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="description" class="form-control" required><?= $data['description'] ?></textarea>
            </div>
            <div class="mb-3">
                <label>Harga (Rp)</label>
                <input type="number" name="price" class="form-control" value="<?= $data['price'] ?>" required>
            </div>
            <div class="mb-3">
                <label>URL Gambar</label>
                <input type="text" name="image_url" class="form-control" value="<?= $data['image_url'] ?>" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
            <a href="admin.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>