<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<form action="TESTLOGIN.PHP" method="POST" enctype="multipart/form-data">
  <div class="form-control">
    <label for="nombre">nombre</label>
    <input type="text" name="nombre" id="nombre">
  </div>
  <div class="form-control">
    <label for="foto">foto</label>
    <input type="file" name="foto" id="foto">
  </div>
  <button type="submit"> enviar</button>
</form>
</body>
</html>

