<?php
class Login extends JI_Controller
{
    private $password;
    private $email;

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
        $data['sess'] = flash();
        $data['nav'] = false;
        $this->setUpHeader(
            "Login", //title
            "Please register before you can login.", //descriptions
            "Alien_bvmi12", //keyword
            "Muhammad Rayhan Fathurrakhman" //author
          );

        $this->putThemeContent("page/login/home", $data); //pass data to view
        $this->putJsContent("page/home/home_bottom",$data); //pass data to views
        $this->loadLayout("layout1", $data);
        $this->render();
    }
    public function proses()
    {
        $this->email = $this->input->post('email');
        $this->password = $this->input->post('password');

        $email = $this->email;
        $password = $this->password;

        if (strlen($email) >= 4 && strlen($password) >= 5) {
            $bum = $this->bum->getByEmail($email);
            if (isset($bum->id)) {
                if (empty($bum->is_active)) {
                    flash('This user has been deactivated');
                    redir(base_url('login/index'), 1);
                    return;
                }

                //update password if still md5
                $this->password = password_hash($this->password, PASSWORD_BCRYPT);
                if (md5($password) == $bum->password) {
                    $du = array();
                    $du['password'] = password_hash($password, PASSWORD_BCRYPT);
                    $this->bum->update($bum->id, $du);
                    $password = $du['password'];
                    $bum->password = $password;
                }


                if (password_verify($password, $bum->password)) {
                    //set to session
                    $sess = $this->getKey();
                    if (!is_object($sess)) $sess = new stdClass();
                    if (!isset($sess->user)) $sess->user = new stdClass();
                    $sess->user = $bum;
                    $this->setKey($sess);

                    // redirect to dashboard
                    flash('Welcome ' . $sess->user->nama . '....');
                    redir(base_url('dashboard'), 1);
                    return;
                } else {
                    flash('Invalid email or password');
                    redir(base_url('login/index'), 1);
                }
            } else {
                flash('Invalid email or password');
                redir(base_url('login/index'), 1);
            }
        } else {
            flash('Invalid email or password');
            redir(base_url('login/index'), 1);
        }
    }

    public function logout()
    {
        $data = array();
        $sess = $this->getKey();
        if (!is_object($sess)) {
            $sess = new stdClass();
        }
        $sess->user = new stdClass();
        $this->setKey($sess);
        redir(base_url("login"), 0);
    }
}
