<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title ; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" media="screen" href="public/css/style.css" />
    </head>
    <body>
        <header>
            <?php require 'view/common/header.php'; ?>
        </header>

        <main>
            <?php echo $content ; ?>
        </main>
        
        <footer>
            <?php require 'view/common/footer.php'; ?>
        </footer>
    </body>
</html>