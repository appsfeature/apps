<?php $this->load->view('admin/header'); ?>
<?php $CI =& get_instance(); ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo $CI->module_title;?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/home' ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url().$CI->module_url_list ?>"><?php echo $CI->module_title;?></a></li>
              <li class="breadcrumb-item active">Manage Item Types</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
          <div class="row">

              <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                       <h3 class="card-title">Item Types</h3>

                       <div class="card-tools">
                           <div class="card-title">
                             <form id="searchForm" name="searchForm" method="get" action="">
                               <div class="input-group input-group-sm">
                                 <input type="text" value="<?php  echo $querySearch;?>" class="form-control" placeholder="Search" name="title">
                                 <div class="input-group-append">
                                   <button class="input-group-text" id="basic-addon1">
                                     <i class="fas fa-search"></i>
                                   </button>
                                 </div>

                                 <select class="form-control ml-3" name="flavour" id="flavour">
                                     <option value="">Select Flavour</option>
                                     <?php
                                         if(!empty($flavours)){
                                             foreach ($flavours as $item) {
                                                 $selected = ($flavourSelected == $item['id']) ? true : false;
                                                  ?>
                                                  <option <?php echo set_select('flavour', $item['id'], $selected); ?> value="<?php echo $item['id'];?>"><?php echo $item['title'];?></option>
                                                  <?php
                                             }
                                         }
                                      ?>
                                 </select>
                                 <div class="input-group-append">
                                   <button class="input-group-text" id="basic-addon1">
                                     <i class="fas fa-search"></i>
                                   </button>
                                 </div>
                               </div>
                             </form>
                           </div>
                       </div>
                    </div>

                    <div class="card-body">
                        <div class="container_to_load"></div>
                    </div>

                </div>

              </div>


          <div class="col-md-4">
            <div class="card card-success">
               <div class="card-header">
                  <h3 class="card-title">Create Item Type</h3>
               </div>
               <div class="card-body">
                   <form name="itemForm" id="itemForm" action=""  method="post" enctype="multipart/form-data">

                     <input type="hidden" name="pkg_id" access="false" id="pkg_id" value="<?php echo isset($_SESSION['admin']['pkg_id'])?$_SESSION['admin']['pkg_id']:''; ?>">
                     <input type="hidden" name="" value="">

                     <div class="row">
                         <div class="col-sm-12 mb-3">
                             <label for="flavour" class="Flavour">Flavour</label>
                             <select class="form-control" name="flavour" id="flavour">
                                 <option value="0">Select Flavour</option>
                                 <?php
                                     if(!empty($flavours)){
                                         foreach ($flavours as $item) {
                                              ?>
                                              <option <?php echo set_select('flavour', $item['id'], false); ?> value="<?php echo $item['id'];?>"><?php echo $item['title'];?></option>
                                              <?php
                                         }
                                     }
                                  ?>
                             </select>
                         </div>
                     </div>

                      <div class="row">
                          <div class="col-sm-12 mb-3">
                              <label for="description" class="formbuilder-number-label">ItemType</label>
                              <input type="number" value="0" placeholder="Enter Item Type"class="form-control" name="item_type" access="false" id="item_type">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-12 mb-3">
                              <label for="title" class="formbuilder-text-label">Title <span style="color:red">*</span></label>
                              <input type="text" placeholder="Enter Title" class="form-control <?php echo (form_error('title') != "") ? 'is-invalid' : ''; ?>" name="title" access="false" id="title">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-12 mb-3">
                              <label for="ranking" class="formbuilder-number-label">Ranking</label>
                              <input type="number" placeholder="Enter Ranking" class="form-control" name="ranking" access="false" value="0" id="ranking">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-12 mb-3">
                              <label for="radio-group-1642854908703" class="formbuilder-radio-group-label">Visibility</label>
                              <div class="radio-group row">
                                  <div class="ml-3">
                                      <input name="visibility"  id="radio_active" value="1" type="radio" checked="checked">
                                      <label for="radio_active">Active</label>
                                  </div>
                                  <div class="ml-3">
                                      <input name="visibility"  id="radio-deactive" value="0" type="radio" >
                                      <label for="radio-deactive">Deactive</label>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <div class="formbuilder-button form-group field-submit">
                         <button type="submit" class="btn-success btn" name="submit" access="false" style="success" id="submitBtn">Create</button>
                     </div>
                   </form>
               </div>
            </div>
          </div>
          </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('admin/footer'); ?>
<?php $this->load->view('admin/scripts/scriptcategorymapping'); ?>
<script type="text/javascript">
$(document).ready(function() {
    var title= $("[name='title']").val();
    var flavour= $("[name='flavour']").val();
    var url= "<?php echo base_url().'admin/itemtype/attachFragmentList' ?>?title="+title+"&flavour="+flavour;
    console.log(url);
    $( ".container_to_load" ).load(url);

    $("#itemForm").submit(function(e) {
        e.preventDefault();
        $("#submitBtn").prop("disabled", true);

        var formData= new FormData($("#itemForm")[0]);
        // console.log('my message' + formData);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url().version_prefix.'database/insert_item_type' ?>",
            data: formData,
            processData: false,
            contentType: false,
            encode: true,
        }).done(function(data) {
            var successURL = "<?php echo base_url().$CI->module_url_master; ?>";
            if(data.status=='failure'){
              showToast(false, data.message);
              $("button[type='submit']").prop("disabled", false);
            } else {
              if(successURL!==null) {
                  //$( ".container_to_load" ).load( "<?php echo base_url().'admin/itemtype/attachFragmentList' ?>" );

                window.location.href=successURL;
              }
            }
        });
    });
});
</script>

<script type="text/javascript">
    if('<?php echo $this->session->flashdata('success'); ?>' != ""){
        showToast(true, "<?php echo $this->session->flashdata('success'); ?>");
    }
    if('<?php echo $this->session->flashdata('error'); ?>' != ""){
        showToast(false, "<?php echo $this->session->flashdata('error'); ?>");
    }
</script>

<script type="text/javascript">
    function deleteItemType(id) {
        if(confirm("Are you sure you want to delete item?")){
            window.location.href='<?php echo base_url().$CI->module_url_delete.'/'; ?>' + id;
        }
    }
</script>
