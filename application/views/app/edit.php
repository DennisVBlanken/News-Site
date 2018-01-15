<?php if ($rolename === 'Admin') {}else redirect('home') ?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<div id="errors"> <?php echo validation_errors(); ?> </div>
<main id="edit">
<h1>Edit post</h1>
  <?php $hidden = array('id' => $id);
        echo form_open('edit/'.$id, '', $hidden); ?>
<p class="Line"></p>
    <div class="inputs">
     <label for="title">Title:</label>
     <input type="text" size="20" id="title" name="title" value="<?= $post[0]->title ?>"/>
    </div>
<p class="Line"></p>
    <div class="inputs">
     <label for="content">News text:</label>
     <textarea name="content" id="content" cols="40" rows="5"><?= $post[0]->content ?></textarea>
    </div>
<p class="Line"></p>
    <div class="inputs">
     <label for="title">Categorie:</label>
     <select name="cid">
<?php foreach ($categories as $categorie): ?>
      <option <?php if ($categorie->id === $post[0]->cid) {
            echo "selected";
      } ?> value="<?= $categorie->id; ?>"><?= $categorie->name; ?></option>
<?php endforeach ?>
     </select>
    </div>
<p class="Line"></p>
    <div class="inputs">
     <input type="submit" value="Edit"/>
    <a class="button" href="../home">Go back</a>
    </div>
   </form>
 </main>