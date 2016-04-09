<?php
	//make a connection
	$hostname ="localhost";
	$username="root";
	$password="";
	$con = mysql_connect($hostname,$username,$password);
	if(!$con)
	{
		die('Connection Failed'.mysql_error());
	}

	//check if database already exist, if so, skip the following parts
	$db_selected = mysql_select_db('DroughtResistingDB',$con);
    if(!$db_selected)
    {
		initialize($con);	
    }

    function initialize($con)
    {
    	createDB($con);
    	createBasicInfoTable($con);
    	createTestResultTable($con);
    }

    function createDB($con)
    {
    	if(!mysql_query("CREATE DATABASE DroughtResistingDB", $con))
		{
			echo "Error".mysql_error();
			exit(1);
		}
    }

    function createBasicInfoTable($con)
    {
    	mysql_select_db("DroughtResistingDB",$con);
		$optionseng =array("id","crop","germplasm","family","genericname","specificname","originofarea","originofprovince","originofcountry","sourcearea","resoucetype","mainfeature","growthcycle","familytree","breedingunit","breedyear","altitude","longitude","latitude","testlocation","soiltype","ecosystemtype","temperatureavg","rainfallavg","image","testresult","depositunit","libraryid","gardenid","introductionid","collectid","depositresourcetype","depositmethod","entitystatus","sharemethod","collectmethod");

		$sql ="CREATE TABLE BasicInfo ( id int NOT NULL,";
		for($x=1;$x<13;$x++)
		{
			$sql .= $optionseng[$x];
			$sql .= " varchar(30) NOT NULL,";
		}
		for($x = 13;$x<19;$x++)
		{
			$sql .= $optionseng[$x];
			$sql .= " varchar(30) ,";
		}
		$sql.=$optionseng[19];
		$sql.=" varchar(30) NOT NULL,";
		$sql.=$optionseng[20];
		$sql.=" varchar(30) NOT NULL,";
		for($x=21;$x<25;$x++)
		{
			$sql .= $optionseng[$x];
			$sql .= " varchar(30) ,";
		}
		$sql.=$optionseng[25];
		$sql.=" varchar(30) NOT NULL,";
		$sql.=$optionseng[26];
		$sql.=" varchar(30) NOT NULL,";
		for($x=27;$x<31;$x++)
		{
			$sql .= $optionseng[$x];
			$sql .= " varchar(30) ,";
		}
		for($x=31;$x<36;$x++)
		{
			$sql .= $optionseng[$x];
			$sql.=" varchar(30) NOT NULL,";
		}
		$sql.="PRIMARY KEY(id) )";

		mysql_query($sql,$con);
    }

    function createTestResultTable($con)
    {
    	mysql_select_db("DroughtResistingDB",$con);
    	$result=array("种质名称","抗旱系数","抗旱指数","用抗旱指数划分的全生育期抗旱性级别","相对发芽势","用相对发芽势划分的抗旱级别","相对发芽率","用相对发芽率划分的抗旱级别","相对根数","用相对根数划分的抗旱级别","相对根长","用相对根长划分的抗旱级别","相对芽鞘","用相对芽鞘划分的抗旱级别","相对芽长","用相对芽长划分的抗旱级别");
    	$resulteng=array("germplasm","resistingratio","resistingindex","levelbaseonradio","relativegerminability","levelbaseongerminability","relativegerminationrate","levelbaseongerminationrate","relativerootno","levelbaseonrootno","relativerootlength","levelbaseonrootlength","relativesprout","levelbaseonsprout","relativesproutlangth","levelbaseonsproutlength");
    	$arrlength = count($result);
    	$sql ="CREATE TABLE result (";
    	for($x=0;$x<$arrlength-1;$x++)
    	{
    		$sql .= $resulteng[$x];
    		$sql .= " varchar (10),";
    	}
    	$sql .= $resulteng[$arrlength-1];
    	$sql .= " varchar(10) )";

		mysql_query($sql,$con);
    }

	
?>