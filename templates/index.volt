<!DOCTYPE html>
<html lang="en" xml:lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Phalcony PHP Framework</title>
        {{ stylesheet_link(url('build/app.css')) }}
        <link rel="shortcut icon" type="image/x-icon" href="{{ url('build/assets/images/logo.png') }}"/>
    </head>
    <body>
        <div class="container">
            {{ content() }}
        </div>
        <?= $this->tag->javascriptInclude($this->url->get('build/app.js')); ?>
    </body>
</html>
