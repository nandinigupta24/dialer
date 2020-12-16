<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="box">
                    <div class="with-border">
                        <div class="panel-heading">
                            <div class="panel-title"> <span class="fa fa-server"></span>Server Informations</div>
                            <ul class="nav panel-tabs">
                                <li><a href=""><i class="fa fa-refresh" title="Refersh"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <?php 
                    $data = $database->select('servers',['server_id','server_description','server_ip','active','sysload','channels_total','cpu_idle_percent','disk_usage','svn_revision','svn_info'],['ORDER'=>['server_id'=>'ASC']])
                    ?>
                    <div class="panel-body pn">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="bg-success">
                                <tr>
                                    <th>SERVER</th>
                                    <th>Description</th>
                                    <th>IP</th>
                                    <th>ACT</th>
                                    <th>LOAD</th>
                                    <th>CHAN</th>
                                    <th>DISK</th>
                                    <th>TIME</th>
                                    <th>VER</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($data as $value){
                                        $v = $database->get('server_updater','last_update',['server_ip'=>$value['server_ip']]);
                                        ?>
                                    <tr>
                                        <td><?php echo $value['server_id'];?></td>
                                        <td><?php echo $value['server_description'];?></td>
                                        <td><?php echo $value['server_ip'];?></td>
                                        <td><?php echo $value['active'];?></td>
                                        <td></td>
                                        <td><?php echo $value['channels_total'];?></td>
                                        <td></td>
                                        <td><?php echo $v;?></td>
                                        <td><?php echo $value['svn_revision']?></td>
                                    </tr>
                                    <?php }?>
                                   
                                </tbody>
                            </table>
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

