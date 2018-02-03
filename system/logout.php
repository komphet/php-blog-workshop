<?php
session_start();
session_destroy();
echo "<meta http-equiv=\"refresh\" content=\"0;url=/?msg=". urlencode("Signed out successfully!").".\">";
echo "Redirecting...";
exit();
?>