<div id="result">
    <div class="row row-stat" id="page_size" page-form="departments">
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
            <?php 
            if (count($data) > 0 ) :
                $row = 1;
                foreach($data as $ele) :
                    ?>
                    <tr>
                        <td><?php echo $row++; ?></td>
                            <td><?php echo $this->Html->link( $ele['Department']['name'],
                                array('controller' => 'departments', 'action'=>'detail',$ele['Department']['id'])); ?></td>
                            <td><?php echo $ele['Department']['tel']; ?></td>
                            <td class="table-action">
                                <?php echo $this->Html->link( '<i class="fa fa-pencil"></i>',
                                array('controller' => 'departments', 'action'=>'edit',$ele['Department']['id']),array('data-toggle' => 'tooltip','class'=>'tooltips','data-original-title'=>'Edit','escape' => false)); ?>                              
                                &nbsp;
                                <?php echo $this->Html->link( '<i class="fa fa-trash-o"></i>',
                                array('controller' => 'departments', 'action'=>'delete',$ele['Department']['id']),array('data-toggle' => 'tooltip','class'=>'tooltips','data-original-title'=>'Delete','escape' => false)); ?>
                            </td>
                    </tr>
                <?php 
                endforeach; 
                else : 
                    ?>
                    <tr>
                        <td colspan="4" class="text-center">No data exists</td>
                    </tr>
            <?php 
            endif; 
            ?>
            </tbody>
        </table>
    </div>
</div>