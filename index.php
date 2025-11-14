<?php
$links = json_decode(file_get_contents("links.json"), true);

// layout
$layout = $_GET['layout'] ?? 'default';

switch ($layout) {
    case '2x2':  $cols = 2; break;
    case '3x3': $cols = 3; break;
    default:     $cols = 1; break;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Viewer</title>

    <!-- BOOTSTRAP 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f5f5;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(<?= $cols ?>, 1fr);
            /* gap: 15px; */
        }

        /* Bọc iframe để tránh kéo trái phải */
        .frame-wrapper {
            width: 100%;
            overflow: hidden;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,.1);
            padding: 5px;
        }

        /* Iframe full width không tạo thanh kéo ngang */
        iframe {
            width: 100%;
            /* border: 0;
            display: block;
            overflow: hidden; */
        }

    @media (min-width: 1081px) {
        iframe {
            height: 80vh; 
        }
    }

    @media (max-width: 1080px) {
        iframe {
            height: 40vh; 
        }
    }
    </style>
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
                <iframe id="f<?= $i ?>" src="<?= htmlspecialchars($url) ?>"></iframe>

                <div class="mt-2 text-end">
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
</body>
</html>
