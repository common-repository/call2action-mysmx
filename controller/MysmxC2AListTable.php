<?php


if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}
// Commenting below line result in error.
require_once(ABSPATH . 'wp-admin/includes/template.php' );

class MysmxC2AListTable extends WP_List_Table{
    private  $columns = [];

    public function set_colums($columns){
      $this->columns = $columns;
    }

    public function listForm(){
        echo "<div class='wrap'><form>";
        $this->prepare_items();
        $this->display();
        echo "</form></div>";
    }

    public function get_columns(){
        return $this->columns;
    }

    public function column_default( $item, $column_name ) {
       $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        switch( $column_name ) {
            case 'name':
            case 'url':
                return $item[ $column_name ];
            case 'img':
                    return '<img src="'.$item[ $column_name ].'" style="max-width:200px;">';
            case 'code':
                 return '[mysmx_c2a id='.$item['id'].']';
            case 'edit':
                 return '<a href="'.$actual_link.'&id='.$item['id'].'">Edit</a>&nbsp<a href="'.$actual_link.'&cmd=delete&id='.$item['id'].'" style="color:red">Delete</a>';
            default:
                return print_r( $item, true ) ; //Show the whole array for troubleshooting purposes
        }
    }
    public function set_data($items){
      $this->items = $items;
    }

    public function prepare_items() {
        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();
        $this->_column_headers = array($columns, $hidden, $sortable);
      $this->process_bulk_action();
    }




}



 ?>
