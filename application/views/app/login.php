<link rel="stylesheet" type="text/css" href="css/style.css">
<div id="errors"> <?php echo validation_errors(); ?> </div>
<main id="login">
<h1>Login</h1>
  <?php echo form_open('verifylogin'); ?>
     <label for="username">Username:</label>
     <input type="text" size="20" id="username" name="username"/>
     <br/>
     <label for="password">Password:</label>
     <input type="password" size="20" id="password" name="password"/>
     <br/>
     <input type="submit" value="Login"/> <a class="Link" href="register">register</a>
   </form>
 </main>