<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<main id="post">
<h1 id="header2">-<?php foreach ($post as $a) { echo $a->title; } ?>-</h1>
<span id="usermenu">
	<span id="username"><?php echo $username ?>|</span>
	<a class="Link" href="../home/logout">Logout</a>
</span>
	<?php foreach ($menu as $b): ?>
	<div id="menu">
		<a href="../<?= $b->url ?>" class="menu"><?php echo $b->title ?></a>
	</div>
	<?php endforeach ?>
<div class="post">
	<p class="postContent"><?php foreach ($post as $a) { echo $a->content; } ?></p>
</div>
<?php foreach ($comments as $comment): ?>
	<div class="comments">
	<?php $username =  $this->news_model->get_username($comment->userid); ?>
		<p class="postedby">Posted by: <span class="cUser">
			<?php foreach ($username as $c) { echo $c->UserName; } ?>
		</span></p>
		<p class="Line"></p>
	<?php echo $comment->comment ?>
	</div>
<?php endforeach ?>
<div id="commentC">
<h2>Place a comment:</h2>
  <?php $hidden = array('postid' => $id, 'userid' => $userid);
  echo form_open('postcomment/'.$id, '', $hidden); ?>
     <label id="commentl" for="comment">Comment:</label>
     <textarea name="comment" id="comment" cols="40" rows="5"></textarea>
     <br/>
     <input type="submit" value="Post"/>
   </form>
</div>
</main>