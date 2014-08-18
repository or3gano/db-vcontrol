<?php

$command = 'mysqldump.exe --opt --skip-extended-insert --complete-insert --host=localhost --user=root --password="" db_vcontrol>backup.sql';

var_dump(exec($command));

?>