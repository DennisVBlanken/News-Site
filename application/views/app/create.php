<?php if ($rolename === 'Admin') {}else redirect('home') ?>
<link rel="stylesheet" type="text/css" href="css/style.css">
<div id="errors"> <?php if (isset($error)) { echo $error; } ?> </div>
<main id="create">
<h1>Create post</h1>
<?php echo form_open_multipart('create'); ?>
<p class="Line"></p>
    <div class="inputs">
        <label for="title">Title:</label>
        <input type="text" size="20" id="title" name="title"/>
    </div>
<p class="Line"></p>
    <div class="inputs">
        <label for="content">News text:</label>
        <textarea name="content" id="content" cols="40" rows="5"></textarea>
    </div>
<p class="Line"></p>
    <div class="inputs">
        <label for="cid">Categorie:</label>
        <select name="cid">
            <?php foreach ($categories as $categorie): ?>
        <option value="<?= $categorie->id; ?>"><?= $categorie->name; ?></option>
            <?php endforeach ?>
        </select>
    </div>
<p class="Line"></p>
    <div class="inputs">
    </div>
<p class="Line"></p>
        <input type="submit" value="Create"/>
        <a class="button" href="home">Go back</a>

    </form>

</main>