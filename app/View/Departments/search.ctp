<div id="result">
    <!--pagination-->
    <div class="row margin-bot5">
        <div class="col-xs-6">
            <label>Show</label>
            <select id="page_size" page-form="departments">
                <option value="10" <?php if ($default['page_size'] == 10) echo "selected ='selected'";?>>10</option>
                <option value="20" <?php if ($default['page_size'] == 20) echo "selected ='selected'";?>>20</option>
            </select>
        </div>
        <div class="col-xs-6">
            <div class="float-right" id="curpage">
                <ul class="pagination margin0">
                    <li class="paginate_button previous <?php if (($default['page'] - 1) == 0) echo "disabled"?>">
                        <a href="#" page="<?php echo $default['page'] - 1 ;?>">Pre</a>
                    </li>
                    <?php if ($default['page'] - 1 > 0) { ?>
                        <li class="paginate_button">
                            <a href="#" page="<?php echo ($default['page'] - 1) ;?>"><?php echo ($default['page'] - 1) ;?></a>
                        </li>
                    <?php } ?>
                    <li class="paginate_button active">
                        <a href="#" page="<?php echo $default['page'];?>"><?php echo $default['page'];?></a>
                    </li>
                    <?php if ($default['page'] + 1 < $pagemax) { ?>
                        <li class="paginate_button">
                            <a href="#" page="<?php echo ($default['page'] + 1) ;?>"><?php echo ($default['page'] + 1) ;?></a>
                        </li>
                        <li class="paginate_button next">
                            <a href="#" page="<?php echo ($default['page'] + 1) ;?>">Next</a>
                        </li>
                    <?php } else { ?>
                        <li class="paginate_button next disabled">
                            <a href="#" page="<?php echo ($default['page'] + 1) ;?>">Next</a>
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php if (count($data) > 0 ) {
                $row = 1;
                foreach($data as $ele) {?>
                    <tr>
                        <td><?php echo $row++; ?></td>
                        <td><a href="<?php echo $this->webroot; ?>departments/detail/<?php echo $ele['Department']['id'];?>"> <?php echo $ele['Department']['name']; ?></a></td>
                        <td><?php echo $ele['Department']['tel']; ?></td>
                        <td class="table-action">
                            <a href="<?php echo $this->webroot; ?>departments/edit/<?php echo $ele['Department']['id']; ?>" data-toggle="tooltip"  class="tooltips" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                            &nbsp;
                            <a href="<?php echo $this->webroot; ?>departments/delete/<?php echo $ele['Department']['id']; ?>" class="delete-row tooltips" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
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

<script>
    initPage();
</script>