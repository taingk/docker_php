<?php

// Use in the "Post-Receive URLs" section of your GitHub repo.
if ( $_POST['payload'] ) {
  shell_exec( 'cd ../ && git reset --hard HEAD && git pull && cp config/conf.inc.php app/conf.inc.php' );
}
?>
