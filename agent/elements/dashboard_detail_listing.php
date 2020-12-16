<div class="content-wrapper" id="DashboardDetailListings">

    <!-- Main content -->
    <section class="content">

        <!--        <div class="row">
                  <div class="col-12">-->

        <div class="bg-tab">
            <div class="d-table-cell align-bottom ">
                <ul class="nav nav-tabs d-flex justify-content-center" role="tablist ">
                    <li class="nav-item"> 
                        <a class="nav-link active" data-toggle="tab" href="#time" role="tab">Time Stats
                        </a> 
                    </li>
                    <?php if($HideAgentCallLogs == 'N'){?>
                    <li class="nav-item"> 
                        <a class="nav-link" data-toggle="tab" href="#callhistory" role="tab"> Call History</a>
                    </li>
                    <?php }?>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#callbacks" role="tab" onclick="CalLBacKsLisTCheck();return false;"> Callbacks</a>
                    </li>
                    <!--<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#leaderboard" role="tab"> Leaderboard</a></li>-->
                    <!--<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#achievements" role="tab"> Achievements</a></li>-->
                </ul>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="time" role="tabpanel">
                <div class="row">

                    <div class="col-12 col-lg-3 mt-4">
                        <div class="box">
                            <div class="box-body">
                                <div class="profile-it bg-warning mx-auto text-center"><?php echo initials($UserDetail['full_name']); ?></div>
                                <div class="contents text-center mt-4">
                                    <p class="h3"><?php echo $UserDetail['full_name']; ?><br>
                                        <span class="h5"><?php echo $UserDetail['user_group']; ?></span></p>
                                        <span class="h5">Campaign : <?php echo $VD_campaign; ?></span></p>
                                </div>
                                <div class="slimScrollDiv">
                                    <div class=" it_admin" style="overflow: hidden; width: auto; height: auto;">
                                        <div>
                                            <!-- Task item -->
                                            <a href="#">
                                                <p>
                                                    <i class="fa fa-clock-o text-green" aria-hidden="true"></i>
                                                    Level <span id="Level-Range">1</span>
                                                    <small class="pull-right"><span id="Level-Percentage">0</span>% Complete</small>
                                                </p>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" id="Level-Bar" style="width:0%" role="progressbar"
                                                         aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">0% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- end task item -->
                                        <div>
                                            <!-- Task item -->
                                            <a href="#">
                                                <p>
                                                    <i class="fa fa-flash text-purple " aria-hidden="true"></i>
                                                    Experience
                                                    <small class="pull-right"><span id="LeaderExperience">0</span>/50</small>
                                                </p>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-danger" id="LeaderBoardEXPerformance" style="width: 20%" role="progressbar"
                                                         aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">0/50</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- end task item -->
                                        <div>
                                            <!-- Task item -->
                                            <a href="javascript:void(0);" id="LeaderBoardStats">
                                                <p>
                                                    <i class="fa fa-tachometer text-warning " aria-hidden="true"></i>
                                                    Leaderboard
                                                    <small class="pull-right" id="LeaderBoardScore">0/0</small>
                                                </p>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-light-blue"  id="LeaderBoardScoreBar" style="width: 70%" role="progressbar"
                                                         aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">0/0</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- end task item -->
                                    </div>
                                    <!--Timer --> 
                                    <div id="CountTimer">
                                        
                                    </div>				  
                                    <!--Timer -->  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-12 mt-4">
                        <div class="row">
                            <div class="col">
                                <h5> <i class="fa fa-clock-o text-green" aria-hidden="true"></i> <span class="font-weight-bold"> Timestats</span></h5>
                            </div>
                        </div>

                        <!--end of row-->
                        <div class="pad">
                            <div class="row">
                                <div class="col-xl-3 col-md-6 col-12">
                                    <div class="box box-body showSingle" target="1" data-action="Talk">
                                        <h6 class="text-uppercase">Talktime</h6>
                                        <div class="flexbox mt-2"> 
                                            <span class="fa fa-phone text-danger font-size-40"></span> 
                                            <span class="font-size-30 TalkDashboard"><?php echo (!empty($Performance['Talk'])) ? $Performance['Talk'] : '00:00:00'; ?></span> 
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-xl-3 col-md-6 col-12">
                                    <div class="box box-body showSingle" target="2" data-action="Wait">
                                        <h6 class="text-uppercase">WaitTime</h6>
                                        <div class="flexbox mt-2"> 
                                            <span class="fa fa-clock-o font-size-40 text-pink"></span> 
                                            <span class="font-size-30 WaitDashboard"><?php echo (!empty($Performance['Wait'])) ? $Performance['Wait'] : '00:00:00'; ?></span> </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <!-- fix for small devices only -->
                                <div class="clearfix visible-sm-block"></div>
                                <div class="col-xl-3 col-md-6 col-12">
                                    <div class="box box-body showSingle" target="3" data-action="Dispo">
                                        <h6 class="text-uppercase">WrapTime</h6>
                                        <div class="flexbox mt-2"> 
                                            <span class="fa fa-clock-o font-size-40 text-primary"></span> 
                                            <span class="font-size-30 DispoDashboard"><?php echo (!empty($Performance['Dispo'])) ? $Performance['Dispo'] : '00:00:00'; ?></span> </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-xl-3 col-md-6 col-12">
                                    <div class="box box-body showSingle" target="4" data-action="Pause">
                                        <h6 class="text-uppercase">Paused Time</h6>
                                        <div class="flexbox mt-2"> 
                                            <span class="fa fa-pause font-size-40 text-success"></span> 
                                            <span class="font-size-30 PauseDashboard"><?php echo (!empty($Performance['Pause'])) ? $Performance['Pause'] : '00:00:00'; ?></span> </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-xl-3 col-md-6 col-12">
                                    <div class="box box-body showSingle" target="5" data-action="Call">
                                        <h6 class="text-uppercase">Calls</h6>
                                        <div class="flexbox mt-2"> 
                                            <span class="fa fa-phone text-warning font-size-40"></span> 
                                            <span class="font-size-30 CallDashboard"><?php echo (!empty($Performance['Calls'])) ? $Performance['Calls'] : 0; ?></span> 
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-xl-3 col-md-6 col-12">
                                    <div class="box box-body showSingle" target="6" data-action="Connect">
                                        <h6 class="text-uppercase">Connects</h6>
                                        <div class="flexbox mt-2"> 
                                            <span class="fa fa-user-plus text-info font-size-40"></span> 
                                            <span class="font-size-30 ConnectDashboard"><?php echo (!empty($Performance['Connects'])) ? $Performance['Connects'] : 0; ?></span> 
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <!-- fix for small devices only -->
                                <div class="clearfix visible-sm-block"></div>
                                <div class="col-xl-3 col-md-6 col-12">
                                    <div class="box box-body showSingle" target="7" data-action="DMC">
                                        <h6 class="text-uppercase">DMCS</h6>
                                        <div class="flexbox mt-2"> 
                                            <span class="fa fa-user-secret font-size-40 text-primary"></span> 
                                            <span class="font-size-30 DMCDashboard"><?php echo (!empty($Performance['DMCs'])) ? $Performance['DMCs'] : 0; ?></span> 
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-xl-3 col-md-6 col-12">
                                    <div class="box box-body showSingle" target="8" data-action="Sale">
                                        <h6 class="text-uppercase">Sales</h6>
                                        <div class="flexbox mt-2"> <span class="fa fa-shopping-cart font-size-40 text-brown"></span> 
                                            <span class=" font-size-30 SaleDashboard"><?php echo (!empty($Performance['Sales'])) ? $Performance['Sales'] : 0; ?></span> 
                                        </div>
                                    </div>
                                </div>
                                <?php if(!empty($_SESSION['CurrentLogin']['License']['CHAT']) && $_SESSION['CurrentLogin']['License']['CHAT'] == 'Active' || $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){?>
                                <div class="col-xl-3 col-md-6 col-12">
                                    <div class="box box-body showSingle" target="8" data-action="Chat">
                                        <h6 class="text-uppercase">Chat</h6>
                                        <div class="flexbox mt-2"> <span class="fa fa-comments font-size-40 text-pink"></span> 
                                            <span class=" font-size-30 ChatDashboard"><?php echo (!empty($Performance['Chat'])) ? $Performance['Chat'] : 0; ?></span> 
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                                 <?php if(!empty($_SESSION['CurrentLogin']['License']['EMAIL']) && $_SESSION['CurrentLogin']['License']['EMAIL'] == 'Active' || $_SESSION['CurrentLogin']['user_group'] == 'ADMIN'){?>
                                <div class="col-xl-3 col-md-6 col-12">
                                    <div class="box box-body showSingle" target="8" data-action="Email">
                                        <h6 class="text-uppercase">Email</h6>
                                        <div class="flexbox mt-2"> <span class="fa fa-envelope-o font-size-40 text-success"></span> 
                                            <span class=" font-size-30 EmailDashboard"><?php echo (!empty($Performance['Email'])) ? $Performance['Email'] : 0; ?></span> 
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                                <!-- /.col -->
                            </div>

                            <div id="div1" class="targetDiv" style="display:none;">

                            </div>	  
                            <div id="div2" class="targetDiv" style="display:none;">

                            </div>
                            <div id="div3" class="targetDiv" style="display:none;">

                            </div>
                            <div id="div4" class="targetDiv" style="display:none;">

                            </div>
                            <div id="div5" class="targetDiv" style="display:none;">

                            </div>
                            <div id="div6" class="targetDiv" style="display:none;">

                            </div>
                            <div id="div7" class="targetDiv" style="display:none;">

                            </div>
                            <div id="div8" class="targetDiv" style="display:none;">

                            </div> 
                        </div>
                        <!--end of pad-->

                        <!-- /.nav-tabs-custom -->
                    </div>


                    <!--end of col-lg-9-->
                </div>
                <!-- /.row -->
            </div>
            <?php if($HideAgentCallLogs == 'N'){?>
            <!-- Tab callhistory Content -->
            <div class="tab-pane" id="callhistory" role="tabpanel"> 
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title"><i class="fa fa-list"></i> Call History</h4>

                        <div class="box-controls pull-right"> 
                        <a type="button" id="daterange-btn">
                                            <span>
                                              <i class="fa fa-calendar text-success"></i> Date Range Picker
                                            </span>
                                            <i class="fa fa-caret-down"></i>
                                          </a>
                        </div>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body CallHistoryData">

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box --> 
            </div>
            <!-- Tab callbacks Content -->
            <?php }?>
            <div class="tab-pane" id="callbacks" role="tabpanel">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title"><i class="fa fa-list"></i> Callbacks</h4>

                        <div class="box-controls pull-right"> 
                        <a type="button" id="daterange-btn-callback">
                                            <span>
                                              <i class="fa fa-calendar text-success"></i> Date Range Picker
                                            </span>
                                            <i class="fa fa-caret-down"></i>
                                          </a>
                        </div>
                        <!-- <div class="box-controls pull-right"> 
                            <span class="border-left pl-4"><i class="fa fa-refresh text-success"></i></span>
                        </div> -->

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-striped" id="CallBackList-listings-dashboard">
                            <thead class="bg-success">
                                <tr>
                                    <th>Date</th>
                                    <th>Number</th>
                                    <th>Name</th>
                                    <th>Comments</th>
                                    <th>Status</th>
                                    <th>Campaign</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table> 	
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- Tab leaderboard Content -->
            <div class="tab-pane" id="leaderboard" role="tabpanel">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-list"></i> Leaderboard</h3>

                        <div class="box-controls pull-right"> 
                            <span class="border-left pl-4"><i class="fa fa-refresh text-success"></i></span>

                        </div>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <div class="dataTables_wrapper">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">

                                        <div class="dataTables_length">
                                            <label>Show 
                                                <select name="example5_length" aria-controls="example5" class="form-control form-control-sm">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select> 
                                                entries</label>
                                        </div>
                                    </div>			
                                    <div class="col-sm-12 col-md-6">
                                        <div id="example5_filter" class="dataTables_filter">
                                            <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example5"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <table id="example5" class="table table-bordered table-striped dataTable">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th class="sorting">Date</th>
                                        <th class="sorting">Number</th>
                                        <th class="sorting">Main/Alt</th>
                                        <th class="sorting">Nmae</th>
                                        <th class="sorting">Comments</th>
                                        <th class="sorting">Status</th>
                                        <th class="sorting">Campaign</th>
                                        <th class="sorting">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>24/10/2019</td>
                                        <td>989999999</td>
                                        <td>Edinburgh</td>
                                        <td>Test Name</td>
                                        <td>Comments</td>
                                        <td>Active</td>
                                        <td>Campaign</td>
                                        <td> <button type="button" class="btn btn-sm btn-toggle btn-primary active" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                <div class="handle"></div>
                                            </button></td>
                                    </tr>


                            </table>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="example6_info" role="status" aria-live="polite">
                                    Showing 1 to 10 of 20 entries</div>
                            </div>				
                            <div class="col-sm-12 col-md-7 ">
                                <div class="dataTables_paginate paging_simple_numbers pull-right"  >
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled" >
                                            <a href="#"  class="page-link">Previous</a>
                                        </li>
                                        <li class="paginate_button page-item active">
                                            <a href="#"  class="page-link">1</a>
                                        </li>
                                        <li class="paginate_button page-item ">
                                            <a href="#"  class="page-link">2</a>
                                        </li>
                                        <li class="paginate_button page-item ">
                                            <a href="#"  class="page-link">3</a>
                                        </li>
                                        <li class="paginate_button page-item ">
                                            <a href="#"  class="page-link">4</a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- Tab achievements Content -->
            <div class="tab-pane" id="achievements" role="tabpanel">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-list"></i> Achievements</h3>

                        <div class="box-controls pull-right"> 
                            <span class="border-left pl-4"><i class="fa fa-refresh text-success"></i></span>

                        </div>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <div class="dataTables_wrapper">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">

                                        <div class="dataTables_length">
                                            <label>Show 
                                                <select name="example5_length" aria-controls="example5" class="form-control form-control-sm">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select> 
                                                entries</label>
                                        </div>
                                    </div>			
                                    <div class="col-sm-12 col-md-6">
                                        <div id="example5_filter" class="dataTables_filter">
                                            <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example5"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="example6_info" role="status" aria-live="polite">
                                    Showing 1 to 10 of 20 entries</div>
                            </div>				
                            <div class="col-sm-12 col-md-7 ">
                                <div class="dataTables_paginate paging_simple_numbers pull-right"  >
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled" >
                                            <a href="#"  class="page-link">Previous</a>
                                        </li>
                                        <li class="paginate_button page-item active">
                                            <a href="#"  class="page-link">1</a>
                                        </li>
                                        <li class="paginate_button page-item ">
                                            <a href="#"  class="page-link">2</a>
                                        </li>
                                        <li class="paginate_button page-item ">
                                            <a href="#"  class="page-link">3</a>
                                        </li>
                                        <li class="paginate_button page-item ">
                                            <a href="#"  class="page-link">4</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>