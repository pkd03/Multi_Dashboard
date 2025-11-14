<?php
if($_POST){
    $links = json_decode(file_get_contents("links.json"), true);
    $links[] = $_POST['url'];
    file_put_contents("links.json", json_encode($links, JSON_PRETTY_PRINT));
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h3>Add new link</h3>

<form method="POST" class="mt-3">
    <div class="mb-3">
        <label class="form-label">URL</label>
        <input type="text" name="url" class="form-control" placeholder="https://example.com" required>
    </div>

    <button class="btn btn-primary">Add</button>
    <a href="index.php" class="btn btn-secondary">Back</a>
</form>

</body>
</html>
