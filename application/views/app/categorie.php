<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<main id="home">
<h1 id="header2"><?= $title; ?></h1>
<span id="usermenu">
<span id="username"><?php echo $username ?>|</span>
<a class="Link" href="home/logout">Logout</a>
</span>
	<?php foreach ($menu as $b): ?>
	<div id="menu">
		<a href="../<?= $b->url ?>" class="menu"><?php echo $b->title ?></a>
	</div>
	<?php endforeach ?>
<?php foreach ($posts as $post): ?>
	<div class="postOutline">
<div class="posts">
	<h1 class="postTitle"><?= $post->title; ?></h1>
	<p class="postContent"><?= $post->content; ?></p>
	<a href="../post/<?= $post->id; ?>">Read more...</a>
</div>
	</div>
<?php endforeach ?>
</main>