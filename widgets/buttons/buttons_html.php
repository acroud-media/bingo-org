<?php $element_size = get_field("element_size", "widget_" . $this->id);?>
           <div class="element-size mb-md-2 mt-md-2 mb-2 mt-2 <?php echo esc_attr($element_size);?>">	        
    <div class="bingo-buttons">
       	<?php if(!empty(get_sub_field('link', "widget_" . $this->id))){ ?>
			<a href="<?php echo get_sub_field('link', "widget_" . $this->id); ?>">
		<?php } ?>
       <div class="bingo_by_numbers text-center">

       	<?php echo get_sub_field('title', "widget_" . $this->id, 'yeeeeee'); ?>
 
       	</div>
        <?php if(!empty(get_sub_field('link', "widget_" . $this->id))){ ?>
        	</a>
		<?php } ?>      		
    </div></div>