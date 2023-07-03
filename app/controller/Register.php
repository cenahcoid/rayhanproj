<?php
class Register extends JI_Controller
{
  private $none;
  public function __construct()
  {
    parent::__construct();
    $this->setTheme('front');
    $this->load('b_user_model', 'bum');
  }
  public function index()
  {
    $data = array();
    $data['sess'] = $this->getKey();
    if (isset($data['sess']->user->id)) {
      redir(base_url('dashboard'));
      return;
    }
    $data = array();
    $data['nav'] = false;
    $this->setUpHeader(
      "Register", //title
      "Please register before you can login.", //descriptions
      "Alien_bvmi12", //keyword
      "Muhammad Rayhan Fathurrakhman" //author
    );

    $this->putThemeContent("page/register/home", $data); //pass data to view
    $this->putJsContent("page/home/home_bottom", $data); //pass data to view
    $this->loadLayout("layout1", $data);
    $this->render();
  }
  public function proses()
  {
    $nama = $this->input->post('nama');
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $password_konfirmasi = $this->input->post('password_konfirmasi');

    if (strlen($nama) <= 1) {
      flash('Invalid name');
      redir(base_url('register/index'), 1);
      return;
    }

    if (strlen($email) <= 4) {
      flash('Invalid email');
      redir(base_url('register/index'), 1);
      return;
    }
    $bum = $this->bum->getByEmail($email);
    if (isset($bum->id)) {
      flash('email has been used');
      redir(base_url('register/index'), 1);
      return;
    }

    if (strlen($password) <= 4) {
      flash('Invalid password');
      redir(base_url('register/index'), 1);
      return;
    }

    if ($password != $password_konfirmasi) {
      flash('Password confirmation doesn\'t match');
      redir(base_url('register/index'), 1);
      return;
    }

    $passLength = strlen($password);
    $countSpace = 0;

    foreach(str_split($password) as $char) {
      if ($char === ' ') {
        $countSpace++;
      }
    };

    if ($passLength === $countSpace) {
      flash('Password can\'t be space at all character');
      redir(base_url('register/index'), 1);
      return;
    }

    $di = array();
    $di['nama'] = $nama;
    $di['email'] = $email;
    $di['password'] = password_hash($password, PASSWORD_BCRYPT);
    $di['alamat'] = '';
    $di['cdate'] = 'NOW()';
    $di['is_active'] = 1;

    $res = $this->bum->set($di);
    if ($res) {
      $sess = $this->getKey();
      if (!is_object($sess)) $sess = new stdClass();
      if (!isset($sess->user)) $sess->user = new stdClass();
      $sess->user->id = 1;
      $sess->user->nama = $nama;
      $sess->user->email = $email;
      $this->setKey($sess);

      flash('Welcome ' . $nama . '....');
      redir(base_url('dashboard'), 1);
      return;
    } else {
      flash('Password confirmation doesn\'t match');
      redir(base_url('register/index'), 1);
      return;
    }
  }
}
