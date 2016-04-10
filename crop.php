<!DOCTYPE html>
<?php 

	include_once "connect.php";
?>


<html lang="en">
	<head>
		<meta charset = "utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  		<script src="js/crop.js"></script>
	</head>
	<body>
		<div class="container-fluid">
  			<div class="page-header text-center">
    			<h1>请输入查询条件</h1>      
  			</div>
		</div>
		<div class="container-fluid jumbotron">
				<form id="crop-query" class="form-inline" role="form" action="crop.php">
				</form>
		</div>
	</body>
</html>

<?php

	$options = array("序号","作物名称","种质名称","科名","属名","种名或亚种名","原产地","原产省","原产国","来源地","资源类型","主要特性","生育周期","系谱","选育单位","育成年分","海拔","经度","纬度","鉴定试验地点","土壤类型","生态系统类型","年均温度","年均降雨量","图像","抗旱鉴定结果","保存单位","库编号","圃编号","引种号","采集号","保存资源类型","保存方式","实物状态","共享方式","获取途径");
	$optionseng =array("id","crop","germplasm","family","genericname","specificname","originofarea","originofprovince","originofcountry","sourcearea","resoucetype","mainfeature","growthcycle","familytree","breedingunit","breedyear","altitude","longitude","latitude","testlocation","soiltype","ecosystemtype","temperatureavg","rainfallavg","image","testresult","depositunit","libraryid","gardenid","introductionid","collectid","depositresourcetype","depositmethod","entitystatus","sharemethod","collectmethod");
	if(isset($_REQUEST['submit']))
	{
		//if user click search
		$sql = "SELECT id,crop,germplasm,family,genericname,specificname FROM BasicInfo WHERE ";
		for($i = 0; $i< 36;$i++)
		{

			if($_REQUEST[$optionseng[$i]]!="")
			{
				$sql .= $optionseng[$i];
				$sql .= " = ";
				$sql .= $_REQUEST[$optionseng[$i]];
				$sql .= " and ";
			}
		}
		$pos = strrpos($sql, "and");
		if($pos !== false)
    	{
        	$sql = substr_replace($sql,"", $pos, 3);
    	}
    	//prevent sql injection
		$sql = mysql_real_escape_string($sql);
		$result = mysql_query($sql);
		if($result!=false)
		{
			display($result);			
		}

	}

	function display($result)
	{
		echo "<div class='container-fluid'>";
		echo "<table class='table table-striped'>";
		echo "<thead><tr><th>序号</th><th>作物名称</th><th>种质名称</th><th>科名</th><th>属名</th><th>种名或亚种名</th><th>详细信息</th><th>抗旱鉴定结果</th></tr></thead>";
		while($row = mysql_fetch_array($result))
    	{
    		echo "<tr><td>".$row['id']."</td><td>".$row['crop']."</td><td>".$row['germplasm']."</td><td>".$row['family']."</td><td>".$row['genericname']."</td><td>".$row['specificname']."</td><td>详细信息</td><td>鉴定结果</td></tr>";
    	}
		echo "</table>";
		echo "</div>";
	}
?>