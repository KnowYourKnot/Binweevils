<?php
session_start();
error_reporting(0);
include('../../../essential/backbone.php');

if(isset($_GET)) {
    $adminName = $_SESSION['admin'];
    $adminPassword = $_SESSION['adminPassword'];
    $weevilName = $_GET['weevilName'];
    $itemName = $_GET['itemName'];

    if(!empty($adminName) && !empty($adminPassword) && !empty($weevilName) && !empty($itemName)) {
        if(adminLogin($adminName, $adminPassword)) {
            $weevilData = adminGetWeevilStatsByName($weevilName);
            $itemData = getItemDataByName($itemName);

            if(is_array($weevilData)) {
                if(!empty($itemData)) {
                    if(adminRewardNestItem($weevilData["id"], $itemData["itemTypeID"], $itemData["category"], $itemData["configLocation"])) {
                        logAdminActionItem($adminName, $weevilName, strval(time()), 4, $itemData["name"]);
                        echo '1';
                    }
                    else echo json_encode(["responseCode" => 999, "message" => "could not give player item."]);
                }
                else echo json_encode(["responseCode" => 999, "message" => "item not found."]);
            }
            else echo json_encode(["responseCode" => 999, "message" => "weevil not found."]);
        }
        else echo json_encode(["responseCode" => 999, "message" => "error occured."]);
    }
    else echo json_encode(["responseCode" => 999, "message" => "error occured."]);
}
else echo json_encode(["responseCode" => 999, "message" => "error occured."]);
?>