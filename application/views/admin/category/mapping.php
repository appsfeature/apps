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
              <li class="breadcrumb-item active">Mapping Category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content">
      <div class="container-fluid">
            <form name="categoryForm" id="categoryForm" action=""  method="post" enctype="multipart/form-data">
                <div class="row">
                <div class="col-md-6">
                  <div class="card card-primary">
                      <div class="card-header">
                         <h3 class="card-title">Mapping Category</h3>
                      </div>
                      <div class="card-body">
                          <div class="col-sm-12">

                                <input type="hidden" name="pkg_id" access="false" id="pkg_id" value="<?php echo isset($_SESSION['admin']['pkg_id'])?$_SESSION['admin']['pkg_id']:''; ?>">
                                <input type="hidden" name="" value="">

                                <label for="cat_id" class="formbuilder-number-label">Category</label>
                                <select class="form-control" name="cat_id" id="cat_id" >
                                    <option value="">Select Category</option>
                                    <?php
                                        if(!empty($categories)){
                                            foreach ($categories as $item) {
                                                ?>
                                                 <option <?php echo set_select('cat_id', $item['cat_id'], false); ?> value="<?php echo $item['cat_id'];?>"><?php echo $item['title'];?></option>
                                                 <?php
                                            }
                                        }
                                     ?>
                                </select>

                                 <div class="formbuilder-button form-group field-submit mt-3">
                                    <button type="submit" class="btn-success btn" name="submit" access="false" style="success" id="submitBtn">Submit</button>
                                </div>
                          </div>
                      </div>
                  </div>

                </div>
                <div class="col-md-6">
                  <div class="card card-success">
                     <div class="card-header">
                        <h3 class="card-title">Select Parent Category</h3>
                     </div>
                     <div class="card-body">

                         <div class="row categorybx">
                             <div class="col-sm-12 mb-3">
                                 <label for="sub_cat_id" class="formbuilder-number-label">Sub Category</label>
                                 <select class="form-control selectClass" name="sub_cat_id" id="sub_cat_id" >
                                     <option value="">Select Category</option>
                                     <option value="0">No Parent</option>
                                     <?php
                                         if(!empty($categories)){
                                             foreach ($categories as $item) {
                                                 $selected = ($subCatIdSelected == $item['cat_id']) ? true : false;
                                                 ?>
                                                  <option <?php echo set_select('sub_cat_id', $item['cat_id'], $selected); ?> value="<?php echo $item['cat_id'];?>"><?php echo $item['title'];?></option>
                                                  <?php
                                             }
                                         }
                                      ?>
                                 </select>
                             </div>

                         </div>
                     </div>
                  </div>
                </div>
                </div>
            </form>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('admin/footer'); ?>
<?php $this->load->view('admin/scripts/scriptcategorymapping'); ?>

<script type="text/javascript">
$(document).ready(function() {

    $("#categoryForm").submit(function(e) {
        e.preventDefault();
        $("#submitBtn").prop("disabled", true);

        var formData= new FormData($("#categoryForm")[0]);
        console.log('my message' + formData.getAll('sub_cat_id'));
        formData.append('sub_cat_ids', formData.getAll('sub_cat_id'));

        $.ajax({
            type: "POST",
            url: "<?php echo base_url().version_prefix.'database/insert_category_master' ?>",
            data: formData,
            processData: false,
            contentType: false,
            encode: true,
        }).done(function(data) {
            $("#submitBtn").prop("disabled", false);
            var successURL = "<?php echo base_url().$CI->module_url_list ?>";
            if(data.status=='failure'){
              showToast(false, data.message);
              $("button[type='submit']").prop("disabled", false);
            } else {
                showToast(true, data.message);
                //
                // $('input:not([name="visibility"])').val('')
                // $("[name='ranking']").val(0);
                // $("textarea").val('');
                // $("[name='cat_id']").val('0');
                $('#cat_id').val( $('#cat_id').prop('defaultSelected') );

              // if(successURL!==null) {
              //   window.location.href=successURL;
              // }
            }
        });
    });
});
</script>
