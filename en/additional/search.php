
<?php error_reporting(E_ERROR | E_PARSE);?>

<?php
$out='';
include 'additional/config.php';		// protection 
$q=mysqli_real_escape_string($conn,htmlentities($_GET['search']));
				 // counting the rows count 
$sql0 = mysqli_query($conn, "SELECT count(*) AS var from int_types WHERE type LIKE '%$q%';");
$row0 = mysqli_fetch_assoc($sql0);
$total=$row0['var'];

	//if spage GET parameter not set give it value 1 by default
$page=max(intval( mysqli_real_escape_string($conn,htmlentities($_GET['spage'])) ),1); 
// i want 10 records to appear per page
$itemsperpage = 10;
		// calculating total pages
$totalpages = max(ceil($total/$itemsperpage),1);
											// show 10 per page
$sql = mysqli_query($conn, "SELECT * from int_types WHERE type LIKE '%$q%' LIMIT " . (($page-1)*$itemsperpage).",".$itemsperpage);
while($row = mysqli_fetch_assoc($sql)){
$out='                
                    <tr>
                        <td>'. $row["type"] . '</td>
                        <td>' . $row["symbole"] . '</td>
                        <td>
                            <span  id="btn1" ><a href="modify_Intelligence.php?s=' . $row["symbole"] . '" >Modify</a></span>
                            <span  style="cursor:pointer"  onclick="func(event)" id="btn2" qid=' .$row["id"] . ' >Delete</span>


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
location = "question_Table.php?del=" + qid;
}
};

</script>
