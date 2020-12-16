<?php
$query = "SELECT * FROM vicidial_closer_log VCL JOIN vicidial_list VL ON VL.lead_id = VCL.lead_id WHERE VCL.comments='EMAIL' AND VCL.lead_id = '" . $_GET['lead_id'] . "' AND VCL.uniqueid = '" . $_GET['U_ID'] . "'";

$data = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);

$EmailHead = $database->get('vicidial_email_list', '*', ['lead_id' => $_GET['lead_id']]);

$query1 = "SELECT VEL.lead_id,VEL.user,VEL.email_date,VEL.email_to,VEL.message,VU.full_name,VU.user_group FROM vicidial_email_log VEL JOIN vicidial_users VU ON VU.user=VEL.user WHERE VEL.lead_id='".$_GET['lead_id']."'";
$EmailThread = $database->query($query1)->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="box">
                    <div class="with-border">
                        <div class="panel-heading">
                            <div class="panel-title"> <span class="fa fa-envelope-o"></span>Email Details</div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="box">
                                    <div class="box-header bg-lighter">
                                        <h3 class="box-title">Lead Details</h3>
                                    </div>
                                    <div>
                                        <div class="contact-page-aside">
                                            <ul class="list-style-none font-size-16">
                                                <?php foreach ($data as $listings) { ?>
                                                    <li><a href="javascript:void(0)"><i class="fa fa-bullhorn"></i> Lead ID <span class=""><?php echo $listings['lead_id']; ?></span></a></li>
                                                    <li><a href="javascript:void(0)"><i class="fa fa-user"></i> Agent ID <span class=""><?php echo $listings['user']; ?></span></a></li>
                                                    <li><a href="javascript:void(0)"><i class="fa fa-calendar"></i> Call Date <span class=""><?php echo date('Y-m-d',strtotime($listings['call_date'])); ?></span></a></li>
                                                    <li><a href="javascript:void(0)"><i class="fa fa-clock-o"></i> Call Time <span class=""><?php echo date('H:i:s A',strtotime($listings['call_date'])); ?></span></a></li>
                                                    <li><a href="javascript:void(0)"><i class="fa fa-list-alt"></i> Email Group <span class=""><?php echo $listings['campaign_id']; ?></span></a></li>
                                                    <li><a href="javascript:void(0)"><i class="fa fa-clock-o"></i> Length <span class=""><?php echo $listings['length_in_sec']; ?> SEC</span></a></li>
                                                    <li><a href="javascript:void(0)"><i class="fa fa-envelope-o"></i> Email <span class=""><?php echo $listings['email']; ?></span></a></li>
                                                    <li><a href="javascript:void(0)"><i class="fa fa-list"></i> List ID <span class=""><?php echo $listings['list_id']; ?></span></a></li>
                                                    <li><a href="javascript:void(0)"><i class="fa fa-shopping-bag"></i> Status <span class=""><?php echo $listings['status']; ?></span></a></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                               
                                <div class="box direct-chat">
                                    <div class="box-header with-border bg-lighter">
                                        <h3 class="box-title">Subject : <?php echo $EmailHead['subject'];?></h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <!-- Conversations are loaded here -->
                                        <div class="box bg-transparent no-border no-shadow">
<!--				<div class="box-header with-border">
				  <h3 class="box-title">Subject : <?php echo $EmailHead['subject'];?></h3>
				</div>-->
				<!-- /.box-header -->
				<div class="box-body b-1">
				
				
				  
				  <div class="mailbox-read-info clearfix">
					<div class="left-float margin-r-5"><a href="#"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTz6uqB_l7Mv7W491JWjnk0P7IncUQqzdSbWf8swUbZmqZdDeD3Aw&s" alt="user" width="40" class="rounded-circle"></a></div>
					<h5 class="no-margin"><?php echo $EmailHead['email_from_name'];?><br>
						 <small>From: <?php echo $EmailHead['email_from'];?></small>
					  <span class="mailbox-read-time pull-right"><?php echo date('d M. Y H:i A',strtotime($EmailHead['email_date']));?></span></h5>
				  </div>
				  <!-- /.mailbox-read-info -->
				  <div class="mailbox-controls with-border clearfix mt-15">                
					<div class="left-float">
					  <button type="button" class="btn btn-outline btn-sm" data-toggle="tooltip" title="" data-original-title="Print">
					  <i class="fa fa-print"></i></button>
					</div>
					<div class="right-float">
					<div class="btn-group">
					  <button type="button" class="btn btn-outline btn-sm" data-toggle="tooltip" data-container="body" title="" data-original-title="Delete">
						<i class="fa fa-trash-o"></i></button>
					  <button type="button" class="btn btn-outline btn-sm" data-toggle="tooltip" data-container="body" title="" data-original-title="Reply">
						<i class="fa fa-reply"></i></button>
					  <button type="button" class="btn btn-outline btn-sm" data-toggle="tooltip" data-container="body" title="" data-original-title="Forward">
						<i class="fa fa-share"></i></button>
					</div>
					</div>
					<!-- /.btn-group -->

				  </div>
				  <!-- /.mailbox-controls -->
				  <div class="mailbox-read-message">
					<?php echo nl2br($EmailHead['message']);?>
				  </div>
                                  
                                  <?php if(!empty($EmailThread) && count($EmailThread) > 0){?>
                                        <div class="box p-15"> 
                                            <div class="timeline timeline-single-column">
                                                <?php foreach($EmailThread as $thread){?>
                                                <div class="timeline-item">
                                                        <div class="timeline-point timeline-point-info">
                                                                <i class="ion ion-chatbubble-working"></i>
                                                        </div>
                                                        <div class="timeline-event">
                                                                <div class="timeline-heading">
                                                                        <h4 class="timeline-title"><a href="javascript:void(0);"><?php echo $thread['user'];?></a><small> <?php echo $thread['full_name'].' - '.$thread['user_group'];?></small></h4>
                                                                </div>
                                                                <div class="timeline-body">
                                                                        <?php echo $thread['message'];?>									
                                                                </div>
                                                            <div class="timeline-footer" style="margin-bottom:30px;">
                                                                        <!--<a class="btn btn-success btn-sm" href="#">View comment</a>-->
                                                                        <p class="pull-right"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($thread['email_date']);?></p>
                                                                </div>
                                                        </div>
                                                </div>
                                                <?php }?>
                                            </div>
                                        </div>
                                  <?php }?>
                                  
				  <!-- /.mailbox-read-message -->
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<!--<h5><i class="fa fa-paperclip m-r-10 m-b-10"></i> Attachments <span>(3)</span></h5>-->
<!--				  <ul class="mailbox-attachments clearfix">
					<li>
					  <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>

					  <div class="mailbox-attachment-info">
						<a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> Mag.pdf</a>
							<span class="mailbox-attachment-size">
							  5,215 KB
							  <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
							</span>
					  </div>
					</li>
					<li>
					  <span class="mailbox-attachment-icon"><i class="fa fa-file-word-o"></i></span>

					  <div class="mailbox-attachment-info">
						<a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> Documents.docx</a>
							<span class="mailbox-attachment-size">
							  2,145 KB
							  <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
							</span>
					  </div>
					</li>
					<li>
					  <span class="mailbox-attachment-icon has-img"><img src="../../../images/photo1.png" alt="Attachment"></span>

					  <div class="mailbox-attachment-info">
						<a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> Image.png</a>
							<span class="mailbox-attachment-size">
							  2.67 MB
							  <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
							</span>
					  </div>
					</li>
				  </ul>-->
				</div>
				<!-- /.box-footer -->
<!--				<div class="box-footer">
				  <div class="pull-right">
					<button type="button" class="btn btn-success"><i class="fa fa-reply"></i> Reply</button>
					<button type="button" class="btn btn-info"><i class="fa fa-share"></i> Forward</button>
				  </div>
				  <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button>
				  <button type="button" class="btn btn-warning"><i class="fa fa-print"></i> Print</button>
				</div>-->
				<!-- /.box-footer -->
			  </div>
                                       
                                        <!--/.direct-chat-messages-->
                                    </div>
                                    <!-- /.box-body -->
                                    <!--            <div class="box-footer">
                                                  <form action="#" method="post">
                                                    <div class="input-group">
                                                      <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                                                          <div class="input-group-addon">
                                                                                    <div class="align-self-end gap-items">
                                                                                      <span class="publisher-btn file-group">
                                                                                            <i class="fa fa-paperclip file-browser"></i>
                                                                                            <input type="file">
                                                                                      </span>
                                                                                      <a class="publisher-btn" href="#"><i class="fa fa-smile-o"></i></a>
                                                                                      <a class="publisher-btn" href="#"><i class="fa fa-paper-plane"></i></a>
                                                                                    </div>
                                                                              </div>
                                                    </div>
                                                  </form>
                                                </div>-->
                                    <!-- /.box-footer-->
                                </div>
                            </div>
                        </div>



                    </div>
                    <!-- /.box-body -->
                    <!--                    <div class="box-footer">
                                            Footer
                                        </div>-->
                    <!-- /.box-footer-->
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(function () {
        "use strict";
    })
</script>
