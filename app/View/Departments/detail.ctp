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
            <h4>Department Information</h4>
        </div>
    </div>
</div>

<div class="contentpanel">

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="lg-title mb10"><?php echo $data['Department']['name']; ?></h5>
                    <address>
                        <abbr title="Phone">Tel:</abbr> <?php echo $data['Department']['tel']; ?>
                    </address>
                </div>

                <div class="col-sm-6 text-right">
                </div>
            </div>

            <div class="table-responsive">
            <table class="table table-bordered table-dark table-invoice">
            <thead>
              <tr>
                <th>#</th>
                <th>Employee name</th>
                <th>Gender</th>
                <th>Email</th>
              </tr>
            </thead>
            <tbody>
              <?php if (count($data['Employee']) > 0) : 
                  $row = 1;
                foreach ($data['Employee'] as $ele) :?>
                    <tr>
                        <td class="width3pc"><?php echo $row++; ?></td>
                        <td><a href="<?php echo $this->webroot.'employees/detail/'.$ele['id'];?>"><?php echo $ele['name']; ?></a></td>
                      <td><?php echo $ele['gender']==0?"Male":"Female"; ?></td>
                      <td><?php echo $ele['email']; ?></td>
                    </tr>
                <?php endforeach;
                endif; ?>
            </tbody>
          </table>
          </div>
        </div>
    </div>
</div>
