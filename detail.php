<!DOCTYPE html>
<?php 

	include_once "connect.php";
	
	$id = $_REQUEST['id'];
	if($id != ""){
		//if user click search
		$sql = "SELECT * FROM BasicInfo WHERE `id`='".$id."'";
		
    	//prevent sql injection
/* 		$sql = mysql_real_escape_string($sql); */
		mysql_query("SET NAMES 'utf8'");
		mysql_query("SET CHARACTER SET utf8");
		mysql_query("SET SESSION collation_connection = 'utf8_unicode_ci'");
		$result = mysql_query($sql);
		$data = mysql_fetch_array($result);
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
	          	<li><a href="introduction.php">项目简介</a></li>
	            <li class="active"><a href="crop.php">数据库查询 <span class="sr-only">(current)</span></a></li>
	            <li><a href="#">联系我们</a></li>
	          </ul>
	        </div>
	        <!-- end sider page -->
	        
	        <!-- main page -->
	        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	          <h1 class="page-header">数据库查询</h1>
		
	          	<h3 class="sub-header">详细信息</h2>
				<div class="panel panel-default">
					<div class="panel-heading" data-toggle="collapse"
						data-parent="#accordion" data-target="#collapseInfoBox">
						<h4 class="panel-title">
							<span class="glyphicon glyphicon-search"></span>
							<?php 
								echo $data['crop'];
							?>
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
										display($data);			
									}
									?>
	
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
	function display($data)
	{
		$option = array("ID","作物名称","种质名称","科名","属名","种名或亚种名","来源地","原产国","原产省","原产地","资源类型","主要特性","生育周期","海拔","经度","纬度","鉴定试验地点","土壤类型","生态系统类型","年均温度","年均降雨量","抗旱性鉴定结果","保存单位","保存资源类型","保存方式","实物状态","共享方式","获取途径","联系方式");
		$optionseng = array("id","crop","germplasm","family","genericname","specificname","originofarea","originofcountry","originofprovince","sourcearea","resoucetype","mainfeature","growthcycle","altitude","longitude","latitude","testlocation","soiltype","ecosystemtype","temperatureavg","rainfallavg","testresult","depositunit","depositresourcetype","depositmethod","entitystatus","sharemethod","collectmethod","contact");
		for($i=0; $i<count($optionseng); $i++){
    		echo "<tr><td class=\"col-xs-3\">".$option[$i]."</td><td class=\"col-xs-9\">".$data[$optionseng[$i]]."</td></tr>";	
		}
	}
?>