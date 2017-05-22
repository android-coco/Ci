<?php
/**
 * Created by PhpStorm.
 * User: 38314
 * Date: 2017/5/22
 * Time: 18:37
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
</head>
<body>

<div id="container">
    <?php if ($expression == true): ?>
        This will show if the expression is true.
    <?php else: ?>
        Otherwise this will show.
    <?php endif; ?>
</div>

</body>
</html>