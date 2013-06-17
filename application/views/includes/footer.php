<!-- Start: FOOTER -->
<footer>


    <?php
    $is_logged_in_admin = $this->session->userdata('is_logged_in_admin');
    $is_logged_in_member = $this->session->userdata('is_logged_in_member');


                    if ((!isset($is_logged_in_admin) || $is_logged_in_admin != true) && (!isset($is_logged_in_member) || $is_logged_in_member != true)) {
                        //NOT LOGGED  IN admin and employee
                    ?>

        <div class="container">
            <a href="<?php echo site_url('admin_auth/login'); ?>">Admin Panel</a>

        </div>

    <?php } ?>


    <div class="container">

        <p>
            &copy; 2013 library management system. All Rights Reserved.
        </p>
    </div>
</footer>
<!-- End: FOOTER -->


<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/boot-business.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/twitter-bootstrap-hover-dropdown.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/twitter-bootstrap-hover-dropdown.min.js"></script>



</body>
</html>