<?php
if ($_POST["token"] == '9edf891593197957cc73349baba3d50e') {
    file_put_contents("./gartentemp.txt", $_POST["tempgarten"]);
    file_put_contents("./lennoxtemp.txt", $_POST["templennox"]);
    file_put_contents("./tempupdate.txt", time());
}
