<html>
  <head>
    <title>URL Shortener</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta charset="utf-8" />
      <link rel="icon" href="<?= Config::getFullHost() ?>/assets/images/favicon.ico" type="image/ico">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="<?= Config::getFullHost() ?>/assets/css/style.css">
      <script type="text/javascript" src="<?= Config::getFullHost() ?>/assets/js/dist/index.js" async></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 15px;">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarToggler">
        <a class="navbar-brand" href="<?= Config::getFullHost(); ?>">URL Shortener</a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="creator" aria-haspopup="true" aria-expanded="false">Add new link</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container">
      <?= $content_for_layout ?>
    </div>
  </body>
</html>