 <?php $this-> load->view('includes/header')?>

<script>
$(document).ready(

function()
{

<?php $data['selected_nav'] = "favourites_navbar";
$this-> load->view('includes/nav_helper',$data)?>

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
                    <p>
					   <a href="<?php echo  site_url('read_more/show_read_more')."?id=".$row->RECIPE_ID;?>" class="btn">Read more</a>
					  </br>
					  </p>
                  </div>
                </div>
              </li>
			  <?php endforeach; ?>
<?php else :?>
 <?php endif; ?>
			  </ul>
			  </div>
 
 
</br>

  </br>
<?php $this-> load->view('includes/footer')?>