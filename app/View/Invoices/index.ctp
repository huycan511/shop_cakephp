<div id="myfirstchart" style="height: 250px;"></div>
<script>
	$.ajax({
		url: 'invoices/getDataInvoice',
		dataType: 'json'
	})
	.done(function(res) {
		console.log(res);
		
		new Morris.Line({
		  // ID of the element in which to draw the chart.
		  element: 'myfirstchart',
		  // Chart data records -- each entry in this array corresponds to a point on
		  // the chart.
		  data: res,
		  // The name of the data record attribute that contains x-values.
		  xkey: 'date',
		  xLabelFormat: function(data){
      var monthNames = [ "1", "2", "3", "4", "5", "6",
    "7", "8", "9", "10", "11", "12" ];
    return monthNames[data.getMonth()]+'/'+data.getFullYear()
  },
		  // A list of names of data record attributes that contain y-values.
		  ykeys: ['price'],
		  // Labels for the ykeys -- will be displayed when you hover over the
		  // chart.
		  labels: ['Value']
 
		  
		});
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	
</script>