<?php include 'db_connect.php' ?>
<?php
if(isset($_GET['id'])){
	$type_arr = array('',"Admin","Project Manager","Employee");
	$qry = $conn->query("SELECT *,concat(firstname,' ',lastname) as name FROM users where id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
}
if(isset($_GET['id'])){
	
	// $d = $conn->query("SELECT user_ids , manager_id From project_list");
	// $m_ids = array();
	// $u_ids = array();
	// $usr_ids = array();
	// $i = 0;
	// $j = 0;
	// $s_id = Null;
	// $s1_id = Null;
	// while($line=$d->fetch_assoc()){
	// 	array_push($m_ids,$line['manager_id']);
	// 	array_push($u_ids,$line['user_ids']);	
	// }
	// while($i< count($u_ids)){
	// 	$uid_ar = explode(",",$u_ids[$i]);
	// 	foreach($uid_ar as $uid){
	// 	array_push($usr_ids,$uid);
	// 	}
	// 	$i++;
	// }
	// $i=0;
	// while($i< count($u_ids)){
	// 	$uid_ar = explode(",",$u_ids[$i]);
	// 	foreach($uid_ar as $uid){
	// 		if ($uid === $_GET['id']){
	// 			$s1_id = $u_ids[$i];
	// 		}	
	// 	}
	// 	$i++;
	// }
	// while($j < count($m_ids)){
	// 	if ($m_ids[$j] === $_GET['id']){
	// 		$s_id = $_GET['id'];
	// 	}
	// 	$j++;
	// }
	$project_name = "None";
	if($type_arr[$type]=="Project Manager"){
		$qry2 = $conn->query("SELECT name  FROM project_list where manager_id = '{$_GET['id']}'");
		$pro = $qry2->fetch_array();
		if($pro!=null){
			$project_name = $pro['name'];
		}
		else{
			$project_name = "None";
		}
	}
	if($type_arr[$type]=="Employee"){
		$qry3 = $conn->query("SELECT name  FROM project_list where '{$_GET['id']} in (user_ids)'");
		$pro2 = $qry3->fetch_array();
		if($pro2!=null){
			$project_name = $pro2['name'];
		}
		else{
			$project_name = "None";
		}
	}
	

	
}
?>
<div class="container-fluid">
	<div class="card card-widget widget-user shadow">
      <div class="widget-user-header bg-dark">
        <h3 class="widget-user-username"><?php echo ucwords($name) ?></h3>
        <h5 class="widget-user-desc"><?php echo $email ?></h5>
      </div>
      <div class="widget-user-image">
      	<?php if(empty($avatar) || (!empty($avatar) && !is_file('assets/uploads/'.$avatar))): ?>
      	<span class="brand-image img-circle elevation-2 d-flex justify-content-center align-items-center bg-primary text-white font-weight-500" style="width: 90px;height:90px"><h4><?php echo strtoupper(substr($firstname, 0,1).substr($lastname, 0,1)) ?></h4></span>
      	<?php else: ?>
        <img class="img-circle elevation-2" src="assets/uploads/<?php echo $avatar ?>" alt="User Avatar"  style="width: 90px;height:90px;object-fit: cover">
      	<?php endif ?>
      </div>
      <div class="card-footer">
        <div class="container-fluid">
        	<dl>
        		<dt>Role</dt>
        		<dd><?php echo $type_arr[$type] ?></dd>
        	</dl>
        </div>
		<?php if($type_arr[$type]!="Admin"):?>
		<div class="container-fluid"><dl><dt>Projects</dt><dd><?php echo  $project_name ?></dd></dl></div>
		<?php endif ?>
    </div>
	</div>
</div>
<div class="modal-footer display p-0 m-0">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
<style>
	#uni_modal .modal-footer{
		display: none
	}
	#uni_modal .modal-footer.display{
		display: flex
	}
</style>