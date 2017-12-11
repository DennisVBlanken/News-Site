<?php if ($rolename === 'Admin') {}else redirect('home') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<main id="home">
<h1 id="header">Admin Home</h1>
<span id="usermenu">
<span id="username"><?php echo $username."|"; ?></span>
<a class="Link" href="home/logout">Logout</a>|
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
	<p class="postContent"><?= $post->content; ?></p>
	<a href="post/<?= $post->id; ?>">Read more...</a>
</div>
<div class="buttonOutline">
	<a class="button" href="edit/<?= $post->id; ?>">Edit Post</a><br>
	<a class="button" href="delete/<?= $post->id; ?>">Delete Post</a>
</div>
	</div>
<?php endforeach ?>
</main>