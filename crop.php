<!DOCTYPE html>
<?php 

	include_once "connect.php";
	
    $optionseng = array("id","crop","germplasm","family","genericname","specificname","originofarea","originofprovince","originofcountry","sourcearea","resoucetype","mainfeature","growthcycle","altitude","longitude","latitude","testlocation","soiltype","ecosystemtype","temperatureavg","rainfallavg","testresult","depositunit","depositresourcetype","depositmethod","entitystatus","sharemethod","collectmethod");	
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$currPage = 0;
	if(isset($_REQUEST['submit']))
	{
		//if user click search
		$sql = "SELECT id,crop,germplasm,family,genericname,specificname FROM BasicInfo ";
		$conditions = "WHERE ";
		for($i = 0; $i<count($optionseng);$i++)
		{

			if($_REQUEST[$optionseng[$i]]!="")
			{
				$conditions .= "`".$optionseng[$i]."`";
				$conditions .= " = ";
				$conditions .= "'".$_REQUEST[$optionseng[$i]]."'";
				$conditions .= " and ";
			}
		}
		if($conditions != "WHERE "){
			$sql.=$conditions;
		}else{
			$sql.="LIMIT 10";
		}
		$pos = strrpos($actual_link, "=");
		if($pos==(strlen($actual_link)-1))
		{
		}
		else
		{
			$currPage = $_REQUEST['start'];
			$sql.=" OFFSET ".$currPage;			
		}

		/*if($_REQUEST['start']!=""){
			$currPage = $_REQUEST['start'];
			$sql.=" OFFSET ".$currPage;
		}*/
		$pos = strrpos($sql, "and");
		
		if($pos !== false)
    	{
        	$sql = substr_replace($sql,"", $pos, 3);
    	}
    	//prevent sql injection
/* 		$sql = mysql_real_escape_string($sql); */
		mysql_query("SET NAMES 'utf8'");
		mysql_query("SET CHARACTER SET utf8");
		mysql_query("SET SESSION collation_connection = 'utf8_unicode_ci'");
		$result = mysql_query($sql);
	}else{
		$sql = "SELECT id,crop,germplasm,resoucetype,testlocation,testresult,collectmethod FROM BasicInfo LIMIT 10";
		mysql_query("SET NAMES 'utf8'");
		mysql_query("SET CHARACTER SET utf8");
		mysql_query("SET SESSION collation_connection = 'utf8_unicode_ci'");
		$result = mysql_query($sql);
	}
?>


<html lang="cn">
	<head>
		<meta charset = "utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Bootstrap core CSS -->
		<link href="dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom styles for this template -->
		<link href="css/dashboard.css" rel="stylesheet">
  		<title>抗旱作物数据库</title>
  		
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
	      <div class="container-fluid">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="#">云南粮经作物种质资源抗旱鉴定评价信息共享数据库</a>
	        </div>
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="#">数据库</a></li>
	            <li><a href="#">登录</a></li>
	            <li><a href="#">帮助</a></li>
	          </ul>
	        </div>
	      </div>
	    </nav>
	    
	    <!-- container-fluid -->
	    <div class="container-fluid">
	      <!-- row -->
	      <div class="row">
	      	<!-- sider page -->
	        <div class="col-sm-3 col-md-2 sidebar">
	          <ul class="nav nav-sidebar">
	          	<li><a href="#">项目简介</a></li>
	            <li class="active"><a href="#">数据库查询 <span class="sr-only">(current)</span></a></li>
	            <li><a href="#">联系我们</a></li>
	          </ul>
	        </div>
	        <!-- end sider page -->
	        
	        <!-- main page -->
	        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	          <h1 class="page-header">数据库查询</h1>
		
	          <h3 class="sub-header">查询条件</h2>
	          
	          <form action="crop.php" method="get"
						id='crop-query-form' role='form'>
				<div class='input-group' id='basic-query-conditions'></div>
				
			    <div class="collapse" id="advancedquerycondition"></div>
				
				<div class="col-sm-12 text-center">
					<button type="button" class="btn btn-default" data-toggle="collapse" data-target="#advancedquerycondition">更多条件</button>
					<button type="submit" class="btn btn-info" name="submit">搜索</button>
				</div>
			  </form>
			  
			  <!--Infobox -->
		        <h3 class="sub-header">查询结果</h2>
				<div class="panel panel-default">
					<div class="panel-heading" data-toggle="collapse"
						data-parent="#accordion" data-target="#collapseInfoBox">
						<h4 class="panel-title">
							<span class="glyphicon glyphicon-search"></span>查询结果
						</h4>
					</div>
					<div id="collapseInfoBox" class="panel-collapse collapse in">
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-hover table-striped text-center">
									<tbody>
									<?php 
									if($result!=false)
									{
										display($result);			
									}
									?>
	
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<ul class="pager">
				<?php
					$prevPage = $currPage-10;
					$prevPage = $prevPage>0?$prevPage:0;
					$nextPage = $currPage+10;
					echo "<li class=\"previous\"><a href=\"".$actual_link."&start=".$prevPage."\">上一页</a></li>";
					echo "<li class=\"next\"><a href=\"".$actual_link."&start=".$nextPage."\">下一页</a></li>";
				?>
				</ul>
	        </div>
	        <!-- end main page -->
	      </div>
	      <!-- end row -->
	    </div>
	    <!-- end container-fluid -->
	    
	</body>
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/vendor/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="js/crop.js"></script>
</html>

<?php
	function display($result)
	{
		$option = array("作物名称","种质名称","资源类型","鉴定试验地点","抗旱性鉴定结果","获取途径","详细信息","抗旱鉴定结果");
		echo "<thead><tr>";
		for($i = 0; $i< count($option); $i++)
		{
			echo "<th class='text-center'>".$option[$i]."</th>";
		}
		echo "</tr></thead>";
		while($row = mysql_fetch_array($result))
    	{
    		echo "<tr><td>".$row['crop']."</td><td>".$row['germplasm']."</td><td>".$row['collectmethod']."</td><td>".$row['resoucetype']."</td><td>".$row['testlocation']."</td><td>".$row['testresult']."</td><td><a href=\"detail.php?id=".$row['id']."\" target=\"_blank\">详细信息</a></td><td><a href=\"experiment.php?id=".$row['id']."\" target=\"_blank\">鉴定结果</a></td></tr>";
    	}
	}
?>