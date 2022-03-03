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
              <li class="breadcrumb-item active">Edit App</li>
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
          <div class="col-lg-6">
            <div class="card card-primary">
              <div class="card-header">
                <div class="card-title">
                    Edit App
                </div>

              </div>

              <div class="card-body">
                  <form name="itemForm" id="itemForm" action=""  method="post" enctype="multipart/form-data">

                    <input type="hidden" name="app_id" access="false" id="app_id" value="<?php echo $app['app_id']; ?>">

                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="pkg_id" class="formbuilder-number-label">Package Id <span style="color: red;">*</span></label>
                            <input type="text" placeholder="Enter Package Id" value="<?php echo $app['pkg_id'];?>" class="form-control" name="pkg_id" access="false" id="pkg_id" />
                        </div>

                        <div class="col-sm-6 mb-3">
                            <label for="pkg_name" class="formbuilder-number-label">Package Name <span style="color: red;">*</span></label>
                            <input type="text" placeholder="Enter Package Name" value="<?php echo $app['pkg_name'];?>" class="form-control" name="pkg_name" access="false" id="pkg_name" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <label for="app_name" class="formbuilder-text-label">App Name <span style="color: red;">*</span></label>
                            <input type="text" placeholder="Enter App Name" value="<?php echo $app['app_name'];?>" class="form-control" name="app_name" access="false" id="app_name" />
                        </div>
                    </div>

                     <div class="row">
                         <div class="col-sm-4 mb-3">
                             <label for="radio-group-1642854908703" class="formbuilder-radio-group-label">Visibility</label>
                             <div class="radio-group row mt-2">
                                 <div class="ml-3">
                                     <input name="visibility"  id="radio_active" value="1" type="radio" <?php echo ($app['visibility'] == 1) ? 'checked' : ''; ?>>
                                     <label for="radio_active">Active</label>
                                 </div>
                                 <div class="ml-3">
                                     <input name="visibility"  id="radio-deactive" value="0" type="radio" <?php echo ($app['visibility'] == 0) ? 'checked' : ''; ?>>
                                     <label for="radio-deactive">Deactive</label>
                                 </div>
                             </div>
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
    <!-- /.app -->
  </div>
  <!-- /.app-wrapper -->

<?php $this->load->view('admin/footer'); ?>

<script type="text/javascript">
$(document).ready(function() {
    $("#itemForm").submit(function(e) {
        e.preventDefault();
        $("#submitBtn").prop("disabled", true);

        var formData= new FormData($("#itemForm")[0]);
        // console.log('my message' + formData);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url().version_prefix.'database/update_app' ?>",
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
