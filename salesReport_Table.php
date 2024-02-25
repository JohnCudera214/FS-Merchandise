<?php include 'db_connect.php'?>
<div class="col-md-14" id="print-report">
    <table class="table table-bordered" width="100%">
        <thead>
            <th class="text-center">#</th>
            <th class="text-center">Reference #</th>
            <th class="text-center">Date</th>
            <th class="text-center">Customer</th>
            <th class="text-center">Total Amount</th>
        </thead>
        <tbody>
            <?php
            $customer = $conn->query("SELECT * FROM customer_list order by name asc");
            while($row=$customer->fetch_assoc()):
                $cus_arr[$row['id']] = $row['name'];
            endwhile;
                $cus_arr[0] = "GUEST";

            $i = 1;
            $sales = $conn->query("SELECT * FROM sales_list  order by date(date_updated) desc");
            while($row=$sales->fetch_assoc()):
            ?>
            <tr>
                <td class="text-center"><?php echo $i++?></td>
                <td class="text-center"><?php echo $row['ref_no'] ?></td>
                <td class="text-center"><?php echo date("M d, Y",strtotime($row['date_updated'])) ?></td>
		        <td class="text-center"><?php echo isset($cus_arr[$row['customer_id']])? $cus_arr[$row['customer_id']] :'N/A' ?></td>
                <td class="text-center"><?php echo $row['total_amount']?></td>
            </tr>
            <?php endwhile?>
        </tbody>
        <tfoot>
            <?php
            $sale = $conn->query("SELECT sum(total_amount) as total FROM sales_list");
            $row = $sale->fetch_assoc();
            $total = $row['total']
            ?>
            <tr>
                <th colspan="4" class="text-center" color = "yellow">Total Sales:</th>
                <th class="text-center" style="background-color: aqua;"><?php echo $total?></th>
            </tr>
        </tfoot>
    </table>
</div>
<script>
//    $('table').dataTable()
   $('#prints').click(function(){
		var _html = $('#print-report').clone();
		var newWindow = window.open("","_blank","menubar=no,scrollbars=yes,resizable=yes,width=700,height=600");
		newWindow.document.write("<h3><center>Total Sales</center></h3>" + _html.html())
		newWindow.document.close()
		newWindow.focus()
		newWindow.print()
		setTimeout(function(){;newWindow.close();}, 1500);
	})
   </script>