$(document).ready(function(){
	createQueryOptions();
});

function createQueryOptions(){
	var options = ["序号","作物名称","种质名称","科名","属名","种名或亚种名","原产地","原产省","原产国","来源地","资源类型","主要特性","生育周期","系谱","选育单位","育成年分","海拔","经度","纬度","鉴定试验地点","土壤类型","生态系统类型","年均温度","年均降雨量","图像","抗旱鉴定结果","保存单位","库编号","圃编号","引种号","采集号","保存资源类型","保存方式","实物状态","共享方式","获取途径"];
	var optionseng =["id","crop","germplasm","family","genericname","specificname","originofarea","originofprovince","originofcountry","sourcearea","resoucetype","mainfeature","growthcycle","familytree","breedingunit","breedyear","altitude","longitude","latitude","testlocation","soiltype","ecosystemtype","temperatureavg","rainfallavg","image","testresult","depositunit","libraryid","gardenid","introductionid","collectid","depositresourcetype","depositmethod","entitystatus","sharemethod","collectmethod"];
	$("#basic-query-conditions").html("");
	
	var basic_condition_content = "";
	var adv_condition_content = "";
	for (var i=0; i<12; i++){
		var option = options[i];
		var optioneng = optionseng[i];
		basic_condition_content += '<div class = "form-group col-md-3">';
		basic_condition_content += '<label for="'+option+'">'+option+'</label>';
		basic_condition_content += '<input type="text" class="form-control" name ="'+optioneng+'">';
		basic_condition_content += '</div>';
	}
	for (var i=12; i<options.length; i++){
		var option = options[i];
		var optioneng = optionseng[i];
		adv_condition_content += '<div class = "form-group col-md-3">';
		adv_condition_content += '<label for="'+option+'">'+option+'</label>';
		adv_condition_content += '<input type="text" class="form-control" name ="'+optioneng+'">';
		adv_condition_content += '</div>';
	}
	
	$("#basic-query-conditions").append(basic_condition_content);    
	$("#advancedquerycondition").append(adv_condition_content);        				
}