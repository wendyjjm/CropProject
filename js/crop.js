$(document).ready(function(){
	createQueryOptions();
});

function createQueryOptions(){
	var options = ["作物名称","种质名称","资源类型","鉴定试验地点","抗旱性鉴定结果","获取途径","序号","科名","属名","种名或亚种名","原产地","原产省","原产国","来源地","主要特性","生育周期","海拔","经度","纬度","土壤类型","生态系统类型","年均温度","年均降雨量","保存单位","保存资源类型","保存方式","实物状态","共享方式"];
	var optionseng =["crop","germplasm","resoucetype","testlocation","testresult","collectmethod","id","family","genericname","specificname","originofarea","originofprovince","originofcountry","sourcearea","mainfeature","growthcycle","altitude","longitude","latitude","soiltype","ecosystemtype","temperatureavg","rainfallavg","depositunit","depositresourcetype","depositmethod","entitystatus","sharemethod"];
	$("#basic-query-conditions").html("");
	
	var basic_condition_content = "";
	var adv_condition_content = "";
	for (var i=0; i<6; i++){
		var option = options[i];
		var optioneng = optionseng[i];
		basic_condition_content += '<div class = "form-group col-md-3">';
		basic_condition_content += '<label for="'+option+'">'+option+'</label>';
		basic_condition_content += '<input type="text" class="form-control" name ="'+optioneng+'">';
		basic_condition_content += '</div>';
	}
	for (var i=6; i<options.length; i++){
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