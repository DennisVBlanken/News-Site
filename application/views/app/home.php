<?php if ($rolename === 'Admin') {redirect('adminhome');} ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<main id="home">
<h1 id="header2">Home</h1>
<span id="usermenu">
<span id="username"><?php echo $username ?></span>
<a id="logout" href="home/logout">Logout</a>
</span>
<?php foreach ($posts as $post): ?>
	<div class="postOutline">
<div class="posts">
	<h1 class="postTitle"><?= $post->title; ?></h1>
	<p class="postContent"><?= $post->content; ?></p>
</div>
	</div>
<?php endforeach ?>
</main>