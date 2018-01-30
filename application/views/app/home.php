<?php if ($rolename === 'Admin') {redirect('adminhome/1');} ?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/nl_NL/sdk.js#xfbml=1&version=v2.11';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<div id="wrap">
<div id="widget">
	<h2>Recent updates:</h2>
	<?php foreach ($latest as $x): ?>
	<div id="latest">
		<h3><a href="../<?php base_url()?>post/<?php echo $x->id ?>" class="latest"><?php echo $x->title ?></a></h3>
	</div>
	<?php endforeach ?>
</div>
<div class="fb-comments" data-href="http://localhost/news-site/home" data-width="180" data-numposts="8"></div>

<div class="twitterwidget">
<a class="twitter-timeline" data-width="260" data-height="600" data-theme="light" data-link-color="#2B7BB9" href="https://twitter.com/DaVinciCollege?ref_src=twsrc%5Etfw">Tweets by DaVinciCollege</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
</div>

<main id="home">
<h1 id="header2">Home</h1>
<span id="usermenu">
<span id="username"><?php echo $username ?>|</span>
<a class="Link" href="../<?php base_url()?>logout">Logout</a>
</span>
	<?php foreach ($menu as $b): ?>
	<div id="menu">
		<a href="../<?php base_url()?><?= $b->url ?>" class="menu"><?php echo $b->title ?></a>
	</div>
	<?php endforeach ?>
<?php foreach ($posts as $post): ?>
	<div class="postOutline">
<div class="posts">
	<h1 class="postTitle"><?= $post->title; ?></h1>
	<p class="postContent">
		<?php if (isset($post->image)) {
			echo '<img class="postImage" src="'.base_url().'uploads/'.$post->image.'">';
		} echo $post->content; ?>
	</p>
	<a href="../<?php base_url()?>post/<?= $post->id; ?>">Read more...</a>
</div>
	</div>
<?php endforeach ?>
</main></div>