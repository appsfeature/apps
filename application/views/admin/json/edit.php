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
              <li class="breadcrumb-item active">Edit Item</li>
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
          <div class="col-lg-12">
            <div class="card card-primary">
              <div class="card-header">
                <div class="card-title">
                    Edit Item
                </div>

              </div>

              <div class="card-body">
                  <form name="itemForm" id="itemForm" action=""  method="post" enctype="multipart/form-data">

                    <input type="hidden" name="pkg_id" access="false" id="pkg_id" value="<?php echo isset($_SESSION['admin']['pkg_id'])?$_SESSION['admin']['pkg_id']:''; ?>">

                    <input type="hidden" name="id" access="false" id="id" value="<?php echo $item['id']; ?>">

                    <div class="formbuilder-number form-group field-cat_id">

                        <label for="cat_id" class="formbuilder-number-label">Category</label>
                        <select class="form-control" name="cat_id" id="cat_id">
                            <option value="0">Select Category</option>
                            <?php
                                if(!empty($categories)){
                                    foreach ($categories as $value) {
                                        $selected = ($item['cat_id'] == $value['cat_id']) ? true : false;
                                         ?>
                                         <option <?php echo set_select('cat_id', $value['cat_id'], $selected); ?> value="<?php echo $value['cat_id'];?>"><?php echo $value['title'];?></option>
                                         <?php
                                    }
                                }
                             ?>
                        </select>
                    </div>

                     <div class="rendered-form">
                         <div class="formbuilder-textarea form-group field-json_data">
                             <label for="json_data" class="formbuilder-textarea-label">Json Data <span style="color:red">*</span></label>
                             <textarea type="textarea" placeholder="Enter json here" class="form-control" name="json_data" access="false" rows="9" id="json_data"><?php echo $item['json_data']; ?></textarea>
                         </div>
                     </div>

                     <div class="formbuilder-button form-group field-submit">
                        <button type="submit" class="btn-success btn" name="submit" access="false" style="success" id="submitBtn">Submit</button>
                    </div>
                  </form>
              </div>

            </div>

          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('admin/footer'); ?>

<script type="text/javascript">
$(document).ready(function() {
    $("#itemForm").submit(function(e) {
        e.preventDefault();
        $("#submitBtn").prop("disabled", true);

        var formData= new FormData($("#itemForm")[0]);
        console.log('my message' + formData);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url().version_prefix.'database/update_data' ?>",
            data: formData,
            processData: false,
            contentType: false,
            encode: true,
        }).done(function(data) {
            var successURL = "<?php echo base_url().$CI->module_url_list; ?>";
            if(data.status=='failure'){
              showToast(false, data.message);
              $("button[type='submit']").prop("disabled", false);
            } else {
              if(successURL!==null) {
                window.location.href=successURL;
              }
            }
        });
    });
});
</script>
