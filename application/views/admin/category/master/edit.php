<?php $this->load->view('admin/header'); ?>
<?php $CI =& get_instance(); ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo $CI->module_title;?> Master</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/home' ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url().$CI->module_url_listmaster ?>"><?php echo $CI->module_title;?> Master</a></li>
              <li class="breadcrumb-item active">Edit Category</li>
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
                    Edit Category
                </div>

              </div>

              <div class="card-body">
                  <form name="editForm" id="editForm" action=""  method="post" enctype="multipart/form-data">

                    <input type="hidden" name="pkg_id" access="false" id="pkg_id" value="<?php echo isset($_SESSION['admin']['pkg_id'])?$_SESSION['admin']['pkg_id']:''; ?>">
                    <input type="hidden" name="id" access="false" id="id" value="<?php echo $categoriesMaster['id']; ?>">
                    <input type="hidden" name="cat_id" access="false" id="cat_id" value="<?php echo $categoriesMaster['cat_id']; ?>">


                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="category" class="formbuilder-text-label">Category</label>
                            <input type="text" value="<?php echo isset($categoryMap[$categoriesMaster['cat_id']]) ? $categoryMap[$categoriesMaster['cat_id']].' - '.$categoriesMaster['cat_id'].'' : 'Undefined - '.$categoriesMaster['cat_id'];?>" class="form-control" name="category" access="false" id="category">
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="sub_cat_id" class="formbuilder-number-label">Sub Category</label>
                            <select class="form-control" name="sub_cat_id" id="sub_cat_id">
                                <option value="">Select Sub Category</option>
                                <option value="0">No Parent</option>
                                <?php
                                    if(!empty($categories)){
                                        foreach ($categories as $item) {
                                            $selected = ($categoriesMaster['sub_cat_id'] == $item['cat_id']) ? true : false;
                                            ?>
                                             <option <?php echo set_select('sub_cat_id', $item['cat_id'], $selected); ?> value="<?php echo $item['cat_id'];?>"><?php echo $item['title'];?></option>
                                             <?php
                                        }
                                    }
                                 ?>
                            </select>
                        </div>
                    </div>


                     <div class="formbuilder-button form-group field-submit">
                        <button type="submit" class="btn-success btn" name="submit" access="false" style="success" id="submitBtn">Change</button>
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
    $("#editForm").submit(function(e) {
        e.preventDefault();
        $("#submitBtn").prop("disabled", true);

        var formData= new FormData($("#editForm")[0]);
        // console.log('my message' + formData.get('sub_cat_id'));
        $.ajax({
            type: "POST",
            url: "<?php echo base_url().version_prefix.'database/update_category_master' ?>",
            data: formData,
            processData: false,
            contentType: false,
            encode: true,
        }).done(function(data) {
            var successURL = "<?php echo base_url().$CI->module_url_listmaster ?>";
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
