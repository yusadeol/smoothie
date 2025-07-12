<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{$title|default:'Smoothie'}</title>
    <link rel="stylesheet" href="{asset path='css/reset.css'}">
    {block name="styles"}{/block}
    <link rel="stylesheet" href="{asset path='css/main.css'}">
    {block name="scripts"}{/block}
</head>
<body>
    <main class="l-main">
        {block name="content"}{/block}
    </main>
</body>
</html>