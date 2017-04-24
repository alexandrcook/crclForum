<div class="row">
    <div class="col-xs-12">
        <hr>
        <h2>Переменные проекта:</h2>
        <?php
        if(isset($data)){
            echo('<h4>$data</h4>');
            var_dump($data);
        }
        echo('<h4>$_SESSION</h4>');
        var_dump($_SESSION);
        echo('<h4>$_COOKIE</h4>');
        var_dump($_COOKIE);
        echo('<h4>$_POST</h4>');
        var_dump($_POST);
        echo('<h4>$_GET</h4>');
        var_dump($_GET);
        echo('<h4>$_SERVER</h4>');
        var_dump($_SERVER);
        ?>
    </div>
</div>
</div>
</body>
</html>