<div class="content-wrapper" style="display:none;" id="CallDetailListings">
  <?php if(isset($agent_data) && $agent_data['agent_screen'] == 'screen2') { ?>
    <section class="content">
        <div class="row">
            <div class="box">
                <div class="with-border">
                    <div class="panel-heading">
                        <div class="panel-title"> <span class="fa fa-user"></span>Contact Hub</div>
                        <ul class="nav panel-tabs nav-tabs mr-2" role="tablist">
                <li class="nav-item">
				<a class="nav-link active" id="tab-1" data-toggle="tab" href="#tab1" role="tab" aria-controls="home" aria-selected="true">Customer Information</a>
                </li>
                <?php if($HideCustomerCallHistory == 'N'){?>
                <li class="nav-item" onclick="CustomerCallHistory();">
				<a class="nav-link" id="tab-3" data-toggle="tab" href="#tab3" role="tab" aria-controls="home" aria-selected="true">Customer Call History</a>
                </li>
                <?php }?>
                <?php if(!empty($web_form_address) && strlen($web_form_address) > 1){?>
                 <li class="nav-item WebFormLink" link-src="">
				<a class="nav-link" id="tab-2" data-toggle="tab" href="#tab2" role="tab" aria-controls="home" aria-selected="true">WebForm</a>
                 </li>
                <?php }?>
              </ul>
<!--                        <ul class="nav panel-tabs">
                            <li class="mr10 WebformONCall">Webform</li>
                            <li class="mr10 LeadDetailONCall" style="display:none;">Lead</li>
                        </ul>-->
                    </div>
                </div>
                <div class="tab-content" id="nav-tabContent">
            <!-- /.box-header -->
			<div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab-1">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="bg-tab" id="InboundBackgroundColor">
                        <div class="d-table-cell align-bottom ">

                        </div>
                    </div>

                    <!-- /.box -->

                    <div class="row">
                      <?php if($call_tags || $call_timer) { ?>
                        <div class="col-12 col-lg-4 mt-4">
                            <div class="box">
                                <div class="box-body">
                                  <?php if($call_tags) { ?>
                                    <h2> Tags</h2>
                                    <div class="border-bottom"></div>
                                    <div class="TagList-Section">
                                        <div class="alert alert-danger mt-4">
                                            <p>  <strong> NO Tags ! </strong>have been applied to this lead </p>
                                        </div>
                                    </div>
                                    <?php } if($call_timer) { ?>
                                    <div class="call-timer mt-26">
                                        <h4> Call Timer</h4>
                                        <div class="border-bottom"></div>
                                        <div id="CallCountUPTimer"></div>
                                    </div>
                                  <?php } ?>
                                    <!--Timer -->

                                    <!--Timer -->
                                </div>
                            </div>
                        </div>
                      <?php } ?>


                      <?php if($call_tags || $call_timer) { ?>
                        <div class="col-lg-8 col-12 mt-4">
                      <?php } else { ?>
                        <div class="col-lg-12 col-12 mt-4">
                      <?php } ?>
                            <div class="tab-content">
                                <div class="tab-pane active" id="home1" role="tabpanel">
                                    <div class="pad pt-0">
                                         <?php require 'elements/lead-detail2.php'; ?>
                                         <?php require 'elements/email-detail.php'; ?>
                                         <?php require 'elements/chat-detail.php'; ?>
                                    </div>
                                </div>


                            </div>

                            <!-- /.nav-tabs-custom -->
                        </div>
                        <!-- /.col -->

                    </div>
                </div>
                </div>
		  <!-- Tab 2 -->

		  <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab-2">
                    <div id="WebformONCall">
                        <iframe src="" width="100%"></iframe>
                    </div>
		  </div>

		  <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab-3">
                    <div id="CustomerHistoryListings">

                    </div>
		  </div>

                <!-- /.box-body -->
            </div>




        </div>
        <!-- /.row -->

    </section>
  <?php } else { ?>
    <section class="content" id="CallDetail-ALL">
        <div class="row">
            <div class="box">
                <div class="with-border">
                    <div class="panel-heading" id="InboundBackgroundColor">
                        <div class="panel-title"> <span class="fa fa-user"></span>Contact Hub</div>
                        <ul class="nav panel-tabs nav-tabs mr-2" role="tablist">
                <li class="nav-item">
				<a class="nav-link active" id="tab-1" data-toggle="tab" href="#tab1" role="tab" aria-controls="home" aria-selected="true">Customer Information</a>
                </li>
                <?php if($HideCustomerCallHistory == 'N'){?>
                <li class="nav-item" onclick="CustomerCallHistory();">
				<a class="nav-link" id="tab-3" data-toggle="tab" href="#tab3" role="tab" aria-controls="home" aria-selected="true">Customer Call History</a>
                </li>
                <?php }?>
                <?php if(!empty($web_form_address) && strlen($web_form_address) > 1){?>
                 <li class="nav-item WebFormLink" link-src="">
				<a class="nav-link" id="tab-2" data-toggle="tab" href="#tab2" role="tab" aria-controls="home" aria-selected="true">WebForm</a>
                 </li>
                <?php }?>
              </ul>
<!--                        <ul class="nav panel-tabs">
                            <li class="mr10 WebformONCall">Webform</li>
                            <li class="mr10 LeadDetailONCall" style="display:none;">Lead</li>
                        </ul>-->
                    </div>
                </div>
                <div class="tab-content" id="nav-tabContent">
            <!-- /.box-header -->
			<div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab-1">
                <!-- /.box-header -->
                <div class="box-body">

                    <!-- /.box -->

                    <div class="row">
                      <?php if($call_tags || $call_timer) { ?>
                        <div class="col-12 col-lg-12">
                            <div class="box" style="margin-bottom: 0px">
                                <div class="box-body">
                                  <div class="row">
                                    <?php if($call_tags) { ?>
                                    <div class="col-lg-6">
                                      <h4> Tags</h4>
                                      <div class="border-bottom"></div>
                                      <div class="TagList-Section">
                                          <div class="alert alert-danger mt-4">
                                              <p>  <strong> NO Tags ! </strong>have been applied to this lead </p>
                                          </div>
                                      </div>
                                    </div>
                                  <?php } if($call_timer) { ?>
                                    <div class="col-lg-6">
                                      <div class="call-timer">
                                          <h4> Call Timer</h4>
                                          <div class="border-bottom"></div>
                                          <div id="CallCountUPTimer"></div>
                                      </div>
                                    </div>
                                  <?php } ?>
                                  </div>
                                    <!--Timer -->

                                    <!--Timer -->
                                </div>
                            </div>
                        </div>
                      <?php } ?>


                        <div class="col-lg-12 col-12">
                            <div class="tab-content">
                                <div class="tab-pane active" id="home1" role="tabpanel">
                                    <div class="pad pt-0">
                                         <?php require 'elements/lead-detail.php'; ?>
                                         <?php require 'elements/email-detail.php'; ?>
                                         <?php // require 'elements/chat-detail.php'; ?>
                                    </div>
                                </div>


                            </div>

                            <!-- /.nav-tabs-custom -->
                        </div>
                        <!-- /.col -->

                    </div>
                </div>
                </div>
		  <!-- Tab 2 -->

		  <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab-2">
                    <div id="WebformONCall">
                        <iframe src="" width="100%"></iframe>
                    </div>
		  </div>

		  <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab-3">
                    <div id="CustomerHistoryListings">

                    </div>
		  </div>

                <!-- /.box-body -->
            </div>




        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->

    <?php require 'chat-detail_new.php'; ?>
  <?php } ?>

    <!-- Main content -->
</div>
