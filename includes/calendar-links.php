<br/>
<?php
// this is to add a class active to the link when we are on a school/college link
$current_url = $_SERVER['REQUEST_URI'];
function isActive($keyword) {
    global $current_url;
    if (strpos($current_url, $keyword) !== false) {
        return 'active';
    }
    return '';
}

$keywords = ['argyros', 'attallah', 'crean', 'copa', 'dodge', 'fowler', 'law', 'schmid', 'communication', 'pharmacy', 'wilkinson', 'student'];
$anyMatched = false;
foreach ($keywords as $k) {
    if (isActive($k)) {
        $anyMatched = true;
        break;
    }
}
?>
<h3> Calendars </h3>
<div class="calendars">
<a href="<?php echo $baseUrl.'/index.php' ?>" class="<?php echo !$anyMatched ? 'active' : ''; ?>"> All Events</a>
<a href="<?php echo $baseUrl.'/argyros/index.php' ?>" class="<?php echo isActive('argyros'); ?>"> Argyros College of Business & Economics</a>
<a href="<?php echo $baseUrl.'/attallah/index.php' ?>" class="<?php echo isActive('attallah'); ?>"> Attallah College of Educational Studies</a>
<a href="<?php echo $baseUrl.'/crean/index.php' ?>" class="<?php echo isActive('crean'); ?>"> Crean College of Health and Behavioral Sciences</a>
<a href="<?php echo $baseUrl.'/copa/index.php' ?>" class="<?php echo isActive('copa'); ?>"> College of Performing Arts</a>
<a href="<?php echo $baseUrl.'/dodge/index.php' ?>" class="<?php echo isActive('dodge'); ?>"> Dodge College of Film and Media Arts</a>
<a href="<?php echo $baseUrl.'/fowler/index.php' ?>" class="<?php echo isActive('fowler'); ?>">Fowler School of Engineering</a>
<a href="<?php echo $baseUrl.'/musco/index.php' ?>" class="<?php echo isActive('musco'); ?>">Musco Center for the Arts</a>
<a href="<?php echo $baseUrl.'/law/index.php' ?>" class="<?php echo isActive('law'); ?>">Fowler School of Law</a>
<a href="<?php echo $baseUrl.'/schmid/index.php' ?>" class="<?php echo isActive('schmid'); ?>">Schmid College of Science and Technology</a>
<a href="<?php echo $baseUrl.'/communication/index.php' ?>" class="<?php echo isActive('communication'); ?>">School of Communication</a>
<a href="<?php echo $baseUrl.'/pharmacy/index.php' ?>" class="<?php echo isActive('pharmacy'); ?>">School of Pharmacy</a>
<a href="<?php echo $baseUrl.'/wilkinson/index.php' ?>" class="<?php echo isActive('wilkinson'); ?>">Wilkinson College of Arts, Humanities, and Social Sciences</a>
<a href="<?php echo $baseUrl.'/students/index.php' ?>" class="<?php echo isActive('student'); ?>">Student Events</a>
</div>
