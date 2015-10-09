<div class="pageheader">
    <div class="media">
        <div class="pageicon pull-left">
            <i class="fa fa-list"></i>
        </div>
        <div class="media-body left-80">
            <ul class="breadcrumb">
                <li><i class="glyphicon glyphicon-home"></i></a></li>
                <li>Listing</li>
            </ul>
            <h5>LIST EMPLOYEES</h5>
        </div>
    </div>
</div>
<div class="contentpanel contentpanel-mediamanager">
    <div class="media-options">
        <div class="pull-left">
            <div class="btn-toolbar">
                <div class="btn-group">
                    <?php echo $this->Html->link( '<i class="glyphicon glyphicon-plus"></i> Add',
                        array('controller' => 'employees', 'action'=>'add'),
                        array('escape' => false, 'class' => 'btn btn-default btn-sm')); ?>
                </div>
            </div>
        </div>
        <div class="pull-right">
            <div class="form-inline">
                <input type="search" class="form-control input-sm province-search" placeholder="Search" id="keyword">
                <button type="submit" class="btn btn-primary mr5 searchbtn"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
    </div>
    <hr>

    <div>
        <div class="errorForm"><?php echo $this->Flash->render(); ?></div>
    </div>
    <div id="result">
        <div class="row row-stat">
            <table id="basicTable" class="table table-striped table-bordered responsive">
                <thead>
                <tr>
                    <th class="width3pc">#</th>
                    <th>Name</th>
                    <th>Tel</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php if (count($data) > 0 ) :
                    $row = 1;
                    foreach($data as $ele) : ?>
                        <tr>
                            <td><?php echo $row++; ?></td>
                            <td><?php echo $this->Html->link( $ele['Employee']['name'],
                                array('controller' => 'employees', 'action'=>'detail',$ele['Employee']['id'])); ?></td>
                            <td><?php echo $ele['Employee']['tel']; ?></td>
                            <td><?php echo $ele['Employee']['email']; ?></td>
                            <td><?php echo $ele['Employee']['gender']==0?"Male":"Female"; ?></td>
                            <td class="table-action">
                                <?php echo $this->Html->link( '<i class="fa fa-pencil"></i>',
                                array('controller' => 'employees', 'action'=>'edit',$ele['Employee']['id']),array('data-toggle' => 'tooltip','class'=>'tooltips','data-original-title'=>'Edit','escape' => false)); ?>                              
                                &nbsp;
                                <?php echo $this->Html->link( '<i class="fa fa-trash-o"></i>',
                                array('controller' => 'employees', 'action'=>'delete',$ele['Employee']['id']),array('data-toggle' => 'tooltip','class'=>'tooltips','data-original-title'=>'Delete','escape' => false)); ?>
                            </td>
                        </tr>
                    <?php endforeach; else :?>
                    <tr>
                        <td colspan="4" class="text-center">No data exists</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

