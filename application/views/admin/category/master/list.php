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

                      <select class="form-control ml-3" name="cat_id" id="cat_id">
                          <option value="">Select Category</option>
                          <?php
                              if(!empty($categories)){
                                  foreach ($categories as $item) {
                                      $selected = ($catIdSelected == $item['cat_id']) ? true : false;
                                       ?>
                                       <option <?php echo set_select('cat_id', $item['cat_id'], $selected); ?> value="<?php echo $item['cat_id'];?>"><?php echo $item['title'];?></option>
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

                      <select class="form-control ml-3" name="sub_cat_id" id="sub_cat_id">
                          <option value="">Select Sub Category</option>
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
                      <div class="input-group-append">
                        <button class="input-group-text" id="basic-addon1">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>

                    </div>
                  </form>
                </div>
                <div class="card-tools">
                  <a href="<?php echo base_url().$CI->module_url_mapping; ?>" class="btn btn-primary"><i class="fas fa-plus"></i>  Mapping</a>
                </div>
              </div>

              <div class="card-body">
                  <table class="table">
                    <tr>
                      <th width="100" class="text-center">Id</th>
                      <th width="200" class="text-center">CatId</th>
                      <th width="200" class="text-center">SubCatId</th>
                      <th></th>
                      <th width="160" class="text-center">Action</th>
                    </tr>

                    <?php if(!empty($categoriesMaster)) {?>
                        <?php foreach ($categoriesMaster as $itemRow) {?>
                            <tr>
                              <td class="text-center"><?php echo $itemRow['id'];?></td>
                              <td class="text-center" ><p style="font-size:13px"><?php echo isset($categoryMap[$itemRow['cat_id']]) ? $categoryMap[$itemRow['cat_id']].'</br>'.$itemRow['cat_id'].'' : 'No Parent</br>'.$itemRow['cat_id'];?></p></td>
                              <td class="text-center"><p style="font-size:13px"><?php echo isset($categoryMap[$itemRow['sub_cat_id']]) ? $categoryMap[$itemRow['sub_cat_id']].'</br>'.$itemRow['sub_cat_id'].'' : 'No Parent</br>'.$itemRow['sub_cat_id'];?></p></td>
                              <td></td>
                              <td class="text-center">
                                  <a href="<?php echo base_url().$CI->module_url_editmaster.'/'.$itemRow['id']; ?>" class="btn btn-primary btn-sm">
                                    <i class="far fa-edit"></i> Edit
                                  </a>
                                  <a href="javascript:void(0);" onclick="deleteRowMaster(<?php echo $itemRow['id']; ?>)" class="btn btn-danger btn-sm">
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

<script type="text/javascript">
    if('<?php echo $this->session->flashdata('success'); ?>' != ""){
        showToast(true, "<?php echo $this->session->flashdata('success'); ?>");
    }
    if('<?php echo $this->session->flashdata('error'); ?>' != ""){
        showToast(false, "<?php echo $this->session->flashdata('error'); ?>");
    }
</script>

<script type="text/javascript">
    function deleteRowMaster(id) {
        if(confirm("Are you sure you want to delete category?")){
            window.location.href='<?php echo base_url().$CI->module_url_deletemaster.'/'; ?>' + id;
        }
    }
</script>
