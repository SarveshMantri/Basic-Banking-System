<?php
    include_once 'header.php';
?>

<!-- Main Content -->

<div class="container">

    <div>
        <h1 class= "head1"><b>CUSTOMERS<b></h1>
        <h5 class= "subhead1"><b>* CLICK ON NAME FOR MORE DETAILS *<b></h5>
        <?php
            $sql = "SELECT * FROM customer;";
            $resultcus = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($resultcus);
        ?>
    </div>
    
    <div class="accordion">
        <button type="button" class="cusbtn" style="text-align: center;"><span style="float: left; ">ID</span>NAME</button>
    </div>

    <div class="accordion">
        <?php foreach($resultcus as $row) { ?>
        <button type="button" class="accordion__button" style="text-align: center;"><?php echo "<span style=\"float: left \">" .$row['customerid']. "</span>"; echo $row['customername'];?></button>
        <div class="accordion__content" style="margin:0; padding: 0; text-align: center;">
            <p style="padding: 0 15px;">EMAIL: <?php echo $row['customeremail']; ?> <br> BALANCE: <?php echo $row['customerbalance']; ?> </p>
            <button type="button" class="accordion__button" style="border: 0; text-align: center; border-radius: 25px; border-top-left-radius: 0; border-top-right-radius: 0; .accordion__button:hover{color: gold;}" >MAKE TRANSACTION</button>
            <div class="accordion__content" style="border: 0;">
                <p style="text-align:center;"><span style="font-size:25px">TO<span></p>
                    <form action=includes/transfer.inc.php? method="post" class="submission-form">
                        <input type="number" name="receiver_id" placeholder="ID" required>
                        <input type="text" name="receiver_name" placeholder="NAME" required>
                        <input type="number" name="amount" placeholder="AMOUNT" required>
                        <input type="hidden" name="customerid" value="<?php echo $row['customerid']; ?>">
                        <input type="hidden" name="customername" value="<?php echo $row['customername']; ?>">
                        <button type="submit" name="submit" class="sub-btn" style="text-align: center;">TRANSFER</button>
                    </form>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php
        if (isset($_GET["error"])){
            if ($_GET["error"] == "receivernotexist"){
                echo '<script language="javascript">';
                echo 'alert("RECEIVER DOES NOT EXIST")';
                echo '</script>';
            }
            else if ($_GET["error"] == "samecustomer"){
                echo '<script language="javascript">';
                echo 'alert("Can\'t send to same user ")';
                echo '</script>';
            }
            else if ($_GET["error"] == "Rollback"){
                echo '<script language="javascript">';
                echo 'alert("Transaction Failed... Executing Rollback")';
                echo '</script>';
            }
            else if ($_GET["error"] == "none"){
                echo '<script language="javascript">';
                echo 'alert("message successfully sent")';
                echo '</script>';
            }
            
        }
    ?>
    <br><br><br><br>
</div>

<?php
    include_once 'footer.php';
?>