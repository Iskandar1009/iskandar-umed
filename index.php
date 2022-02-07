<?php
?>

<form action="public/functions.php" method="post">
<h2>Order:</h2>
  <div class="form-group">
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ждём приказа!" name="order">

  </div>
  <h2>Coordinates:</h2>
  <div class="form-group">
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите широту" name="latitude">

  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите долготу" name="longitude">

  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form> 