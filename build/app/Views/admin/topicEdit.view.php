<h2>Change date for topic - "<b><?=$data['topic']->getTitle()?></b>"</h2>

<form  method='post' action="/admin/topics/edit/<?=$data['topic']->getId()?>">
    <div>
        <input  name='title' type="text" value="<?=$data['topic']->getTitle()?>">
    </div>
    <div>
        <input  name='section_id' type="text" value="<?=$data['topic']->getSection_id()?>">
    </div>
    <button type="submit" class="button btn btn-primary">Edit</button>
</form>