<form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
		<input type="text" name="s" id="s" value="<?php echo __('Search'); ?>" onfocus="if(this.value !== '') {this.value=''}" onblur="if(this.value == ''){this.value=''}" autocomplete="off" placeholder="<?php echo __('Search'); ?>" />
		
	<button type="submit" class="submit-button">
		<span class="search-menu-icon">
		</span>
	</button>
	<ul class="featured-thumbnails"></ul>
</form>