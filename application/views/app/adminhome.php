<?php if ($rolename === 'Admin') {}else redirect('home') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<main id="home">
<h1>Admin Home</h1>
<span id="usermenu">
<span id="username"><?php echo $username ?></span>
<a id="logout" href="home/logout">Logout</a>
</span><br>
<?php foreach ($posts as $post): ?>
	<div class="postOutline">
<div class="posts">
	<h1 class="postTitle"><?= $post->title; ?></h1>
	<p class="postContent"><?= $post->content; ?></p>
</div>
<div class="buttonOutline">
	<a class="button" href="edit/<?= $post->id; ?>">Edit Post</a><br>
	<a class="button" href="delete/<?= $post->id; ?>">Delete Post</a>
</div>
	</div>
<?php endforeach ?>
</main>