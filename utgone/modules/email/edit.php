<?php if(!checkRole('email', 'edit')){ no_permission(); } else {?>
<?php
$emailtemplates = $DBEmail->select('templates', '*', ['id'=>$_GET['id']]);
$data = $emailtemplates[0];
?>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12 col-lg-12 col-md-12">

                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title"><i class="fa fa-pencil"></i> Edit Email Template</span>
                    </div>
                    <div class="panel-body">

                        <form method="post" name="" action="<?php echo base_url('email/ajax')?>?action=update&id=<?php echo $_GET['id'];?>" id="ListForm">
                            <div class="pad">
                                <!---------------------------------------------------------->
                                <div class="form-group">
                                    <label for="name" class=" col-form-label">Name</label>
                                        <input class="form-control" type="text" placeholder="Max 30 Characters" id="name" name="name" required="" value="<?php echo $data['name'];?>">
                                </div>
                                <!---------------------------------------------------------->

                                <div class="form-group">
                                    <label for="description" class="col-form-label">Description</label>
                                        <input class="form-control" type="text" placeholder="Max 40 Characters" id="description" name="description" required="" value="<?php echo $data['description'];?>">
                                </div>
                                <!---------------------------------------------------------->
                                <div class="form-group">
                                    <label for="message" class="col-form-label">Message</label>
                                    <textarea class="form-control" type="text" placeholder="Message" id="editor1" name="message" required=""><?php echo $data['message'];?></textarea>
                                </div>
                                <!---------------------------------------------------------->
                                <div class="form-group">
                                    <label for="campaign_active_btn" class="col-form-label">Active</label>
                                        <button type="button" class="btn btn-sm btn-toggle SwitchBTN <?php echo $data['active']=='true'?'active':'';?>" data-toggle="button" aria-pressed="<?php echo $data['active'];?>" autocomplete="off">
                                            <div class="handle"></div>
                                        </button>
                                        <input type="hidden" name="active" id="" value="<?php echo $data['active'];?>">
                                </div>

                            </div>
                            <div class="row bt-1 border-success" style="padding-top: 12px;">
                                <div class="col-sm-6">
                                    <a href="<?php echo base_url('email')?>" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Cancel</a>
                                </div>
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-success btn-sm pull-right"><i class="fa fa-arrow-right"></i> Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>
<!--<link rel="stylesheet" href="<?php echo publicAssest();?>assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-wysiwyg/0.3.3/bootstrap3-wysihtml5.all.min.js" integrity="sha256-/pAqJaOZhKjDz1Ld/tOpZp7vnIOaMkkA5aawwwr0zfk=" crossorigin="anonymous"></script>-->
<script src="<?php echo publicAssest();?>assets/vendor_components/ckeditor/ckeditor.js"></script>
<script>
//[editor Javascript]

//Project:	Fab Admin - Responsive Admin Template
//Primary use:   Used only for the wysihtml5 Editor 


//Add text editor
    $(function () {
    "use strict";

    // Replace the <textarea id="editor1"> with a CKEditor
	// instance, using default configuration.
	CKEDITOR.replace('editor1')
	//bootstrap WYSIHTML5 - text editor
//	$('.textarea').wysihtml5();		
	
  });
  </script>
<script>
//$(function(){
//    $('textarea').wysihtml5();
//})
    $(document).on('click', '.SwitchBTN', function () {
        if ($(this).hasClass('active')) {
            $(this).parent().find('input[name="active"]').val('true');
        } else {
            $(this).parent().find('input[name="active"]').val('false');
        }
    });


    $("#ListForm").submit(function (e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            success: function (data){
                var result = JSON.parse(data);
                if(result.success === 1){
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'info',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                }else{
                    $.toast({
                        heading: 'Welcome To UTG Dialer',
                        text: result.message,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'error',
                        hideAfter: 3500,
                        showHideTransition: 'plain',
                    });
                }
            }
        });


    });


</script>
<?php } ?>
