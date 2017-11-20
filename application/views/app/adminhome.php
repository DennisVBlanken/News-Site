<?php if ($rolename === 'Admin') {}else redirect('home') ?>
   <h1>Admin Home</h1>
   <h2>Welcome <?php echo $username ?>!</h2>
   <a href="home/logout">Logout</a>