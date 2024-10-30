<?php

require_once plugin_dir_path(__FILE__) . '../controller/MysmxC2AController.php';


class MysmxC2ABanner extends MysmxC2AController
{

  public function __construct() {
    parent::__construct();
    if(isset($_REQUEST['cmd'])){
      $this->update($_REQUEST);
    }
  }

  private function update($data){
    switch ($data['cmd']) {
      case "updateImg":
        $this->updateImg($data);
      break;
      case "delete":
        $this->delImg($data['id']);
      break;
    }
  }

  public function getImgs(){
    require_once plugin_dir_path(__FILE__) . '../controller/MysmxC2AListTable.php';
    $a = new MysmxC2AListTable();
    $a->set_colums(['name'=>'Name','url'=>'Url','img'=>'Image','code'=>'Code','edit'=>'']);
    $result = $this->wpdb->get_results("SELECT * FROM $this->table",$output = ARRAY_A);
    $a->set_data($result);
    $a->listForm();
  }

  public function getImg($id){
    $data = '';
    $result = $this->wpdb->get_results($this->wpdb->prepare("SELECT * FROM $this->table WHERE id=%d",$id));
    if(isset($result[0])) $data = $result[0];
    return $data;
  }

  public function updateImg($data){
    if($data['id']!=''){
      $this->wpdb->update($this->table, array(
        'name' => $data['name'],
        'img' => $data['img'],
        'url' => $data['url']
      ), array('id'=>$data['id']));

    } else {
      $this->wpdb->insert($this->table, array(
        'name' =>$data['name'],
        'img' => $data['img'],
        'url' => $data['url']
      ));
    }
  }

  public function delImg($id){
    $results = $this->wpdb->delete($this->table,['id'=>$id]);
  }

  public function getBanner($id){
    ob_start();
    $data = $this->getImg($id);
    require_once plugin_dir_path(__FILE__) . '../view/banner.php';
    return ob_get_clean();
  }

}
