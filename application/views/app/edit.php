<?php if ($rolename === 'Admin') {}else redirect('home') ?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<div id="errors"> <?php echo validation_errors(); ?> </div>
<main id="edit">
<h1>Edit post</h1>
  <?php $hidden = array('id' => $id);
        echo form_open('edit/'.$id, '', $hidden); ?>
     <label for="title">Title:</label>
     <input type="text" size="20" id="title" name="title"/>
     <br/>
     <label for="content">News text:</label>
     <textarea name="content" id="content" cols="40" rows="5"></textarea>
     <br/>
     <input type="submit" value="Edit"/>
    <a class="button" href="../home">Go back</a>
   </form>
 </main>