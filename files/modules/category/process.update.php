<?php
    include('../../includes/inc.main.php');
    
    if($_POST['action']=="update")
    {
        $Result     = $Meli->get('sites/'.$_POST['site'].'/categories');
        $Categories = $Result['body'];
        foreach($Categories as $Category)
        {
            $ID     = $Category->id;
            $Fields .= Category::InsertCategory($ID,$ParentID,$_POST['site'],$Meli);
        }
        $Fields = substr($Fields,2);
        $DB->execQuery("INSERT","category","category_id,prent_id,site,name,picture",$Fields);
    }
?>
<pre>
    <?php echo $DB->lastQuery(); ?>
</pre>