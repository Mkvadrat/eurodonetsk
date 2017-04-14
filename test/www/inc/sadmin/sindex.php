<?php
$real_md = get_real_md(mysql_real_escape_string($_SESSION['user_name']));

if ($real_md == $_SESSION['md'])
{
 $roles = array(0, 0, 0, 0, 0, 0, 0);
 
 $sql = mysql_query("SELECT tp.part as part from authuser au left join t_role tr on tr.id = au.u_role left join t_permit tp on tp.id_role = tr.id where au.uname like '%".$_SESSION['user_name']."'")    
    or die("Invalid query: " . mysql_error());
        
    while ($row = mysql_fetch_array($sql))
    {
       switch($row['part']) {
        case 1:
            $roles[0] = 1;
            break;
        case 2:
            $roles[1] = 1;
            break;
        case 3:
            $roles[2] = 1;
            break;
        case 4:
            $roles[3] = 1;
            break;
        case 5:
            $roles[4] = 1;
            break;
        case 6:
            $roles[5] = 1;
            break;
      }
 }  
 require_once ('sadmin/smenu.php');
 
 if (($_GET['sub_m'] == 1)&&($roles[0] == 1))
 {
   require_once ('sadmin/dbtree.php');
 }
 if (($_GET['sub_m'] == 2)&&($roles[1] == 1))
 {
   echo '<div id="manager">';
   require_once ('sadmin/manager_add.php');
   echo '</div>';
 }
 if ($_GET['sub_m'] == 3)
 { 
   $_SESSION['user_name'] = "";
   $_SESSION['md'] = "";
   header ("Location: sadmin.php");
 }
 if (($_GET['sub_m'] == 4)&&($roles[2] == 1))
 { 
   echo '<div id="confirm">';
   require_once ('sadmin/business_edit.php');
   echo '</div>';
 }
  if (($_GET['sub_m'] == 5)&&($roles[4] == 1))
 { 
   echo '<div id="ban">';
   require_once ('sadmin/ban.php');
   echo '</div>';
 }
 if (($_GET['sub_m'] == 6)&&($roles[3] == 1))
 {
   echo '<div id="manager">';
   require_once ('sadmin/business_add.php');
   echo '</div>';
 }
 if (($_GET['sub_m'] == 7)&&($roles[5] == 1))
 {
   echo '<div id="manager">';
   require_once ('sadmin/search.php');
   echo '</div>';
 } 
}
?>