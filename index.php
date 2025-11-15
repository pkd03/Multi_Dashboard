<?php include 'settings.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Viewer</title>

    <!-- BOOTSTRAP 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php include 'style.php'; ?>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Multi Dashboard</a>

        <div>
            <!-- Dropdown chọn layout -->
            <div class="btn-group me-2">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
                    Layout
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="index.php?layout=2x2">2 × 2</a></li>
                    <li><a class="dropdown-item" href="index.php?layout=3x3">3 × 3</a></li>
                    <li><a class="dropdown-item" href="index.php?layout=full">Full Width</a></li>
                </ul>
            </div>

            <!-- Nút thêm link -->
            <a class="btn btn-success" href="add.php">➕ Add Link</a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="grid">
        <?php foreach ($links as $i => $url): ?>
            <div class="frame-wrapper">
                <div class="frame-box">
                    <iframe id="f<?= $i ?>" src="<?= htmlspecialchars($url) ?>"></iframe>
                    <div class="resize-handle" title="Drag to resize" aria-hidden="true"></div>
                </div>

                <div class="mt-2 text-center">
                    <a href="delete.php?id=<?= $i ?>" class="btn btn-sm btn-danger"
                       onclick="return confirm('Delete this link?');">
                        Delete
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>
</body>
</html>
