<?php
$mysmxC2ABanner = new MysmxC2ABanner();

wp_enqueue_script('jquery');
wp_enqueue_media();
wp_register_script( 'upload.js', plugin_dir_url( __FILE__ ) .'../_inc/'. 'upload.js', array('jquery'), true );
wp_enqueue_script( 'upload.js' );
wp_register_style( 'admin.css', plugin_dir_url( __FILE__ ) .'../_inc/'. 'admin.css', '', true );
wp_enqueue_style( 'admin.css' );

$mysmxC2ABanner->getImgs();
if(isset($_GET['id'])){
$data = $mysmxC2ABanner->getImg($_GET['id']);
}
?>
<form method="post">
  <label>Name:</label> <input type="text" name="name" value="<?php if(isset($data->name) && $data->name!='') echo esc_html($data->name);?>"><br><br>
  <label>URL:</label> <input type="text" name="url" value="<?php if(isset($data->url) && $data->url!='') echo esc_html($data->url);?>"><br><br>
  <input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="Upload Image"><br><br>
  <img id="image_url_src" src="<?php if(isset($data->img) && $data->img!='') echo esc_html($data->img);?>">
  <input type="hidden" name="cmd" value="updateImg">
  <input type="hidden" name="id" value="<?php if(isset($data->id) && $data->id!='') echo esc_html($data->id);?>">
  <input type="hidden" name="img" value="<?php if(isset($data->img) && $data->img!='') echo esc_html($data->img);?>" id="image_url"><br>
  <input type="submit" value="Update" class="button-secondary">
</form>
