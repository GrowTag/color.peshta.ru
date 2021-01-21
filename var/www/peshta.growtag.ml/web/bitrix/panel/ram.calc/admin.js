var CRamCalc = 
{
	effects: [],
	propertyUpdate: false,
	lang: {},
	formulaProperties: [],
	conditionActions: [],
	formulaCalculations: [],
	formulaItems:
	[
		{reg: /(\[.*?\])/g, type: "property"},
		
		{reg: /(calculationstart_[0-9]+_calculationend)/g, type: "calculation"},
		
		{reg: /(^-[0-9]*[.]?[0-9]+)/g, type: "number"},
		{reg: /([\+\*\/\^]{1})(-[0-9]*[.]?[0-9]+)/g, type: "number"},
		{reg: /([0-9]*[.]?[0-9]+)/g, type: "number"},
		
		{reg: /(\+)/g, type: "function", formula: "+", menu: "+", title: BX.message("RAM_CALC_ADDITION")},
		{reg: /(\-)/g, type: "function", formula: "-", menu: "-", title: BX.message("RAM_CALC_SUBTRACTION")},
		{reg: /(\*)/g, type: "function", formula: "*", menu: "*", title: BX.message("RAM_CALC_MULTIPLICATION")},
		{reg: /(\/)/g, type: "function", formula: "/", menu: "/", title: BX.message("RAM_CALC_DIVISION")},
		{reg: /(\^)/g, type: "function", formula: "^", menu: "^", title: BX.message("RAM_CALC_EXPONENTIATION")},
		{reg: /(PI)/g, type: "function", formula: "PI", menu: BX.message("RAM_CALC_PI"), title: BX.message("RAM_CALC_NUMBER_PI")},
		{reg: /(E)/g, type: "function", formula: "E", menu: "E", title: BX.message("RAM_CALC_NATURAL_LOGARITHM")},
		{reg: /(sqrt\()/g, type: "function", formula: "sqrt(", menu: "sqrt", title: BX.message("RAM_CALC_SQRT")},
		{reg: /(cbrt\()/g, type: "function", formula: "cbrt(", menu: "cbrt", title: BX.message("RAM_CALC_CBRT")},
		{reg: /(round\()/g, type: "function", formula: "round(", menu: "round", title: BX.message("RAM_CALC_ROUND")},
		{reg: /(ceil\()/g, type: "function", formula: "ceil(", menu: "ceil", title: BX.message("RAM_CALC_CEIL")},
		{reg: /(floor\()/g, type: "function", formula: "floor(", menu: "floor", title: BX.message("RAM_CALC_FLOOR")},
		{reg: /(trunc\()/g, type: "function", formula: "trunc(", menu: "trunc", title: BX.message("RAM_CALC_TRUNC")},
		{reg: /(abs\()/g, type: "function", formula: "abs(", menu: "abs", title: BX.message("RAM_CALC_ABS")},
		{reg: /(sin\()/g, type: "function", formula: "sin(", menu: "sin", title: BX.message("RAM_CALC_SIN")},
		{reg: /(cos\()/g, type: "function", formula: "cos(", menu: "cos", title: BX.message("RAM_CALC_COS")},
		{reg: /(tan\()/g, type: "function", formula: "tan(", menu: "tan", title: BX.message("RAM_CALC_TAN")},
		{reg: /(asin\()/g, type: "function", formula: "asin(", menu: "asin", title: BX.message("RAM_CALC_ASIN")},
		{reg: /(acos\()/g, type: "function", formula: "acos(", menu: "acos", title: BX.message("RAM_CALC_ACOS")},
		{reg: /(atan\()/g, type: "function", formula: "atan(", menu: "atan", title: BX.message("RAM_CALC_ATAN")},
		
		{reg: /(min\()/g, type: "function", formula: "min(", menu: "min", title: BX.message("RAM_CALC_MIN")},
		{reg: /(max\()/g, type: "function", formula: "max(", menu: "max", title: BX.message("RAM_CALC_MAX")},
		{reg: /(\,)/g, type: "function", formula: ",", menu: ",", title: BX.message("RAM_CALC_DELIMITER")},
		
		{reg: /(\>\=)/g, type: "function", formula: ">=", menu: ">=", title: BX.message("RAM_CALC_MORE_OR_EQUAL")},
		{reg: /(\<\=)/g, type: "function", formula: "<=", menu: "<=", title: BX.message("RAM_CALC_LESS_OR_EQUAL")},
		{reg: /(\>)/g, type: "function", formula: ">", menu: ">", title: BX.message("RAM_CALC_MORE")},
		{reg: /(\<)/g, type: "function", formula: "<", menu: "<", title: BX.message("RAM_CALC_LESS")},
		{reg: /(\=\=)/g, type: "function", formula: "==", formulaTitle: "=", menu: "=", title: BX.message("RAM_CALC_EQUAL")},
		{reg: /(\&\&)/g, type: "function", formula: "&&", formulaTitle: BX.message("RAM_CALC_AND"), menu: BX.message("RAM_CALC_AND"), title: BX.message("RAM_CALC_LOGIC_AND")},
		{reg: /(\|\|)/g, type: "function", formula: "||", formulaTitle: BX.message("RAM_CALC_OR"), menu: BX.message("RAM_CALC_OR"), title: BX.message("RAM_CALC_LOGIC_OR")},
		{reg: /(\!)/g, type: "function", formula: "!", formulaTitle: BX.message("RAM_CALC_NOT"), menu: BX.message("RAM_CALC_NOT"), title: BX.message("RAM_CALC_LOGIC_NOT")},
		
		{reg: /(\()/g, type: "function", formula: "(", menu: "(", title: BX.message("RAM_CALC_OPEN_BRACKET")},
		{reg: /(\))/g, type: "function", formula: ")", menu: ")", title: BX.message("RAM_CALC_CLOSE_BRACKET")},
	],
	mathFunctions: {reg: /(round\()|(asin\()|(sin\()|(acos\()|(cos\()|(atan\()|(tan\()|(sqrt\()|(cbrt\()|(ceil\()|(floor\()|(trunc\()|(abs\()|(min\()|(max\()|(PI)|(E)/g, replace: "Math.$1$2$3$4$5$6$7$8$9$10$11$12$13$14$15$16$17"},
	Effect: function(item, id)
	{
		this.updateAdminFields = [];
		if (this.effects[id])
		{
			for (var i in this.effects[id])
			{
				var check = true;
				var conditionIf = this.effects[id][i].IF;
				var conditionThen = this.effects[id][i].THEN;
				var executeFunction = this.effects[id][i].FUNCTION;
				
				if (conditionIf)
				{
					for (var j in conditionIf)
					{
						switch (j)
						{
							case 'value':
							{
								if ($(item).val() != conditionIf[j]) check = false;
								break;
							}
							case 'notvalue':
							{
								if ($(item).val() == conditionIf[j]) check = false;
								break;
							}
							case '^value':
							{
								if ($(item).val().search(conditionIf[j]) != 0) check = false;
								break;
							}
							case '^notvalue':
							{
								if ($(item).val().search(conditionIf[j]) == 0) check = false;
								break;
							}
							case 'checked':
							{
								if (!$('.'+id).find('[name="'+$(item).attr('name')+'"][value="'+conditionIf[j]+'"]').prop('checked')) check = false;
								break;
							}
							case 'unchecked':
							{
								if ($('.'+id).find('[name="'+$(item).attr('name')+'"][value="'+conditionIf[j]+'"]').prop('checked')) check = false;
								break;
							}
						}
					}
				}
				
				if (check)
				{
					for (var j in conditionThen)
					{
						var field = "."+j.replace("_#i#_", "_");
						
						if (conditionThen[j].hidden != undefined)
						{
							if (conditionThen[j].hidden)
							{
								$(field).hide();
								$(field).find('select, input, textarea').prop('disabled', true);
							}
							else if (!conditionThen[j].hidden)
							{
								$(field).show();
								$(field).find('select, input, textarea').removeProp('disabled');
							}
						}
						
						if (conditionThen[j].value != undefined)
						{
							$(field).find('select, input, textarea').val(conditionThen[j].value);
						}
						
						if (conditionThen[j].update != undefined)
						{
							this.updateAdminFields.push({ID: j});
						}
						
						if (conditionThen[j].readonly != undefined)
						{
							if (conditionThen[j].readonly) $(field).find('select, input, textarea').prop('readonly', true);
							else if (!conditionThen[j].readonly) $(field).find('select, input, textarea').removeProp('readonly');
						}
					}
					
					if (executeFunction) eval(executeFunction);
					
					break;
				}
			}
			
			if (id.search("PROPERTY_") == 0 || id.search("SERVICE_PROPERTIES_SOURCE_PRICE_FROM") != -1 || id.search("SERVICE_PROPERTIES_SOURCE_IBLOCK_EXAMPLE") != -1 || id.search("SERVICE_PROPERTIES_SOURCE_HIGHLOAD_EXAMPLE") != -1)
			{
				CRamCalc.propertyUpdate = true;
			}
		}
		if (this.updateAdminFields.length > 0)
		{
			$(".ram-calc").addClass("ram-calc_update");
			this.UpdateAdminFieldNext();
		}
		else
		{
			if (CRamCalc.propertyUpdate)
			{
				$(".ram-calc").addClass("ram-calc_update");
				CRamCalc.propertyUpdate = false;
				CRamCalc.UpdateFormulaProperties();
				CRamCalc.PropertySortable();
				$(".ram-calc").removeClass("ram-calc_update");
			}
		}
	},
	UpdateActions: function()
	{
		var newActions = [];
		newActions.push({code: "", name: BX.message("RAM_CALC_CHOOSE_PROPERTY")});
		var propertiesExist = false;
		$(".ram-calc__properties .ram-calc__property-item").each(function(index)
		{
			if (!propertiesExist)
			{
				newActions.push({disabled: true, name: BX.message("RAM_CALC_ACTION_PARAMETER")});
				propertiesExist = true;
			}
			
			var newProperty = {};
			
			newProperty.code = $(this).find(".PROPERTY_PROPERTIES_CODE input").val();
			newProperty.name = $(this).find(".PROPERTY_PROPERTIES_NAME input").val();
			newProperty.type = $(this).find(".PROPERTY_PROPERTIES_TYPE select").val();
			newProperty.myltyple = $(this).find(".PROPERTY_PROPERTIES_MULTYPLE input[type='checkbox']:checked").val() != undefined;
			
			var newAction = {code: newProperty.code, name: newProperty.name, type: newProperty.type, multyple: newProperty.myltyple};
			
			newAction.actions = {show: {title: BX.message("RAM_CALC_SHOW_PROPERTY")}, hide: {title: BX.message("RAM_CALC_HIDE_PROPERTY")}, enable: {title: BX.message("RAM_CALC_ENABLE_PROPERTY")}, disable: {title: BX.message("RAM_CALC_DISABLE_PROPERTY")}};
			
			if (newProperty.type == "number")
			{
				newAction.actions['unreadonly'] = {title: BX.message("RAM_CALC_UNREADONLY")};
				newAction.actions['readonly'] = {title: BX.message("RAM_CALC_READONLY")};
				newAction.actions['value'] = {title: BX.message("RAM_CALC_SET_VALUE"), input: true};
				newAction.actions['min'] = {title: BX.message("RAM_CALC_SET_MIN"), input: true};
				newAction.actions['max'] = {title: BX.message("RAM_CALC_SET_MAX"), input: true};
				newAction.actions['step'] = {title: BX.message("RAM_CALC_SET_STEP"), input: true};
				newAction.actions['conditionvalue'] = {title: BX.message("RAM_CALC_SET_CONDITIONVALUE")};
				newAction.actions['conditionmin'] = {title: BX.message("RAM_CALC_SET_CONDITIONMIN")};
				newAction.actions['conditionmax'] = {title: BX.message("RAM_CALC_SET_CONDITIONMAX")};
				newAction.actions['conditionstep'] = {title: BX.message("RAM_CALC_SET_CONDITIONSTEP")};
			}
			else
			{
				newAction.actions['valueValue'] = {title: BX.message("RAM_CALC_CHOOSE_VALUE"), values: []};
				if (newProperty.myltyple) newAction.actions['unvalueValue'] = {title: BX.message("RAM_CALC_UNCHOOSE_VALUE"), values: []};
				newAction.actions['showValue'] = {title: BX.message("RAM_CALC_SHOW_VALUE"), values: []};
				newAction.actions['hideValue'] = {title: BX.message("RAM_CALC_HIDE_VALUE"), values: []};
				
				var examples = {};
				$(this).find("input[name='PROPERTY["+index+"][DATA][SETTINGS][EXAMPLE][]']").each(function()
				{
					examples[$(this).val()] = $(this).prop("checked");
				});
				
				var priceSumm = 0;
				var selectedPrice = 0;
				
				for (var example in examples)
				{
					var exampleTitle = $(this).find("input[name='PROPERTY["+index+"][DATA][VALUES]["+example+"][TITLE]']").val();
					if (!exampleTitle) exampleTitle = $(this).find("input[name='PROPERTY["+index+"][DATA][VALUES]["+example+"][TITLE]']").attr("placeholder");
					
					exampleTitle = exampleTitle;
					
					var actionValue = {title: exampleTitle, code: example};
					
					newAction.actions['valueValue'].values.push(actionValue);
					if (newProperty.myltyple) newAction.actions['unvalueValue'].values.push(actionValue);
					newAction.actions['showValue'].values.push(actionValue);
					newAction.actions['hideValue'].values.push(actionValue);
				}
			}
			
			newActions.push(newAction);
		});
		
		var calculationsExist = false;
		
		$(".ram-calc__calculations .ram-calc__calculation-item").each(function(index)
		{
			if (!calculationsExist)
			{
				newActions.push({disabled: true, name: BX.message("RAM_CALC_ACTION_CALCULATION")});
				calculationsExist = true;
			}
			
			var newCalculation = {};
			
			newCalculation.code = $(this).find(".SERVICE_CALCULATION_CODE input").val();
			newCalculation.title = $(this).find(".SERVICE_CALCULATION_NAME input").val();
			newCalculation.value = $(this).find(".SERVICE_CALCULATION_FORMULA .ram-calc__formula-value").val();
			
			var newAction = {code: "calculation"+newCalculation.code, name: newCalculation.title};
			
			newAction.actions = {show: {title: BX.message("RAM_CALC_SHOW_CALCULATION")}, hide: {title: BX.message("RAM_CALC_HIDE_CALCULATION")}};
			
			newActions.push(newAction);
		});
		
		CRamCalc.conditionActions = newActions;
		
		CRamCalc.ClearConditionActions();
		CRamCalc.DisplayConditionActions();
	},
	UpdateFormulaProperties: function()
	{
		var sourcePrice = parseFloat($(".SERVICE_PROPERTIES_SOURCE_PRICE input").val());
		if (!sourcePrice) sourcePrice = 0;
		
		var newProperties =
		[
			{
				data:
				{
					price: sourcePrice
				},
				fields:
				[
					{title: BX.message("RAM_CALC_BASE_PRICE"), formula: "[base.price]", code: "price", calculationOnly: true}
				]
			}
		];
		
		$(".ram-calc__properties .ram-calc__property-item").each(function(index)
		{
			var newProperty = {fields: [], data: {}};
			
			newProperty.code = $(this).find(".PROPERTY_PROPERTIES_CODE input").val();
			newProperty.name = $(this).find(".PROPERTY_PROPERTIES_NAME input").val();
			newProperty.type = $(this).find(".PROPERTY_PROPERTIES_TYPE select").val();
			newProperty.myltyple = $(this).find(".PROPERTY_PROPERTIES_MULTYPLE input[type='checkbox']:checked").val() != undefined;
			
			if (newProperty.type == "number")
			{
				newProperty.fields.push({title: BX.message("RAM_CALC_VALUE"), formula: "["+newProperty.code+".value]", code: "value"});
				newProperty.fields.push({title: BX.message("RAM_CALC_MIN"), formula: "["+newProperty.code+".min]", code: "min"});
				newProperty.fields.push({title: BX.message("RAM_CALC_MAX"), formula: "["+newProperty.code+".max]", code: "max"});
				newProperty.fields.push({title: BX.message("RAM_CALC_STEP"), formula: "["+newProperty.code+".step]", code: "step"});
				
				var propertyValue = parseFloat($(this).find(".PROPERTY_PROPERTIES_NUMBER_VALUE input").val());
				if (!propertyValue) propertyValue = 0;
				var propertyMin = parseFloat($(this).find(".PROPERTY_PROPERTIES_NUMBER_MIN input").val());
				if (!propertyMin) propertyMin = 0;
				var propertyMax = parseFloat($(this).find(".PROPERTY_PROPERTIES_NUMBER_MAX input").val());
				if (!propertyMax) propertyMax = 0;
				var propertyStep = parseFloat($(this).find(".PROPERTY_PROPERTIES_NUMBER_STEP input").val());
				if (!propertyStep) propertyStep = 0;
				
				newProperty.data.value = propertyValue;
				newProperty.data.min = propertyMin;
				newProperty.data.max = propertyMax;
				newProperty.data.step = propertyStep;
			}
			else
			{
				var examples = {};
				$(this).find("input[name='PROPERTY["+index+"][DATA][SETTINGS][EXAMPLE][]']").each(function()
				{
					examples[$(this).val()] = $(this).prop("checked");
				});
				
				var priceSumm = 0;
				var selectedPrice = 0;
				
				for (var example in examples)
				{
					var exampleChecked = examples[example];
					
					var exampleTitle = $(this).find("input[name='PROPERTY["+index+"][DATA][VALUES]["+example+"][TITLE]']").val();
					if (!exampleTitle) exampleTitle = $(this).find("input[name='PROPERTY["+index+"][DATA][VALUES]["+example+"][TITLE]']").attr("placeholder");
					
					exampleTitle = exampleTitle;
					
					var examplePrice = $(this).find("input[name='PROPERTY["+index+"][DATA][VALUES]["+example+"][PRICE]']").val();
					if (!examplePrice) examplePrice = $(this).find("input[name='PROPERTY["+index+"][DATA][VALUES]["+example+"][PRICE]']").attr("placeholder");
					if (!examplePrice || isNaN(examplePrice)) examplePrice = 0;
					else examplePrice = parseFloat(examplePrice);
					
					newProperty.fields.push({title: exampleTitle, formula: "["+newProperty.code+"."+example+"_checked]", code: example+"_checked"});
					newProperty.fields.push({title: exampleTitle+" ("+BX.message("RAM_CALC_PRICE")+")", formula: "["+newProperty.code+"."+example+"_price]", code: example+"_price"});
					
					if (!exampleChecked) exampleChecked = 0;
					else
					{
						exampleChecked = 1;
						
						if (!newProperty.myltyple)
						{
							selectedPrice = examplePrice;
						}
						else
						{
							priceSumm += examplePrice;
						}
					}
					
					newProperty.data[example+"_checked"] = exampleChecked;
					newProperty.data[example+"_price"] = examplePrice;
					
					var actionValue = {title: exampleTitle, code: example};
				}
				
				if (newProperty.myltyple)
				{
					newProperty.fields = [{title: BX.message("RAM_CALC_PRICE_SUMM"), formula: "["+newProperty.code+".pricesumm]", code: "pricesumm"}].concat(newProperty.fields);
					newProperty.data["pricesumm"] = priceSumm;
				}
				else
				{
					newProperty.fields = [{title: BX.message("RAM_CALC_CHOSEN_PRICE"), formula: "["+newProperty.code+".price]", code: "price"}].concat(newProperty.fields);
					newProperty.data["price"] = selectedPrice;
				}
			}
			
			newProperties.push(newProperty);
		});
		
		CRamCalc.formulaProperties = newProperties;
		
		$('.ram-calc__formula-source').change();
		
		CRamCalc.UpdateActions();
	},
	UpdateFormulaCalculations: function()
	{
		var newCalculations = [];
		
		$(".ram-calc__calculations .ram-calc__calculation-item").each(function(index)
		{
			var newCalculation = {};
			
			newCalculation.code = $(this).find(".SERVICE_CALCULATION_CODE input").val();
			newCalculation.title = $(this).find(".SERVICE_CALCULATION_NAME input").val();
			newCalculation.value = $(this).find(".SERVICE_CALCULATION_FORMULA .ram-calc__formula-value").val();
			
			newCalculations.push(newCalculation);
		});
		
		CRamCalc.formulaCalculations = newCalculations;
		
		$('.ram-calc__formula-source').change();
		
		CRamCalc.UpdateActions();
	},
	UpdateAdminFieldNext: function()
	{
		if (this.updateAdminFields.length > 0)
		{
			var field = this.updateAdminFields.splice(0, 1)[0];
			this.UpdateAdminField(field);
		}
		else
		{
			if (CRamCalc.propertyUpdate)
			{
				CRamCalc.propertyUpdate = false;
				CRamCalc.UpdateFormulaProperties();
				CRamCalc.PropertySortable();
				$(".ram-calc").removeClass("ram-calc_update");
			}
			else
			{
				$(".ram-calc").removeClass("ram-calc_update");
			}
			BX.onCustomEvent('onAdminTabsChange');
		}
	},
	ParseUrlParams: function(string)
	{
		var tmpData = decodeURIComponent(string).split('&');
		var data = {};
		for (var i = 0; i < tmpData.length; i++)
		{
			var params = tmpData[i].split('=');
			data[params[0]] = params[1];
        }
		return data;
	},
	UpdateAdminField: function(params)
	{
		var id = params.ID;
		var idSplit = params.ID.split("_");
		var formData = $("form.ram-calc").serializeObject();
		
		if (!isNaN(parseFloat(idSplit[1])) && isFinite(idSplit[1]))
		{
			params.INDEX = idSplit[1];
			idSplit.splice(1, 1);
			params.ID = idSplit.join("_");
			params.SERVICE = formData["SERVICE"];
			params.PROPERTY = formData["PROPERTY"][params.INDEX];
			
			if (!$("."+params.ID).length)
			{
				CRamCalc.UpdateAdminFieldNext();
				return false;
			}
			
			$.post("/bitrix/tools/ram.calc.php", {ACTION: "UPDATE_ADMIN_FIELD", DATA: params}).done(function(msg)
			{
				var cls = $("."+id).attr("class");
				$("."+id).replaceWith(msg);
				$("."+id).attr("class", cls)
				
				if (params.ID == "PROPERTY_DATA" || params.ID == "PROPERTY_ITEM") CRamCalc.ModifyFields('ram-calc__property-item_'+params.INDEX);
				
				CRamCalc.UpdateAdminFieldNext();
			});
		}
		else if (idSplit[1] == "#i#")
		{
			idSplit.splice(1, 1);
			params.ID = idSplit.join("_");
			CRamCalc.updateAdminFieldsMultipleCount = $("."+params.ID).length;
			
			if (!$("."+params.ID).length)
			{
				CRamCalc.UpdateAdminFieldNext();
				return false;
			}
			
			params.SERVICE = formData["SERVICE"];
			
			$("."+params.ID).each(function()
			{
				//var tr = $(this);
				params.INDEX = $(this).attr('data-index');
				params.PROPERTY = formData["PROPERTY"][params.INDEX];
				
				$.post("/bitrix/tools/ram.calc.php", {ACTION: "UPDATE_ADMIN_FIELD", DATA: params}).done(function(msg)
				{
					var index = CRamCalc.ParseUrlParams(this.data)["DATA[INDEX]"];
					var itemId = id.replace("#i#", index);
					var cls = $("."+itemId).attr("class");
					$("."+itemId).replaceWith(msg);
					$("."+itemId).attr("class", cls);
					
					if (params.ID == "PROPERTY_DATA" || params.ID == "PROPERTY_ITEM") CRamCalc.ModifyFields('ram-calc__property-item_'+index);
					CRamCalc.updateAdminFieldsMultipleCount--;
					
					if (CRamCalc.updateAdminFieldsMultipleCount == 0) CRamCalc.UpdateAdminFieldNext();
				});
			});
		}
		else
		{
			if (!$("."+params.ID).length)
			{
				CRamCalc.UpdateAdminFieldNext();
				return false;
			}
			
			params.SERVICE = formData["SERVICE"];
			
			$.post("/bitrix/tools/ram.calc.php", {ACTION: "UPDATE_ADMIN_FIELD", DATA: params}).done(function(msg)
			{
				$("."+id).replaceWith(msg);
				CRamCalc.UpdateAdminFieldNext();
			});
		}
	},
	ServicePropertiesSourceIblockExample: function(item)
	{
		var formData = $('form.ram-calc').serializeObject();
		
		$.post("/bitrix/tools/ram.calc.php", {ACTION: "UPDATE_ADMIN_FIELD_IBLOCK_EXAMPLE", DATA: {SERVICE: formData["SERVICE"]}}).done(function(msg)
		{
			$(item).parent().find('.ram-calc__iblock-element-selected').html(msg);
		});
	},
	AddCalculation: function(item)
	{
		var index = -1;
		var code = 0;
		$('.ram-calc__calculation-item').each(function()
		{
			if (parseInt($(this).attr('data-index')) > index) index = parseInt($(this).attr('data-index'));
			if (parseInt($(this).find(".SERVICE_CALCULATION_CODE input").val()) > code) code = parseInt($(this).find(".SERVICE_CALCULATION_CODE input").val());
		});
		index++;
		code++;

		$.post("/bitrix/tools/ram.calc.php", {ACTION: "ADD_CALCULATION", DATA: {INDEX: index, CODE: code,}}).done(function(msg)
		{
			$(msg).insertBefore(item);
			
			CRamCalc.ModifyFields('ram-calc__calculation-item_'+index);
			
			CRamCalc.UpdateFormulaCalculations();
			
			BX.onCustomEvent('onAdminTabsChange');
		});
		
		return false;
	},
	CopyCalculation: function(item)
	{
		var calculation = $(item).parentsUntil('.ram-calc__calculations').last();
		var copyIndex = $(calculation).attr("data-index");
		var index = -1;
		var code = 0;
		$('.ram-calc__calculation-item').each(function()
		{
			if (parseInt($(this).attr('data-index')) > index) index = parseInt($(this).attr('data-index'));
			if (parseInt($(this).find(".SERVICE_CALCULATION_CODE input").val()) > code) code = parseInt($(this).find(".SERVICE_CALCULATION_CODE input").val());
		});
		index++;
		code++;
		
		var formData = $('form.ram-calc').serializeObject();
		var calculationData = formData["SERVICE"]["CALCULATIONS"][copyIndex];

		$.post("/bitrix/tools/ram.calc.php", {ACTION: "COPY_CALCULATION", DATA: {INDEX: index, CODE: code, CALCULATION: calculationData}}).done(function(msg)
		{
			var newCalculation = $(msg).insertAfter(calculation);
			
			CRamCalc.ModifyFields('ram-calc__calculation-item_'+index);
			
			$(newCalculation).find(".ram-calc__formula-source").change();
			
			CRamCalc.UpdateFormulaCalculations();
			
			BX.onCustomEvent('onAdminTabsChange');
		});
		
		return false;
	},
	ToggleCalculation: function(item)
	{
		var calculation = $(item).parentsUntil('.ram-calc__calculations').last();
		$(calculation).toggleClass('ram-calc__calculation-item-opened');
		
		BX.onCustomEvent('onAdminTabsChange');
		
		return false;
	},
	DeleteCalculation: function(item)
	{
		var calculation = $(item).parentsUntil('.ram-calc__calculations').last();
		$(calculation).remove();
		
		CRamCalc.UpdateFormulaCalculations();
		
		BX.onCustomEvent('onAdminTabsChange');
	},
	DeleteConditionAction: function(item)
	{
		$(item).parent().remove();
	},
	AddConditionAction: function(item, name)
	{
		var html = "<div class='ram-calc__condition-action'><input type='hidden' name='"+name+"' value=''/><a href='#' onclick='if (confirm(\""+BX.message("RAM_CALC_CONFIRM_DELETE_ACTION")+"\")) CRamCalc.DeleteConditionAction(this); return false;' class='adm-btn adm-btn-delete'>"+BX.message("RAM_CALC_DELETE_ACTION")+"</a></div>";
		
		$(html).insertBefore(item);
		
		CRamCalc.DisplayConditionActions();
		
		return false;
	},
	ConditionActionValue: function(item)
	{
		var actionItem = $(item).parent();
		var property = $(actionItem).find(".ram-calc__condition-action-p").val();
		var action = $(actionItem).find(".ram-calc__condition-action-a").val();
		var value = $(actionItem).find(".ram-calc__condition-action-vs").val();
		if (value == null) value = $(actionItem).find(".ram-calc__condition-action-vi").val();

		var v = [property, action, value];
		
		$(actionItem).find("input[type='hidden']").val(v.join("_"));
	},
	OnConditionValueChange: function(item)
	{
		CRamCalc.ConditionActionValue(item);
	},
	OnConditionActionChange: function(item)
	{
		var actionItem = $(item).parent();
		var property = $(actionItem).find(".ram-calc__condition-action-p").val();
		var action = $(item).val();
		
		$(actionItem).find(".ram-calc__condition-action-vs").html("").hide();
		$(actionItem).find(".ram-calc__condition-action-vi").val("").hide();
		
		if (action)
		{
			if (CRamCalc.conditionActions.length)
			{
				for (var i in CRamCalc.conditionActions)
				{
					var p = CRamCalc.conditionActions[i];
					if (p.code == property)
					{
						for (var j in p.actions)
						{
							var a = p.actions[j];
							if (j == action)
							{
								CRamCalc.ConditionActionValue(item);
								
								if (a.values)
								{
									for (var k in a.values)
									{
										var v = a.values[k];
										$(actionItem).find(".ram-calc__condition-action-vs").append("<option value='"+v.code+"'>"+v.title+"</option>");
									}
									
									$(actionItem).find(".ram-calc__condition-action-vs").show().change();
								}
								else if (a.input)
								{
									$(actionItem).find(".ram-calc__condition-action-vi").val("0").show().change();
								}
								break;
							}
						}
						break;
					}
				}
			}
		}
	},
	OnConditionPropertyChange: function(item)
	{
		var actionItem = $(item).parent();
		var property = $(item).val();
		
		$(actionItem).find(".ram-calc__condition-action-a").html("").hide();
		$(actionItem).find(".ram-calc__condition-action-vs").html("").hide();
		$(actionItem).find(".ram-calc__condition-action-vi").val("").hide();
		
		if (property)
		{
			if (CRamCalc.conditionActions.length)
			{
				for (var i in CRamCalc.conditionActions)
				{
					if (CRamCalc.conditionActions[i].code == property)
					{
						for (var j in CRamCalc.conditionActions[i].actions)
						{
							$(actionItem).find(".ram-calc__condition-action-a").append("<option value='"+j+"'>"+CRamCalc.conditionActions[i].actions[j].title+"</option>");
						}
						
						CRamCalc.ConditionActionValue(item);
						
						$(actionItem).find(".ram-calc__condition-action-a").show().change();
						
						break;
					}
				}
			}
		}
		
	},
	ClearConditionActions: function()
	{
		$(".ram-calc__condition-action").each(function()
		{
			$(this).find("select, .ram-calc__condition-action-vi").remove();
		});
	},
	DisplayConditionActions: function()
	{
		$(".ram-calc__condition-action").each(function()
		{
			if (!$(this).find('select').length)
			{
				var value = $(this).find("input[type='hidden']").val().split("_");
				value[2] = value.slice(2).join("_");
				value = value.slice(0, 3);
				
				$(this).find('select').remove();
				
				var propertySelect = $("<select class='ram-calc__condition-action-p' onchange='CRamCalc.OnConditionPropertyChange(this)'></select>");
				var actionSelect = $("<select class='ram-calc__condition-action-a' style='display: none;' onchange='CRamCalc.OnConditionActionChange(this)'></select>");
				var valueSelect = $("<select class='ram-calc__condition-action-vs' style='display: none;' onchange='CRamCalc.OnConditionValueChange(this)'></select>");
				var valueInput = $("<input class='ram-calc__condition-action-vi' style='display: none;' type='text' onchange='CRamCalc.OnConditionValueChange(this)' value=''/>");
				
				if (CRamCalc.conditionActions.length)
				{
					var propertySelected = false;
					
					for (var i in CRamCalc.conditionActions)
					{
						if (value[0] && CRamCalc.conditionActions[i].code == value[0])
						{
							propertySelected = CRamCalc.conditionActions[i];
						}
						if (CRamCalc.conditionActions[i].disabled)
						{
							propertySelect.append("<option value='' disabled=''>"+CRamCalc.conditionActions[i].name+"</option>");
						}
						else
						{
							propertySelect.append("<option value='"+CRamCalc.conditionActions[i].code+"'>"+CRamCalc.conditionActions[i].name+"</option>");
						}
					}
					
					if (propertySelected)
					{
						propertySelect.val(value[0]);
						
						var actionSelected = false;
						
						for (var j in propertySelected.actions)
						{
							if (value[1] && j == value[1])
							{
								actionSelected = propertySelected.actions[j];
							}
							actionSelect.append("<option value='"+j+"'>"+propertySelected.actions[j].title+"</option>");
						}
						
						if (actionSelected)
						{
							actionSelect.val(value[1]).show();
							
							if (actionSelected.values)
							{
								for (var k in actionSelected.values)
								{
									$(valueSelect).append("<option value='"+actionSelected.values[k].code+"'>"+actionSelected.values[k].title+"</option>");
									$(valueSelect).show().val(value[2]);
								}
							}
							else if (actionSelected.input)
							{
								$(valueInput).show();
								if (value[2]) $(valueInput).val(value[2]);
							}
						}
					}
				}
				
				$(this).prepend(valueInput);
				$(this).prepend(valueSelect);
				$(this).prepend(actionSelect);
				$(this).prepend(propertySelect);
			}
		});
	},
	AddCondition: function(item)
	{
		var index = -1;
		$('.ram-calc__condition-item').each(function()
		{
			if (parseInt($(this).attr('data-index')) > index) index = parseInt($(this).attr('data-index'));
		});
		index++;

		$.post("/bitrix/tools/ram.calc.php", {ACTION: "ADD_CONDITION", DATA: {INDEX: index}}).done(function(msg)
		{
			$(msg).insertBefore(item);
			
			CRamCalc.ModifyFields('ram-calc__condition-item_'+index);
			
			BX.onCustomEvent('onAdminTabsChange');
		});
		
		return false;
	},
	CopyCondition: function(item)
	{
		var condition = $(item).parentsUntil('.ram-calc__conditions').last();
		var copyIndex = $(condition).attr("data-index");
		var index = -1;
		$('.ram-calc__condition-item').each(function()
		{
			if (parseInt($(this).attr('data-index')) > index) index = parseInt($(this).attr('data-index'));
		});
		index++;

		var formData = $('form.ram-calc').serializeObject();
		var conditionData = formData["SERVICE"]["CONDITIONS"][copyIndex];

		$.post("/bitrix/tools/ram.calc.php", {ACTION: "COPY_CONDITION", DATA: {INDEX: index, CONDITION: conditionData}}).done(function(msg)
		{
			var newCondition = $(msg).insertAfter(condition);
			
			CRamCalc.ModifyFields('ram-calc__condition-item_'+index);
			
			CRamCalc.DisplayConditionActions();
			
			$(newCondition).find(".ram-calc__formula-source").change();
			
			BX.onCustomEvent('onAdminTabsChange');
		});
		
		return false;
	},
	ToggleCondition: function(item)
	{
		var condition = $(item).parentsUntil('.ram-calc__conditions').last();
		$(condition).toggleClass('ram-calc__condition-item-opened');
		
		BX.onCustomEvent('onAdminTabsChange');
		
		return false;
	},
	DeleteCondition: function(item)
	{
		var condition = $(item).parentsUntil('.ram-calc__conditions').last();
		$(condition).remove();
		
		BX.onCustomEvent('onAdminTabsChange');
	},
	AddProperty: function(item)
	{
		var index = -1;
		var code = 0;
		$('.ram-calc__property-item').each(function()
		{
			if (parseInt($(this).attr('data-index')) > index) index = parseInt($(this).attr('data-index'));
			if (parseInt($(this).find(".PROPERTY_PROPERTIES_CODE input").val()) > code) code = parseInt($(this).find(".PROPERTY_PROPERTIES_CODE input").val());
		});
		index++;
		code++;
		
		var formData = $('form.ram-calc').serializeObject();
		
		$.post("/bitrix/tools/ram.calc.php", {ACTION: "ADD_PROPERTY", DATA: {INDEX: index, CODE: code, SERVICE: formData["SERVICE"]}}).done(function(msg)
		{
			$(msg).insertBefore(item);
			
			CRamCalc.ModifyFields('ram-calc__property-item_'+index);
			
			BX.onCustomEvent('onAdminTabsChange');
			
			CRamCalc.UpdateFormulaProperties();
		});
		
		return false;
	},
	CopyProperty: function(item)
	{
		var property = $(item).parentsUntil('.ram-calc__properties').last();
		var copyIndex = $(property).attr("data-index");
		var index = -1;
		var code = 0;
		$('.ram-calc__property-item').each(function()
		{
			if (parseInt($(this).attr('data-index')) > index) index = parseInt($(this).attr('data-index'));
			if (parseInt($(this).find(".PROPERTY_PROPERTIES_CODE input").val()) > code) code = parseInt($(this).find(".PROPERTY_PROPERTIES_CODE input").val());
		});
		index++;
		code++;
		
		var formData = $('form.ram-calc').serializeObject();
		
		$.post("/bitrix/tools/ram.calc.php", {ACTION: "COPY_PROPERTY", DATA: {INDEX: index, CODE: code, SERVICE: formData["SERVICE"], PROPERTY: formData["PROPERTY"][copyIndex]}}).done(function(msg)
		{
			$(msg).insertAfter(property);
			
			CRamCalc.ModifyFields('ram-calc__property-item_'+index);
			
			BX.onCustomEvent('onAdminTabsChange');
			
			CRamCalc.UpdatePropertiesSort();
			
			CRamCalc.PropertySortable();
			
			CRamCalc.UpdateFormulaProperties();
		});
		
		return false;
	},
	ToggleProperty: function(item)
	{
		var property = $(item).parentsUntil('.ram-calc__properties').last();
		$(property).toggleClass('ram-calc__property-item-opened');
		
		BX.onCustomEvent('onAdminTabsChange');
		
		return false;
	},
	DeleteProperty: function(item)
	{
		var property = $(item).parentsUntil('.ram-calc__properties').last();
		$(property).remove();
		
		BX.onCustomEvent('onAdminTabsChange');
		
		CRamCalc.UpdatePropertiesSort();
		
		CRamCalc.UpdateFormulaProperties();
	},
	UpdatePropertiesSort: function()
	{
		$('.ram-calc__properties .ram-calc__property-item').each(function(index)
		{
			$(this).find('.ram-calc__property-sort').val(index);
		});
	},
	UpdatePropertyData: function(item, addValue)
	{
		var formData = $('form.ram-calc').serializeObject();
		var property = $(item).parentsUntil('.ram-calc__properties').last();
		var index = $(property).attr('data-index');
		var data = {INDEX: index, ID: "PROPERTY_DATA", PROPERTY: formData["PROPERTY"][index]};
		if (addValue) data.ADD_VALUE = "Y";
		
		$('.ram-calc').addClass("ram-calc_update");
		
		$.post("/bitrix/tools/ram.calc.php", {ACTION: "UPDATE_ADMIN_FIELD", DATA: data}).done(function(msg)
		{
			$(property).find('.ram-calc__property-item-data').replaceWith(msg);
			
			CRamCalc.ModifyFields('ram-calc__property-item_'+index);
			
			CRamCalc.PropertySortable();
			
			CRamCalc.UpdateFormulaProperties();
			
			$('.ram-calc').removeClass("ram-calc_update");
		});
	},
	AddPropertyDataValue: function(item)
	{
		CRamCalc.UpdatePropertyData(item, true);
		
		BX.onCustomEvent('onAdminTabsChange');
		
		return false;
	},
	EditPropertyDataItem: function(item)
	{
		$(item).parent().addClass("ram-calc__property-item-editable");
		$(item).parent().find("input").focus();
	},
	OnChangePropertyDataItem: function(item)
	{
		if ($(item).val().length < 1)
		{
			$(item).parent().parent().removeClass("ram-calc__property-item-editable");
		}
	},
	OnUploadPropertyDataImage: function(event, property, item)
	{
		var arData = new FormData();
		
		arData.append("file", event.target.files[0]);
		
		$(".ram-calc").addClass("ram-calc_update");
		
		$.ajax({url: "/bitrix/tools/ram.calc.php?ACTION=UPLOAD_PROPERTY_DATA_IMAGE", type: "POST", data: arData, dataType: "text", cache: false, processData: false, contentType: false}).done(function(msg)
		{
			if (msg != 'error')
			{
				$("input[name='PROPERTY["+property+"][DATA][VALUES]["+item+"][PICTURE]']").val(msg);
				CRamCalc.UpdatePropertyData($("#ram-calc__property-item_"+property+" .ram-calc__property-item-data"));
			}
			else
			{
				$(".ram-calc").addClass("ram-calc_update");
			}
		});
	},
	UploadPropertyDataImage: function(item)
	{
		$(item).parent().find("input[type='file']").click();
	},
	DeletePropertyDataImage: function(item, id)
	{
		var property = $(item).parentsUntil('.ram-calc__properties').last();
		$.post("/bitrix/tools/ram.calc.php", {ACTION: "DELETE_PROPERTY_DATA_IMAGE", DATA: {ID: id}}).done(function(msg)
		{
			$(item).parent().find("input[type='hidden']").val("");
			CRamCalc.UpdatePropertyData(item, false);
		});
	},
	DeletePropertyDataValue: function(item)
	{
		var propertyData = $(item).parentsUntil('.ram-calc__property-item-data').last();
		var value = $(item).parent().parent();
		$(value).remove();
		
		CRamCalc.UpdatePropertyData(propertyData, false);
		
		BX.onCustomEvent('onAdminTabsChange');
	},
	OnPropertyNameChange: function(item)
	{
		var property = $(item).parentsUntil('.ram-calc__properties').last();
		var title = $(property).find('.PROPERTY_PROPERTIES_NAME input').val().trim();
		var code = $(property).find('.PROPERTY_PROPERTIES_CODE input').val();
		if (!title)
		{
			title = $(property).find('.PROPERTY_PROPERTIES_NAME input').attr('data-default');
			$(property).find('.PROPERTY_PROPERTIES_NAME input').val(title);
		}
		$(property).find('.ram-calc__property-item-title').html("["+code+"] "+title);
	},
	OnConditionNameChange: function(item)
	{
		var condition = $(item).parentsUntil('.ram-calc__conditions').last();
		var title = $(condition).find('.SERVICE_CONDITION_NAME input').val().trim();
		if (!title)
		{
			title = $(condition).find('.SERVICE_CONDITION_NAME input').attr('data-default');
			$(condition).find('.SERVICE_CONDITION_NAME input').val(title);
		}
		$(condition).find('.ram-calc__condition-item-title').html(title);
	},
	OnCalculationNameChange: function(item)
	{
		var calculation = $(item).parentsUntil('.ram-calc__calculations').last();
		var title = $(calculation).find('.SERVICE_CALCULATION_NAME input').val().trim();
		if (!title)
		{
			title = $(calculation).find('.SERVICE_CALCULATION_NAME input').attr('data-default');
			$(calculation).find('.SERVICE_CALCULATION_NAME input').val(title);
		}
		$(calculation).find('.ram-calc__calculation-item-title').html(title);
		CRamCalc.UpdateFormulaCalculations();
	},
	ModifyFields: function(id)
	{
		var checkboxList = BX.findChildren(BX(id), {tagName: 'INPUT', property: {type: 'checkbox'}}, true);
		if (!!checkboxList)
		{
			for (i = 0; i < checkboxList.length; i++)
			{
				BX.adminFormTools.modifyCheckbox(checkboxList[i]);
			}
		}
		
		var fileList = BX.findChildren(BX(id), {tagName: 'INPUT', property: {type: 'file'}}, true);
		if (!!fileList)
		{
			for (i = 0; i < fileList.length; i++)
			{
				BX.adminFormTools.modifyFile(fileList[i]);
			}
		}
	},
	FindPropertyByFormulaCode: function(code)
	{
		if (!CRamCalc.formulaProperties.length) return false;
		
		var prop = "";
		var field = "";
		
		for (var p in CRamCalc.formulaProperties)
		{
			for (var f in CRamCalc.formulaProperties[p].fields)
			{
				if (CRamCalc.formulaProperties[p].fields[f].formula == code)
				{
					field = CRamCalc.formulaProperties[p].fields[f];
					break;
				}
			}
			if (field)
			{
				prop = CRamCalc.formulaProperties[p];
				break;
			}
		}
		
		if (prop && field) return {prop: prop, field: field};
		else return false;
	},
	FindCalculationByCode: function(code)
	{
		if (!CRamCalc.formulaCalculations.length) return false;
		
		var result = false;
		
		for (var p in CRamCalc.formulaCalculations)
		{
			if (CRamCalc.formulaCalculations[p].code == code)
			{
				result = CRamCalc.formulaCalculations[p];
				break;
			}
		}
		
		return result;
	},
	ConvertPow: function(string)
	{
		// 2 ^ 3 ^ 4 => Math.pow(Math.pow(2, 3), 4)
		
		var powPosition = -1;
		for (var i=0; i<string.length; i++)
		{
			if (string[i] == "^")
			{
				powPosition = i;
				
				var baseFound = false;
				var baseOpenBraces = 0;
				var baseCloseBraces = 0;
				var basePosition = powPosition;
				
				do
				{
					basePosition--;
					
					if (basePosition <= 0)
					{
						baseFound = true;
						basePosition = 0;
					}
					else if (["+", "-", "*", "/", "("].indexOf(string[basePosition]) != -1 && baseOpenBraces == baseCloseBraces)
					{
						if (basePosition <= 0 || string[basePosition] != "-" || string[basePosition-1] != "(")
						{
							basePosition++;
						}
						
						baseFound = true;
					}
					else if (string[basePosition] == "(") baseOpenBraces++;
					else if (string[basePosition] == ")") baseCloseBraces++;
				}
				while (!baseFound);
				
				var base = string.substring(basePosition, powPosition);
				
				var exponentFound = false;
				var exponentOpenBraces = 0;
				var exponentCloseBraces = 0;
				var exponentPosition = powPosition;
				
				do
				{
					exponentPosition++;
					
					if (exponentPosition >= string.length - 1)
					{
						exponentFound = true;
						exponentPosition = string.length - 1;
					}
					else if (["+", "-", "*", "/", ")", "^"].indexOf(string[exponentPosition]) != -1 && exponentOpenBraces == exponentCloseBraces)
					{
						if (string[exponentPosition] != "-" || exponentPosition != (powPosition + 1))
						{
							exponentFound = true;
							exponentPosition--;
						}
					}
					else if (string[exponentPosition] == "(") exponentOpenBraces++;
					else if (string[exponentPosition] == ")") exponentCloseBraces++;
				}
				while (!exponentFound);
				
				exponent = string.substring(powPosition+1, exponentPosition+1);
				
				var pow = "Math.pow("+base+","+exponent+")";
				
				string = string.substring(0, basePosition) + pow + string.substring(exponentPosition+1);
				
				break;
			}
		}
		
		if (powPosition != -1) return CRamCalc.ConvertPow(string);
		else return string;
	},
	StringToLevels: function(string)
	{
		var levels = [[string.replace(/ /g, '')]];
		
		for (var l = 0; l < levels.length; l++)
		{
			for (var p = 0; p < levels[l].length; p++)
			{
				var openBracePos = -1;
				var openBraces = 0;
				var closeBraces = 0;
				
				for (var c = 0; c < levels[l][p].length; c++)
				{
					if (levels[l][p][c] == "(")
					{
						if (openBracePos == -1) openBracePos = c;
						openBraces++;
					}
					else if (levels[l][p][c] == ")")
					{
						if (openBraces == closeBraces + 1)
						{
							if (!levels[l+1]) levels[l+1] = [];
							
							levels[l+1].push(levels[l][p].substr(openBracePos+1, c-openBracePos-1));
							
							var partLink = "#" + (l+1) + "." + (levels[l+1].length-1) + "#";
							
							levels[l][p] = levels[l][p].substr(0, openBracePos+1) + partLink + levels[l][p].substr(c);
							
							c = openBracePos + partLink.length + 1;
							
							openBracePos = -1;
							openBraces = 0;
							closeBraces = 0;
						}
						else
						{
							closeBraces++;
						}
					}
				}
			}
		}
		
		return levels;
	},
	StringToConditionFormula: function(string)
	{
		var levels = CRamCalc.StringToLevels(string);
		
		var regExps = [];
		
		for (var i in CRamCalc.formulaItems)
		{
			//if (CRamCalc.formulaItems[i].condition)
			//{
				regExps.push(CRamCalc.formulaItems[i]);
			//}
		}
		
		var replaces = {};
		var replacesCount = 0;
		var replacesLetters = "abcdefghijklmnopqrstuvwxyz";
		
		for (var l = levels.length-1; l >=0 ; l--)
		{
			for (var p = 0; p < levels[l].length; p++)
			{
				levels[l][p] = levels[l][p].split('#');
				
				for (var s = 0; s < levels[l][p].length; s++)
				{
					if (s % 2 != 0)
					{
						var levelLink = levels[l][p][s].split('.');
						
						levels[l][p][s] = levels[levelLink[0]][levelLink[1]];
					}
					else
					{
						for (var r = 0; r < regExps.length; r++)
						{
							var found;
							while (found = regExps[r].reg.exec(levels[l][p][s]))
							{
								var replacesCode = "{"+replacesLetters[Math.floor(replacesCount/26/26)]+replacesLetters[Math.floor(replacesCount/26)]+replacesLetters[replacesCount%26]+"}";
								
								replacesCount++;
								
								if (found[2])
								{
									replaces[replacesCode] = {type: regExps[r].type, value: found[2], formulaTitle: regExps[r].formulaTitle};
									levels[l][p][s] = levels[l][p][s].replace(found[2], replacesCode);
								}
								else
								{
									replaces[replacesCode] = {type: regExps[r].type, value: found[1], formulaTitle: regExps[r].formulaTitle};
									levels[l][p][s] = levels[l][p][s].replace(found[1], replacesCode);
								}
								
								regExps[r].reg.lastIndex = found.index;
							}
						}
					}
				}
				
				levels[l][p] = levels[l][p].join('#');
			}
		}
		
		var result = levels[0][0].replace(/#/g, '');
		
		for (var i in replaces)
		{
			if (replaces[i].type == "property")
			{
				var propertyByCode = CRamCalc.FindPropertyByFormulaCode(replaces[i].value);
				
				if (propertyByCode)
				{
					var calculateValue = propertyByCode.prop.data[propertyByCode.field.code];
					var propertyHtml = "[";
					if (propertyByCode.prop.name) propertyHtml += propertyByCode.prop.name+" :: ";
					propertyHtml += propertyByCode.field.title+"]";
					
					result = result.replace(i, "<div title='"+calculateValue+"' class='ram-calc__formula-item ram-calc__formula-item-property'><div class='ram-calc__formula-item-value' data-property='"+replaces[i].value+"'>"+propertyHtml+"</div></div>");
				}
				else
				{
					result = result.replace(i, "");
				}
			}
			else
			{
				if (!replaces[i].formulaTitle) replaces[i].formulaTitle = replaces[i].value;
				
				result = result.replace(i, "<div class='ram-calc__formula-item ram-calc__formula-item-"+replaces[i].type+"'><div class='ram-calc__formula-item-value' data-property='"+replaces[i].value+"'>"+replaces[i].formulaTitle+"</div></div>");
			}
		}
		
		result = result.replace(/div><div/g, "div><div class='ram-calc__formula-item ram-calc__formula-item-empty'><div class='ram-calc__formula-item-value'></div></div><div");
		
		if (result.length) result = "<div class='ram-calc__formula-item ram-calc__formula-item-empty'><div class='ram-calc__formula-item-value'></div></div>" + result + "<div class='ram-calc__formula-item ram-calc__formula-item-empty'><div class='ram-calc__formula-item-value'></div></div>";
		else result = "<div class='ram-calc__formula-item ram-calc__formula-item-empty'><div class='ram-calc__formula-item-value'></div></div>";
		
		return result;
	},
	StringToFormula: function(string)
	{
		var levels = CRamCalc.StringToLevels(string);
		
		var regExps = [];
		
		for (var i in CRamCalc.formulaItems)
		{
			if (!CRamCalc.formulaItems[i].conditionOnly)
			{
				regExps.push(CRamCalc.formulaItems[i]);
			}
		}
		
		var replaces = {};
		var replacesCount = 0;
		var replacesLetters = "abcdefghijklmnopqrstuvwxyz";
		
		for (var l = levels.length-1; l >=0 ; l--)
		{
			for (var p = 0; p < levels[l].length; p++)
			{
				levels[l][p] = levels[l][p].split('#');
				
				for (var s = 0; s < levels[l][p].length; s++)
				{
					if (s % 2 != 0)
					{
						var levelLink = levels[l][p][s].split('.');
						
						levels[l][p][s] = levels[levelLink[0]][levelLink[1]];
					}
					else
					{
						for (var r = 0; r < regExps.length; r++)
						{
							var found;
							while (found = regExps[r].reg.exec(levels[l][p][s]))
							{
								var replacesCode = "{"+replacesLetters[Math.floor(replacesCount/26/26)]+replacesLetters[Math.floor(replacesCount/26)]+replacesLetters[replacesCount%26]+"}";
								
								replacesCount++;
								
								if (found[2])
								{
									replaces[replacesCode] = {type: regExps[r].type, value: found[2], formulaTitle: regExps[r].formulaTitle};
									levels[l][p][s] = levels[l][p][s].replace(found[2], replacesCode);
								}
								else
								{
									replaces[replacesCode] = {type: regExps[r].type, value: found[1], formulaTitle: regExps[r].formulaTitle};
									levels[l][p][s] = levels[l][p][s].replace(found[1], replacesCode);
								}
								
								regExps[r].reg.lastIndex = found.index;
							}
						}
					}
				}
				
				levels[l][p] = levels[l][p].join('#');
			}
		}
		
		var result = levels[0][0].replace(/#/g, '');
		
		for (var i in replaces)
		{
			if (replaces[i].type == "property")
			{
				var propertyByCode = CRamCalc.FindPropertyByFormulaCode(replaces[i].value);
				
				if (propertyByCode)
				{
					var calculateValue = propertyByCode.prop.data[propertyByCode.field.code];
					var propertyHtml = "[";
					if (propertyByCode.prop.name) propertyHtml += propertyByCode.prop.name+" :: ";
					propertyHtml += propertyByCode.field.title+"]";
					
					result = result.replace(i, "<div title='"+calculateValue+"' class='ram-calc__formula-item ram-calc__formula-item-property'><div class='ram-calc__formula-item-value' data-property='"+replaces[i].value+"'>"+propertyHtml+"</div></div>");
				}
				else
				{
					result = result.replace(i, "");
				}
			}
			else if (replaces[i].type == "calculation")
			{
				replaces[i].value = replaces[i].value.split("_");
				var calculation = CRamCalc.FindCalculationByCode(replaces[i].value[1]);
				if (calculation)
				{
					result = result.replace(i, "<div title='"+calculation.value+"' class='ram-calc__formula-item ram-calc__formula-item-calculation'><div class='ram-calc__formula-item-value' data-calculation='"+replaces[i].value.join("_")+"'>["+calculation.title+"]</div></div>");
				}
				else
				{
					result = result.replace(i, "");
				}
			}
			else
			{
				if (!replaces[i].formulaTitle) replaces[i].formulaTitle = replaces[i].value;
					
				result = result.replace(i, "<div class='ram-calc__formula-item ram-calc__formula-item-"+replaces[i].type+"'><div class='ram-calc__formula-item-value' data-property='"+replaces[i].value+"'>"+replaces[i].formulaTitle+"</div></div>");
			}
		}
		
		result = result.replace(/div><div/g, "div><div class='ram-calc__formula-item ram-calc__formula-item-empty'><div class='ram-calc__formula-item-value'></div></div><div");
		
		if (result.length) result = "<div class='ram-calc__formula-item ram-calc__formula-item-empty'><div class='ram-calc__formula-item-value'></div></div>" + result + "<div class='ram-calc__formula-item ram-calc__formula-item-empty'><div class='ram-calc__formula-item-value'></div></div>";
		else result = "<div class='ram-calc__formula-item ram-calc__formula-item-empty'><div class='ram-calc__formula-item-value'></div></div>";
		
		return result;
	},
	FormulaToString: function(formula)
	{
		formula = formula.replace(/\&amp\;/g, "&");
		
		formula = formula.replace(/data-property="(.*?)">.*?</g, '>$1<');
		formula = formula.replace(/data-calculation="(.*?)">.*?</g, '>$1<');
		formula = formula.replace(/><=</g, '>#1#<');
		formula = formula.replace(/><</g, '>#2#<');
		formula = formula.replace(/>>=</g, '>#3#<');
		formula = formula.replace(/>></g, '>#4#<');
		
		formula = formula.replace(/<.*?>/g, '');
		
		formula = formula.replace(/#1#/g, '<=');
		formula = formula.replace(/#2#/g, '<');
		formula = formula.replace(/#3#/g, '>=');
		formula = formula.replace(/#4#/g, '>');
		
		return formula;
	},
	OnCalculationMeasureChange: function(item)
	{
		var calculation = $(item).parentsUntil(".ram-calc__calculations").last();
		
		CRamCalc.OnFormulaChange($(calculation).find(".ram-calc__formula-source"));
	},
	OnCalculationRoundingChange: function(item)
	{
		var calculation = $(item).parentsUntil(".ram-calc__calculations").last();
		
		CRamCalc.OnFormulaChange($(calculation).find(".ram-calc__formula-source"));
	},
	OnConditionFormulaChange: function(item)
	{
		var condition = $(item).parentsUntil(".ram-calc__conditions").last();
		
		$(condition).find(".ram-calc__formula").html(CRamCalc.StringToConditionFormula($(item).val()));
		
		var formula = $(item).val();
		var formulaSource = formula;
		
		if (formula.length)
		{
			formula = CRamCalc.ConvertPow(formula);
			
			formula = formula.replace(CRamCalc.mathFunctions.reg, CRamCalc.mathFunctions.replace);
			
			$(condition).find(".SERVICE_CONDITION_FORMATTED_FORMULA input").val(formula);
			
			var properties = formula.match(/(\[.*?\])/g);
			
			if (properties && properties.length)
			{
				for (var i in properties)
				{
					var propertyByCode = CRamCalc.FindPropertyByFormulaCode(properties[i]);
					
					if (propertyByCode)
					{
						if (propertyByCode.prop.type == 'list' && propertyByCode.field.code.search('_checked') != -1)
						{
							var calculateValue = propertyByCode.prop.data[propertyByCode.field.code] ? true : false;
						}
						else
						{
							var calculateValue = propertyByCode.prop.data[propertyByCode.field.code];
						}
						
						formula = formula.replace(properties[i], calculateValue);
					}
					else
					{
						formula = formula.replace(properties[i], "");
					}
				}
			}
			
			var result = 0;
			
			try
			{
				result = eval(formula);
			}
			catch (error)
			{
				result = "formula error";
			}
			
			if (result != "formula error")
			{
				$(condition).find(".ram-calc__formula-result").html(result ? "<div class='ram-calc__condition-true'>"+BX.message("RAM_CALC_CONDITION_TRUE")+"</div>" : "<div class='ram-calc__condition-false'>"+BX.message("RAM_CALC_CONDITION_FALSE")+"</div>");
			}
			else
			{
				$(condition).find(".ram-calc__formula-result").html("<div class='ram-calc__condition-false'>"+result+"</div>");
			}
		}
		else
		{
			$(condition).find(".ram-calc__formula-result").html("");
			$(condition).find(".SERVICE_CONDITION_FORMATTED_FORMULA input").val("");
		}
	},
	OnFormulaChange: function(item)
	{
		var resultChanged = CRamCalc.CalculateFormula(item);
		
		if (resultChanged) CRamCalc.UpdateFormulaCalculations();
	},
	CalculateFormula: function(item)
	{
		var calculation = $(item).parentsUntil(".ram-calc__calculations").last();
		
		$(calculation).find(".ram-calc__formula").html(CRamCalc.StringToFormula($(item).val()));
		
		var measure = $(calculation).find(".SERVICE_CALCULATION_MEASURE input").val();
		var rounding = parseInt($(calculation).find(".SERVICE_CALCULATION_ROUNDING input").val());
		var formula = $(item).val();
		var formulaSource = formula;
		var resultChanged = false;
		var oldValue = $(calculation).find(".ram-calc__formula-value").val();
		var result = "";
		
		if (formula.length)
		{
			formula = CRamCalc.ConvertPow(formula);
			
			formula = formula.replace(CRamCalc.mathFunctions.reg, CRamCalc.mathFunctions.replace);
			
			$(calculation).find(".SERVICE_CALCULATION_FORMATTED_FORMULA input").val(formula);
			
			var properties = formula.match(/(\[.*?\])/g);
			
			if (properties && properties.length)
			{
				for (var i in properties)
				{
					var propertyByCode = CRamCalc.FindPropertyByFormulaCode(properties[i]);
					
					if (propertyByCode)
					{
						var calculateValue = propertyByCode.prop.data[propertyByCode.field.code];
						formula = formula.replace(properties[i], calculateValue);
					}
					else
					{
						formula = formula.replace(properties[i], "");
					}
				}
			}
			
			var calculations = formula.match(/(calculationstart_[0-9]+_calculationend)/g);
			
			if (calculations && calculations.length)
			{
				for (var i in calculations)
				{
					var calcValue = calculations[i].split("_");
					var calc = CRamCalc.FindCalculationByCode(calcValue[1]);
					
					if (calc)
					{
						formula = formula.replace(calculations[i], calc.value);
					}
					else
					{
						formula = formula.replace(calculations[i], "");
					}
				}
			}
			
			try
			{
				result = eval(formula);
			}
			catch (error)
			{
				result = "formula error";
			}
			
			if (result != "formula error")
			{
				if (!isNaN(rounding) && isFinite(rounding))
				{
					if (rounding >= 0)
					{
						if (rounding > 100) rounding = 100;
					
						result = result.toFixed(rounding);
					}
					else
					{
						var order = Math.pow(10, Math.abs(rounding));
						
						result = Math.round(result / order) * order;
					}
				}
				
				$(calculation).find(".ram-calc__formula-result").html((formulaSource!=formula?" = "+formula+" =<br/>":"")+" = "+result+" "+measure);
				$(calculation).find(".ram-calc__formula-value").val(result);
			}
			else
			{
				$(calculation).find(".ram-calc__formula-result").html("<div class='ram-calc__calculation-false'>"+result+"</div>");
				$(calculation).find(".ram-calc__formula-value").val(result);
			}
		}
		else
		{
			$(calculation).find(".ram-calc__formula-result").html("");
			$(calculation).find(".SERVICE_CONDITION_FORMATTED_FORMULA input").val("");
			$(calculation).find(".ram-calc__formula-value").val(result);
		}
		
		if (oldValue != result) resultChanged = true;
		
		return resultChanged;
	},
	FormulaItemPropertyAdd: function(params)
	{
		var property = $("<div class='ram-calc__formula-item ram-calc__formula-item-property'><div class='ram-calc__formula-item-value' data-property='"+params.property+"'>"+params.title+"</div></div>");
		
		if (!$(params.item).hasClass('ram-calc__formula-item-empty'))
		{
			$(params.item).replaceWith(property);
		}
		else
		{
			$(property).insertAfter($(params.item));
			
			var empty = $("<div class='ram-calc__formula-item ram-calc__formula-item-empty'><div class='ram-calc__formula-item-value'></div></div>");
			$(empty).insertAfter($(property));
			
			CRamCalc.FormulaCloseMenu();
		}
			
		var formula = $(property).parent();
		$(formula).parent().find('input').val(CRamCalc.FormulaToString($(formula).html())).change();
	},
	FormulaItemCalculationAdd: function(params)
	{
		var calculation = $("<div class='ram-calc__formula-item ram-calc__formula-item-calculation'><div class='ram-calc__formula-item-value' data-calculation='"+params.calculation+"'>"+params.title+"</div></div>");
		
		if (!$(params.item).hasClass('ram-calc__formula-item-empty'))
		{
			$(params.item).replaceWith(calculation);
		}
		else
		{
			$(calculation).insertAfter($(params.item));
			
			var empty = $("<div class='ram-calc__formula-item ram-calc__formula-item-empty'><div class='ram-calc__formula-item-value'></div></div>");
			$(empty).insertAfter($(calculation));
			
			CRamCalc.FormulaCloseMenu();
		}
			
		var formula = $(calculation).parent();
		$(formula).parent().find('input').val(CRamCalc.FormulaToString($(formula).html())).change();
	},
	FormulaItemFunctionAdd: function(params)
	{
		var number = $("<div class='ram-calc__formula-item ram-calc__formula-item-function'><div class='ram-calc__formula-item-value' data-property='"+params.func+"'>"+params.title+"</div></div>");
		
		$(number).insertAfter($(params.item));
		
		var empty = $("<div class='ram-calc__formula-item ram-calc__formula-item-empty'><div class='ram-calc__formula-item-value'></div></div>");
		$(empty).insertAfter($(number));
		
		CRamCalc.FormulaCloseMenu();
		
		var formula = $(number).parent();
		$(formula).parent().find('input').val(CRamCalc.FormulaToString($(formula).html())).change();
	},
	FormulaItemNumberNormalize: function(item)
	{
		var value = $(item).val();
		
		value = value.replace(/,/g, ".");
		
		value = value.match(/([-]?[0-9]*[.]?[0-9]{0,})/);
		if (value)
		{
			value = value[0];
		}
		else value = '';
		
		$(item).val(value);
		
		var length = value.length || 1;
		
		$(item).attr('size', length);
	},
	FormulaItemNumberAdd: function(item)
	{
		var number = $("<div class='ram-calc__formula-item ram-calc__formula-item-number'><div class='ram-calc__formula-item-value'></div></div>");
		
		$(number).insertAfter($(item));
		CRamCalc.FormulaItemNumberEdit($(number));
		
		var empty = $("<div class='ram-calc__formula-item ram-calc__formula-item-empty'><div class='ram-calc__formula-item-value'></div></div>");
		$(empty).insertAfter($(number));
	},
	FormulaItemNumberEdit: function(number)
	{
		$(number).find('.ram-calc__formula-item-value').html("<input type='text' value='"+$(number).find('.ram-calc__formula-item-value').html()+"'/>");
		$(number).find('.ram-calc__formula-item-value input').focus();
		
		CRamCalc.FormulaItemNumberNormalize($(number).find('.ram-calc__formula-item-value input'));
		
		$(number).addClass('ram-calc__formula-item-edit');
		
		CRamCalc.FormulaCloseMenu();
		
		return false;
	},
	OnFormulaItemNumberChange: function(item)
	{
		var formula = $(item).parent();
		
		var v = $(item).find('.ram-calc__formula-item-value input').val();
		
		if (!v.toString().length) CRamCalc.FormulaItemDelete(item);
		else
		{
			$(item).find('.ram-calc__formula-item-value').html(v).attr('data-property', v);
			$(item).removeClass('ram-calc__formula-item-edit');
			
			$(formula).parent().find('input').val(CRamCalc.FormulaToString($(formula).html())).change();
		}
	},
	FormulaItemDelete: function(item)
	{
		var formula = $(item).parent();
		
		if ($(item).find('.ram-calc__formula-item-value').html().search(/\(/) > -1)
		{
			var nextBrace = CRamCalc.FormulaItemNextBrace(item);
			$(nextBrace).next().remove();
			$(nextBrace).remove();
		}
		else if ($(item).find('.ram-calc__formula-item-value').html() == ")")
		{
			var prevBrace = CRamCalc.FormulaItemPrevBrace(item);
			$(prevBrace).next().remove();
			$(prevBrace).remove();
		}
		$(item).next().remove();
		$(item).remove();
		
		$(formula).parent().find('input').val(CRamCalc.FormulaToString($(formula).html())).change();
		
		return false;
	},
	FormulaItemNextBrace: function(item)
	{
		var formula = $(item).parent();
		var openBraces = 1;
		var closeBraces = 0;
		var found = false;
		
		do
		{
			item = $(item).next();
			
			if (!$(item).length) break;
			else if ($(item).hasClass('ram-calc__formula-item-function'))
			{
				if ($(item).find('.ram-calc__formula-item-value').html().search(/\(/) > -1)
				{
					openBraces++;
				}
				else if ($(item).find('.ram-calc__formula-item-value').html() == ')')
				{
					if (openBraces == closeBraces + 1)
					{
						found = true;
					}
					else
					{
						closeBraces++;
					}
				}
			}
		}
		while (!found);
		
		return item;
	},
	FormulaItemPrevBrace: function(item)
	{
		var formula = $(item).parent();
		var openBraces = 0;
		var closeBraces = 1;
		var found = false;
		
		do
		{
			item = $(item).prev();
			
			if (!$(item).length) break;
			else if ($(item).hasClass('ram-calc__formula-item-function'))
			{
				if ($(item).find('.ram-calc__formula-item-value').html() == ')')
				{
					closeBraces++;
				}
				else if ($(item).find('.ram-calc__formula-item-value').html().search(/\(/) > -1)
				{
					if (closeBraces == openBraces + 1)
					{
						found = true;
					}
					else
					{
						openBraces++;
					}
				}
			}
		}
		while (!found);
		
		return item;
	},
	ConditionFormulaOpenMenu: function(item)
	{
		CRamCalc.FormulaCloseMenu();
		
		if ($(item).hasClass('ram-calc__formula-item-edit')) return;
		
		$('.ram-calc__formula-item-selected').find('.ram-calc__formula-item-list').remove();
		$('.ram-calc__formula-item-selected').removeClass('ram-calc__formula-item-selected');
		
		$(item).addClass('ram-calc__formula-item-selected');
		
		var lists =
		{
			"main":
			[
				{type: "number", title: BX.message("RAM_CALC_ADD_NUMBER"), html: BX.message("RAM_CALC_NUMBER")},
				{type: "list", code: "property", title: BX.message("RAM_CALC_PROPERTIES"), html: BX.message("RAM_CALC_PROPERTIES")},
				{type: "list", code: "function", title: BX.message("RAM_CALC_FUNCTIONS"), html: BX.message("RAM_CALC_FUNCTIONS")},
			],
			"property": [{type: "list", code: "main", title: BX.message("RAM_CALC_BACK"), html: BX.message("RAM_CALC_BACK")}, {type: "title", html: BX.message("RAM_CALC_PROPERTIES")}],
			"function":
			[
				{type: "list", code: "main", title: BX.message("RAM_CALC_BACK"), html: BX.message("RAM_CALC_BACK")},
				{type: "title", html: BX.message("RAM_CALC_FUNCTIONS")},
			],
			"editnumber":
			[
				{type: "editnumber", title: BX.message("RAM_CALC_EDIT"), html: BX.message("RAM_CALC_EDIT")},
				{type: "delete", title: BX.message("RAM_CALC_DELETE"), html: BX.message("RAM_CALC_DELETE")},
			],
			"edit":
			[
				{type: "delete", title: BX.message("RAM_CALC_DELETE"), html: BX.message("RAM_CALC_DELETE")},
			]
		};
		
		for (var i in CRamCalc.formulaItems)
		{
			if (CRamCalc.formulaItems[i].type == "function")
			{
				lists["function"].push({type: "function", title: CRamCalc.formulaItems[i].title, html: CRamCalc.formulaItems[i].menu, formula: CRamCalc.formulaItems[i].formula});
			}
		}
		
		for (var i in CRamCalc.formulaProperties)
		{
			var property = CRamCalc.formulaProperties[i];
			
			if (property.code)
			{
				lists.property.push({type: "list", code: "property_"+property.code, title: property.name, html: property.name});
			
				lists["property_"+property.code] = [{type: "list", code: "property", title: BX.message("RAM_CALC_BACK"), html: BX.message("RAM_CALC_BACK")}, {type: "title", html: property.name}];
			
				for (var j in property.fields)
				{
					lists["property_"+property.code].push({type: "property", title: property.fields[j].title, html: property.fields[j].title, formula: property.fields[j].formula});
				}
			}
			else
			{
				for (var j in property.fields)
				{
					lists.property.push({type: "property", title: property.fields[j].title, html: property.fields[j].title, formula: property.fields[j].formula});
				}
			}
		}
		
		var selectedList = "main";
		
		if ($(item).hasClass("ram-calc__formula-item-number"))
		{
			delete(lists["main"]);
			delete(lists["property"]);
			delete(lists["function"]);
			delete(lists["edit"]);
			selectedList = "editnumber";
		}
		else if ($(item).hasClass("ram-calc__formula-item-function"))
		{
			delete(lists["main"]);
			delete(lists["property"]);
			delete(lists["function"]);
			delete(lists["editnumber"]);
			selectedList = "edit";
		}
		else if ($(item).hasClass("ram-calc__formula-item-property"))
		{
			delete(lists["main"]);
			delete(lists["property"]);
			delete(lists["function"]);
			delete(lists["editnumber"]);
			
			var propertyCode = $(item).find(".ram-calc__formula-item-value").attr("data-property");
			var property = CRamCalc.FindPropertyByFormulaCode(propertyCode);
			
			if (property && property.prop.name)
			{
				property = property.prop;
				lists.edit.push({type: "title", html: property.name});
				for (var j in property.fields)
				{
					lists.edit.push({type: "property", title: property.fields[j].title, html: property.fields[j].title, formula: property.fields[j].formula, selected: propertyCode == property.fields[j].formula});
				}
			}
			
			selectedList = "edit";
		}
		
		var listsHtml = "";
		
		for (var listCode in lists)
		{
			var list = lists[listCode];
			var listHtml = "<div class='ram-calc__formula-item-list-block' data-code='"+listCode+"' "+(listCode==selectedList?"style='display: block;'":"")+" >";
			for (var i in list)
			{
				var selected = list[i].selected ? "class='ram-calc__formula-item-list-selected'" : "";
				switch (list[i].type)
				{
					case "number": listHtml += "<a "+selected+" title='"+list[i].title+"' href='#' data-action='itemNumberAdd'>"+list[i].html+"</a>"; break;
					case "list": listHtml += "<a "+selected+" title='"+list[i].title+"' href='#' data-action='openList' data-code='"+list[i].code+"'>"+list[i].html+"</a>"; break;
					case "function": listHtml += "<a "+selected+" title='"+list[i].title+"' href='#' data-action='itemFunctionAdd' data-function='"+list[i].formula+"'>"+list[i].html+"</a>"; break;
					case "property": listHtml += "<a "+selected+" title='"+list[i].title+"' href='#' data-action='itemPropertyAdd' data-property='"+list[i].formula+"'>"+list[i].html+"</a>"; break;
					case "editnumber": listHtml += "<a "+selected+" title='"+list[i].title+"' href='#' data-action='itemNumberEdit'>"+list[i].html+"</a>"; break;
					case "delete": listHtml += "<a "+selected+" title='"+list[i].title+"' href='#' data-action='itemDelete'>"+list[i].html+"</a>"; break;
					case "title": listHtml += "<span>"+list[i].html+"</span>"; break;
				}
			}
			listHtml += "</div>";
			
			listsHtml += listHtml;
		}
		
		$(item).append("<div class='ram-calc__formula-item-list'>"+listsHtml+"</div>");
		
		if ($(item).position().left + $(item).find('.ram-calc__formula-item-list').outerWidth() > $(window).width())
		{
			$(item).find('.ram-calc__formula-item-list').addClass("ram-calc__formula-item-list-right");
		}
	},
	FormulaOpenMenu: function(item)
	{
		CRamCalc.FormulaCloseMenu();
		
		if ($(item).hasClass("ram-calc__formula-item-edit")) return;
		
		var calculation = $(item).parentsUntil(".ram-calc__calculations").last();
		var calculationCode = $(calculation).find(".SERVICE_CALCULATION_CODE input").val();
		
		$(".ram-calc__formula-item-selected").find(".ram-calc__formula-item-list").remove();
		$(".ram-calc__formula-item-selected").removeClass("ram-calc__formula-item-selected");
		
		$(item).addClass("ram-calc__formula-item-selected");
		
		var lists =
		{
			"main":
			[
				{type: "number", title: BX.message("RAM_CALC_ADD_NUMBER"), html: BX.message("RAM_CALC_NUMBER")},
				{type: "list", code: "property", title: BX.message("RAM_CALC_ADD_PROPERTY"), html: BX.message("RAM_CALC_PROPERTIES")},
				{type: "list", code: "function", title: BX.message("RAM_CALC_ADD_FUNCTION"), html: BX.message("RAM_CALC_FUNCTIONS")},
				{type: "list", code: "calculation", title: BX.message("RAM_CALC_ADD_CALCULATION"), html: BX.message("RAM_CALC_CALCULATIONS")},
			],
			"property": [{type: "list", code: "main", title: BX.message("RAM_CALC_BACK"), html: BX.message("RAM_CALC_BACK")}, {type: "title", html: BX.message("RAM_CALC_PROPERTIES")}],
			"function":
			[
				{type: "list", code: "main", title: BX.message("RAM_CALC_BACK"), html: BX.message("RAM_CALC_BACK")},
				{type: "title", html: BX.message("RAM_CALC_FUNCTIONS")},
			],
			"calculation":
			[
				{type: "list", code: "main", title: BX.message("RAM_CALC_BACK"), html: BX.message("RAM_CALC_BACK")},
				{type: "title", html: BX.message("RAM_CALC_CALCULATIONS")},
			],
			"editnumber":
			[
				{type: "editnumber", title: BX.message("RAM_CALC_EDIT"), html: BX.message("RAM_CALC_EDIT")},
				{type: "delete", title: BX.message("RAM_CALC_DELETE"), html: BX.message("RAM_CALC_DELETE")},
			],
			"edit":
			[
				{type: "delete", title: BX.message("RAM_CALC_DELETE"), html: BX.message("RAM_CALC_DELETE")},
			]
		};
		
		for (var i in CRamCalc.formulaItems)
		{
			if (CRamCalc.formulaItems[i].type == "function" && !CRamCalc.formulaItems[i].conditionOnly)
			{
				lists["function"].push({type: "function", title: CRamCalc.formulaItems[i].title, html: CRamCalc.formulaItems[i].menu, formula: CRamCalc.formulaItems[i].formula});
			}
		}
		
		for (var i in CRamCalc.formulaCalculations)
		{
			if (calculationCode == CRamCalc.formulaCalculations[i].code) continue;
			
			lists["calculation"].push({type: "calculation", title: CRamCalc.formulaCalculations[i].title, html: CRamCalc.formulaCalculations[i].title, formula: "calculationstart_"+CRamCalc.formulaCalculations[i].code+"_calculationend"});
		}
		
		for (var i in CRamCalc.formulaProperties)
		{
			var property = CRamCalc.formulaProperties[i];
			
			if (property.code)
			{
				lists.property.push({type: "list", code: "property_"+property.code, title: property.name, html: property.name});
			
				lists["property_"+property.code] = [{type: "list", code: "property", title: BX.message("RAM_CALC_BACK"), html: BX.message("RAM_CALC_BACK")}, {type: "title", html: property.name}];
			
				for (var j in property.fields)
				{
					lists["property_"+property.code].push({type: "property", title: property.fields[j].title, html: property.fields[j].title, formula: property.fields[j].formula});
				}
			}
			else
			{
				for (var j in property.fields)
				{
					lists.property.push({type: "property", title: property.fields[j].title, html: property.fields[j].title, formula: property.fields[j].formula});
				}
			}
		}
		
		var selectedList = "main";
		
		if ($(item).hasClass("ram-calc__formula-item-number"))
		{
			delete(lists["main"]);
			delete(lists["property"]);
			delete(lists["function"]);
			delete(lists["edit"]);
			selectedList = "editnumber";
		}
		else if ($(item).hasClass("ram-calc__formula-item-function"))
		{
			delete(lists["main"]);
			delete(lists["property"]);
			delete(lists["function"]);
			delete(lists["editnumber"]);
			selectedList = "edit";
		}
		else if ($(item).hasClass("ram-calc__formula-item-calculation"))
		{
			delete(lists["main"]);
			delete(lists["property"]);
			delete(lists["function"]);
			delete(lists["editnumber"]);
			selectedList = "edit";
		}
		else if ($(item).hasClass("ram-calc__formula-item-property"))
		{
			delete(lists["main"]);
			delete(lists["property"]);
			delete(lists["function"]);
			delete(lists["editnumber"]);
			
			var propertyCode = $(item).find(".ram-calc__formula-item-value").attr("data-property");
			var property = CRamCalc.FindPropertyByFormulaCode(propertyCode);
			
			if (property && property.prop.name)
			{
				property = property.prop;
				lists.edit.push({type: "title", html: property.name});
				for (var j in property.fields)
				{
					lists.edit.push({type: "property", title: property.fields[j].title, html: property.fields[j].title, formula: property.fields[j].formula, selected: propertyCode == property.fields[j].formula});
				}
			}
			
			selectedList = "edit";
		}
		
		var listsHtml = "";
		
		for (var listCode in lists)
		{
			var list = lists[listCode];
			var listHtml = "<div class='ram-calc__formula-item-list-block' data-code='"+listCode+"' "+(listCode==selectedList?"style='display: block;'":"")+" >";
			for (var i in list)
			{
				var selected = list[i].selected ? "class='ram-calc__formula-item-list-selected'" : "";
				switch (list[i].type)
				{
					case "number": listHtml += "<a "+selected+" title='"+list[i].title+"' href='#' data-action='itemNumberAdd'>"+list[i].html+"</a>"; break;
					case "list": listHtml += "<a "+selected+" title='"+list[i].title+"' href='#' data-action='openList' data-code='"+list[i].code+"'>"+list[i].html+"</a>"; break;
					case "function": listHtml += "<a "+selected+" title='"+list[i].title+"' href='#' data-action='itemFunctionAdd' data-function='"+list[i].formula+"'>"+list[i].html+"</a>"; break;
					case "property": listHtml += "<a "+selected+" title='"+list[i].title+"' href='#' data-action='itemPropertyAdd' data-property='"+list[i].formula+"'>"+list[i].html+"</a>"; break;
					case "calculation": listHtml += "<a "+selected+" title='"+list[i].title+"' href='#' data-action='itemCalculationAdd' data-calculation='"+list[i].formula+"'>"+list[i].html+"</a>"; break;
					case "editnumber": listHtml += "<a "+selected+" title='"+list[i].title+"' href='#' data-action='itemNumberEdit'>"+list[i].html+"</a>"; break;
					case "delete": listHtml += "<a "+selected+" title='"+list[i].title+"' href='#' data-action='itemDelete'>"+list[i].html+"</a>"; break;
					case "title": listHtml += "<span>"+list[i].html+"</span>"; break;
				}
			}
			listHtml += "</div>";
			
			listsHtml += listHtml;
		}
		
		$(item).append("<div class='ram-calc__formula-item-list'>"+listsHtml+"</div>");
		
		if ($(item).position().left + $(item).find(".ram-calc__formula-item-list").outerWidth() > $(window).width())
		{
			$(item).find(".ram-calc__formula-item-list").addClass("ram-calc__formula-item-list-right");
		}
	},
	FormulaCloseMenu: function()
	{
		$(".ram-calc__formula-item-selected").find(".ram-calc__formula-item-list").remove();
		$(".ram-calc__formula-item-selected").removeClass("ram-calc__formula-item-selected");
	},
	FormulaOpenList: function(code)
	{
		var item = $('.ram-calc__formula-item-list-block[data-code="'+code+'"]').parentsUntil('.ram-calc__formula-item').last().parent();
		
		$('.ram-calc__formula-item-list-block').hide();
		$('.ram-calc__formula-item-list-block[data-code="'+code+'"]').show();
		
		if ($(item).position().left + $(item).find('.ram-calc__formula-item-list').outerWidth() > $(window).width())
		{
			$(item).find('.ram-calc__formula-item-list').addClass("ram-calc__formula-item-list-right");
		}
	},
	PropertySortable: function()
	{
		$('.ram-calc__property-item-data-sortable').sortable(
		{
			cursor: "move",
			items: ".ram-calc__property-item-data-item",
			cancel: ".ram-calc__not-sortable",
			axis: "y",
			start: function(e, ui)
			{
				ui.item.parentsUntil("table").parent().addClass("ui-sortable-active");
				
				ui.item.children().each(function(index)
				{
					var td = $(this).clone(true);
					$(td).find("input[type='radio']").replaceWith("<input type='radio' name='sortable[]'/>");
					
					ui.placeholder.children().eq(index).html($(td).html());
					ui.placeholder.children().eq(index).width($(this).width());
					ui.placeholder.children().eq(index).height($(this).height());
				});
			},
			stop: function(e, ui)
			{
				ui.item.parentsUntil("table").parent().removeClass("ui-sortable-active");
			},
			helper: function(e, tr)
			{
				var $helper = tr.clone(true);
				$helper.children().each(function(index)
				{
					$(this).width(tr.children().eq(index).width());
				});
				$helper.find("input").attr("name", "sortable[]");
				return $helper;
			},
		});
	},
}

$(document).ready(function()
{	
	$('.ram-calc__properties').sortable(
	{
		cursor: "move",
		items: ".ram-calc__property-item",
		cancel: ".ram-calc__property-item-body, .ram-calc__property-item-links",
		axis: "y",
		update: function(event, ui)
		{
			CRamCalc.UpdatePropertiesSort();
			CRamCalc.UpdateFormulaProperties();
		}
	});
	
	CRamCalc.PropertySortable();
	
	$('.ram-calc__conditions').sortable(
	{
		cursor: "move",
		items: ".ram-calc__condition-item",
		cancel: ".ram-calc__condition-item-body, .ram-calc__condition-item-links",
		axis: "y",
	});
	
	$('.ram-calc__calculations').sortable(
	{
		cursor: "move",
		items: ".ram-calc__calculation-item",
		cancel: ".ram-calc__calculation-item-body, .ram-calc__calculation-item-links",
		axis: "y",
	});
	
	$('.ram-calc__condition-actions').sortable(
	{
		cursor: "move",
		items: ".ram-calc__condition-action",
		//cancel: ".ram-calc__calculation-item-body, .ram-calc__calculation-item-links",
		axis: "y",
	});
	
	$('body').on('keydown', '.ram-calc__formula-item-value input', function(event)
	{
		if (event.keyCode == 13)
		{
			event.preventDefault();
			$(this).blur();
			return false;
		}
	});
	
	$('body').on('keyup', '.ram-calc__formula-item-value input', function()
	{
		CRamCalc.FormulaItemNumberNormalize($(this));
	});
	
	$('body').on('click', '.ram-calc__formula-item-list [data-action="itemDelete"]', function(event)
	{
		CRamCalc.FormulaItemDelete($(this).parentsUntil('.ram-calc__formula-item').last().parent());
		return false;
	});
	
	$('body').on('click', '.ram-calc__formula-item-list [data-action="itemPropertyAdd"]', function(event)
	{
		CRamCalc.FormulaItemPropertyAdd({item: $(this).parentsUntil('.ram-calc__formula-item').last().parent(), property: $(this).attr('data-property'), title: $(this).html()});
		return false;
	});
	
	$('body').on('click', '.ram-calc__formula-item-list [data-action="itemCalculationAdd"]', function(event)
	{
		CRamCalc.FormulaItemCalculationAdd({item: $(this).parentsUntil('.ram-calc__formula-item').last().parent(), calculation: $(this).attr('data-calculation'), title: $(this).html()});
		return false;
	});
	
	$('body').on('click', '.ram-calc__formula-item-list [data-action="itemFunctionAdd"]', function(event)
	{
		CRamCalc.FormulaItemFunctionAdd({item: $(this).parentsUntil('.ram-calc__formula-item').last().parent(), func: $(this).attr('data-function'), title: $(this).html()});
		return false;
	});
	
	$('body').on('click', '.ram-calc__formula-item-list [data-action="itemNumberAdd"]', function(event)
	{
		CRamCalc.FormulaItemNumberAdd($(this).parentsUntil('.ram-calc__formula-item').last().parent());
		return false;
	});
	
	$('body').on('click', '.ram-calc__formula-item-list [data-action="itemNumberEdit"]', function(event)
	{
		CRamCalc.FormulaItemNumberEdit($(this).parentsUntil('.ram-calc__formula-item').last().parent());
		return false;
	});
	
	$('body').on('click', '.ram-calc__formula-item-list [data-action="openList"]', function(event)
	{
		CRamCalc.FormulaOpenList($(this).attr('data-code'));
		return false;
	});
	
	$('body').on('blur', '.ram-calc__formula-item-number .ram-calc__formula-item-value input', function(event)
	{
		CRamCalc.OnFormulaItemNumberChange($(this).parentsUntil('.ram-calc__formula-item').last().parent());
	});
	
	$('body').on('click', '.ram-calc__calculations .ram-calc__formula-item', function(event)
	{
		event.stopPropagation();
		CRamCalc.FormulaOpenMenu(this);
	});
	
	$('body').on('click', '.ram-calc__conditions .ram-calc__formula-item', function(event)
	{
		event.stopPropagation();
		CRamCalc.ConditionFormulaOpenMenu(this);
	});
	
	$('body').on('click', function()
	{
		CRamCalc.FormulaCloseMenu();
	});
	
	$('body').on('change', '.ram-calc__properties input:not([onchange]), .ram-calc__properties textarea:not([onchange]), .SERVICE_PROPERTIES_SOURCE_PRICE input', function()
	{
		CRamCalc.UpdateFormulaProperties();
	});
	
	$('body').on('change', '.ram-calc__property-item-data-item input[type="file"]', function(event)
	{
		CRamCalc.OnUploadPropertyDataImage(event, $(this).attr("data-property"), $(this).attr("data-item"));
	});
});



!function(e,i){if("function"==typeof define&&define.amd)define(["exports","jquery"],function(e,r){return i(e,r)});else if("undefined"!=typeof exports){var r=require("jquery");i(exports,r)}else i(e,e.jQuery||e.Zepto||e.ender||e.$)}(this,function(e,i){function r(e,r){function n(e,i,r){return e[i]=r,e}function a(e,i){for(var r,a=e.match(t.key);void 0!==(r=a.pop());)if(t.push.test(r)){var u=s(e.replace(/\[\]$/,""));i=n([],u,i)}else t.fixed.test(r)?i=n([],r,i):t.named.test(r)&&(i=n({},r,i));return i}function s(e){return void 0===h[e]&&(h[e]=0),h[e]++}function u(e){switch(i('[name="'+e.name+'"]',r).attr("type")){case"checkbox":return"on"===e.value?!0:e.value;default:return e.value}}function f(i){if(!t.validate.test(i.name))return this;var r=a(i.name,u(i));return l=e.extend(!0,l,r),this}function d(i){if(!e.isArray(i))throw new Error("formSerializer.addPairs expects an Array");for(var r=0,t=i.length;t>r;r++)this.addPair(i[r]);return this}function o(){return l}function c(){return JSON.stringify(o())}var l={},h={};this.addPair=f,this.addPairs=d,this.serialize=o,this.serializeJSON=c}var t={validate:/^[a-z_][a-z0-9_]*(?:\[(?:\d*|[a-z0-9_]+)\])*$/i,key:/[a-z0-9_]+|(?=\[\])/gi,push:/^$/,fixed:/^\d+$/,named:/^[a-z0-9_]+$/i};return r.patterns=t,r.serializeObject=function(){return new r(i,this).addPairs(this.serializeArray()).serialize()},r.serializeJSON=function(){return new r(i,this).addPairs(this.serializeArray()).serializeJSON()},"undefined"!=typeof i.fn&&(i.fn.serializeObject=r.serializeObject,i.fn.serializeJSON=r.serializeJSON),e.FormSerializer=r,r});