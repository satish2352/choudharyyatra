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
              <a href="<?php echo $module_url_path; ?>/index"><button class="btn btn-primary">List</button></a>
              
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
            <?php $this->load->view('agent/layout/agent_alert'); ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-5">
                      <div class="form-group">
                        <label>Order Description</label>
                        <div class="input-group">
                          <input type="text" class="form-control" name="order_desc" id="order_desc" placeholder="Enter order description" required="required">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row" id="main_row">

                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Stationary Requirement</label>
                            <div class="input-group">
                                <select class="form-control niceSelect" name="stationary_name[]" id="stationary_name" onfocus='this.size=4;' onblur='this.size=1;' 
                                    onchange='this.size=1; this.blur();' required="required">
                                    <option value="">Select Stationary Requirement</option>

                                    <?php foreach($stationary_data as $stationary){ ?> 
                                    <option value="<?php echo $stationary['id'];?>"><?php echo $stationary['stationary_name'];?></option> 
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                            <div class="form-group">
                                <label>Quantity</label>
                                <div class="input-group">
                                  <input type="number" class="form-control zero_not" name="stationary_qty[]" id="stationary_qty"  onkeyup="my_qty()" placeholder="Enter Quantity" required="required">
                                </div>
                            </div>
                    </div>

                    <div class="col-md-3 mt-4">
                            <div class="form-group">
                                <label></label>
                                <button type="button" class="btn btn-primary" name="submit" value="add_more" id="add_more">Add More Request</button>
                            </div>
                    </div>
                      
                  </div>

                <!-- /.card-body -->
                <div class="card-footer"> 
                  <button type="submit" class="btn btn-primary" id="no_zero"  name="submit" value="submit">Submit</button> 
                  <a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
                </div>
					
              </form>
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
  

</body>
</html>
