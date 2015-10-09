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
        <div class="errorForm"><?php echo $this->Session->flash(); ?></div>
    </div>
    <div id="result">
        <!--pagination-->
        <div class="row margin-bot5">
            <div class="col-xs-6">
                <label>Show</label>
                <select id="page_size" page-form="departments">
                    <option value="10">10</option>
                    <option value="20">20</option>
                </select>
            </div>
            <div class="col-xs-6">
                <div class="float-right" id="curpage">
                    <ul class="pagination margin0">
                        <li class="paginate_button previous disabled">
                            <a href="#" page="0">Pre</a></li>
                        <?php
                        if ($pagemax <= 3) {
                            if ($pagemax == 0) { $pagemax = 1;}
                            for ($i = 1; $i <= $pagemax; $i++) { ?>
                                <li class="paginate_button <?php if ($i == 1) {echo "active";} ?>">
                                    <a href="#" page="<?php echo $i;?>"><?php echo $i;?></a>
                                </li>
                            <?php } ?>
                            <li class="paginate_button next <?php if ($pagemax == 1) {echo "disabled";}?>">
                                <a href="#" page="2">Next</a>
                            </li>
                        <?php } else { ?>
                            <li class="paginate_button active">
                                <a href="#" page="1">1</a>
                            </li>
                            <li class="paginate_button">
                                <a href="#" page="2">2</a>
                            </li>
                            <li class="paginate_button">
                                <a href="#" page="3">3</a>
                            </li>
                            <li class="paginate_button next">
                                <a href="#" page="2">Next</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <!--end pagination-->

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
                <?php if (count($data) > 0 ) {
                    $row = 1;
                    foreach($data as $ele) {?>
                        <tr>
                            <td><?php echo $row++; ?></td>
                            <td><a href="<?php echo $this->webroot; ?>employees/detail/<?php echo $ele['Employee']['id'];?>"> <?php echo $ele['Employee']['name']; ?></a></td>
                            <td><?php echo $ele['Employee']['tel']; ?></td>
                            <td><?php echo $ele['Employee']['email']; ?></td>
                            <td><?php echo $ele['Employee']['gender']==0?"Male":"Female"; ?></td>
                            <td class="table-action">
                                <a href="<?php echo $this->webroot; ?>employees/edit/<?php echo $ele['Employee']['id']; ?>" data-toggle="tooltip"  class="tooltips" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                &nbsp;
                                <a href="<?php echo $this->webroot; ?>employees/delete/<?php echo $ele['Employee']['id']; ?>" class="delete-row tooltips" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    <?php }} else {?>
                    <tr>
                        <td colspan="4" class="text-center">No data exists</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

