<?php
    /** @var $post ?\App\Model\pracownik */
?>

<div class="form-group">
    <label for="imie">Imie</label>
    <input type="text" id="imie" name="pracownik[imie]" value="<?= $post ? $post->getImie() : '' ?>">
</div>

<div class="form-group">
    <label for="nazwisko">Nazwisko</label>
    <input id="nazwisko" name="pracownik[nazwisko]"><?= $post? $post->getNazwisko() : '' ?></input>
</div>
<div class="form-group">
    <label for="tytul">Tytul</label>
    <input id="tytul" name="pracownik[tytul]"><?= $post? $post->getTytul() : '' ?></input>
</div>
<div class="form-group">
    <label for="gabinet">Gabinet</label>
    <input id="gabinet" name="pracownik[gabinet]"><?= $post? $post->getGabinet() : '' ?></input>
</div>
<div class="form-group">
    <label></label>
    <input type="submit" value="Submit">
</div>
