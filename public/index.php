<?php
    require 'header.php';
?>

<body>
<form action="functions.php" method="post">
    <div class="container">
        <div class="fish_name">
            <label for="fish_name">Введите название рыбы</label>
            <input id="fish_name" type="text" class="form-control" placeholder="Название рыбы..." name="fish_name"/>
        </div>
        <div class="fish_number">
            <label for="fish_number">Какое количество вам нужно?</label>
            <input id="fish_number" type="text" class="form-control" placeholder="Количество рыбы..." name="fish_number"/>
        </div></br>
        <button type="submit" class="btn btn-primary">Узнать</button>
        </br>
        <div class="shirota">
            <input id="shirota" type="text" class="form-control" placeholder="Введите широту..." name="shirota"/>
        </div><br>
        <div class="dolgota">
            <input id="dolgota" type="text" class="form-control" placeholder="Введите долготу..." name="dolgota"/>
        </div></br>
        <button type="submit" class="btn btn-primary">Узнать</button>
    </div>
</form>
</body>
</html>