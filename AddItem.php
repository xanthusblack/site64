<?php
echo '<!DOCTYPE html>
<html>
<body>

<form action="additemproc.php" method="post" enctype="multipart/form-data">
Item Name:
<input type="text" maxlength="200" name="name"/><br>
Item Code:
<input type="number" maxlength="9" name="code"/><br>
Item Category:
<input type="text" name="category" maxlength="100"/><br>
Item Description:
<input type="textarea" name="description" maxlength="2000"/><br>
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>';