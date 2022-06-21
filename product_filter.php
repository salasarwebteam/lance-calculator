<?php
   /**
   * Template Name: Product filter
   *
   * @package WordPress
   * @subpackage Twenty_Fourteen
   * @since Twenty Fourteen 1.0
   *
   */
   
?>
<?php get_header(); ?>
<div class="ak_container">
   <div class="ak_row">
      <div class="ak_col_12">
         <img src="http://salasarcybersolutions.com/portfolio/calculator/wp-content/uploads/2021/12/banner-img-1.png" width="100%">
      </div>
   </div>
</div>
<div class="ak_filter_1">
   <h2><b>1. Select sensor modal or sensor size</b></h2>
   <div class="ak_filer_1_input">
      <form action="/action_page.php">
         <div class="ak_col_4">
            <div class="form-group">
               <label for="menufecturer">Sensor menufecturer:</label>
                <?php
                    global $wpdb;
                    $myears       = $wpdb->get_results("SELECT * FROM $wpdb->postmeta WHERE meta_key = 'sensor_menufecturer'", ARRAY_A);
                    $sensor_modal = $wpdb->get_results("SELECT * FROM $wpdb->postmeta WHERE meta_key = 'sensor_modal'", ARRAY_A);
                    $sensor_size  = $wpdb->get_results("SELECT * FROM $wpdb->postmeta WHERE meta_key = 'sensor_size'", ARRAY_A);
                ?>
               <select class="form-control" id="menufecturer">
                  <option>Choose sensor menufecturer</option>
                    <?php  
                        $check = array();
                     foreach ($myears as $mvalue) { 
                        if (!in_array($mvalue['meta_value'],$check)){ ?>
                            <option value="<?php echo $mvalue['meta_value']; ?>"><?php echo $mvalue['meta_value']; ?></option>
                            <?php  array_push($check, $mvalue['meta_value']);
                        }  } ?>
               </select>
            </div>
         </div>
         <div class="ak_col_4">
            <div class="form-group">
               <label for="menufecturer">Sensor modal:</label>
               <select class="form-control" id="sensorModal">
                  <option>Choose sensor modal</option>
                   <?php   foreach ($sensor_modal as $smvalue) { ?>
                                 <option value="<?php echo $smvalue['meta_value']; ?>"><?php echo $smvalue['meta_value']; ?></option>
                    <?php } ?>
               </select>
            </div>
         </div>
         <div class="ak_col_4">
            <div class="form-group">
               <label for="menufecturer">Sensor size:</label>
               <select class="form-control" id="sensorSize">
                  <option>Choose sensor size</option>
                   <?php   foreach ($sensor_size as $ssvalue) { ?>
                                 <option value="<?php echo $ssvalue['meta_value']; ?>"><?php echo $ssvalue['meta_value']; ?></option>
                    <?php } ?>
               </select>
            </div>
         </div>
      </form>
   </div>
</div>
<div class="ak_filter_2">
   <h2><b>2. Enter setup values</b></h2>
   <p>Please enter available values to calculate the missing values - for example : </p>
   <p>Object distance and dimensions > focal length</p>
   <p>Focal length and object dimensions > object dimensions</p>
   <!--<img src="http://salasarcybersolutions.com/portfolio/calculator/wp-content/uploads/2021/12/focal.png" width="100%">-->
   
   <div class="ak_filter_2_field">
    <div class="form-group focal">
        <label for="focal">Focal length(mm):</label>
        <input type="text" class="form-control">
     </div>
     <div class="form-group object">
        <label for="focal">Object Distance(mm):</label>
        <input type="text" class="form-control">
     </div>
      <div class="form-group horizontal">
        <label for="focal">Horizontal field of view(0):</label>
        <input type="text" class="form-control">
     </div>
     <div class="form-group vertical">
        <label for="focal">Vertical field of view(0):</label>
        <input type="text" class="form-control">
     </div>
     <div class="form-group object_w">
        <label for="focal">Object width(mm):</label>
        <input type="text" class="form-control">
     </div>
      <div class="form-group object_h">
        <label for="focal">Object height(mm):</label>
        <input type="text" class="form-control">
     </div>
    </div>
   </div>
   

<div class="ak_filter_3">
   <h2><b>3. Display suitable lenses</b></h2>
   <p>Press "Reset to perform naw calculation"</p>
   <input type="submit" id="show_result" class="calculate" value="Show suitable lenses">
   <input type="submit" class="reset_calculate" value="Reset all filters">
</div>
<div class="ak_filter_result">
   <h2><b>Result</b></h2>
    <div class="search_result" id="search_result">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/29/Loader.gif/480px-Loader.gif" class="loader-img" style="display:none;">

        <?php 
        $args = array(
           'post_type'  => 'product',
        );

        $query = new WP_Query( $args );
       
         if ( $query->have_posts() ) {
            while ( $query->have_posts() ) : $query->the_post(); 
                $urlimg = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()), 'full' ); ?>
                <div class="ak_col_4">
                          <div class="product_search">
                             <img src="<?php echo $urlimg; ?>">
                             <h4><b><a href="<?php echo get_permalink( get_the_ID() ); ?>"><?php echo get_the_title(); ?></a></b></h4>
                             <p><?php echo get_the_content(); ?></p>
                          </div>
                       </div>
            <?php 
            endwhile;  
      
        }


        ?>
    </div>
</div>
<style>
    .search_result {
        float: left;
        width: 100%;
    }
   .top_head_blue {
   background: #004098;
   color: #fff;
   }
   .ak_filter_1 {
   margin-top: 50px;
   }
   .ak_filter_2 {
   margin-top: 150px;
   }
   label {
   display: block;
   }
   .form-control {
   width: 100%;
   height: 35px;
   border: 1px solid #ccc;
   }
   .ak_filer_1_input .ak_col_4 {
   width: 33%;
   float: left;
   padding: 10px;
   }
   input.calculate {
   background: #18e10b;
   color: #fff;
   }
   input.reset_calculate {
   background: #fb0000;
   color: #fff;
   }
   .ak_filter_2 p{
   margin: 0;
   color: #04598b;
   }
   .ak_filter_result {
   margin-top: 40px;
   }
   .ak_filter_result .ak_col_4 {
   width: 33%;
   float: left;
   border: 1px solid #cccccc69;
   padding: 20px;
   }
   .product_search img {
   width: 100%;
   }
    .loader-img {
        position: absolute;
        left: 34%;
    }
    .ak_filter_2_field{
        background-image:url('http://salasarcybersolutions.com/portfolio/calculator/wp-content/uploads/2021/12/IMG_4460-scaled.jpg');
        background-size: cover;
    height: 826px;
    margin-bottom: 40px;
    margin-top: 20px;
    }
    .form-group.focal {
    position: absolute;
    margin-top: 113px;
    margin-left: 60px;
}

.form-group.focal input.form-control {
    background: transparent;
    border: 1px solid #ccc;
    border-top: none;
}
    .form-group.object {
    position: absolute;
    margin-top: 335px;
   margin-left: 60px;
}

.form-group.object input.form-control {
    background: transparent;
    border: 1px solid #ccc;
    border-top: none;
}
    .form-group.horizontal {
    position: absolute;
    margin-top: 420px;
    margin-left: 390px;
}

.form-group.horizontal input.form-control {
    background: white;
    border: 1px solid #ccc;
    border-top: none;
}
    .form-group.vertical {
    position: absolute;
    margin-top: 420px;
    margin-left: 620px;
}

.form-group.vertical input.form-control {
    background: white;
    border: 1px solid #ccc;
    border-top: none;
}
    .form-group.object_w {
   position: absolute;
    margin-top: 690px;
   margin-left: 280px;
}

.form-group.object_w input.form-control {
    background: white;
    border: 1px solid #ccc;
    border-top: none;
}
    .form-group.object_h {
   position: absolute;
    margin-top: 633px;
   margin-left: 795px;
}

.form-group.object_h input.form-control {
    background: white;
    border: 1px solid #ccc;
    border-top: none;
}
</style>
<?php get_footer(); ?>

<script type="text/javascript">
    
    jQuery(document).ready(function(){
        jQuery("#show_result").click(function(){
            var menufecturer = jQuery('#menufecturer').val();
            var sensorModal  = jQuery('#sensorModal').val();
            var sensorSize   = jQuery('#sensorSize').val();

            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'POST',
                data : { action: 'search_lenses', menufecturer: menufecturer, sensor_modal: sensorModal, sensor_size: sensorSize},
                dataType: 'html',
                beforeSend: function() {
                    jQuery('.search_result').css( "opacity", "0.4");   
                    jQuery('.loader-img').show();
                },
                success: function (response) { 
                    var obj = JSON.parse(response);
                    if(obj.msg == 'succesc'){
                        jQuery('#search_result').html(obj.html);
                        jQuery('.search_result').css("opacity", "1");
                        jQuery('.loader-img').hide();
                        
                    }else{
                        jQuery('.search_result').css("opacity", "1");
                        jQuery('.loader-img').hide();
                        alert('Something went wrong');
                    }
                }
            });
        });

        // reset form
         jQuery(".reset_calculate").click(function(){
              jQuery('#menufecturer, #sensorModal, #sensorSize').prop('selectedIndex',0);
         });

    });


</script>