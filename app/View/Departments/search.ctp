<div id="result">
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
            <?php if (count($data) > 0 ) :
                $row = 1;
                foreach($data as $ele) :?>
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
                <?php endforeach; else ?>
                    <tr>
                        <td colspan="4" class="text-center">No data exists</td>
                    </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    initPage();
</script>