<h2>Change date for post - "<b><?=$data['post']->getId()?></b>"</h2>

<form  method='post' action="/admin/posts/edit/<?=$data['post']->getId()?>">
    <div>
        <textarea name="text" >
            <?=$data['post']->getText()?>
        </textarea>
    </div>
    <div>
        <input  name='topic_id' type="text" value="<?=$data['post']->getTopic_id()?>">
    </div>
    <div>
        <input  name='user_id' type="text" value="<?=$data['post']->getUser_id()?>">
    </div>
    <button type="submit" class="button btn btn-primary">Edit</button>
</form>