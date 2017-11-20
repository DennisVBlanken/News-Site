<h1>Register</h1>
  <?php echo validation_errors(); ?>
  <?php echo form_open('verifyregister'); ?>
     <label for="username">Username:</label>
     <input type="text" size="20" id="username" name="username"/>
     <br/>
     <label for="password">Password:</label>
     <input type="password" size="20" id="password" name="password"/>
     <br/>
     <label for="email">Email:</label>
     <input type="email" size="20" id="email" name="email"/>
     <br/>
     <input type="submit" value="Register"/> <a href="/news-site">Already Registered?</a>
   </form>