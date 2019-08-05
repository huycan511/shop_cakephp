<div class="table-responsive mt-2">
    <table class="table" id="datatable">
        <thead>
            <tr>
                <th width="5%" scope="col">STT</th>
                <th width="30%" scope="col">Product</th>
                <th width="10%" scope="col">Price</th>
                <th width="30%">Genre</th>
                <th width="15%" scope="col">Status</th>
                <th width="10%" scope="col">Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i=0; $i < count($products); $i++) {?>
                <tr>
                    <th scope="row"><?php echo $i+1?></th>
                    <td><?php echo $products[$i]['0']['Product']['name']?></td>
                    <td><?php echo $products[$i]['0']['Product']['price'] ?></td>
                    <td><?php echo $products[$i]['0']['genree']['name']?></td>
                    <td>
                        <?php if($products[$i]['Product_store']['amount'] > 0){?>
                            <span class="badge badge-success">Selling</span>
                        <?php }else{ ?>
                            <span class="badge badge-danger">Out of stock</span>
                        <?php } ?>
                    </td>
                    <td><?php echo $products[$i]['Product_store']['amount'];?></td>
                </tr>
            <?php }?>
        </tbody>
    </table>
</div>
<script>
    $('#datatable').DataTable();
</script>