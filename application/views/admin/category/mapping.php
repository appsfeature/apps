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
                     <div class="formbuilder-button form-group field-">
                        <button type="submit" class="btn-success btn ml-2 mr-4" name="submit" access="false" style="success" id="submitBtn"><i class="fa fa-plus"> Create</i></button>

                        <button type="mapping" class="btn-info btn ml-3 mr-4" name="mapping" access="false" style="success" id="mappingBtn"><i class="fa fa-link"> Mapping</i></button>

                        <button type="view" class="btn-danger btn ml-3" name="view" access="false" style="success" id="viewBtn"><i class="fa fa-eye"> View</i></button>
                    </div>
                  
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
<?php $this->load->view('admin/scripts/categorymapping'); ?>
