<?php
// TEST: Apakah PHP berjalan?
echo "PHP is working!";
echo "<br>Request URI: " . $_SERVER['REQUEST_URI'];
echo "<br>Document Root: " . $_SERVER['DOCUMENT_ROOT'];
echo "<br>Current Directory: " . __DIR__;