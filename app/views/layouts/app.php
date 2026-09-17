<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    <link rel="stylesheet" href="/css/output.css">
</head>

<body class="min-h-screen flex flex-col bg-gray-100">

    <!-- Header Start -->
        <?php require_once '../app/views/layouts/partials/header.php'; ?>
    <!-- Header End -->

    <!-- Main Start -->
    <main class="container mx-auto p-4 grow">
        <?php require_once $content; ?>
    </main>


<!--Footer Start -->
    <?php require_once '../app/views/layouts/partials/footer.php'; ?>
</body>

</html>