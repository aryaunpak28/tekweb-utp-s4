<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maroon Run - Toko Sepatu Lari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Maroon Run</a>
            <a class="btn btn-outline-light" href="admin.php">Admin Panel (CRUD)</a>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Katalog Sepatu Lari Kami</h2>
        <div class="row">
            <?php
            $result = $conn->query("SELECT * FROM products");
            while($row = $result->fetch_assoc()):
            ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="<?= $row['image_url'] ?>" class="card-img-top" alt="<?= $row['name'] ?>" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['name'] ?></h5>
                        <p class="card-text"><?= $row['description'] ?></p>
                        <h6 class="text-primary">Rp <?= number_format($row['price'], 0, ',', '.') ?></h6>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>