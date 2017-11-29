<link rel="stylesheet" type="text/css" href="../css/style.css">
<main id="edit">
<h1>Edit post</h1>
  <?php echo validation_errors(); ?>
  <?php echo form_open('news/edit'); ?>
     <label for="title">Title:</label>
     <input type="text" size="20" id="title" name="title"/>
     <br/>
     <label for="content">Post text:</label>
     <textarea name="content" id="content" cols="40" rows="5"></textarea>
     <br/>
     <input type="submit" value="Edit"/>
   </form>
 </main>