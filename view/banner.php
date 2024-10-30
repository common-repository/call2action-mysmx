<?php
wp_register_style( 'banner.css', plugin_dir_url( __FILE__ ) .'../_inc/'. 'banner.css', '', true );
wp_enqueue_style( 'banner.css' );
?>
<p><a href="<?php if(isset($data->url) && $data->url!='') echo esc_html($data->url);?>" target="_blank"><img src="<?php if(isset($data->img) && $data->img!='') echo esc_html($data->img);?>" class="image_url_src" alt="<?php if(isset($data->name) && $data->name!='') echo esc_html($data->name);?>"></a></p>
