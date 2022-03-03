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
              <li class="breadcrumb-item active">Edit Account</li>
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
                    Edit Account
                </div>

              </div>

              <div class="card-body">
                  <form name="itemForm" id="itemForm" action=""  method="post" enctype="multipart/form-data">

                    <input type="hidden" name="id" access="false" id="id" value="<?php echo $account['id']; ?>">

                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="pkg_id" class="PackageId">Application</label>
                            <select class="form-control" name="pkg_id" id="pkg_id">
                                <option value="">Select Application</option>
                                <?php
                                    if(!empty($apps)){
                                        foreach ($apps as $value) {
                                            $selected = ($account['pkg_id'] == $value['pkg_id']) ? true : false;
                                             ?>
                                             <option <?php echo set_select('pkg_id', $value['pkg_id'], $selected); ?> value="<?php echo $value['pkg_id'];?>"><?php echo $value['app_name'];?></option>
                                             <?php
                                        }
                                    }
                                 ?>
                            </select>
                        </div>

                        <div class="col-sm-6 mb-3">
                            <label for="role" class="formbuilder-number-label">Role</label>
                            <input type="number" value="<?php echo $account['role'];?>" placeholder="Enter Role"class="form-control" name="role" access="false" id="role">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <label for="name" class="formbuilder-text-label">Name <span style="color:red">*</span></label>
                            <input type="text" placeholder="Enter Name" value="<?php echo $account['name'];?>" class="form-control" name="name" access="false" id="name">
                        </div>
                    </div>
                     <div class="row">
                         <div class="col-sm-6 mb-3">
                             <label for="user_id" class="formbuilder-number-label">UserId</label>
                             <input type="text" placeholder="Enter UserId" value="<?php echo $account['user_id'];?>" class="form-control" name="user_id" access="false" id="user_id">
                         </div>

                         <div class="col-sm-6 mb-3">
                             <label for="password" class="formbuilder-number-label">Password</label>
                             <input type="text" placeholder="Enter Password" value="<?php echo $account['password'];?>" class="form-control" name="password" access="false" id="password">
                         </div>
                     </div>

                     <div class="row">
                         <div class="col-sm-6 mb-3">
                             <label for="validity" class="formbuilder-number-label">Validity</label>
                             <input type="text"  value="<?php echo $account['validity'];?>" placeholder="Enter Validity" class="form-control" name="validity" access="false" id="validity">
                         </div>

                         <div class="col-sm-4 mb-3">
                             <label for="radio-group-1642854908703" class="formbuilder-radio-group-label">Visibility</label>
                             <div class="radio-group row mt-2">
                                 <div class="ml-3">
                                     <input name="active"  id="radio_active" value="1" type="radio" <?php echo ($account['active'] == 1) ? 'checked' : ''; ?>>
                                     <label for="radio_active">Active</label>
                                 </div>
                                 <div class="ml-3">
                                     <input name="active"  id="radio-deactive" value="0" type="radio" <?php echo ($account['active'] == 0) ? 'checked' : ''; ?>>
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
    <!-- /.account -->
  </div>
  <!-- /.account-wrapper -->

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
            url: "<?php echo base_url().version_prefix.'database/update_account' ?>",
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
