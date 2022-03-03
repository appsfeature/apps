<?php $this->load->view('admin/header'); ?>


  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/home';?>">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
            <?php if(isVisibleDashboardMenu('AdminPannel') == true) {?>
                <div class="col-md-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                           <h3 class="card-title">Admin Pannel</h3>
                        </div>
                        <div class="card-body">
                          <div class="row">
                              <!-- Box Account start -->
                              <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                  <div class="inner ml-2">
                                    <h3><?php echo count($accounts) ?></h3>
                                    <h4>Accounts</h4>
                                  </div>
                                  <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                  </div>
                                  <a href="<?php echo base_url().getMenuLink('admin/account/list');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                              </div>
                              <!-- Box Account end -->

                          </div>

                        </div>
                    </div>
                </div>
            <?php } ?>

            <div class="col-md-12">
                <div class="card card-secondary">
                <div class="card-header">
                   <h3 class="card-title">User Pannel</h3>
                </div>
                <div class="card-body text-left" style="height:450px">
                  <div class="row">
                      <!-- Box Category start -->
                      <?php if(isVisibleDashboardMenu('Categories') == true) {?>
                        <div class="col-lg-3 col-6">
                          <!-- small box -->
                          <div class="small-box bg-info">
                            <div class="inner ml-2" >
                              <h3><?php echo count($categories) ?></h3>

                              <h4><?php echo getMenuTitle('Categories');?></h4>
                            </div>
                            <div class="icon">
                              <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="<?php echo base_url().getMenuLink('admin/category/list');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                          </div>
                        </div>
                      <?php } ?>
                      <!-- Box Category end -->

                      <!-- Box Content start -->
                      <?php if(isVisibleDashboardMenu('Contents') == true) {?>
                          <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                              <div class="inner ml-2">
                                <h3><?php echo count($contents) ?></h3>

                                <h4><?php echo getMenuTitle('Contents');?></h4>
                              </div>
                              <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                              </div>
                              <a href="<?php echo base_url().getMenuLink('admin/content/list');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                          </div>
                      <?php } ?>
                      <!-- Box Content end -->


                  </div>

                </div>
            </div>
            </div>
        </div>
      </div>

    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('admin/footer'); ?>
