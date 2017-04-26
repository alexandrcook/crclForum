<h2>Change date for user - "<b><?=$data['user']->getName()?></b>"</h2>

<form  method='post' action="/admin/users/edit/<?=$data['user']->getId()?>">
    <div>
        <input  name='name' type="text" value="<?=$data['user']->getName()?>">
    </div>
    <div>
        <input  name='email' type="email" value="<?=$data['user']->getEmail()?>">
    </div>
    <div>
        <input id="password" type="password" name="pass" value="<?=$data['user']->getPass()?>">
    </div>
    <div>
        <input  type="text" name="is_admin" value="<?=$data['user']->getIs_admin()?>">
    </div>
    <div>
        <input  type="text" name="vk_id]" value="<?=$data['user']->getVk_id()?>">
    </div>
    <button type="submit" class="button btn btn-primary">редагувати</button>
</form>