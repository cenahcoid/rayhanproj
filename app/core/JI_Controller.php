<?php
class JI_Controller extends SENE_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->setTheme('front');
    }
    /* protected function __flash($message = '', $type = 'info')
    {
        $s = $this->getKey();
        if (!is_object($s)) $s = new stdClass();
        if (!isset($s->flash)) $s->flash = '';
        if (strlen($message) > 0) {
            $s->flash = $message;
        }
        $this->setKey($s);
        return $s;
    }
    protected function __flashClear()
    {
        $s = $this->getKey();
        if (!is_object($s)) $s = new stdClass();
        if (!isset($s->flash)) $s->flash = '';
        $s->flash = '';
        $this->setKey($s);
        return $s;
    } */
    public function index()
    {
    }
}
