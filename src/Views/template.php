<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>Portfolio</title>
</head>
<body>
    <nav>
        <div class="nav-wrapper">
            <a href="/" class="brand-logo">Logo</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="#!">Lien 1</a></li>
                <li><a href="#!">Lien 2</a></li>
                <li><a href="#!">Lien 3</a></li>
            </ul>
        </div>
    </nav>
    
    <main>
        <?php include($view); ?> 
    </main>

    <footer class="page-footer">
        <div class="footer-copyright">
            <div class="container">
                <p>&copy; 2023 Mon Projet</p>
            </div>
        </div>
    </footer>
</body>
</html>