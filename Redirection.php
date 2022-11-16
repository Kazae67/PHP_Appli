<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Animation.css">
    <title>Redirection</title>
</head>
<body>

    <div class="container">
        <div class="ring"></div>
        <div class="ring"></div>
        <div class="ring"></div>
        <p>Ajout dans le panier...</p>
    </div>

    <script>
    var timer = 1.5;
    var variable = setInterval(function() {
    if (--timer < 0) {
        clearInterval(variable);
        window.location = "Recap.php?>";
    }
    }, 1000);
    </script>
 
</body>
</html>