<?php
/**
 * Created by PhpStorm.
 * User: 0311
 * Date: 10.05.2017
 * Time: 8:45 AM
 */
?>
<form action='<?= htmlentities($_SERVER['SCRIPT_NAME']) ?>' method='post'>
    Name: <input type='text' name='name'/> <br/>
    Age: <input type='text' name='age'/> <br/>
    <input type='hidden' name='stage' value='<?= $stage + 1 ?>'/>
    <input type='submit' value='Next'/>
</form>
