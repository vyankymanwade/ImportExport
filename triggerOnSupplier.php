<?php
$mysqli = new mysqli("localhost", "root", "codingmafia@8187", "ImportExport");
if ($mysqli ==  false) {
    die("ERROR: Could not connect. "
        .$mysqli->connect_error);
}

        $sql = "create trigger update_supplier after insert on user_details for each row begin if (NEW.User_type=='Supplier') then insert into import_request(Commodity_id,Commodity_name,Quantity,Cost)values(New.Commodity_id,New.Commodity_name,NEW.Quantity,New.Cost);end if;end";
        $mysqli->query($sql);

        echo "trigger successfull";
    $mysqli->close();
?>