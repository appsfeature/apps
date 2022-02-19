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
              <li class="breadcrumb-item active">Create New Category</li>
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
                    Create New Category
                </div>

              </div>

              <div class="card-body">
                  <form name="categoryForm" id="categoryForm" action=""  method="post" >

                    <input type="hidden" name="pkg_id" access="false" id="pkg_id" value="<?php echo isset($_SESSION['admin']['pkg_id'])?$_SESSION['admin']['pkg_id']:''; ?>">

                    <div class="row categorybx">
                        <div class="col-sm-12">
                            <div class="col-sm-4 mb-3">
                                <label for="sub_cat_id" class="formbuilder-number-label">Sub Category</label>
                                <select class="form-control selectClass" name="sub_cat_id" id="sub_cat_id" >
                                    <option value="">Select Category</option>
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
                    <!-- <a href="<?php echo base_url().$CI->module_url_create.'/'; ?><?php echo $_POST['sub_cat_id']; ?>" class="btn btn-primary btn-md">
                        <i class="create"></i> Create
                    </a> -->
                     <div class="formbuilder-button form-group field-">
                        <button type="submit" class="btn-success btn ml-2 mr-4" name="submit" access="false" style="success" id="submitBtn"><i class="fa fa-plus"> Create</i></button>

                        <button type="mapping" class="btn-info btn ml-3 mr-4" name="mapping" access="false" style="success" id="mappingBtn"><i class="fa fa-link"> Mapping</i></button>

                        <button type="view" class="btn-danger btn ml-3" name="view" access="false" style="success" id="viewBtn"><i class="fa fa-eye"> View</i></button>
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
    $("#submitBtn").click(function(e) {
        e.preventDefault();
        // $("#submitBtn").prop("disabled", true);

        var formData= new FormData($("#categoryForm")[0]);
        // for (var pair of formData.entries()) {
        //     console.log(pair[0]+ ', ' + pair[1]);
        // }
        var subCatIds = formData.getAll("sub_cat_id");
        console.log('subCatIds:' + subCatIds);

        var subCatId = null;
        if(subCatIds != null && subCatIds.length > 0){
            for (var i = 0; i < subCatIds.length; i++) {
                if(subCatIds[i] != null && subCatIds[i] != ''){
                    subCatId = subCatIds[i];
                }
            }
        }
        // var postSubCatId = "<?php echo isset($_POST['sub_cat_id'])?$_POST['sub_cat_id']:'' ?>";
        // console.log('postSubCatId:' + postSubCatId);

        var createUrl = "<?php echo base_url().$CI->module_url_create.'/'; ?>" + subCatId;
        // var createUrl = "<?php echo base_url().$CI->module_url_create.'/'; ?>" + "<?php echo isset($_POST['sub_cat_id'])?$_POST['sub_cat_id']:'' ?>";

        // console.log('Log: ' + createUrl);
        window.location.href=createUrl;

    });
});
</script>

<script type = "text/javascript" >
    $(function() {

        $(document).on("change", ".selectClass", function() {
            var index = $(this).index(".selectClass");
            var catboxlen = $(".selectClass").length;

            if (index < catboxlen) {
                for (var i = index; i < catboxlen; i++) {
                    $(".categorybx .col-sm-12").eq(i + 1).remove();
                }
            }

            var formData= new FormData($("#categoryForm")[0]);
            // console.log('my message' + formData.get('pkg_id'));
            var subCatId = $(this).val();
            var pkgId = formData.get('pkg_id');

            $.ajax({
                type: "POST",
                url: "<?php echo base_url().version_prefix.'database/get-category-by-parent-id' ?>",
                data: {
                    sub_cat_id: subCatId,
                    pkg_id: pkgId
                },

            }).done(function(result) {
                var data = result.data;

                if (data != null && result.data.length) {
                    var html = '<div class="col-sm-12">' +
                        '<div class="col-sm-4 mb-3">' +
                        '<label for="sub_cat_id" class="formbuilder-number-label">Sub Category</label>' +
                        '<select class="form-control selectClass" name="sub_cat_id" id="sub_cat_id">' +
                        '<option value="">Select category</option>';

                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i]['cat_id'] + '">' + data[i]['title'] + '</option>';
                    }

                    html += '</select></div></div>';

                    $(".categorybx").append(html);

                }
            });
        });
    });
</script>
