<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Menu_model extends CI_Model {

    function getAuthenticationMenu($groupId) {
        $sql = "SELECT * FROM ( SELECT MenuId, MenuName, MenuParentId, sum(1-abs( sign(MenuAksiAksiId-1))) AS `view`, sum(1-abs( sign(MenuAksiAksiId-2))) AS `search`, sum(1-abs( sign(MenuAksiAksiId-3))) AS `add`, sum(1-abs( sign(MenuAksiAksiId-4))) AS `update`, sum(1-abs( sign(MenuAksiAksiId-5))) AS `delete`, sum(1-abs( sign(MenuAksiAksiId-6))) AS `detail`, sum(1-abs( sign(MenuAksiAksiId-7))) AS `print`, sum(1-abs( sign(MenuAksiAksiId-8))) AS `export` FROM yk_group_menu_aksi INNER JOIN yk_menu_aksi ON GroupMenuMenuAksiId = MenuAksiId INNER JOIN yk_menu ON MenuAksiMenuId = MenuId WHERE GroupMenuGroupId = ? GROUP BY MenuName UNION SELECT MenuId, MenuName, MenuParentId, 0, 0, 0, 0, 0, 0, 0, 0 FROM yk_menu WHERE MenuId NOT IN (SELECT MenuAksiMenuId FROM yk_menu_aksi INNER JOIN yk_group_menu_aksi ON MenuAksiId = GroupMenuMenuAksiId WHERE GroupMenuGroupId = ?)) a
ORDER BY MenuId";
        $query = $this->db->query($sql, array($groupId, $groupId));
        return $query->result_array();
    }
    
    function getMenu($key, $start, $limit) {
        $this->db->select("*");
        $this->db->from('yk_menu');
        $this->db->like('MenuName', $key);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
    //    print_r($this->db->last_query());
    //    print_r($this->db->count_all_results());
        return $query->result_array();
    }

    function countMenu($key) {
        $this->db->select("COUNT(MenuId) AS total", FALSE);
        $this->db->from('yk_menu');
        $this->db->like('MenuName', $key);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result[0]['total'];
    }
    
    function getAuth($module, $uid) {
        $sql = "SELECT AksiFungsi
                FROM yk_aksi
                INNER JOIN yk_menu_aksi ON MenuAksiAksiId=AksiId
                INNER JOIN yk_menu ON MenuAksiMenuId=MenuId
                INNER JOIN yk_group_menu_aksi ON MenuAksiId=GroupMenuMenuAksiId
                WHERE MenuModule = ? 
                AND GroupMenuGroupId IN (SELECT UserGroupGroupId FROM yk_user_group WHERE UserGroupUserId = ?)";
        $query = $this->db->query($sql, array($module, $uid));
        return $query->result_array();
    }
    
    function getDataTables($status = '') {
        $this->load->library('Datatables');
        
        $aksi = '<div class="hidden-sm hidden-xs btn-group">';
//        if (has_permission('edit')) {
            $aksi .= '<a href="' . base_url("sistem/menu/update/$1") . '" class="btn btn-outline-info">'
                    . '<i class="ace-icon fa fa-pencil bigger-120"></i>'
                    . '</a>';
        
//        if (has_permission('delete')) {
            $aksi .= '<a href="javascript:void(0)" class="btn btn-outline-danger" onclick="hapus($1)">'
                    . '<i class="ace-icon fa fa-trash-o bigger-120"></i>'
                    . '</a>';
        
        $aksi .='</div>';
        
        $this->datatables->select("MenuId, MenuName, MenuModule, MenuIcon, MenuOrder, MenuIsShow");
        $this->datatables->from("yk_menu");       
        $this->datatables->add_column('aksi', $aksi, 'MenuId');
        return $this->datatables->generate();
    }
    
    function getParentMenu() {
        $query = $this->db->get_where('yk_menu', array('MenuParentId' => 0));
        return $query->result_array();
    }
    
    function getVisibleMenu() {
        $query = $this->db->get_where('yk_menu', array('MenuIsShow' => 1));
        return $query->result_array();
    }
    
    function getById($menuId) {
        $query = $this->db->get_where('yk_menu', array('MenuId' => $menuId));
        $result = $query->result_array();
        return $result[0];
    }
    
    function getMenuAksi($menuId) {
        $result = array(
            'index' => false,
            'search' => false,
            'add' => false,
            'update' => false,
            'delete' => false,
            'detail' => false,
            'print' => false,
            'export' => false
        );
        $this->db->select('MenuAksiAksiId');
        $this->db->from('yk_menu');
        $this->db->join('yk_menu_aksi', 'MenuId = MenuAksiMenuId', 'inner');
        $this->db->where('MenuId', $menuId);
        $query = $this->db->get();
        foreach($query->result_array() as $record) {
            if($record['MenuAksiAksiId'] == 1) {
                $result["index"] = true;
            } else if($record['MenuAksiAksiId'] == 2) {
                $result["search"] = true;
            } else if($record['MenuAksiAksiId'] == 3) {
                $result["add"] = true;
            } else if($record['MenuAksiAksiId'] == 4) {
                $result["update"] = true;
            } else if($record['MenuAksiAksiId'] == 5) {
                $result["delete"] = true;
            } else if($record['MenuAksiAksiId'] == 6) {
                $result['detail'] = true;
            } else if($record['MenuAksiAksiId'] == 7) {
                $result['print'] = true;
            } else if($record['MenuAksiAksiId'] == 8) {
                $result['export'] = true;
            }
        }
        return $result;
    }
    
    function add($data, $aksi) {        
        $this->db->trans_start();
        if($data['MenuParentId'] == 0) {            
            $aksi['index'] = 1;
            $aksi['search'] = 0;
            $aksi['add'] = 0;
            $aksi['update'] = 0;
            $aksi['delete'] = 0;
            $aksi['detail'] = 0;
            $aksi['print'] = 0;
            $aksi['export'] = 0;
        }
        $this->db->set($data);
        $this->db->insert('yk_menu');
        $menu_aksi = array(
            'MenuAksiMenuId' => $this->db->insert_id(),
            'MenuAksiAksiId' => NULL
        );
        if($aksi['index'] == 1) {
            $menu_aksi['MenuAksiAksiId'] = 1;
            $this->db->set($menu_aksi);
            $this->db->insert('yk_menu_aksi');            
        }
        if($aksi['search'] == 1) {
            $menu_aksi['MenuAksiAksiId'] = 2;
            $this->db->set($menu_aksi);
            $this->db->insert('yk_menu_aksi');
        }
        if($aksi['add'] == 1) {
            $menu_aksi['MenuAksiAksiId'] = 3;
            $this->db->set($menu_aksi);
            $this->db->insert('yk_menu_aksi');
        }
        if($aksi['update'] == 1) {
            $menu_aksi['MenuAksiAksiId'] = 4;
            $this->db->set($menu_aksi);
            $this->db->insert('yk_menu_aksi');
        }
        if($aksi['delete'] == 1) {
            $menu_aksi['MenuAksiAksiId'] = 5;
            $this->db->set($menu_aksi);
            $this->db->insert('yk_menu_aksi');
        }
        if($aksi['detail'] == 1) {
            $menu_aksi['MenuAksiAksiId'] = 6;
            $this->db->set($menu_aksi);
            $this->db->insert('yk_menu_aksi');
        }
        if($aksi['print'] == 1) {
            $menu_aksi['MenuAksiAksiId'] = 7;
            $this->db->set($menu_aksi);
            $this->db->insert('yk_menu_aksi');
        }
        if($aksi['export'] == 1) {
            $menu_aksi['MenuAksiAksiId'] = 8;
            $this->db->set($menu_aksi);
            $this->db->insert('yk_menu_aksi');
        }
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    
    function update($data, $aksi, $menuId) {
        $this->db->trans_start();
        if($data['MenuParentId'] == 0) {            
            $aksi['index'] = 1;
            $aksi['search'] = 0;
            $aksi['add'] = 0;
            $aksi['update'] = 0;
            $aksi['delete'] = 0;
            $aksi['detail'] = 0;
            $aksi['print'] = 0;
            $aksi['export'] = 0;
        }
        
        $this->db->set($data); 
        $this->db->where('MenuId', $menuId);
        $this->db->update('yk_menu');
        
        $query = $this->db->get_where('yk_menu_aksi', array('MenuAksiMenuId' => $menuId, 'MenuAksiAksiId' => 1));
        $jmlh = $query->num_rows();
        if($jmlh == 0 && $aksi['index'] == 1) {
            $this->db->set(array('MenuAksiMenuId' => $menuId, 'MenuAksiAksiId' => 1));
            $this->db->insert('yk_menu_aksi');            
        } else if($jmlh == 1 && $aksi['index'] == 0) {
            $this->db->delete('yk_menu_aksi', array('MenuAksiMenuId' => $menuId, 'MenuAksiAksiId' => 1));            
        } else if($jmlh == 1 && $aksi['index'] == 1) {
            $result = $query->result_array();
            $id = $result[0]['MenuAksiId'];
            $this->db->set(array('GroupMenuSegmen' => $data['MenuModule'].'/index'));
            $this->db->where('GroupMenuMenuAksiId', $id);
            $this->db->update('yk_group_menu_aksi');            
        }
        
        $query = $this->db->get_where('yk_menu_aksi', array('MenuAksiMenuId' => $menuId, 'MenuAksiAksiId' => 2));
        $jmlh = $query->num_rows();
        if($jmlh == 0 && $aksi['search'] == 1) {
            $this->db->set(array('MenuAksiMenuId' => $menuId, 'MenuAksiAksiId' => 2));
            $this->db->insert('yk_menu_aksi');            
        } else if($jmlh == 1 && $aksi['search'] == 0) {
            $this->db->delete('yk_menu_aksi', array('MenuAksiMenuId' => $menuId, 'MenuAksiAksiId' => 2));            
        } else if($jmlh == 1 && $aksi['search'] == 1) {
            $result = $query->result_array();
            $id = $result[0]['MenuAksiId'];
            $this->db->set(array('GroupMenuSegmen' => $data['MenuModule'].'/search'));
            $this->db->where('GroupMenuMenuAksiId', $id);
            $this->db->update('yk_group_menu_aksi');            
        }
        
        $query = $this->db->get_where('yk_menu_aksi', array('MenuAksiMenuId' => $menuId, 'MenuAksiAksiId' => 3));
        $jmlh = $query->num_rows();
        if($jmlh == 0 && $aksi['add'] == 1) {
            $this->db->set(array('MenuAksiMenuId' => $menuId, 'MenuAksiAksiId' => 3));
            $this->db->insert('yk_menu_aksi');            
        } else if($jmlh == 1 && $aksi['add'] == 0) {
            $this->db->delete('yk_menu_aksi', array('MenuAksiMenuId' => $menuId, 'MenuAksiAksiId' => 3));            
        } else if($jmlh == 1 && $aksi['add'] == 1) {
            $result = $query->result_array();
            $id = $result[0]['MenuAksiId'];
            $this->db->set(array('GroupMenuSegmen' => $data['MenuModule'].'/add'));
            $this->db->where('GroupMenuMenuAksiId', $id);
            $this->db->update('yk_group_menu_aksi');            
        }
        
        $query = $this->db->get_where('yk_menu_aksi', array('MenuAksiMenuId' => $menuId, 'MenuAksiAksiId' => 4));
        $jmlh = $query->num_rows();
        if($jmlh == 0 && $aksi['update'] == 1) {
            $this->db->set(array('MenuAksiMenuId' => $menuId, 'MenuAksiAksiId' => 4));
            $this->db->insert('yk_menu_aksi');            
        } else if($jmlh == 1 && $aksi['update'] == 0) {
            $this->db->delete('yk_menu_aksi', array('MenuAksiMenuId' => $menuId, 'MenuAksiAksiId' => 4));            
        } else if($jmlh == 1 && $aksi['update'] == 1) {
            $result = $query->result_array();
            $id = $result[0]['MenuAksiId'];
            $this->db->set(array('GroupMenuSegmen' => $data['MenuModule'].'/update'));
            $this->db->where('GroupMenuMenuAksiId', $id);
            $this->db->update('yk_group_menu_aksi');            
        }
        
        $query = $this->db->get_where('yk_menu_aksi', array('MenuAksiMenuId' => $menuId, 'MenuAksiAksiId' => 5));
        $jmlh = $query->num_rows();
        if($jmlh == 0 && $aksi['delete'] == 1) {
            $this->db->set(array('MenuAksiMenuId' => $menuId, 'MenuAksiAksiId' => 5));
            $this->db->insert('yk_menu_aksi');            
        } else if($jmlh == 1 && $aksi['delete'] == 0) {
            $this->db->delete('yk_menu_aksi', array('MenuAksiMenuId' => $menuId, 'MenuAksiAksiId' => 5));            
        } else if($jmlh == 1 && $aksi['delete'] == 1) {
            $result = $query->result_array();
            $id = $result[0]['MenuAksiId'];
            $this->db->set(array('GroupMenuSegmen' => $data['MenuModule'].'/delete'));
            $this->db->where('GroupMenuMenuAksiId', $id);
            $this->db->update('yk_group_menu_aksi');            
        }
        
        $query = $this->db->get_where('yk_menu_aksi', array('MenuAksiMenuId' => $menuId, 'MenuAksiAksiId' => 6));
        $jmlh = $query->num_rows();
        if($jmlh == 0 && $aksi['detail'] == 1) {
            $this->db->set(array('MenuAksiMenuId' => $menuId, 'MenuAksiAksiId' => 6));
            $this->db->insert('yk_menu_aksi');            
        } else if($jmlh == 1 && $aksi['detail'] == 0) {
            $this->db->delete('yk_menu_aksi', array('MenuAksiMenuId' => $menuId, 'MenuAksiAksiId' => 6));            
        } else if($jmlh == 1 && $aksi['detail'] == 1) {
            $result = $query->result_array();
            $id = $result[0]['MenuAksiId'];
            $this->db->set(array('GroupMenuSegmen' => $data['MenuModule'].'/detail'));
            $this->db->where('GroupMenuMenuAksiId', $id);
            $this->db->update('yk_group_menu_aksi');            
        }
        
        $query = $this->db->get_where('yk_menu_aksi', array('MenuAksiMenuId' => $menuId, 'MenuAksiAksiId' => 7));
        $jmlh = $query->num_rows();
        if($jmlh == 0 && $aksi['print'] == 1) {
            $this->db->set(array('MenuAksiMenuId' => $menuId, 'MenuAksiAksiId' => 7));
            $this->db->insert('yk_menu_aksi');            
        } else if($jmlh == 1 && $aksi['print'] == 0) {
            $this->db->delete('yk_menu_aksi', array('MenuAksiMenuId' => $menuId, 'MenuAksiAksiId' => 7));            
        } else if($jmlh == 1 && $aksi['print'] == 1) {
            $result = $query->result_array();
            $id = $result[0]['MenuAksiId'];
            $this->db->set(array('GroupMenuSegmen' => $data['MenuModule'].'/cetak'));
            $this->db->where('GroupMenuMenuAksiId', $id);
            $this->db->update('yk_group_menu_aksi');            
        }
        
        $query = $this->db->get_where('yk_menu_aksi', array('MenuAksiMenuId' => $menuId, 'MenuAksiAksiId' => 8));
        $jmlh = $query->num_rows();
        if($jmlh == 0 && $aksi['export'] == 1) {
            $this->db->set(array('MenuAksiMenuId' => $menuId, 'MenuAksiAksiId' => 8));
            $this->db->insert('yk_menu_aksi');            
        } else if($jmlh == 1 && $aksi['export'] == 0) {
            $this->db->delete('yk_menu_aksi', array('MenuAksiMenuId' => $menuId, 'MenuAksiAksiId' => 8));            
        } else if($jmlh == 1 && $aksi['export'] == 1) {
            $result = $query->result_array();
            $id = $result[0]['MenuAksiId'];
            $this->db->set(array('GroupMenuSegmen' => $data['MenuModule'].'/export'));
            $this->db->where('GroupMenuMenuAksiId', $id);
            $this->db->update('yk_group_menu_aksi');            
        }
        
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    
    function delete($id) {
       $this->db->delete('yk_menu', array('MenuId' => $id)); 
       return $this->db->affected_rows();
   }
    
    function getEmptyMenu() {
        $menu['MenuId'] = NULL;
        $menu['MenuParentId'] = 0;
        $menu['MenuName'] = NULL;
        $menu['MenuModule'] = NULL;
        $menu['MenuHasSubmenu'] = 0;
        $menu['MenuIsShow'] = NULL;
        $menu['MenuIcon'] = NULL;
        $menu['MenuOrder'] = NULL;
        return $menu;
    }
    
    function getEmptyMenuAksi() {
        $aksi['index'] = FALSE;
        $aksi['search'] = FALSE;
        $aksi['add'] = FALSE;
        $aksi['update'] = FALSE;
        $aksi['delete'] = FALSE;
        $aksi['detail'] = FALSE;
        $aksi['print'] = FALSE;
        $aksi['export'] = FALSE;
        return $aksi;
    }

}

/* 
 * End of file menu_model.php 
 * File location ./application/models/menu_model.php
 */