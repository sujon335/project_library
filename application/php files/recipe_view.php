 <?php $this-> load->view('includes/header')?>

<script>
$(document).ready(

function()
{

<?php $data['selected_nav'] = "recipe_navbar";
$this-> load->view('includes/nav_helper',$data)?>

});
$(function() {
       $('.star-radio').rating({
            required: true,
            callback: function(value, link) {
            $.ajax({
                type: "post",
                url: site_url + "show_recipe/rate",
                dataType: "json",
                data: "&post_url=" + $('#post_url').val() + "&rate_val=" + value,
                success: function(e) {
                    $.jGrowl(e.code + "<br>" + e.msg);
                }
         });
     }
});
    </script>

</head>
  <body>


<?php $this-> load->view('includes/navigation')?>
<div class="span12">
<div class="span8">
</div>
<div class="span3">
			<?php
        echo form_open('');
        ?>
<fieldset>
            
           
            <input type="text" placeholder="search" name="search">

			

        </fieldset>    
 <input type="submit" class ="btn btn-success" value="search" />
 </div>
 </div>
  <?php if(isset($msg)){echo $msg;} else {?>
 <div class="row-fluid">
            <ul class="thumbnails">
			 <?php if(isset($record)):  foreach($record as $row): ?>
              <li class="span3">
                <div class="thumbnail">
				<img src="<?php echo site_url('image').'/resize?h=120&w=180&l='.urlencode($row->PHOTO);?>">
                 
                  <div class="caption">
                     
                  </div>
                  <div class="widget-footer">
				 
				  <h3>Recipe Name</h3>
                    <p>
					<?php
                      echo $row->TITLE;
					  ?>
                    </p>
					<h3>Rating</h3>
					<p>
					<?php
                      echo $row->RATING;
					  ?>
                    </p>
					<?php
for ($i = 0; $i <= 5; $i++) :
    if ($i == $row->RATING) :
?>
    <input class="star-radio" type="radio" name="rating" value="<?php echo $i; ?>" checked="checked" />
    <?php else: ?>
    <input class="star-radio" type="radio" name="rating" value="<?php echo $i; ?>" />
<?php
   endif;
endfor;
?>
                    <p>
					  <a href="<?php echo  site_url('read_more/show_read_more')."?id=".$row->RECIPE_ID;?>" class="btn">Read more</a>
					  </br>
					  </p>
					  <p>
               <a href="<?php echo  site_url('favourites/add_to_favourites')."?id=".$row->RECIPE_ID;?>" class="btn">Add to Favourites</a>
                    
                    </p>
					
                  </div>
                </div>
              </li>
			  <?php endforeach; ?>
<?php else : ?>
 <?php endif; ?>
			  </ul>
			  </div>
 <?php } ?>
 
</br>

  </br>
<?php $this-> load->view('includes/footer')?>