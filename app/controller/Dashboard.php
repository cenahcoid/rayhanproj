<?php
class Dashboard extends JI_Controller
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
    $data['sess'] = $this->getKey();
    if(!isset($data['sess']->user->id)){
      redir(base_url('login'));
      return;
    }
    $this->setUpHeader(
      "Dashboard", //title
      "Please register before you can login.", //descriptions
      "Alien_bvmi12", //keyword
      "Muhammad Rayhan Fathurrakhman" //author
    );

    $this->putThemeContent("page/dashboard/home",$data); //pass data to view
    $this->putJsContent("page/home/home_bottom",$data); //pass data to view
    $this->loadLayout("layout1",$data);
    $this->render();
  }
}