<?php //print_r($invoices)?>
<div class="row">
  <div class="col-sm-4">
    <label for="start">Start Date</label>
    <input id="start" type="date" /><br />
  </div>
  <div class="col-sm-4">
    <label for="end">End Date</label>
    <input id="end" type="date" /><br />
  </div>
  <div class="col-sm-4">
  <button class="btn btn-outline-primary button radius" id="filter">Filter</button>
    <button id="clearFilter" class="btn btn-outline-success button radius secondary">Clear Filter</button>
  </div>
</div>
<div class="table-responsive mt-2">

    <table class="table" id="datatable">
        <thead>
            <tr>
                <th width="10%" scope="col">Detail</th>
                <th width="10%" scope="col">ID</th>
                <th width="30%" scope="col">Store</th>
                <th width="25%">Date</th>
                <th width="25%" scope="col" class="text-center">Price</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i=0; $i < count($invoices); $i++) {?>
                <tr>
                    <td><a href="../invoices/detail/<?php echo $invoices[$i]['Invoice']['id']?>"><i class="fas fa-edit"></i></a></td>
                    <th><?php echo $invoices[$i]['Invoice']['id']?></th>
                    <td><?php echo $invoices[$i]['0']?></td>
                    <td><?php echo $invoices[$i]['Invoice']['date'] ?></td>
                    <td class="text-center"><?php echo number_format($invoices[$i]['Invoice']['price']) ?></td>
                </tr>
            <?php }?>
        </tbody>
        <tfoot>
            <tr><th></th><th></th><th></th><th></th><th></th></tr>
        </tfoot>
    </table>
</div>
<script>
    var $tableSel = $('#datatable');

    $tableSel.DataTable( {
        "dom": '<"dt-buttons"Bf><"clear">lirtp',
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
           { extend: 'excel', footer: true },
        ],

        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 4, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 0 ).footer() ).html('Total');
            $( api.column( 4 ).footer() ).html(
                numberWithCommas(pageTotal)+ 'đ'+' / Total: '+ numberWithCommas(total) +'đ'
            );
        }
    } );
     $('#filter').on('click', function(e){
    e.preventDefault();
    var startDate = $('#start').val(),
        endDate = $('#end').val();
    
    filterByDate(3, startDate, endDate); // We call our filter function
    
    $tableSel.dataTable().fnDraw(); // Manually redraw the table after filtering
  });
  
  // Clear the filter. Unlike normal filters in Datatables,
  // custom filters need to be removed from the afnFiltering array.
  $('#clearFilter').on('click', function(e){
    e.preventDefault();
    $.fn.dataTableExt.afnFiltering.length = 0;
    $tableSel.dataTable().fnDraw();
  });
  


var filterByDate = function(column, startDate, endDate) {
        $.fn.dataTableExt.afnFiltering.push(
            function( oSettings, aData, iDataIndex ) {
                var rowDate = normalizeDate(aData[column]),
              start = normalizeDate(startDate),
              end = normalizeDate(endDate);
          
          // If our date from the row is between the start and end
          if (start <= rowDate && rowDate <= end) {
            return true;
          } else if (rowDate >= start && end === '' && start !== ''){
            return true;
          } else if (rowDate <= end && start === '' && end !== ''){
            return true;
          } else {
            return false;
          }
        }
        );
    };
var normalizeDate = function(dateString) {
  var date = new Date(dateString);
  var normalized = date.getFullYear() + '' + (("0" + (date.getMonth() + 1)).slice(-2)) + '' + ("0" + date.getDate()).slice(-2);
  return normalized;
}

    function numberWithCommas(x) {
          return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      }
</script>