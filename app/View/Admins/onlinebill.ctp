
                        <!-- Modal -->
                        <div class="table-responsive mt-2">
                            <table class="table" id="datatable">
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
                                            <td><a href="../invoices/detail/<?php echo $bill[$i]['Invoice']['id'] ?>"><i class="fas fa-edit"></i></a></td>
                                        </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
        <script type="text/javascript">
            // $("#datepicker").datepicker({ 
            //     autoclose: true, 
            //     todayHighlight: true
            // }).datepicker('update', new Date());
            $('#datatable').DataTable();
        </script>

        
                
 
