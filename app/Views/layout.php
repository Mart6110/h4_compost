<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'Document'; ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custome style -->
    <link
        rel="stylesheet"
        href="/assets/css/main.css">
    <link
        rel="stylesheet"
        href="/assets/css/navbar.css">
    <link
        rel="stylesheet"
        href="/assets/css/echart.css">
    <script src=" https://cdn.jsdelivr.net/npm/echarts@5.5.1/dist/echarts.min.js "></script>
</head>

<body>
    <header>
        <div class="container">
            <h1 class="logo"><?php echo isset($pageTitle) ? $pageTitle : 'Welcome'; ?></h1>

            <nav>
                <ul>
                    <li><a class="navbar-item" href="?page=overview">Overview</a></li>
                    <li><a class="navbar-item" href="?page=temperature">Temperature</a></li>
                    <li><a class="navbar-item" href="?page=flow_pump">Flow & Pump</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <?php echo $content; ?>
    </main>
</body>

</html>