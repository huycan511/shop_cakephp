
                        <!-- Modal -->
                        <div class="card shadow mb-4 mt-2">  
                            <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th width="5%" scope="col">ID</th>
                                        <th width="30%" scope="col">Store</th>
                                        <th width="15%" scope="col">Customer ID</th>
                                        <th width="15%" scope="col">Date</th>
                                        <th width="10%" scope="col">Price</th>
                                        <th width="15%" scope="col">Status</th>
                                        <th width="10%" scope="col">Detail</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th width="5%" scope="col">ID</th>
                                        <th width="30%" scope="col">Store</th>
                                        <th width="15%" scope="col">Customer ID</th>
                                        <th width="15%" scope="col">Date</th>
                                        <th width="10%" scope="col">Price</th>
                                        <th width="15%" scope="col">Status</th>
                                        <th width="10%" scope="col">Detail</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php for ($i=0; $i < count($bill); $i++) {?>
                                        <tr>
                                            <td><?php echo $bill[$i]['Invoice']['id']?></td>
                                            <td><?php echo $this->Session->read('name_store')?></td>
                                            <td><?php if($bill[$i]['Invoice']['id_receive']==null){echo 'Khách vãng lai';}else{echo $bill[$i]['Invoice']['id_receive'];}?></td>
                                            <td><?php echo $bill[$i]['Invoice']['date']?></td>
                                            <td><?php echo $bill[$i]['Invoice']['price']?></td>
                                            <td>
                                                <?php if($bill[$i]['Invoice']['status'] == 0){?>
                                                    <span class="badge badge-danger">Pending</span>
                                                <?php }else if($bill[$i]['Invoice']['status'] == 1){ ?>
                                                    <span class="badge badge-primary">In Processing</span>
                                                <?php }else{ ?>
                                                    <span class="badge badge-success">Completed</span>
                                                <?php }?>
                                            </td>
                                            <td><a href="../invoices/details/<?php echo $bill[$i]['Invoice']['id'] ?>"><i class="fas fa-edit"></i></a></td>
                                        </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div></div></div>

        
                
 
