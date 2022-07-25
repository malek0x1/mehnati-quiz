
<?php error_reporting(E_ERROR | E_PARSE);
if(!isset($_GET['page'])){$_GET['page']=1;}?>
<?php
$out='';
include 'additional/config.php';

//counting rows and then giving the value to "var" variable
$sql0 = mysqli_query($conn, "SELECT count(*) AS var from int_types;");
$row0 = mysqli_fetch_assoc($sql0);
$total=$row0['var'];
//if page get parameter not set or doesnt contains value then give it value "1";
$page=max(intval(mysqli_real_escape_string($conn,$_GET['page'])),1); 

$itemsperpage = 10;
//calculating total pages
$totalpages = max(ceil($total/$itemsperpage),1);
								// only show 10 records per page
$sql = mysqli_query($conn, "SELECT * from int_types  LIMIT " . (($page-1)*$itemsperpage).",".$itemsperpage);
while($row = mysqli_fetch_assoc($sql)){
$out='                
                    <tr>
                        <td>'. $row["type"] . '</td>
                        <td>' . $row["symbole"] . '</td>
                        <td>
                            <span  id="btn1" ><a href="modify_Intelligence.php?s=' . $row["symbole"]  . '" >Modify</a></span>
                            <span style="cursor:pointer;"  onclick="func(event)" id="btn2" qid=' .$row["symbole"] . ' >Delete</span>

                        </td>
                    </tr>';
echo $out;

}
?>
<script>
const func = (e) =>
{
var qid = e.target.getAttribute('qid');
var conf = confirm("Are you sure ?");
if (conf){
location = "intelligence_Table.php?del=" + qid;
}
};
</script>
