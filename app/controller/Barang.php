<?php
class Barang extends JI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->setTheme('front');
    $this->load("c_item_model");
  }
  public function index()
  {
    $data = array();
    $data['sess'] = $this->getKey();
    if(!isset($data['sess']->user->id)){
      redir(base_url('login'));
      return;
    }

    $this->setUpHeader(
      "Barang", //title
      "Pengelolaan barang", //descriptions
      "Alien_bvmi12", //keyword
      "Muhammad Rayhan Fathurrakhman" //author
    );

    $model = new C_Item_Model();
    $data['items'] = $model->get();
    $this->putThemeContent("page/barang/index",$data); //pass data to view
    $this->loadLayout("layout1",$data);
    $this->render();
  }
}