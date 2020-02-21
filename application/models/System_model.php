<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class System_model extends Ci_Model {

   function getMenu($uid) {
      $sql = "
         SELECT MenuId,MenuParentId,MenuModule,MenuName,MenuIcon,MenuHasSubmenu
         FROM yk_menu
         INNER JOIN yk_menu_aksi ON MenuId=MenuAksiMenuId
         INNER JOIN yk_group_menu_aksi ON MenuAksiId=GroupMenuMenuAksiId
         WHERE GroupMenuGroupId IN (SELECT UserGroupGroupId FROM yk_user_group WHERE UserGroupUserId = ?) AND MenuIsShow=1
         GROUP BY MenuId
         ORDER BY MenuOrder";
      $query = $this->db->query($sql, array($uid));
      return $query->result_array();
   }

}

/*
 * End of file : system_model.php
 * File location : ./models/system_model.php
 */