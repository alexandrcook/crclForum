Frase find in topics :

<ul>
    <?php

    foreach($data['search'] as $section) {
        ?>

        <li><a href="/section/<?=$section['slug']?>"><?=$section['title']?></a></li>

    <?php } ?>
</ul>