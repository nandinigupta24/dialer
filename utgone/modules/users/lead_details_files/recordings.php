<div class="col-md-12">
    <div class="panel panel-visible formtabs" id="AllFormsTab">
        <div class="panel-heading">
            <div class="panel-title"> <span class="fa fa-book"></span>Call Recordings</div>
            <ul class="nav panel-tabs">

            </ul>
        </div>
        <div class="panel-body pbn">
            <?php 
            $RecordingData = $database->select('recording_log', '*',['lead_id'=>$leadID]);
//            echo $database->last();
            
            ?>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered" id="TableRecording">
                        <thead class="bg-success">
                            <tr>
                                <th>Date/Time</th>
                                <th>Agent</th>
                                <th>Recording Length(seconds)</th>
                                <th>Filename</th>
                                <th data-orderable="false">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($RecordingData as $recording) { 
                                $data = explode('/archive/',$recording['location']);

                                        $LiveURLRecording = $baseURL.'archive/'.$data[1];
                                ?>
                                <tr>
                                    <td><?php echo $recording['start_time']; ?></td>
                                    <td><?php echo $recording['user']; ?></td>
                                    <td><?php echo $recording['length_in_sec']; ?></td>
                                    <td><?php echo $recording['filename']; ?></td>
                                    <td>
                                        <a href="<?php echo $LiveURLRecording; ?>" class="btn btn-primary"><i class="fa fa-arrow-down"></i></a>
                                        <button type="button" class="btn btn-success PlayAudio" data-href="<?php echo $LiveURLRecording; ?>"><i class="fa fa-headphones"></i></button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table> 
                </div>
            </div>

        </div>
    </div>
</div>

<div class="AudioPlay" style="position: absolute;top: 10;right: 10;display:none;">
    
</div>
<script>
    $('#TableRecording').DataTable();
    
    $(document).on('click','.PlayAudio',function(){
        $('.AudioPlay').show();
        var AudioURL = $(this).data('href');
        $('.AudioPlay').html('<audio controls autoplay>'+
                            '<source src="'+AudioURL+'" type="audio/mpeg">'+
                          'Your browser does not support the audio element.'+
                          '</audio>');
    });
</script>