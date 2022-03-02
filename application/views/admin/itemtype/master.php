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

                   <div class="row categorybx">
                       <div class="col-sm-12 mb-3">
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

    $( ".container_to_load" ).load( "<?php echo base_url().'admin/itemtype/attachFragmentList' ?>" );


    $("#categoryForm").submit(function(e) {
        e.preventDefault();
        $("#submitBtn").prop("disabled", true);

        var formData= new FormData($("#categoryForm")[0]);
        formData.append('sub_cat_ids', formData.getAll('sub_cat_id'));

        $.ajax({
            type: "POST",
            url: "<?php echo base_url().version_prefix.'database/insert_category' ?>",
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
                // $("[name='item_type']").val(0);

                $( ".container_to_load" ).load( "<?php echo base_url().'admin/itemtype/attachFragmentList' ?>" );
              // if(successURL!==null) {
              //   window.location.href=successURL;
              // }
            }
        });
    });
});
</script>
