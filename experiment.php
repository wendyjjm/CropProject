<!DOCTYPE html>
<?php 

	include_once "connect.php";
	$id = $_REQUEST['id'];
	$crop = $_REQUEST['crop'];
	if($id != ""){
		//if user click search

		//$sql = "SELECT * FROM BasicInfo WHERE `id`='".$id."'";
		
    	//prevent sql injection
/* 		$sql = mysql_real_escape_string($sql); */
		$result = "";
		$type = "";
		mysql_query("SET NAMES 'utf8'");
		mysql_query("SET CHARACTER SET utf8");
		mysql_query("SET SESSION collation_connection = 'utf8_unicode_ci'");
		switch ($crop) {
			case '水稻':
				$sql = "SELECT * FROM shuidao WHERE `id`='".$id."'";
				$result = mysql_query($sql);
				$type = "shuidao";
				break;
			case '小麦':
				$sql = "SELECT * FROM xiaomai WHERE `id`='".$id."'";
				$result = mysql_query($sql);
				$type = "xiaomai";
				break;
			case '旱稻':
				$sql = "SELECT * FROM handao WHERE `id`='".$id."'";
				$result = mysql_query($sql);
				$type = "handao";
				break;
			case '油菜':
				$sql = "SELECT * FROM youcai WHERE `id`='".$id."'";
				$result = mysql_query($sql);
				$type = "youcai";
				break;
			case '玉米':
				$sql = "SELECT * FROM yumi WHERE `id`='".$id."'";
				$result = mysql_query($sql);
				$type = "yumi";
				break;
			case '马铃薯':
				$sql = "SELECT * FROM malingshu WHERE `id`='".$id."'";
				$result = mysql_query($sql);
				$type ="malingshu";
				break;			

		}
		/*$sql = "SELECT * FROM shuidao WHERE `id`='".$id."'";
		$result = mysql_query($sql);
		$type = "shuidao";
		if($result==false)
		{
			$sql = "SELECT * FROM xiaomai WHERE `id`='".$id."'";
		    $result = mysql_query($sql);
		    $type = "xiaomai";
		    if($result==false)
		    {
		    	$sql = "SELECT * FROM handao WHERE `id`='".$id."'";
				$result = mysql_query($sql);
				$type = "handao";
				if($result==false)
				{
					$sql = "SELECT * FROM youcai WHERE `id`='".$id."'";
					$result = mysql_query($sql);
					$type = "youcai";
					if($result==false)
					{
						$sql = "SELECT * FROM yumi WHERE `id`='".$id."'";
						$result = mysql_query($sql);
						$type = "yumi";
						if($result == false)
						{
							$sql = "SELECT * FROM malingshu WHERE `id`='".$id."'";
							$result = mysql_query($sql);
							$type = "malingshu";
						}
					}
				}
		    }
		}*/
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
  		<title>云南粮经作物种质资源抗旱鉴定评价信息共享数据库</title>
  		
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
		
	          	<h3 class="sub-header">鉴定结果</h2>
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
										display($data,$type);			
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
	function display($data,$type)
	{
		$option = array();
		$optionseng = array();
		switch($type)
		{	
			case "xiaomai":
				$option = array("ID","作物名称","种质名称","抗旱系数","抗旱指数","全生育期抗旱性","相对芽长","相对芽长抗旱性","相对芽鞘长","相对芽鞘抗旱性","相对发芽势","相对发芽势抗旱性","相对根长","相对根长抗旱性","相对根数","相对根数抗旱性","相对发芽率","相对发芽率抗旱性","相对芽干重","相对芽干重抗旱性","相对根干重","相对根干重抗旱性","总级别","综合评价");
				$optionseng = array("id","crop","germplasm","xishu","zhishu","quanshengyuqi","relativesprout","levelbaseonsprout","relativesproutlength","levelbaseonsproutlength","relativegermination","levelbaseongermination","relativerootlength","levelbaseonrootlength","relativerootno","levelbaseonrootno","relativegerminationrate","levelbaseongerminationrate","relativesproutweight","levelbaseonsproutweight","relativerootweight","levelbaseonrootweight","level","zonghepingjia");
				break;				
			case "handao":
				$option = array("ID","作物名称","种质名称","相对芽长","相对芽长抗旱性","相对芽鞘长","相对芽鞘抗旱性","相对根长","相对根长抗旱性","相对根数","相对根数抗旱性","相对发芽率","相对发芽率抗旱性","相对芽干重","相对芽干重抗旱性","相对根干重","相对根干重抗旱性","总级别","综合评价");
				$optionseng = array("id","crop","zhongzhi","relativesprout","levelbaseonsprout","relativesproutlength","levelbaseonsproutlength","relativerootlength","levelbaseonrootlength","relativerootno","levelbaseonrootno","relativegerminationrate","levelbaseongerminationrate","relativesproutweight","levelbaseonsproutweight","relativerootweight","levelbaseonrootweight","level","levelbaseonlevel");
				break;
			case "shuidao":
				$option = array("ID","作物名称","种质名称","相对芽长","相对芽长抗旱性","相对芽鞘长","相对芽鞘抗旱性","相对根长","相对根长抗旱性","相对根数","相对根数抗旱性","相对发芽率","相对发芽率抗旱性","相对芽干重","相对芽干重抗旱性","相对根干重","相对根干重抗旱性","总级别","综合评价");
				$optionseng = array("id","crop","germplasm","relativesproutlength","levelbaseonsproutlength","relativesprout","levelbaseonsprout","relativerootlength","levelbaseonrootlength","relativerootno","levelbaseonrootno","relativegerminationrate","levelbaseongerminationrate","relativesproutweight","levelbaseonsproutweight","relativerootweight","levelbaseonrootweight","level","levelbaseonlevel");
				break;
			case "youcai":
				$option = array("ID","作物名称","种质名称","抗旱指数","抗旱指数抗旱性","平均隶属函数值/灰色关联系数","隶属函数值/关联系数评价抗旱性","抗旱性综合评价","抗旱系数","旱处理产量","对照产量","旱处理株高cm","对照株高cm","旱处理分枝数","对照分枝数","旱处理主花序长cm","对照主花序长cm","旱处理主花序有效角果数","对照主花序有效角果数","旱处理全株有效角果数","对照全株有效角果数","旱处理主茎角果密度个/cm","对照主茎角果密度个/cm","旱处理角粒数","对照角粒数","旱处理千粒重g","对照千粒重g","处理主根长cm","对照主根长cm","处理侧根数","对照侧根数","处理植株总鲜重g","对照植株总鲜重g","处理根鲜重g","对照根鲜重g","处理地上部分鲜重g","对照地上部分鲜重g","处理根冠比","对照根冠比","备注","干旱处理时期","鉴定时间");
				$optionseng = array("id","crop","germplasm","kanghanindex","levelbaseonindex","huiseguanlianxishu","guanlianxishu","zonghepingjia","ratio","droughtproduce","contrastproduce","zhugaoganhan","zhugaoduizhao","fenzhishuganhan","fenzhishuduizhao","zhuhuaxuganhan","zhuhuaxuduizhao","youxiaojiaoguoshuganhan","youxiaojiaoguoshuduizhao","quanzhuyouxiaoganhan","quanzhuyouxiaoduizhao","zhujingjiaoguoganhan","zhujingjiaoguoduizhao","jiaolishuganhan","jiaolishuduizhao","qianlizhongganhan","qianlizhongduizhao","zhugenchangchuli","zhugenchangduizhao","cegenshuchuli","cegenshuduizhao","zongxianzhongchuli","zhongxianzhongduizhao","genxiaozhongchuli");
				break;
			case "yumi":
				$option = array("ID","作物名称","种质名称","抗旱性综合评价","萌发期耐旱指数","萌发期抗旱性","DS(幼苗反复干旱存活率)","苗期抗旱性","全生育期旱处理产量kg","全生育期旱处理籽粒干重kg","全生育期对照产量kg","全生育期对照籽粒干重kg","DRI(抗旱指数）","全生育期抗旱性");
				$optionseng = array("id","crop","germplasm","zonghepingjia","mengfazhishu","mengfakanghan","ds","miaoqikanghan","quanzhengyuchulichanliang","quanshengyuziliganzhong","quanshengyuduizhao","quanshengyuziliduizhao","dri","quanshengyukanghanxing");
				break;
			case "malingshu":
				$option = array("ID","作物名称","种质名称","株高cm","样品植株重量(鲜重克)","样品植株重量(干重克)","样品根重量(鲜重克)","样品根重量(干重克)","提根性kg","三个重复的平均出苗率%","单株结薯(个)","平均单薯重g","大中薯率%","小薯率（％）","晚疫病(第一测)","晚疫病(第二测)","晚疫病(第三测)","晚疫病(第四测)","折合单产(㎏/667㎡)","较对照增产%","抗旱位次");
				$optionseng = array("id","crop","germplasm","zhugao","yangpinxianzhong","yangpinganzhong","yangpingenxianzhong","yangpingenganzhong","tigenxing","pingjunchumiao","danzhujieshu","pingjundanshuzhong","dazhongshulv","xiaoshulv","wanyibingyi","wanyibinger","wanyibingsan","wanyibingsi","zhegedanchan","jiaoduijiaozengchan","kanghanweici");
				break;

		}	
		for($i=0; $i<count($optionseng); $i++){
    		echo "<tr><td class=\"col-xs-3\">".$option[$i]."</td><td class=\"col-xs-9\">".$data[$optionseng[$i]]."</td><td>";	
		}
	}
?>