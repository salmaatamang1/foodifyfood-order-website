<!DOCTYPE html>
<html>
    <head>
        <rel link="stylesheet" href="../css/style.css">
    </head>
    <body style=" background-image: url(../image/o1.jfif);
    background-size: cover;
    background-repeat: no-repeat;
    background-position:cover;
    padding: 6% 0;">
        <form action="order1.php" method="post" autocomplete="off">
            <h2>Foodify menu:</h2>
            <label>Name of customer:
                <input type="text" name="customer" size="10"/>
            </label><br/><br/>
            <table border="1px" cellpadding="10" cellspacing="0" width="50%">
                <tr>
                    <th colspan="3">Italian</th>
                </tr>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
                <tr>
                    <td>item1</td>
                    <td>Rs 800</td>
                    <td>
                        <input type="text" name="milk" size="10"/>
                    </td>
                </tr>
                <tr>
                    <td>item2</td>
                    <td>Rs 400</td>
                    <td>
                        <input type="text" name="black" size="10"/>
                    </td>
                </tr>
                <tr>
                    <td>item3</td>
                    <td>Rs 900</td>
                    <td>
                        <input type="text" name="herbal" size="10"/>
                    </td>
                </tr>
                <tr>
                    <th colspan="3">Continental</th>
                </tr>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>  
                </tr>
                <tr>
                    <td>item1</td>
                    <td>Rs 1000</td>
                    <td>
                        <input type="text" name="cookies" size="10"/>
                    </td>
                </tr>
                <tr>
                    <td>item2</td>
                    <td>Rs 200</td>
                    <td>
                        <input type="text" name="muffin" size="10"/>
                    </td>
                </tr>
                <tr>
                    <td>item3</td>
                    <td>Rs 250</td>
                    <td>
                        <input type="text" name="pie" size="10"/>
                    </td>
                </tr>
                <tr>
                    <td>item4</td>
                    <td>Rs 350</td>
                    <td>
                        <input type="text" name="tart" size="10"/>
                    </td>
                </tr>
                <th colspan="3">
                    <input type="submit" name="submit" value="Sumit order"/>
                    <input type="reset" value="Cancel"/>
                </th>
            </table>
        </form>
    </body>
</html>
