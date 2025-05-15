<?php
    require_once("foodbee_db.php");
    if (isset($_POST['orderId'])) {
        $order_info_qry = mysqli_query($conn_foodbee,"select *  from orders WHERE order_id = '".$_POST['orderId']."' ");
        $order_info = mysqli_fetch_assoc($order_info_qry);
        $order_item_info_qry = mysqli_query($conn_foodbee,"select *  from order_items WHERE order_id = '".$_POST['orderId']."' ");
        $order_user_info_qry = mysqli_query($conn_foodbee,"select *  from order_user_details WHERE order_id = '".$_POST['orderId']."' ");
        $order_user_info = mysqli_fetch_assoc($order_user_info_qry);
        // echo "<pre>"; print_r($order_info); die();
        $address = "";
        $total = $order_info["after_discount"]+$order_info["delivery_charge"];
        if ($order_user_info["address"]) {
            $address .= $order_user_info["address"].", ";
        }
        if ($order_user_info["city"]) {
            $address .= $order_user_info["city"].", ";
        }
        if ($order_user_info["pin_code"]) {
            $address .= $order_user_info["pin_code"];
        }

        /*if ($order_info["tip"] || ($order_info["tip"] != '0.0') ) {
            // $total = $order_info["after_discount"]+$order_info["tip"];
            $total += $order_info["tip"];
        }*/
    }

?>







                    <div class="" style="display: flex;">
                        <table id="order-info" class="table">
                        		<tbody>
                        			<tr>
                        				<th>#Order No: </th>
                        				<td><?= $order_info["order_id"] ?></td>
                        			</tr>
                        			<tr>
                        				<th>Restaurant: </th>
                        				<td><?= $order_info["restaurant_id"] ?></td>
                        			</tr>
                        			<tr>
                        				<th>Payment: </th>
                        				<td><?= $order_info["payment_mode"] ?></td>
                        			</tr>
                        		</tbody>
                        </table>

                        <table id="user-info">
                        		<tbody>
                                   
                        			<tr>
                        				<th>Name: </th>
                        				<td><?= $order_user_info["full_name"] ?></td>
                        			</tr>
                        			<tr>
                        				<th>Email: </th>
                        				<td><?= $order_user_info["email"] ?></td>
                        			</tr>
                        			<tr>
                        				<th>Phone: </th>
                        				<td><?= $order_user_info["phone"] ?></td>
                        			</tr>
                        			<tr>
                        				<th>Company Name: </th>
                        				<td><?= $order_user_info["company_name"] ? $order_user_info["company_name"] : '-' ?></td>
                        			</tr>
                        			<tr>
                        				<th>Address: </th>
                        				<td><?= $address ? $address : '-' ?></td>
                        			</tr>
                        		</tbody>
                        </table>
                    </div>
                    <hr/>
                     <table id="order-product-details" class="table">
                     		<thead>

                     			<tr>
                     				<th>#Item ID:</th>
                     				<th>Item Name:</th>
                     				<th class="text-right">Item Price:</th>
                                    <th class="text-right">Qty:</th>
                     				<th class="text-right">Total:</th>
                     			</tr>
                     		</thead>
                            <tbody>
                                <?php   while($row = mysqli_fetch_assoc($order_item_info_qry)){ ?>
                                    <tr>
                                        <td><?= $row["item_id"] ?></td>
                                        <td><?= $row["item_name"] ?></td>
                                        <td class="text-right"><?= $row["item_price"] ?></td>
                                        <td class="text-right"><?= $row["item_qty"] ?></td>
                                        <td class="text-right"><?= number_format($row["item_qty"]*$row["item_price"],2) ?></td>
                                    </tr>
                                <?php   }    ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-left" colspan="3" style="">&nbsp;</th>
                                    <th class="text-left" style="">Total Price</th>
                                    <td class="text-right">+ <?= $order_info["total_price"] ?></td>
                                </tr>
                                <tr>
                                    <th class="text-left" colspan="3" style="">&nbsp;</th>
                                    <th class="text-left" style="">Delivery Charges</th>
                                    <td class="text-right">+ <?= $order_info["delivery_charge"] ?></td>
                                </tr>
                                <?php 
                                    if($order_info["tip"] || ($order_info["tip"] != '0.0') ){ ?>
                                        <tr style="background: #f3be4a;">
                                            <th class="text-left" colspan="3" style="">&nbsp;</th>
                                            <th class="text-left" style="">Tip</th>
                                            <td class="text-right">+ <?= $order_info["tip"] ?></td>
                                        </tr>
                                <?php   } ?>

                                <?php 
                                    if($order_info["discount"]){ ?>
                                        <tr>
                                            <th class="text-left" colspan="3" style="">&nbsp;</th>
                                            <th class="text-left" style="">Discount(<?= $order_info["discount"]."%" ?>)</th>
                                            <td class="text-right"> <?= ($order_info["total_amount"]/100)*$order_info["discount"] ?></td>
                                        </tr>
                                <?php   } ?>

                                <tr>
                                    <th class="text-left" colspan="3" style="">&nbsp;</th>
                                    <th class="text-left" style="">Total Amount</th>
                                    <td class="text-right"><?= number_format($total,2) ?></td>
                                </tr>
                            </tfoot>
                     </table>