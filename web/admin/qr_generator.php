<?php
require_once("libraries/phpqrcode/qrlib.php");

QRcode::png($_GET['code']);