<div class="navbar">
<div class="navbar-inner">
<a class="brand" href="<?php echo site_url(); ?>"><img src="..img/new.png" alt="" class="img-circle pull-right"/>
COOKBOOK
</a>

</br></br></br>

<ul class="nav">

<?php

$is_logged_in_user = $this->session->userdata('is_logged_in_user');
$is_logged_in_admin = $this->session->userdata('is_logged_in_admin');
if ((!isset($is_logged_in_admin) || $is_logged_in_admin != true) && (!isset($is_logged_in_user) || $is_logged_in_user != true)) {
//NOT LOGGED IN admin and user
?>

<li id="home_navbar"><a href="<?php echo site_url('');?>">HOME</a></li>
<li id="archieve_navbar"><a href="<?php echo site_url('');?>">Archieve</a></li>
<li id="contact_us_navbar"><a href="<?php echo site_url('contact_us');?>">Contact Us</a></li>
<li id="archieve_navbar"><a data-toggle="modal" href="#registration">Register</a></li>
<li id="archieve_navbar"><a data-toggle="modal" href="#login">Login</a></li>
<?php echo form_close(); ?>
</div>

<?php
} else if((!isset($is_logged_in_admin) || $is_logged_in_admin != true) && (isset($is_logged_in_user) || $is_logged_in_user = true)) {
//USER LOGGED IN
?>

<li id="home_navbar"><a href="<?php echo site_url('Welcome');?>">HOME</a></li>
<li id="profile_navbar"><a href="<?php echo site_url(''.$this->session->userdata('username'))?>">Profile</a></li>
<li id="archieve_navbar"><a href="<?php echo site_url('');?>">Archieve</a></li>
<li id="recipe_navbar"><a href="<?php echo site_url('show_recipe/show_recipe_details');?>">Recipe</a></li>
<li id="recipe_books_navbar"><a href="<?php echo site_url('');?>">Recipe Books</a></li>
<li id="recipe_books_navbar"><a href="<?php echo site_url('');?>">Events</a></li>
<li class="dropdown" id="topics_navbar">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
FAQ
<b class="caret"></b>
</a>
<ul class="dropdown-menu">
<li><a tabindex="-1" href="<?php echo site_url('');?>">Add question</a></li>
<li class="divider"></li>
<li><a tabindex="-1" href="<?php echo site_url('');?>">My question</a></li>
<li class="divider"></li>
<li><a tabindex="-1" href="<?php echo site_url('');?>">View others</a></li>
</ul>

</li>
<li id="settings_navbar"><a href="<?php echo site_url('');?>">Settings</a></li>
<li id="logout_navbar"><a href="<?php echo site_url('user_auth/logout');?>"> Log Out!! </a></li>

<?php
if($this->session->userdata('username'))
{
?>
<a href="<?php echo site_url('Welcome');?>"> <?php echo "hello ".$this->session->userdata('username')."!"; ?></a>
<?php }?>
<?php
} else if((isset($is_logged_in_admin) || $is_logged_in_admin = true) && (!isset($is_logged_in_user) || $is_logged_in_user != true)) {
//ADMIN LOGGED IN
?>

<li id="home_navbar"><a href="<?php echo site_url('#');?>">HOME</a></li>
<li id="profile_navbar"><a href="<?php echo site_url('admin_add_recipe/show_add_recipe');?>">Add Recipe</a></li>
<li id="add_events_navbar"><a href="<?php echo site_url('');?>">Add events</a></li>

<li id="archieve_navbar"><a href="<?php echo site_url('admin_add_books/show_add_books');?>">Add books</a></li>

<li id="member_navbar"><a href="<?php echo site_url('');?>">Approve Order</a></li>

<li id="logout_navbar"><a href="<?php echo site_url('admin_auth/logout');?>"> Log Out!! </a></li>
<?php
}
?>
</ul>
</div>
</div>
<div id="registration" class="modal hide fade in" style="display: none; ">
<div class="modal-header">
<a class="close" data-dismiss="modal" color="red" >Close</a>
<h3>Registration</h3>
</div>
<div class="modal-body">
<?php
echo form_open('registration/insert_registration_data');
?>
<fieldset>

<label>Username</label>
<input type="text" placeholder="username" name="username">
<label>Email</label>
<input type="text" placeholder="Email" name="email">
<label>Password</label>
<input type="password" placeholder="Password" name="password">
<label>Confirm Password</label>
<input type="password" placeholder="Confirm Password" name="confirm_password">
<br/>
</fieldset>
<input type="submit" class ="btn btn-success" value="Create" />
<?php echo form_close(); ?>
</div>
<div class="modal-footer">
<!--a href="#" class="btn btn-success">Submit</a-->
<!--a href="#" class="btn" data-dismiss="modal">Cancel</a-->
</div>
</div>
<div id="login" class="modal hide fade in" style="display: none; ">
<div class="modal-header">
<a class="close" data-dismiss="modal">Close</a>
<h3>Login</h3>
</div>
<div class="modal-body">
<?php
echo form_open('user_auth/login');
?>
<fieldset>

<label>Username</label>
<input type="text" placeholder="username" name="username">
<label>Password</label>
<input type="password" placeholder="Password" name="password">
<br/>
</fieldset>
<input type="submit" class ="btn btn-success" value="Login" />
<?php echo form_close(); ?>
</div>
<div class="modal-footer">
<a href="#" class="btn btn-success">Forgot Password?</a>
<!--a href="#" class="btn" data-dismiss="modal">Cancel</a-->
</div>
</div>