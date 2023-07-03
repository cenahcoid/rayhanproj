<?php
class Home extends JI_Controller
{
  private $none;
  public function __construct()
  {
    parent::__construct();
    $this->setTheme('front');
  }
  public function index()
  {
    $data = array();
    $this->setUpHeader(
      "Welcome to Alien_bvmi12", //title
      "Please register before you can login.", //descriptions
      "Alien_bvmi12", //keyword
      "Muhammad Rayhan Fathurrakhman" //author
    );

    $data['hello'] = "this is from controller";
    $data['sess'] = $this->getKey();

    $this->putThemeContent("page/home/home", $data); //pass data to view
    $this->putJsContent("page/home/home_bottom",$data); //pass data to view
    $this->loadLayout("layout1",$data);
    $this->render();
  }
}