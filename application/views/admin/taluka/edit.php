<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $module_title; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="<?php echo $module_url_path; ?>/index"><button class="btn btn-primary">Back</button></a>
              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <?php $this->load->view('admin/layout/admin_alert'); ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php
                   foreach($arr_data as $info) 
                   { 
                     ?>
              <form method="post" enctype="multipart/form-data" id="edit_state">
                <div class="card-body">
                <div class="row">
                <div class="col-md-4">
                          <div class="form-group">
                            <label>Select Country</label>
                            <select class="form-control" style="width: 100%;" name="country_id" id="country_id" required="required">
                                <option value="">Select Country Name</option>
                                <?php
                                   foreach($country_data as $country_name_info) 
                                   { 
                                ?>
                                <option value="<?php echo $country_name_info['id']; ?>" <?php if($country_name_info['id']==$info['country_id']) { echo "selected"; } ?>><?php echo $country_name_info['country_name']; ?></option>
                               <?php } ?>
                              </select>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Select State</label>
                            <select class="form-control" style="width: 100%;" name="state_id" id="state_id" required="required">
                                <option value="">Select State Name</option>
                                <?php
                                   foreach($state_name_data as $state_name_info) 
                                   { 
                                ?>
                                    <option value="<?php echo $state_name_info['id']; ?>" <?php if($state_name_info['id']==$info['state_id']) { echo "selected"; } ?>><?php echo $state_name_info['state_name']; ?></option>
                               <?php } ?>
                              </select>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Select District</label>
                            <select class="form-control" style="width: 100%;" name="district_id" id="district_id" required="required">
                                <option value="">Select District Name</option>
                                <?php
                                   foreach($district_name_data as $district_name_info) 
                                   { 
                                ?>
                                    <option value="<?php echo $district_name_info['id']; ?>" <?php if($district_name_info['id']==$info['district_id']) { echo "selected"; } ?>><?php echo $district_name_info['district']; ?></option>
                               <?php } ?>
                              </select>
                          </div>
                        </div>

                        <div class="col-md-4">
                        <div class="form-group">
                            <label>Taluka Name</label>
                            <input type="text" class="form-control" name="taluka" id="taluka" placeholder="Enter Taluka Name" value="<?php echo $info['taluka']; ?>" required>
                        </div>
                        </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
					<a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button></a>
                </div>
              </form>
              <?php } ?>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

</body>
</html>
