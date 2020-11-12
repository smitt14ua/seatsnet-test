<?php

ob_start();
require "../html/city.php";
$content = ob_get_clean();
require "../html/layout.php";