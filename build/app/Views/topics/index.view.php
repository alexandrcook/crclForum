<h1>Pозділ: <?=$data['section'][0]->getTitle()?></h1>
<h2>Тема:<?=$data['topic']->getTitle()?></h2>

<form method='post'>
    <textarea type="text" cols="30" rows="3" name='form[post]' placeholder="Повідомлення"></textarea>
    <button type="submit">Додати повідомлення</button>
</form>

<h2>Повідомлення:</h2>
<ul>
    <?php
    foreach($data['post'] as $post) {
        ?>
        <li><?=$post->getText()?></li>
    <?php } ?>
</ul>