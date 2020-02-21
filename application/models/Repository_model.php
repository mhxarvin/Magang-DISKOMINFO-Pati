<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends Ci_Model {

    function getUser($key, $start, $limit) {
        $this->db->select("*, DATE_FORMAT(UserExpired, '%d-%m-%Y') AS `Expired`", FALSE);
        $this->db->from('yk_user');
        $this->db->join('yk_group', 'GroupId=UserGroupId', 'left');
        $this->db->like('UserNip', $key);
        $this->db->or_like('UserName', $key);
        $this->db->or_like('UserRealName', $key);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
//      print_r($this->db->last_query());
//      print_r($this->db->count_all_results());
        return $query->result_array();
    }

    function countUser($key) {
        $this->db->select("COUNT(UserId) AS total", FALSE);
        $this->db->from('yk_user');
        $this->db->join('yk_group', 'GroupId=UserGroupId', 'left');
        $this->db->like('UserNip', $key);
        $this->db->or_like('UserName', $key);
        $this->db->or_like('UserRealName', $key);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result[0]['total'];
    }

    function getDataTables($status = '', $aksi = '') {
        $this->load->library('Datatables');

        $this->datatables->select("UserId, UserNip, UserRealName, UserName, UserPassword, UserActive, UserEmail, UserFoto, DATE_FORMAT(UserExpired, '%d-%m-%Y') AS UserExpired");
        $this->datatables->from("yk_user");
        $this->datatables->add_column('aksi', $aksi, 'UserId');
        return $this->datatables->generate();
    }

    function getById($id) {
        $this->db->select("UserId, UserNip, UserRealName, UserName, UserPassword, UserActive, UserEmail, UserHp, UserFoto, DATE_FORMAT(UserExpired, '%d-%m-%Y') AS UserExpired, UserNote");
        $this->db->from("yk_user");
        $this->db->where("UserId", $id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result[0];
    }

    function getAll() {
        $query = $this->db->get('yk_user');
        return $query->result_array();
    }
    
    function getUserGroupsById($id) {
        $query = $this->db->get_where('yk_user_group', array('UserGroupUserId' => $id));
        return $query->result_array();
    }

    function add($data, $groups) {
        $this->db->trans_start();
        $this->db->set($data);
        $this->db->insert('yk_user');
        $id = $this->db->insert_id();
        for($i=0;$i<sizeof($groups);$i++) {
            $this->db->insert('yk_user_group', array('UserGroupUserId' => $id, 'UserGroupGroupId' => $groups[$i]));
        }
        $this->db->trans_complete();
        if ($this->db->trans_status()) {
            return $id;
        } else {
            return 0;
        }
    }

    function update($data, $groups, $id) {
        $this->db->trans_start();
        $this->db->set($data);
        $this->db->where('UserId', $id);
        $this->db->update('yk_user');
        $this->db->delete('yk_user_group', array('UserGroupUserId' => $id));
        for($i=0;$i<sizeof($groups);$i++) {
            $this->db->insert('yk_user_group', array('UserGroupUserId' => $id, 'UserGroupGroupId' => $groups[$i]));
        }
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    function delete($id) {
        $this->db->trans_start();
        $this->db->delete('yk_user_group', array('UserGroupUserId' => $id));
        $this->db->delete('yk_user', array('UserId' => $id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    function getUniqueUserByUsername($username, $id) {
        $sql = "
         SELECT count(*) as total
         FROM yk_user
         WHERE UserName = ? AND UserId != ?";
        $query = $this->db->query($sql, array($username, $id));
        $result = $query->result_array();
        return $result[0]['total'];
    }

    function checkPasswordByUserId($password, $id) {
        $sql = "
         SELECT count(*) as total
         FROM yk_user
         WHERE UserPassword = ? AND UserId = ?";
        $query = $this->db->query($sql, array(md5($password), $id));
        $result = $query->result_array();
        return $result[0]['total'];
    }

    function updatePassword($new) {
        $sql = "
         UPDATE yk_user
         SET UserPassword = ? 
         WHERE UserId = ?";
        return $this->db->query($sql, array($new, $_SESSION['userid']));
    }

    function getEmptyUser() {
        $user['UserId'] = NULL;
        $user['UserUnitKerjaId'] = NULL;
        $user['UserNip'] = NULL;
        $user['UserRealName'] = NULL;
        $user['UserName'] = NULL;
        $user['UserPassword'] = NULL;
        $user['UserActive'] = 1;
        $user['UserHp'] = NULL;
        $user['UserEmail'] = NULL;
        $user['UserFoto'] = NULL;
        $user['UserExpired'] = date('d-m-Y');
        $user['UserLastLogin'] = NULL;
        $user['UserNote'] = NULL;
        return $user;
    }

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */
