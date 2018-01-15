<?php if ($rolename === 'Admin') {}else redirect('home') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<div id="wrap">
<div id="widget">
	<h2>Recent updates:</h2>
	<?php foreach ($latest as $x): ?>
	<div id="latest">
		<h3><a href="post/<?php echo $x->id ?>" class="latest"><?php echo $x->title ?></a></h3>
	</div>
	<?php endforeach ?>
</div>
<main id="home">
<h1 id="header">Admin Home</h1>
<span id="usermenu">
<span id="username"><?php echo $username; ?>|</span>
<a class="Link" href="home/logout">Logout|</a>
<a class="Link" href="create">create</a>
</span>
	<?php foreach ($menu as $b): ?>
	<div id="menu">
		<a href="<?php echo $b->url ?>" class="menu"><?php echo $b->title ?></a>
	</div>
	<?php endforeach ?>
<?php foreach ($posts as $post): ?>
	<div class="postOutline">
<div class="posts">
	<h1 class="postTitle"><?= $post->title; ?></h1>
	<p class="postContent">
		<?php if (isset($post->image)) {
			echo '<img class="postImage" src="uploads/'.$post->image.'">';
		} echo $post->content; ?>
	</p>
	<a href="post/<?= $post->id; ?>">Read more...</a>
</div>
<div class="buttonOutline">
	<a class="button" href="edit/<?= $post->id; ?>">Edit Post</a><br>
	<a onclick="return confirm('Are you sure?');" class="button" href="delete/<?= $post->id; ?>">Delete Post</a><br>
	<a class="button" href="links/<?= $post->id; ?>">Add Links</a>
</div>
	</div>
<?php endforeach ?>
</main></div>