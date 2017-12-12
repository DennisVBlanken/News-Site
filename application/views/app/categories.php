<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<main id="categories">
<h1 id="header2">Categories</h1>
<span id="usermenu">
<span id="username"><?php echo $username ?>|</span>
<a class="Link" href="home/logout">Logout</a>
</span>
	<?php foreach ($menu as $b): ?>
	<div id="menu">
		<a href="<?= $b->url ?>" class="menu"><?php echo $b->title ?></a>
	</div>
	<?php endforeach ?><br>
<?php foreach ($categories as $categorie): ?>
	<div id="categorie">
		<a href="categorie/<?= $categorie->id; ?>" class="categorie"><?= $categorie->name; ?></a>
	</div>
<?php endforeach ?>
</main>