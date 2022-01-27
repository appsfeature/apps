<?php $this->load->view('admin/header'); ?>
<?php $CI =& get_instance(); ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Home Item</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/home' ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url().$CI->module_url_list ?>"><?php echo $CI->module_title;?></a></li>
              <li class="breadcrumb-item active">Create New Item</li>
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
                    Create New Item
                </div>

              </div>

              <div class="card-body">
                  <form name="contentForm" id="contentForm" action=""  method="post" enctype="multipart/form-data">

                    <input type="hidden" name="pkg_id" access="false" id="pkg_id" value="<?php echo isset($_SESSION['admin']['pkg_id'])?$_SESSION['admin']['pkg_id']:''; ?>">

                     <div class="row">
                         <div class="col-sm-6 mb-3">
                             <label for="title" class="formbuilder-text-label">Title <span style="color:red">*</span></label>
                             <input type="text" placeholder="Enter Title" class="form-control <?php echo (form_error('title') != "") ? 'is-invalid' : ''; ?>" name="title" access="false" id="title">
                         </div>
                         <div class="col-sm-6 mb-3">
                             <label for="description" class="formbuilder-number-label">Description</label>
                             <input type="text" placeholder="Enter description here" placeholder="Enter Description" class="form-control" name="description" access="false" id="description">
                         </div>
                     </div>
                     <div class="formbuilder-text form-group field-link">
                         <label for="link" class="formbuilder-number-label">Link</label>
                         <input type="text" placeholder="Enter Link" class="form-control" name="link" access="false" id="link">
                     </div>


                     <div class="row">
                          <div class="col-sm-6 mb-3">
                              <label for="image" class="formbuilder-file-label">Image</label>
                              <input type="file" class="form-control" name="image" access="false" multiple="false" id="image">
                          </div>

                           <div class="col-sm-6 mb-3">
                               <label for="radio-group-1642854908703" class="formbuilder-radio-group-label">Visibility</label>
                               <div class="radio-group row">
                                   <div class="ml-3">
                                       <input name="visibility"  id="radio_active" value="1" type="radio" checked="checked">
                                       <label for="radio_active">Active</label>
                                   </div>
                                   <div class="ml-3">
                                       <input name="visibility"  id="radio-deactive" value="2" type="radio" >
                                       <label for="radio-deactive">Deactive</label>
                                   </div>
                               </div>
                           </div>
                     </div>
                     <div class="formbuilder-file form-group field-image">

                     <div class="row">

                         <div class="ml-2">
                             <label for="updated_at" class="formbuilder-text-label">Live At</label>
                             <input type="datetime-local" placeholder="Select Live At" class="form-control" name="updated_at" access="false" id="updated_at">
                         </div>
                         <div class="formbuilder-date form-group field-other_property ml-3">
                            <label for="other_property" class="formbuilder-date-label">Expiry Date</label>
                            <input type="datetime-local" class="form-control" name="other_property" access="false" id="other_property">
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
    $("#contentForm").submit(function(e) {
        e.preventDefault();
        $("#submitBtn").prop("disabled", true);

        var formData= new FormData($("#contentForm")[0]);

        // if(formData.get('updated_at') != ''){
        //     formData.set('updated_at', String(formData.get('updated_at')).replace('T',' ') + ":00");
        // }
        // if(formData.get('other_property') != ''){
        //     formData.set('other_property', String(formData.get('other_property')).replace('T',' ') + ":00");
        // }
        // console.log('my message: ' + newDate);
        // return;

        $.ajax({
            type: "POST",
            url: "<?php echo base_url().version_prefix.'database/insert_content' ?>",
            data: formData,
            processData: false,
            contentType: false,
            encode: true,
        }).done(function(data) {
            var successURL = "<?php echo base_url().$CI->module_url_list; ?>";
            if(data.status==0){
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
