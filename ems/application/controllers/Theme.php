<?php
defined('BASEPATH') OR exit('No Direct script access allowed');
class Theme extends CI_Controller{
    
    public function change_theme($uid){
        if($this->input->post('def'))
        {
            $theme_details = array('user_id' =>  $uid, 'user_email' =>  $_SESSION['id'], 'color_1' =>  "#36454f", 'color_2' =>  "#778899");
            $this->func($uid, $theme_details);
        }
        if($this->input->post('inp1'))
        {
            $theme_details = array('user_id' =>  $uid, 'user_email' =>  $_SESSION['id'], 'color_1' =>  "#000000", 'color_2' =>  "#f3f3f3");
            $this->func($uid, $theme_details);
        }
        if($this->input->post('inp2'))
        {
            $theme_details = array('user_id' =>  $uid, 'user_email' =>  $_SESSION['id'], 'color_1' =>  "#e06666", 'color_2' =>  "red");
            $this->func($uid, $theme_details);
        }
        if($this->input->post('inp3'))
        {
            $theme_details = array('user_id' =>  $uid, 'user_email' =>  $_SESSION['id'], 'color_1' =>  "grey", 'color_2' =>  "#b7b7b7");
            $this->func($uid, $theme_details);
        }
        if($this->input->post('inp4'))
        {
            $theme_details = array('user_id' =>  $uid, 'user_email' =>  $_SESSION['id'], 'color_1' =>  "#5b0f00", 'color_2' =>  "brown");
            $this->func($uid, $theme_details);
        }
        if($this->input->post('inp5'))
        {
            $theme_details = array('user_id' =>  $uid, 'user_email' =>  $_SESSION['id'], 'color_1' =>  "#f1c232", 'color_2' =>  "#ffe599");
            $this->func($uid, $theme_details);
        }
        if($this->input->post('inp6'))
        {
            $theme_details = array('user_id' =>  $uid, 'user_email' =>  $_SESSION['id'], 'color_1' =>  "green", 'color_2' =>  "lightgreen");
            $this->func($uid, $theme_details);
        }

        if($this->input->post('inp7'))
        {
            $theme_details = array('user_id' =>  $uid, 'user_email' =>  $_SESSION['id'], 'color_1' =>  "orange", 'color_2' =>  "#f6b26b");
            $this->func($uid, $theme_details);
        }
        if($this->input->post('inp8'))
        {
            $theme_details = array('user_id' =>  $uid, 'user_email' =>  $_SESSION['id'], 'color_1' =>  "#ea9999", 'color_2' =>  "pink");
            $this->func($uid, $theme_details);
        }
        if($this->input->post('inp9'))
        {
            $theme_details = array('user_id' =>  $uid, 'user_email' =>  $_SESSION['id'], 'color_1' =>  "purple", 'color_2' =>  "#674ea7");
            $this->func($uid, $theme_details);
        }
        if($this->input->post('inp10'))
        {
            $theme_details = array('user_id' =>  $uid, 'user_email' =>  $_SESSION['id'], 'color_1' =>  "#1c4587", 'color_2' =>  "skyblue");
            $this->func($uid, $theme_details);
        }
        if($this->input->post('inp11'))
        {
            $theme_details = array('user_id' =>  $uid, 'user_email' =>  $_SESSION['id'], 'color_1' =>  "teal", 'color_2' =>  "#b6d7a8");
            $this->func($uid, $theme_details);
        }
        if($this->input->post('inp12'))
        {
            $theme_details = array('user_id' =>  $uid, 'user_email' =>  $_SESSION['id'], 'color_1' =>  "#134f5c", 'color_2' =>  "#76a5af");
            $this->func($uid, $theme_details);
        }
    }


    public function func($uid, $theme_details) {
        $array = array('user_id' => $uid, 'user_email' => $_SESSION['id']);
        $this->db->where($array);
        $this->db->update('theme', $theme_details);
        redirect('dash/def_dash', 'refresh');
        echo "<script type='text/javascript'>parent.location.reload(true);</script>";
    }

    public function change_select_theme($uid) {
        if($this->input->post('change_user_select_color'))
        {
            $color_1 = $this->input->post('color_1');
            $color_2 = $this->input->post('color_2');
            
            $theme_details = array(
                'user_id' =>  $uid,
                'user_email' =>  $_SESSION['id'], 
                'color_1' =>  $color_1,
                'color_2' =>  $color_2
            );
            $array = array('user_id' => $uid, 'user_email' => $_SESSION['id']);
            $this->db->where($array);
            $this->db->update('theme', $theme_details);
            redirect('dash/def_dash', 'refresh');
            echo "<script type='text/javascript'>parent.location.reload(true);</script>";
        }
    }
    
}
?>
