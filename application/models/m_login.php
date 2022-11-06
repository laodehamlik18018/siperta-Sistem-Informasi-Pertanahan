<?php

class M_login extends CI_Model
{
    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
    public function get($user_id = null)
    {
        $this->db->from('user');
        if ($user_id != null) {
            $this->db->where('id', $user_id);
        }
        $query = $this->db->get();
        return $query;
    }
}
