<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<!--   <section class="content-header">
        <h1>
            Agent Hour Summary Report
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item active">Agent Hour Summary Report</li>
        </ol>
    </section>-->

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Agent Hour Summary Report</h3>

                <!--                <ul class="box-controls pull-right">
                                    <li><a class="box-btn-close" href="#"></a></li>
                                </ul>-->
                <div class="box-controls pull-right">
                    <style>
                        .box-btn-fullscreen::before{
                            content:'';
                        }
                    </style>
                    <a href="javascript:void(0);" title="Full Screen" class="box-btn-fullscreen btn btn-danger" style="margin-left:10px;"><i class="fa fa-expand" style="margin-top:4px;"></i></a>
                    <button type="button" class="btn btn-primary pull-right" id="daterange-btn">
                        <span>
                            <i class="fa fa-calendar"></i> Date Range Picker
                        </span>
                        <i class="fa fa-caret-down"></i>
                    </button>

                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive">

                </div>
            </div>
            <!-- /.box-body -->
            <!--            <div class="box-footer">
                            Footer
                        </div>-->
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
