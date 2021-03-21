<?php
    include_once 'header.php';
?>

<!-- Main Content -->

<div class="container">

    <div>
        <h1 class= "head1"><b>TRANSFERS<b></h1>
        <h5 class= "subhead1"><b>* CLICK ON NAME FOR MORE DETAILS *<b></h5>
        <?php
            $sql = "SELECT * FROM transfers;";
            $resultcus = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($resultcus);
        ?>
    </div>

    <div class="accordion">
        <button type="button" class="cusbtn" style="text-align: center;"><span style="float: left; ">NO</span>Sender_Name Transfered (Amount) To Receiver_Name </button>
    </div>

    <div class="accordion">
        <?php foreach($resultcus as $row) { ?>
        <button type="button" class="accordion__button" style="text-align: center;"><?php echo "<span style=\"float: left \">" .$row['transferid']. "</span>"; echo "<span>".$row['sender_name']." Transfered ".$row['transfered_amount']. "RS TO " .$row['receiver_name']."</span>"; ?></button>
        <div class="accordion__content" style="margin:0; padding: 0; text-align: center;">
            <p style="padding: 0 15px;">TRANSFER DATE: <?php echo $row['transfer_date']; ?></p>
    </div>
        <?php } ?>
    <?php
    if (isset($_GET["error"])){
        if ($_GET["error"] == "transfersuccess"){
            echo '<script language="javascript">';
            echo 'alert("Transfer Successful")';
            echo '</script>';
        }
    }
    ?>
</div>

<?php
    include_once 'footer.php';
?>