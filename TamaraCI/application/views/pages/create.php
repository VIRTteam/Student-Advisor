<h2><?php echo $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('pages/create') ?>

<label for="ime">Ime</label>
<input type="input" name="ime" /><br />

<label for="prezime">Text</label>
<textarea name="prezime"></textarea><br />

<input type="submit" name="submit" value="Create news item" />

</form>