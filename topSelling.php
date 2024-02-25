<?php include 'db_connect.php'?>
<div class="col-md-14" id="print-topselling">
    <table class="table table-bordered" width="100%">
        <thead>
            <th class="text-center">Rank</th>
            <th class="text-center">Pcode</th>
            <th class="text-center">Product Name</th>
            <th class="text-center">Total Quantity(Sales)</th>
        </thead>
        <tbody>
            <?php
            $i = 1;
            $topSelling = $conn->query("SELECT i.sku, i.name, i.id, SUM(qty) as total_quantity FROM product_list i JOIN inventory s ON i.id = s.product_id WHERE s.type = 2 GROUP BY i.id, i.sku, i.name ORDER BY total_quantity DESC");
            while($row=$topSelling->fetch_assoc()):
            ?>
            <tr>
                <td class="text-right"><?php echo $i++?></td>
                <td class="text-right"><?php echo $row['sku']?></td>
                <td class="text-right"><?php echo $row['name']?></td>
                <td class="text-right"><?php echo $row['total_quantity']?></td>
            </tr>
        </tbody>
        <?php endwhile;?>
    </table>
</div>

<script>
    $('#printTopSelling').click(function(){
		var _html = $('#print-topselling').clone();
		var newWindow = window.open("","_blank","menubar=no,scrollbars=yes,resizable=yes,width=700,height=600");
		newWindow.document.write("<h3><center>Top Selling Products</center></h3>" + _html.html())
		newWindow.document.close()
		newWindow.focus()
		newWindow.print()
		setTimeout(function(){;newWindow.close();}, 1500);
	})
</script>