


<div class="container-fluid" id="topbar">
<div class="btn-toolbar" id="topbuttons" role="toolbar" aria-label="Toolbar with button groups">

<div class="btn-group" role="group" aria-label="Basic example">
  <button type="button" class="btn btn-sm btn-light py-0 m-1"><span style="font-size:10px;font-weight:bolder;">Import</span></button>
</div>
<div class="btn-group" role="group" aria-label="Basic example">
  <button type="button" class="btn btn-sm btn-light py-0 m-1"><span style="font-size:10px;font-weight:bolder;">Export</span></button>
</div>
<div class="btn-group" role="group" aria-label="Basic example">
  <button type="button" class="btn btn-sm btn-light py-0 m-1"><span style="font-size:10px;font-weight:bolder;">Edit</span> </button>
</div>

<div class="btn-group" role="group" aria-label="Basic example">
  <button class="btn btn-sm btn-light py-0 m-1 dropdown-toggle" type="button" data-toggle="dropdown"><span style="font-size:10px;font-weight:bolder;">Add</span></button>
    <div class="dropdown-menu py-0" id="crtmenu">
        <a class="dropdown-item" href="<?php echo site_url(); ?>leads/create_lead_path/">Create Lead</a>
        <a class="dropdown-item" href="<?php echo site_url(); ?>product/create_product_path/">Create Product</a>
        <a class="dropdown-item" href="#">Create Contact</a>
        <a class="dropdown-item" href="#">Create Task</a>
    </div>
</div>


<div class="form-inline inline-block">
  <div class="btn-group inline-block" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-sm btn-light py-0 m-1"><span style="font-size:10px;font-weight:bolder;">Theme</span></button>
  </div>
</div>


</div>
</div>