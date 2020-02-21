<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Authentication_model extends CI_Model {

    function cekModule($module, $class, $fungsi, $uid) {
        $this->db->select("GroupMenuMenuAksiId");
        $this->db->from("yk_group_menu_aksi");
        $this->db->where("GroupMenuGroupId IN (SELECT UserGroupGroupId FROM yk_user_group WHERE UserGroupUserId = $uid)");
        $this->db->where("GroupMenuSegmen", "$module/$class/$fungsi");
        $query = $this->db->get();
        $result = $query->result_array();
        if (!empty($result)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    function isExpired($user) {
        $this->db->select('COUNT(UserId) AS total', FALSE);
        $this->db->from('yk_user');
        $this->db->where('UserName', $user);
        $this->db->where('UserExpired !=', '0000-00-00');
        $this->db->where('UserExpired <', 'NOW()');
        $query = $this->db->get();
        $result = $query->result_array();
        if($result[0]['total'] > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function getUserByUserPassword($user, $pass) {
        $data = array();
        $param = array(
            'UserActive' => 1, 
            'UserName' => $user,
            'UserPassword' => $pass
        );
        $this->db->select('*', FALSE);
        $this->db->from('yk_user');
        $this->db->join('mst_unit_kerja', 'UserUnitKerjaId=UnitKerjaId', 'left');
        $this->db->join('yk_user_group', 'UserGroupUserId=UserId', 'inner');
        $this->db->where($param);
        $query = $this->db->get();        
        //print_r($this->db->last_query());
        $result = $query->result_array();
        if(sizeof($result) > 0) {
            $data = $result[0];
        }
        return $data;
    }

    function update($groupId, $auth) {
        $this->db->trans_start();
        $this->db->delete('yk_group_menu_aksi', array('GroupMenuGroupId' => $groupId));         
        
        foreach ($auth as $aksi) {            
            if ($aksi['index']) {
                $menu = $this->getMenuModule($aksi['menuid'], $groupId, 1);
                if(sizeof($menu) > 0) {
                    $this->db->set($menu);
                    $this->db->insert('yk_group_menu_aksi');                    
                }
            }
            if ($aksi['search']) {
                $menu = $this->getMenuModule($aksi['menuid'], $groupId, 2);
                if(sizeof($menu) > 0) {
                    $this->db->set($menu);
                    $this->db->insert('yk_group_menu_aksi');                    
                }
            }
            if ($aksi['add']) {
                $menu = $this->getMenuModule($aksi['menuid'], $groupId, 3);
                if(sizeof($menu) > 0) {
                    $this->db->set($menu);
                    $this->db->insert('yk_group_menu_aksi');
                }
            }
            if ($aksi['update']) {
                $menu = $this->getMenuModule($aksi['menuid'], $groupId, 4);
                if(sizeof($menu) > 0) {
                    $this->db->set($menu);
                    $this->db->insert('yk_group_menu_aksi');
                }
            }
            if ($aksi['delete']) {
                $menu = $this->getMenuModule($aksi['menuid'], $groupId, 5);
                if(sizeof($menu) > 0) {
                    $this->db->set($menu);
                    $this->db->insert('yk_group_menu_aksi');
                }
            }
            if ($aksi['detail']) {
                $menu = $this->getMenuModule($aksi['menuid'], $groupId, 6);
                if(sizeof($menu) > 0) {
                    $this->db->set($menu);
                    $this->db->insert('yk_group_menu_aksi');
                }
            }
            if ($aksi['print']) {
                $menu = $this->getMenuModule($aksi['menuid'], $groupId, 7);
                if(sizeof($menu) > 0) {
                    $this->db->set($menu);
                    $this->db->insert('yk_group_menu_aksi');
                }
            }
            if ($aksi['export']) {
                $menu = $this->getMenuModule($aksi['menuid'], $groupId, 8);
                if(sizeof($menu) > 0) {
                    $this->db->set($menu);
                    $this->db->insert('yk_group_menu_aksi');
                }
            }
        }
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    
    private function getMenuModule($menuId, $groupId, $aksiId) {
        $this->db->select("MenuAksiId AS GroupMenuMenuAksiId, $groupId AS GroupMenuGroupId, CONCAT(MenuModule, '/', AksiFungsi) AS GroupMenuSegmen", FALSE);
        $this->db->from('yk_menu_aksi');
        $this->db->join('yk_menu', 'MenuAksiMenuId = MenuId', 'inner');
        $this->db->join('yk_aksi', 'MenuAksiAksiId = AksiId', 'inner');
        $this->db->where('MenuAksiMenuId', $menuId);
        $this->db->where('MenuAksiAksiId', $aksiId);
        $query = $this->db->get();
        $result = $query->result_array();
        if (!empty($result)) {
            return $result[0];
        } else {
            return array();
        }        
    }    
}

/* End of file authentication_model.php */
/* Location: ./application/models/authentication_model.php */