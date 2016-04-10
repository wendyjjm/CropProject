<!DOCTYPE html>
<?php 

	include_once "connect.php";
	
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
	          <a class="navbar-brand" href="#">抗旱作物数据库</a>
	        </div>
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="#">数据库</a></li>
	            <li><a href="#">登陆</a></li>
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
	          <h1 class="page-header">抗旱数据库查询</h1>
		
	          <h2 class="sub-header">查询条件</h2>
	          
	          <form action="crop.php" method="get"
						id='crop-query-form' role='form'>
				<div class='input-group' id='basic-query-conditions'></div>
				
			    <div class="collapse" id="advancedquerycondition"></div>
				
				<div class="col-sm-12 text-center">
					<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#advancedquerycondition">更多条件</button>
					<button type="submit" class="btn btn-default" name="submit">搜索</button>
				</div>
			  </form>
			  
			  <!--Infobox -->
		        <h2 class="sub-header">查询结果</h2>
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
										<td class="col-xs-3">A</td>
										<td class="col-xs-9">B</td>
	
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
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