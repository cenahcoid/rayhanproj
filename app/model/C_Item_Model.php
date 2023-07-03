<?php
class C_Item_Model extends SENE_Model
{
    public $tbl = 'c_items';
    public $tbl_as = 'c_items';

    public function __construct()
    {
        parent::__construct();
        $this->db->from($this->tbl, $this->tbl_as);
    }
     public function get()
    {
        return $this->db->get();
    }
}