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
                  <form name="categoryForm" id="categoryForm" action=""  method="post" enctype="multipart/form-data">

                    <input type="hidden" name="pkg_id" access="false" id="pkg_id" value="<?php echo isset($_SESSION['admin']['pkg_id'])?$_SESSION['admin']['pkg_id']:''; ?>">
                    <input type="hidden" name="" value="">

                    <div class="row categorybx">
                        <div class="col-sm-12">
                            <div class="col-sm-4 mb-3">
                                <label for="sub_cat_id" class="formbuilder-number-label">Sub Category</label>
                                <select class="form-control selectClass" name="sub_cat_id" id="sub_cat_id" >
                                    <option value="0">Select Category</option>
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
    $("#categoryForm").submit(function(e) {
        e.preventDefault();
        $("#submitBtn").prop("disabled", true);

        var formData= new FormData($("#categoryForm")[0]);
        console.log('my message' + formData);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url().'admin/category/create' ?>",
            data: formData,
            processData: false,
            contentType: false,
            encode: true,
        }).done(function(data) {

            var successURL = "<?php echo base_url().$CI->module_url_list ?>";
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

<script type="text/javascript">
    $(function(){


        $(document).on("change", ".selectClass", function(){
            var index= $(this).index(".selectClass");
            var catboxlen=$(".selectClass").length;

            if(index<catboxlen)
            {
                for (var i = index; i < catboxlen; i++) {
                    $(".categorybx .col-sm-12").eq(i+1).remove();
                }
            }


            var parentcatId= $(this).val();

            $.ajax({
                type: "POST",
                url: "<?php echo base_url().version_prefix.'database/fetchChildCategories' ?>",
                data: {parentcatId:parentcatId},

            }).done(function(result) {

                var data= result.data;


                var html='';

                if(result.data.length)
                {



                    html+='<div class="col-sm-12">';
                    html+='<div class="col-sm-4 mb-3">';
                    html+='<label for="sub_cat_id" class="formbuilder-number-label">Sub Category</label>';
                    html+='<select class="form-control selectClass" name="sub_cat_id" id="sub_cat_id">';
                    html+='<option value="0">Select category</option>';

                    for (var i = 0; i < data.length; i++) {
                        html+='<option value="'+data[i]['cat_id']+'">'+data[i]['title']+'</option>';

                    }


                    html+='</select></div></div>';

                    $(".categorybx").append(html);

                }


            });
        });
    });
</script>
