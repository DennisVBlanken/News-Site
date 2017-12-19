<?php if ($rolename === 'Admin') {}else redirect('home') ?>
<link rel="stylesheet" type="text/css" href="css/style.css">
<div id="errors"> <?php if (isset($error)) { echo $error; } ?> </div>
<main id="create">
<h1>Create post</h1>
  <?php echo form_open_multipart('create'); ?>
     <label for="title">Title:</label>
     <input type="text" size="20" id="title" name="title" value="<?= $titlee ?>" />
     <br/>
     <label for="content">News text:</label>
     <textarea name="content" id="content" cols="40" rows="5"><?= $text ?></textarea>
     <br/>
     <label for="title">Categorie:</label>
     <select name="cid">
<?php foreach ($categories as $categorie): ?>
      <option value="<?= $categorie->id; ?>"><?= $categorie->name; ?></option>
<?php endforeach ?>
     </select>
     <br/>
     <label for="image">Add an image if you want:</label>
     <input type="file" name="image" id="image"/>
     <br/>
     <input type="submit" value="Create"/>
    <a class="button" href="home">Go back</a>
   </form>
 </main>