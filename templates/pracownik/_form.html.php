<?php
    /** @var $post ?\App\Model\pracownik */
?>

<div class="form-group">
    <label for="imie">Imie</label>
    <input type="text" id="imie" name="pracownik[imie]" value="<?= $post ? $post->getImie() : '' ?>">
</div>

<div class="form-group">
    <label for="nazwisko">Nazwisko</label>
    <textarea id="nazwisko" name="pracownik[nazwisko]"><?= $post? $post->getNazwisko() : '' ?></textarea>
</div>
<div class="form-group">
    <label for="tytul">Tytul</label>
    <textarea id="tytul" name="pracownik[tytul]"><?= $post? $post->getTytul() : '' ?></textarea>
</div>
<div class="form-group">
    <label></label>
    <input type="submit" value="Submit">
</div>
