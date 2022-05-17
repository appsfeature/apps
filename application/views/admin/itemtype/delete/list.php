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
              <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/home';?>">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $CI->module_title;?></li>
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
            <div class="card">
              <div class="card-header">
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
                <div class="card-tools">
                    <!-- <a href="<?php echo base_url().$CI->module_url_create; ?>" class="btn btn-primary"><i class="fas fa-plus"></i>  Create</a> -->
                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i>  Create</a>
                </div>
              </div>

              <div class="card-body">
                  <table class="table">
                    <tr>
                      <th width="50" class="text-center">Id</th>
                      <th width="100" class="text-center">Flavour</th>
                      <th width="100" class="text-center">ItemType</th>
                      <th>Title</th>
                      <th width="100" class="text-center">Status</th>
                      <th width="160" class="text-center">Action</th>
                    </tr>

                    <?php if(!empty($itemtypes)) {?>
                        <?php foreach ($itemtypes as $itemRow) {?>
                            <tr>
                              <td class="text-center"><?php echo $itemRow['id'];?></td>
                              <td class="text-center"><?php echo $itemRow['flavour'];?></td>
                              <td class="text-center"><?php echo $itemRow['item_type'];?></td>
                              <td><?php echo $itemRow['title'];?></td>

                              <td class="text-center">
                                  <?php if($itemRow['visibility'] == 1) {?>
                                    <span class="badge badge-success">Active</span>
                                  <?php } else { ?>
                                    <span class="badge badge-danger">Block</span>
                                  <?php } ?>
                              </td>

                              <td class="text-center">
                                  <a href="<?php echo base_url().$CI->module_url_edit.'/'.$itemRow['id']; ?>" class="btn btn-primary btn-sm">
                                    <i class="far fa-edit"></i> Edit
                                  </a>
                                  <a href="javascript:void(0);" onclick="deleteItemType('<?php echo $itemRow['id'] ?>')" class="btn btn-danger btn-sm">
                                    <i class="far fa-trash-alt"></i> Delete
                                  </a>
                              </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                      <tr>
                        <td colspan="4">Record not found</td>
                      </tr>
                    <?php } ?>
                  </table>
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


<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create Item</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
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
                  <button style="float: right" type="submit" class="btn-success btn pull-right" name="submit" access="false" style="success" id="submitBtn">Submit</button>
              </div>
            </form>
        </div>



      </div>
    </div>
  </div>

<script type="text/javascript">
    if('<?php echo $this->session->flashdata('success'); ?>' != ""){
        showToast(true, "<?php echo $this->session->flashdata('success'); ?>");
    }
    if('<?php echo $this->session->flashdata('error'); ?>' != ""){
        showToast(false, "<?php echo $this->session->flashdata('error'); ?>");
    }
</script>

<script type="text/javascript">
    function deleteRow(id) {
        if(confirm("Are you sure you want to delete item?")){
            window.location.href='<?php echo base_url().$CI->module_url_delete.'/'; ?>' + id;
        }
    }
</script>

<script type="text/javascript">
$(document).ready(function() {
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
