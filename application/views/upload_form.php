<html>
<head>
    <title>Upload Form</title>
</head>
<body>
<?php echo $error; ?>
<?php echo form_open_multipart('web/upload/do_upload'); ?>
<input type="file" name="userfile" size="20"/>
<input type="file" name="userfile1" size="20"/>
<br/><br/>

<input type="submit" value="upload"/>

</form>

</body>
</html>