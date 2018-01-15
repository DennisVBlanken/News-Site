<?php if ($rolename === 'Admin') {}else redirect('home') ?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<div id="errors"> <?php if (isset($error)) { echo $error; } ?> </div>
<main id="create">
<h1>Add link</h1>
  <?php $hidden = array('id' => $id);
        echo form_open('links/'.$id, '', $hidden); ?>
<p class="Line"></p>
    <div class="inputs">
        <label for="title">Title:</label>
        <input type="text" size="20" id="title" name="title"/>
    </div>
<p class="Line"></p>
    <div class="inputs">
        <label for="url">Url:</label>
        <input type="text" size="20" id="url" name="url"/>
    </div>
<p class="Line"></p>
        <input type="submit" value="Add"/>
        <a class="button" href="../home">Go back</a>

    </form>
</main>