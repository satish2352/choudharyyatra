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
         
            <form method="post" enctype="multipart/form-data" id="edit_stationary" action="<?php echo $module_url_path;?>/add_stock/<?php $aid=base64_encode($arr_data['id']); 
					   echo rtrim($aid, '='); ?>">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="hidden" disabled class="form-control" name="stationary_id" id="stationary_id" placeholder="Enter Stationary ID" value="<?php echo $arr_data['id']; ?>" />

                          <label>Stationary Name <span class="req_field">*</span></label>
                          <input type="text" readonly class="form-control" name="stationary_name" id="stationary_name" placeholder="Enter Stationary Name" required="required" value="<?php echo $arr_data['stationary_name']; ?>" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');"/>
                          <input type="hidden" class="form-control" name="stationary_id" id="stationary_id" placeholder="Enter Stationary Name" required="required" value="<?php echo $arr_data['id']; ?>" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');"/>
                      </div>
                    </div>
                    
                    <div class="col-md-6">
                      <div class="form-group">
                          <label>Stationary Quantity <span class="req_field">*</span></label>
                          <input type="text" class="form-control" name="stationary_quantity" id="stationary_quantity" placeholder="Enter Stationary Quantity" required="required" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"/>
                      </div>
                    </div>

                    <div class="col-md-6">
                          <div class="form-group">
                            <label>Financial Year <span class="req_field">*</span></label>
                            <select class="form-control" style="width: 100%;" name="financial_year" id="financial_year" required="required">
                                <option value="">Select Year</option>
                                <?php
                                   foreach($academic_years_data as $academic_years_arr_data) 
                                   { 
                                ?>
                                   <option value="<?php echo $academic_years_arr_data['id']; ?>" ><?php echo $academic_years_arr_data['year']; ?></option>
                               <?php } ?>
                              </select>
                          </div>
                      </div>

                    <div class="col-md-6">
                      <label>Is It Series Item <span class="req_field">*</span></label>
                      <div class="form-group">
						  
                        <?php if($arr_data['series_yes_no'] == 'Yes') { ?>
                          <input type="radio" id="Yes" name="series_yes_no" value="Yes"
                          <?php if($arr_data['series_yes_no'] == 'Yes'){echo "checked";} ?>> &nbsp;
                          <label for="html">Yes</label>  &nbsp; &nbsp; 
                          <input type="radio" id="No" name="series_yes_no" value="No" disabled <?php if($arr_data['series_yes_no'] == 'No'){echo "checked";} ?>> &nbsp;
                          <label for="html">No</label><br>
						  <?php } else{ ?>
						  <input type="radio" id="Yes" name="series_yes_no" value="Yes" disabled
                          <?php if($arr_data['series_yes_no'] == 'Yes'){echo "checked";} ?>> &nbsp;
                          <label for="html">Yes</label>  &nbsp; &nbsp; 
                          <input type="radio" id="No" name="series_yes_no" value="No" <?php if($arr_data['series_yes_no'] == 'No'){echo "checked";} ?>> &nbsp;
                          <label for="html">No</label><br>
						  <?php } ?>
						  
                      </div>
                    </div>
					  
                    <?php if($arr_data['series_yes_no'] == 'Yes') { ?>
                    <div class="col-md-3 if_series_yes_div">
                      <div class="form-group">
                          <label>From Series <span class="req_field">*</span></label>
                          <input type="text" class="form-control" name="from_series" id="from_series" placeholder="Enter from series" required="required" value="<?php echo $last_series;?>" readonly/>
                      </div>
                    </div>
					  
                    <div class="col-md-3 if_series_yes_div">
                      <div class="form-group">
                          <label>To Series <span class="req_field">*</span></label>
                          <input type="text" class="form-control" name="to_series" id="to_series" placeholder="Enter to series" required="required" />
                      </div>
                    </div>
                    <?php }?>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label>Remark (Optional)</label>
                          <textarea class="form-control" name="stationary_remark" id="stationary_remark" placeholder="Enter Stationary Remark"></textarea>
                      </div>
                    </div>
                    <?php if($arr_data['series_yes_no'] == 'Yes') { ?>
                    <div class="col-md-3 if_series_yes_div">
                      <div class="form-group">
                          <label>Pages Per Book <span class="req_field">*</span></label>
                          <input type="text" class="form-control if_series_yes_no" name="pages_per_book" id="pages_per_book" placeholder="Enter pages per book" required="required" />
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit" id="submit_slider">Submit</button>
				  <a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger">Cancel</button></a>
                </div>
              </form>
              <?php //} ?>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  


