<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="<?= csrf_token() ?>" content="<?= csrf_hash() ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <title><?= $title ?></title>
    <?= script_tag('repo/vendors/popper/popper.min.js') ?>
    <?= script_tag('repo/vendors/jquery/jquery-3.7.1.min.js') ?>
</head>

<body class="text-dark bg-red-50 font-mona-reg w-screen overflow-x-hidden">