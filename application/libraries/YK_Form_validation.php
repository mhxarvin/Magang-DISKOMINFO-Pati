<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class YK_Form_validation extends CI_Form_validation {

    public function is_unique($str, $field) {
        list($table, $field) = explode('.', $field);
        $q = $this->CI->db->query("SHOW KEYS FROM $table WHERE Key_name = 'PRIMARY'")->row();
        $primary_key = $q->Column_name;

        if ($this->CI->input->post($primary_key) > 0):
            $query = $this->CI->db->limit(1)->get_where($table, array($field => $str, $primary_key . ' !=' => $this->CI->input->post($primary_key)));
        else:
            $query = $this->CI->db->limit(1)->get_where($table, array($field => $str));
        endif;

        return $query->num_rows() === 0;
    }

}

/* End of file YK_Form_validation.php */
/* Location: ./application/libraries/YK_Form_validation.php */ 
