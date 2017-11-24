<?php if ($rolename === 'Admin') {}else redirect('home') ?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<h1>Admin Home</h1>
<h2>Welcome <?php echo $username ?>!</h2>
<a href="home/logout">Logout</a>