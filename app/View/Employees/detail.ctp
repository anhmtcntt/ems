<div class="pageheader">
    <div class="media">
        <div class="pageicon pull-left">
            <i class="fa fa-user"></i>
        </div>
        <div class="media-body">
            <ul class="breadcrumb">
                <li><i class="glyphicon glyphicon-home"></i></li>
                <li>Detail</li>
            </ul>
            <h4>Employee Information</h4>
        </div>
    </div><!-- media -->
</div><!-- pageheader -->

<div class="contentpanel">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="lg-title mb10"><?php echo $data['Employee']['name'];?></h5>
                    <?php if ($data['Employee']['photo'] == '' || !file_exists($data['Employee']['photo'])) {
                        $data['Employee']['photo'] = 'img/noimage.png';
                    }; ?>
                    <img src="<?php echo $this->webroot.$data['Employee']['photo']; ?>" class="img-responsive mb10" alt="" width="50px">
                    <address>
                        <?php echo $data['Employee']['email']; ?>
                    </address>
                </div><!-- col-sm-6 -->
                <div class="col-sm-6 text-right">
                    <h5 class="subtitle mb10"><?php echo $data['Employee']['gender']==0?"Male":"Female"; ?></h5>
                    <h4 class="text-primary"><?php echo $data['Employee']['employee_cd'];?></h4>
                    <address>
                        <?php echo $data['Employee']['job']; ?>
                    </address>
                    <p><strong>Tel: </strong><?php echo $data['Employee']['tel'];?></p>
                </div>
            </div><!-- row -->
        </div><!-- panel-body -->
    </div><!-- panel -->  
</div><!-- contentpanel -->

