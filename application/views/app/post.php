<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<main id="post">
<h1 id="header2">-<?php echo $post[0]->title; ?>-</h1>
<span id="usermenu">
	<span id="username"><?php echo $username ?>|</span>
	<a class="Link" href="../home/logout">Logout</a>
</span>
	<?php foreach ($menu as $m): ?>
	<div id="menu">
		<a href="../<?= $m->url ?>" class="menu"><?php echo $m->title ?></a>
	</div>
	<?php endforeach ?>
<div class="post">
		<?php if (isset($post[0]->image)) {
			echo '<img class="pImage" src="../uploads/'.$post[0]->image.'">';
		} ?>
	<p class="postContent">
		<?= $post[0]->content; ?>
	</p>
		<p class="link">
		<?php foreach ($links as $link): ?>
			<a href="<?= $link->url ?>"><?= $link->title ?></a>
		<?php endforeach ?>
		</p>
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