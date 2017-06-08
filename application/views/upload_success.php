<html>
<head>
    <title>Upload Form</title>
</head>
<body>

<h3>Your file was successfully uploaded!</h3>

<ul>
    <?php foreach ($upload_data as $item => $value):?>
        <li><?php echo $item;?>: <?php echo $value;?></li>
    <?php endforeach; ?>
</ul>
<span><img src="http://192.168.0.4/CI/uploads/<?php echo $upload_data['file_name']; ?>" alt=""/></span>
<p><?php echo anchor('upload', 'Upload Another File!'); ?></p>

</body>
</html>