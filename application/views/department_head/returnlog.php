<script src="<?php echo base_url() ?>assets/js/sort.js"></script>
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Return log</h3>
            </div>

            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th onclick="sortTable(0)">Serial</th>
                  <th onclick="sortTable(1)"> Item name</th>
                  <th onclick="sortTable(2)"> Date</th>
                  <th onclick="sortTable(3)"> Supplier</th>
                  <th onclick="sortTable(4)"> Status</th>
                  <th onclick="sortTable(5)"> Unit Cost</th>
<<<<<<< HEAD
                 <th onclick="sortTable(6)"> Person? </th>
                 <th onclick="sortTable(7)">Replace Item</th>
                 <th onclick="sortTable(8)">Reason</th>
                 <th onclick="sortTable(9)">Quantity</th>
                 <th onclick="sortTable(10)">User</th>
=======
				  <th onclick="sortTable(6)"> Person? </th>
				  <th onclick="sortTable(7)">Replace Item</th>
				  <th onclick="sortTable(8)">Reason</th>
				  <th onclick="sortTable(9)">Quantity</th>
				  <th onclick="sortTable(10)">User</th>
>>>>>>> 4b125a16827f190270772dcc345019b781c599b3
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($returnlog as $returnlog): ?>
                <tr>
              
<<<<<<< HEAD
                  <td><?php echo $return['serial']; ?></td>
                  <td><?php echo $return['item_name']; ?></td>
                  <td><?php echo $return['date']; ?></td>
                  <td><?php echo $return['supplier']; ?></td>
                  <td><?php echo $return['status']; ?></td>
                  <td><?php echo $return['unit_cost']; ?></td>
                  <td> <?php echo $return['return_person']; ?></td>
                  <td><?php echo $return['replace_item']; ?></td>
                  <td><?php echo $return['reason']; ?></td>
                  <td><?php echo $return['quantity']; ?></td>
                  <td><?php echo $return['user']; ?></td>
=======
                  <td>312</td>
                  <td>ballpen</td>
                  <td><?php echo $returnlog['date']; ?></td>
                  <td>Joy</td>
                  <td> 4</td>
                  <td>X</td>
                  <td> <?php echo $returnlog['return_person']; ?></td>
                  <td>X</td>
                  <td><?php echo $returnlog['reason']; ?></td>
                  <td>5</td>
                  <td>Lovelace</td>
>>>>>>> 4b125a16827f190270772dcc345019b781c599b3
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
