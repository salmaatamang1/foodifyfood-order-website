<html>
<head>
</head>
<body  style=" background-image: url(../image/oo.jfif);
    background-size: cover;
    background-repeat: no-repeat;
    background-position:cover;
    padding: 6% 0;">
<?php
$name=$_POST['customer'];
$milk=$_POST['milk'];
$black=$_POST['black'];
$herbal=$_POST['herbal'];
$cookies=$_POST['cookies'];
$muffin=$_POST['muffin'];
$pie=$_POST['pie'];
$tart=$_POST['tart'];
if($milk=="")$milk=0;
if($black=="")$black=0;
if($herbal=="")$herbal=0;
if($cookies=="")$cookies=0;
if($muffin=="")$muffin=0;
if($pie=="")$pie=0;
if($tart=="")$tart=0;
$milkcost=$milk*800;
$blackcost=$black*400;
$herbalcost=$herbal*900;
$cookiescost=$cookies*1000;
$muffincost=$muffin*200;
$piecost=$pie*250;
$tartcost=$tart*350;
$totalorder=$milk+$black+$herbal+$cookies+$muffin+$pie+$tart;
$totalprice=$milkcost+$blackcost+$herbalcost+$cookiescost+$muffincost+$piecost+$tartcost;
?>
<h2>Your Order:</h2>
<?php
print("$name");
?>

<table border="1px" cellpadding="10" cellspacing="0" class="align" width="80%">
<tr>
                    <th colspan="5">Italian</th>
                </tr>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Ordered Quantity</th>
                    <th colspan="2">cost</th>
                </tr>
                <tr >
                    <td>item1</td>
                    <td>Rs 800</td>
                    <td><?php 
                    print("$milk")?></td>
                    <td>
                    <td><?php 
                    print("$milkcost")?></td>
                 </tr>
                <tr >
                    <td>item2</td>
                    <td>Rs 400</td>
                    <td><?php 
                    print("$black")?></td>
                    <td>
                    <td><?php 
                    print("$blackcost")?></td>
                </tr>
                <tr >
                    <td>item3</td>
                    <td>Rs 900</td>
                    <td><?php 
                    print("$herbal")?></td>
                    <td>
                    <td><?php 
                    print("$herbalcost")?></td>
               </tr>
                <tr>
                    <th colspan="5">Continental</th>
                </tr>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Ordered Quantity</th>  
                    <th colspan="2"> Cost</th>
                </tr>
                <tr >
                    <td>item1</td>
                    <td>Rs 1000</td>
                    <td><?php 
                    print("$cookies")?></td>
                    <td>
                    <td><?php 
                    print("$cookiescost")?></td>
                </tr>
                <tr >
                    <td>item2</td>
                    <td>Rs 2000</td>
                    <td><?php 
                    print("$muffin")?></td>
                    <td>
                    <td><?php 
                    print("$muffincost")?></td>
                </tr>
                <tr >
                    <td>item3</td>
                    <td>Rs 250</td>
                    <td><?php 
                    print("$pie")?></td>
                    <td>
                    <td><?php 
                    print("$piecost")?></td>
                </tr>
                <tr >
                    <td>item4</td>
                    <td>Rs 350</td>
                    <td><?php 
                    print("$tart")?></td>
                    <td>
                    <td><?php 
                    print("$tartcost")?></td>
                </tr>
</table>
</html>
<br><br>
<?php
print("Total item ordered:$totalorder <br/>");?><br>
<?php
print("Total cost:$totalprice");
?>