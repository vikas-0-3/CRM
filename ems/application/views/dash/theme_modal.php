<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$color_list = $this->db->get_where('theme', array( 'user_email' =>  $_SESSION['id'] ));
foreach ($color_list->result() as $col)
{
  $un = $col->user_id;
}
?>


<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Select Your Theme</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      
      <?php echo form_open('theme/change_theme/'.$un); ?>


        <div class="btn-group" role="group" aria-label="Third group">
                <input type="submit" name="def" class="btn btn-sm p-2 my-1" style="background-color:#36454f;color:white;" value="Default">
              </div>
          <div class="modal_buttons">


              <div class="btn-group" role="group" aria-label="Third group">
                <input type="submit" name="inp1" class="btn btn-sm btn-dark px-3 py-2 my-1" value="&emsp; &emsp;">
              </div>
              <div class="btn-group" role="group" aria-label="Third group">
              <input type="submit" name="inp2" class="btn btn-sm btn-danger px-3 py-2" value="&emsp; &emsp;">
              </div>
              <div class="btn-group" role="group" aria-label="Third group">
              <input type="submit" name="inp3" class="btn btn-sm btn-secondary px-3 py-2" value="&emsp; &emsp;">
              </div>
              <div class="btn-group" role="group" aria-label="Third group">
              <input type="submit" name="inp4" class="btn btn-sm px-3 py-2" style="background-color:brown;" value="&emsp; &emsp;">
              </div>
              <div class="btn-group" role="group" aria-label="Third group">
              <input type="submit" name="inp5" class="btn btn-sm btn-warning px-3 py-2" value="&emsp; &emsp;">
              </div>
              <div class="btn-group" role="group" aria-label="Third group">
              <input type="submit" name="inp6" class="btn btn-sm btn-success px-3 py-2" value="&emsp; &emsp;">
              </div>
              <div class="btn-group" role="group" aria-label="Third group">
              <input type="submit" name="inp7" class="btn btn-sm px-3 py-2" style="background-color:orange;" value="&emsp; &emsp;">
              </div>
              <div class="btn-group" role="group" aria-label="Third group">
              <input type="submit" name="inp8" class="btn btn-sm px-3 py-2" style="background-color:pink;" value="&emsp; &emsp;">
              </div>
              <div class="btn-group" role="group" aria-label="Third group">
              <input type="submit" name="inp9" class="btn btn-sm px-3 py-2" style="background-color:purple;" value="&emsp; &emsp;">
              </div>
              <div class="btn-group" role="group" aria-label="Third group">
              <input type="submit" name="inp10" class="btn btn-sm btn-primary px-3 py-2" value="&emsp; &emsp;">
              </div>
              <div class="btn-group" role="group" aria-label="Third group">
              <input type="submit" name="inp11" class="btn btn-sm px-3 py-2" style="background-color:teal;" value="&emsp; &emsp;">
              </div>
              <div class="btn-group" role="group" aria-label="Third group">
              <input type="submit" name="inp12" class="btn btn-sm btn-info px-3 py-2" value="&emsp; &emsp;">
              </div>

              <?php echo form_close(); ?>

          </div><br>
          <center><h3><b>OR</b></h3></center>

          <?php echo form_open('theme/change_select_theme/'.$un); ?>

              <div class="text-center">
                <label for="color_1">First color : </label>
                <input type="color" id="favcolor" name="color_1" value="#000000">&ensp;

                <label for="color_2">Second color : </label>
                <input type="color" id="favcolor2" name="color_2" value="#ffffff">&ensp;

                <input type="submit" name="change_user_select_color" class="btn btn-sm btn-primary" value="Confirm">
              </div>
        
          <?php echo form_close(); ?>

      </div>


    </div>
  </div>
</div>