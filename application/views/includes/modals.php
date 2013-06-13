

<!-- modal for member_fine -->


 <div id="create_lib" class="modal hide fade in" style="display: none; ">
<div class="modal-header">
<a class="close" data-dismiss="modal" color="red" >Close</a>
<h3>Create Librarian</h3>
</div>
<div class="modal-body">



</div>
<div class="modal-footer">

</div>
</div>





<!-- modal for member edit profile -->


 <div id="edit_profile" class="modal hide fade in" style="display: none; ">
<div class="modal-header">
<a class="close" data-dismiss="modal" color="red" >Close</a>
<h3><i class="icon-pencil"></i>Edit Profile</h3>
</div>
<div class="modal-body">

    <?php


        $this->load->model('book_model_member');
        $member_id=$this->book_model_member->get_member_id();
        $this->db->where('MEMBER_ID',$member_id);
        $query= $this->db->get('MEMBER');
        foreach ($query->result() as $row)
        { ?>


                <form class="form-horizontal form-signin-signup" method="post" action="<?php echo base_url(); ?>index.php/member_edit_profile/profile_edit">
                   <fieldset>
                  <legend>Edit Basic info</legend>
                 <label>Name</label>
                 <input type="text" name="name" value="<?php echo $row->NAME;?>">
                 <label>Email</label>
                 <input type="text" name="email" value="<?php echo $row->EMAIL;?>">
                 <label>Contact</label>
                 <input type="text" name="contact" value="<?php echo $row->CONTACT;?>">
                 <label>USERNAME</label>
                  <input type="text" name="username" value="<?php echo $row->USERNAME;?>">

                  <br/>
                          <input type="submit" value="Save" class="btn btn-primary btn-large">

                       </fieldset>
                </form>
            <?php } ?>

     <form  method="post" action="<?php echo base_url(); ?>index.php/member_edit_profile/change_password">
            <fieldset>
            <legend>Change Password</legend>
            <label>Password</label>
            <input type="password" placeholder="Enter Current password" name="password">
            <label>New password</label>
            <input type="password" placeholder="Enter new password" name="c_password"> <br/>

            </fieldset>
                     <input type="submit" class ="btn btn-success" value="Change" />
        </form>




</div>
<div class="modal-footer">

</div>
</div>

