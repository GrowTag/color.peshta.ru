var CRamCalc = 
{
	conditions: {},
	calculations: {},
	properties: {},
	htmls: {},
	titles: {},
	consents: {},
	params: {},
	popups: {},
	
	OnRangeSliderChange: function(item)
	{
		if ($(item).prop("readonly"))
		{
			$(item).val($(item).data("value"));
			return false;
		}
		
		$(item).parent().find('input[type="text"]').val($(item).val());
		$(item).parent().find('.ram-calc__range-min').html($(item).attr('min'));
		$(item).parent().find('.ram-calc__range-max').html($(item).attr('max'));
		CRamCalc.PropertyValueChange(item);
	},
	
	OnRangeSliderMove: function(item)
	{
		if ($(item).prop("readonly"))
		{
			$(item).val($(item).data("value"));
			return false;
		}
		
		$(item).parent().find('input[type="text"]').val($(item).val());
	},
	
	OnRangeInputChange: function(item)
	{
		$(item).parent().find('input[type="range"]').val($(item).val()).change();
	},
	
	OnNumberChange: function(item)
	{
		var min = parseFloat($(item).attr("min"));
		var max = parseFloat($(item).attr("max"));
		var step = parseFloat($(item).attr("step"));
		var value = $(item).val().length ? parseFloat($(item).val()) : 0;
		if (value < min) value = min;
		else if (value > max) value = max;
		else if (step)
		{
			var stepPart = value % step;
			if (stepPart > 0)
			{
				if (stepPart > step / 2) value = value - stepPart + step;
				else value = value - stepPart;
			}
			else if (stepPart < 0)
			{
				if (Math.abs(stepPart) > step / 2) value = value - stepPart - step;
				else value = value - stepPart;
			}
		}
		$(item).val(value);
		CRamCalc.PropertyValueChange(item);
	},
	
	OnSelectChange: function(item)
	{
		CRamCalc.PropertyValueChange(item);
	},
	
	OnListItemClick: function(item)
	{
		if ($(item).prop("readonly")) return false;
		
		CRamCalc.PropertyValueChange(item);
	},
	
	PropertyValueChange: function(item)
	{
		var calculatorID = $(item).parentsUntil(".ram-calc__calculator-wrap").last().attr("data-calculator");
		
		CRamCalc.UpdatePropertiesValues(calculatorID);
		CRamCalc.CheckConditions(calculatorID);
		CRamCalc.UpdatePropertiesValues(calculatorID);
		CRamCalc.DoCalculates(calculatorID);
	},
	
	UpdatePropertiesValues: function(calculatorID)
	{
		if (CRamCalc.properties[calculatorID].length < 1) return false;
		
		for (var i in CRamCalc.properties[calculatorID])
		{
			var property = CRamCalc.properties[calculatorID][i];
			
			property.FORMULA_VALUES = {};
			
			if (property.CODE == "base")
			{
				property.FORMULA_VALUES["["+property.CODE+".price]"] = parseFloat(property.PRICE);
				if (!property.FORMULA_VALUES["["+property.CODE+".price]"]) property.FORMULA_VALUES["["+property.CODE+".price]"] = 0;
			}
			else if (property.TYPE == "number")
			{
				if (!$("[data-calculator='"+calculatorID+"'] [name='"+property.FIELD_NAME+"']").prop("disabled"))
				{
					property.FORMULA_VALUES["["+property.CODE+".value]"] = parseFloat($("[data-calculator='"+calculatorID+"'] [name='"+property.FIELD_NAME+"']").val());
					if (!property.FORMULA_VALUES["["+property.CODE+".value]"]) property.FORMULA_VALUES["["+property.CODE+".value]"] = 0;
				}
				else
				{
					property.FORMULA_VALUES["["+property.CODE+".value]"] = 0;
				}
				property.FORMULA_VALUES["["+property.CODE+".min]"] = parseFloat($("[data-calculator='"+calculatorID+"'] [name='"+property.FIELD_NAME+"']").attr("min"));
				if (!property.FORMULA_VALUES["["+property.CODE+".min]"]) property.FORMULA_VALUES["["+property.CODE+".min]"] = 0;
				property.FORMULA_VALUES["["+property.CODE+".max]"] = parseFloat($("[data-calculator='"+calculatorID+"'] [name='"+property.FIELD_NAME+"']").attr("max"));
				if (!property.FORMULA_VALUES["["+property.CODE+".max]"]) property.FORMULA_VALUES["["+property.CODE+".max]"] = 0;
				property.FORMULA_VALUES["["+property.CODE+".step]"] = parseFloat($("[data-calculator='"+calculatorID+"'] [name='"+property.FIELD_NAME+"']").attr("step"));
				if (!property.FORMULA_VALUES["["+property.CODE+".step]"]) property.FORMULA_VALUES["["+property.CODE+".step]"] = 0;
			}
			else
			{
				property.FORMULA_VALUES["["+property.CODE+".price]"] = 0;
				property.FORMULA_VALUES["["+property.CODE+".pricesumm]"] = 0;
				
				if ($("[data-calculator='"+calculatorID+"'] select[name='"+property.FIELD_NAME+"']").length)
				{
					var propertyItem = $("[data-calculator='"+calculatorID+"'] select[name='"+property.FIELD_NAME+"']");
					var propertyItemValue = $(propertyItem).val();
					for (var j in property.VALUES)
					{
						var checked = false;
						if ($.isArray(propertyItemValue))
						{
							for (var k in propertyItemValue)
							{
								if (propertyItemValue[k] == j)
								{
									checked = true;
									break;
								}
							}
						}
						else
						{
							if (propertyItemValue == j) checked = true;
						}
						
						property.FORMULA_VALUES["["+property.CODE+"."+j+"_checked]"] = checked;
						property.FORMULA_VALUES["["+property.CODE+"."+j+"_price]"] = parseFloat(property.VALUES[j].PRICE);
						if (!property.FORMULA_VALUES["["+property.CODE+"."+j+"_price]"]) property.FORMULA_VALUES["["+property.CODE+"."+j+"_price]"] = 0;
						
						if (checked)
						{
							property.FORMULA_VALUES["["+property.CODE+".pricesumm]"] += property.FORMULA_VALUES["["+property.CODE+"."+j+"_price]"];
							property.FORMULA_VALUES["["+property.CODE+".price]"] = property.FORMULA_VALUES["["+property.CODE+"."+j+"_price]"];
						}
					}
				}
				else
				{
					for (var j in property.VALUES)
					{
						var checked = $("[data-calculator='"+calculatorID+"'] [name='"+property.FIELD_NAME+"'][value='"+j+"']").prop("checked") ? true : false;
						property.FORMULA_VALUES["["+property.CODE+"."+j+"_checked]"] = checked;
						property.FORMULA_VALUES["["+property.CODE+"."+j+"_price]"] = parseFloat(property.VALUES[j].PRICE);
						if (!property.FORMULA_VALUES["["+property.CODE+"."+j+"_price]"]) property.FORMULA_VALUES["["+property.CODE+"."+j+"_price]"] = 0;
						if (checked)
						{
							property.FORMULA_VALUES["["+property.CODE+".pricesumm]"] += property.FORMULA_VALUES["["+property.CODE+"."+j+"_price]"];
							property.FORMULA_VALUES["["+property.CODE+".price]"] = property.FORMULA_VALUES["["+property.CODE+"."+j+"_price]"];
						}
					}
				}
			}
		}
	},
	
	CheckConditions: function(calculatorID)
	{
		if (CRamCalc.conditions[calculatorID].length < 1) return false;
		
		var updatedItems = [];
		
		for (var i in CRamCalc.conditions[calculatorID])
		{
			var condition = CRamCalc.conditions[calculatorID][i];
			
			if (condition.FORMATTED_FORMULA.length)
			{
				var formula = condition.FORMATTED_FORMULA;
				
				var properties = formula.match(/(\[.*?\])/g);
				
				if (properties && properties.length)
				{
					for (var j in properties)
					{
						var property = properties[j];
						var propertySplit = property.replace("[", "").replace("]", "").split(".");
						
						for (var k in CRamCalc.properties[calculatorID])
						{
							if (CRamCalc.properties[calculatorID][k].CODE == propertySplit[0])
							{
								if (CRamCalc.properties[calculatorID][k].TYPE == 'list' && property.search('_checked') != -1)
								{
									var calculateValue = CRamCalc.properties[calculatorID][k].FORMULA_VALUES[property] ? true : false;
								}
								else
								{
									var calculateValue = CRamCalc.properties[calculatorID][k].FORMULA_VALUES[property];
								}
								
								formula = formula.replace(property, calculateValue);
								break;
							}
						}
					}
				}
				
				var result = false;
				
				try
				{
					result = eval(formula);
				}
				catch (error)
				{
					continue;
				}
				
				var actioinsList = null;
				
				if (result)
				{
					if (condition.ACTIONS_TRUE && condition.ACTIONS_TRUE.length > 0) actioinsList = condition.ACTIONS_TRUE;
				}
				else
				{
					if (condition.ACTIONS_FALSE && condition.ACTIONS_FALSE.length > 0) actioinsList = condition.ACTIONS_FALSE;
				}
				
				if (actioinsList && actioinsList.length > 0)
				{
					for (var actionIndex in actioinsList)
					{
						var action = actioinsList[actionIndex].split("_");
						
						if (action[0].search("calculation") == 0)
						{
							var actionCalculation = $("[data-calculator='"+calculatorID+"'] [data-calculation='"+action[0].replace("calculation", "")+"']").parent();
							switch (action[1])
							{
								case "show":
								{
									$(actionCalculation).show();
									break;
								}
								case "hide":
								{
									$(actionCalculation).hide();
									break;
								}
							}
						}
						else
						{
							var actionProperty = $("[data-calculator='"+calculatorID+"'] [data-property='"+action[0]+"']");
							
							if (action[2]) var actionPropertyValue = $(actionProperty).find("[value='"+action[2]+"']");
							
							switch (action[1])
							{
								case "show":
								{
									$(actionProperty).show();
									break;
								}
								case "enable":
								{
									$(actionProperty).find("select, input").prop("disabled", false);
									break;
								}
								case "hide":
								{
									$(actionProperty).hide();
									break;
								}
								case "disable":
								{
									$(actionProperty).find("select, input").prop("disabled", true);
									break;
								}
								case "readonly":
								{
									$(actionProperty).find("select, input[type='range'], input[type='text']").each(function()
									{
										$(this).prop("readonly", true).data("value", $(this).val());
									});
									break;
								}
								case "unreadonly":
								{
									$(actionProperty).find("select, input[type='range'], input[type='text']").prop("readonly", false);
									break;
								}
								case "value":
								{
									if ($(actionProperty).find("input").val() != action[2])
									{
										$(actionProperty).find("input").val(action[2]).change();
									}
									break;
								}
								case "min":
								case "max":
								case "step":
								{
									if ($(actionProperty).find("input").attr(action[1]) != action[2])
									{
										$(actionProperty).find("input").attr(action[1], action[2]).change();
									}
									break;
								}
								case "conditionvalue":
								{
									if ($(actionProperty).find("input").val() != result)
									{
										$(actionProperty).find("input").val(result).change();
									}
									break;
								}
								case "conditionmin":
								case "conditionmax":
								case "conditionstep":
								{
									if ($(actionProperty).find("input").attr(action[1].replace("condition", "")) != result)
									{
										$(actionProperty).find("input").attr(action[1].replace("condition", ""), result).change();
									}
									break;
								}
								case "valueValue":
								{
									if ($(actionProperty).find("select").length)
									{
										if (!$(actionPropertyValue).prop("selected"))
										{
											$(actionPropertyValue).prop("selected", true);
											$(actionProperty).find("select").change();
										}
									}
									else
									{
										if (!$(actionPropertyValue).prop("checked"))
										{
											$(actionPropertyValue).prop("checked", true).change();
										}
									}
									break;
								}
								case "unvalueValue":
								{
									if ($(actionProperty).find("select").length)
									{
										if ($(actionPropertyValue).prop("selected"))
										{
											$(actionPropertyValue).prop("selected", false);
											$(actionProperty).find("select").change();
										}
									}
									else
									{
										if ($(actionPropertyValue).prop("checked"))
										{
											$(actionPropertyValue).prop("checked", false).change();
										}
									}
									break;
								}
								case "showValue":
								{
									if ($(actionProperty).find("select").length)
									{
										if ($(actionPropertyValue).prop("disabled"))
										{
											$(actionPropertyValue).prop("disabled", false);
										}
									}
									else
									{
										if ($(actionPropertyValue).parent().is(":hidden"))
										{
											$(actionPropertyValue).parent().show();
											$(actionPropertyValue).prop("disabled", false);
										}
									}
									
									break;
								}
								case "hideValue":
								{
									if ($(actionProperty).find("select").length)
									{
										if (!$(actionPropertyValue).prop("disabled"))
										{
											$(actionPropertyValue).prop("disabled", true);
											
											if (!$(actionProperty).find("select").prop("multiple"))
											{
												if ($(actionProperty).find("select").val() == null)
												{
													$(actionProperty).find("select").val($(actionProperty).find("select option").not(":disabled").first().val()).change();
												}
											}
										}
									}
									else
									{
										if ($(actionPropertyValue).parent().is(":visible"))
										{
											$(actionPropertyValue).parent().hide();
											$(actionPropertyValue).prop("disabled", true);
										}
									}
									
									break;
								}
							}
						}
					}
				}
			}
		}
	},
	
	DoCalculates: function(calculatorID)
	{
		if (CRamCalc.calculations[calculatorID].length < 1) return false;
		
		for (var i in CRamCalc.calculations[calculatorID])
		{
			var calculation = CRamCalc.calculations[calculatorID][i];
			
			if (calculation.FORMATTED_FORMULA.length)
			{
				var formula = calculation.FORMATTED_FORMULA;
				
				var properties = formula.match(/(\[.*?\])/g);
				
				if (properties && properties.length)
				{
					for (var j in properties)
					{
						var property = properties[j];
						var propertySplit = property.replace("[", "").replace("]", "").split(".");
						
						for (var k in CRamCalc.properties[calculatorID])
						{
							if (CRamCalc.properties[calculatorID][k].CODE == propertySplit[0])
							{
								formula = formula.replace(property, CRamCalc.properties[calculatorID][k].FORMULA_VALUES[property]);
								break;
							}
						}
					}
				}
				
				var calculations = formula.match(/(calculationstart_[0-9]+_calculationend)/g);
				
				if (calculations && calculations.length)
				{
					for (var j in calculations)
					{
						var calcValue = calculations[j].split("_");
						var calc = null;
						
						for (var p in CRamCalc.calculations[calculatorID])
						{
							if (CRamCalc.calculations[calculatorID][p].CODE == calcValue[1])
							{
								calc = CRamCalc.calculations[calculatorID][p];
								break;
							}
						}
						
						if (calc)
						{
							formula = formula.replace(calculations[j], calc.RESULT);
						}
						else
						{
							formula = formula.replace(calculations[j], "");
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
					result = "0";
				}
				
				calculation.ROUNDING = parseFloat(calculation.ROUNDING);
				
				if (!isNaN(calculation.ROUNDING) && isFinite(calculation.ROUNDING))
				{
					if (calculation.ROUNDING >= 0)
					{
						if (calculation.ROUNDING > 100) calculation.ROUNDING = 100;
					
						result = result.toFixed(calculation.ROUNDING);
					}
					else
					{
						var order = Math.pow(10, Math.abs(calculation.ROUNDING));
						
						result = Math.round(result / order) * order;
					}
				}
				
				CRamCalc.calculations[calculatorID][i].RESULT = result;
				$("[data-calculator='"+calculatorID+"'] [data-calculation='"+calculation.CODE+"']").html(result);
			}
			else
			{
				CRamCalc.calculations[calculatorID][i].RESULT = 0;
				$("[data-calculator='"+calculatorID+"'] [data-calculation='"+calculation.CODE+"']").html("0");
			}
		}
		
		CRamCalc.UpdateTotalCalculates($("[data-calculator='"+calculatorID+"']").parent().attr("data-calculator-wrap"));
	},
	
	UpdateTotalCalculates: function(calculatorWrapID)
	{
		if ($("[data-calculator-wrap='"+calculatorWrapID+"'] .ram-calc__calculator-total-calculations").length)
		{
			var total = $("[data-calculator-wrap='"+calculatorWrapID+"'] .ram-calc__calculator-total-calculations");
			$(total).find("[data-calculation]").each(function()
			{
				var calculationCode = $(this).attr("data-calculation");
				var totalPrice = 0;
				var calculation = null;
				
				for (var i in CRamCalc.calculations[calculatorWrapID])
				{
					if (CRamCalc.calculations[calculatorWrapID][i].CODE == calculationCode)
					{
						calculation = CRamCalc.calculations[calculatorWrapID][i];
						break;
					}
				}
				
				if ($(".ram-calc__calculator-calculations [data-calculation='"+calculationCode+"']").length == 1)
				{
					$(total).hide();
				}
				else
				{
					$(total).show();
				}
				
				$(".ram-calc__calculator-calculations [data-calculation='"+calculationCode+"']").each(function()
				{
					totalPrice += parseFloat($(this).html());
				});
				
				if (!isNaN(calculation.ROUNDING) && isFinite(calculation.ROUNDING))
				{
					if (calculation.ROUNDING >= 0)
					{
						if (calculation.ROUNDING > 100) calculation.ROUNDING = 100;
					
						totalPrice = totalPrice.toFixed(calculation.ROUNDING);
					}
					else
					{
						var order = Math.pow(10, Math.abs(calculation.ROUNDING));
						
						totalPrice = Math.round(totalPrice / order) * order;
					}
				}
				
				$(this).html(totalPrice);
			});
		}
	},
	
	SelectCalculator: function(item)
	{
		var calculatorWrap = $(item).parentsUntil(".ram-calc__calculator-wrap").parent();
		var calculatorTabs = $(item).parent();
		var index = $(item).attr("data-index");
		
		$(calculatorTabs).find("[data-index]").removeClass("ram-calc__tab_active");
		$(item).addClass("ram-calc__tab_active");
		
		$(calculatorWrap).find("[data-calculator]").addClass("ram-calc__calculator_unactive");
		$(calculatorWrap).find("[data-calculator][data-index='"+index+"']").removeClass("ram-calc__calculator_unactive");
	},
	
	DeleteCalculator: function(item)
	{
		var calculatorWrap = $(item).parentsUntil(".ram-calc__calculator-wrap").parent();
		var index = $(item).parent().attr("data-index");
		
		if (confirm(BX.message("CONFIRM_CALCULATOR_DELETE")))
		{
			if ($(calculatorWrap).find(".ram-calc__tab[data-index='"+index+"']").hasClass("ram-calc__tab_active"))
			{
				$(calculatorWrap).find(".ram-calc__tab").not(".ram-calc__tab_active").first().click();
			}
			
			$(calculatorWrap).find("[data-calculator][data-index='"+index+"']").remove();
			$(calculatorWrap).find(".ram-calc__tab[data-index='"+index+"']").remove();
			
			CRamCalc.UpdateTotalCalculates($(calculatorWrap).attr("data-calculator-wrap"));
		}
	},
	
	AddCalculator: function(item, id)
	{
		var calculatorWrap = $(item).parentsUntil(".ram-calc__calculator-wrap").parent();
		var calculatorTabs = $(item).parent();
		var index = 0;
		$(calculatorWrap).find("[data-calculator]").each(function()
		{
			index = Math.max(parseInt($(this).attr('data-index')), index);
		});
		index++;
		
		var newTab = $("<div class='ram-calc__tab' data-index='"+index+"' onclick='return CRamCalc.SelectCalculator(this);'>"+CRamCalc.titles[id]+" #"+index+"<div class='ram-calc__tab-delete' onclick='return CRamCalc.DeleteCalculator(this);'></div></div>")
		
		$(newTab).insertBefore($(item));
		
		$(CRamCalc.htmls[id]).insertAfter($(calculatorWrap).find("[data-calculator]").last());
		
		$("[data-calculator='"+id+"']").attr("data-calculator", id+"_"+index).attr("data-index", index).addClass("ram-calc__calculator_unactive");
		
		CRamCalc.AddData(
		{
			id: id+"_"+index,
			conditions: $.extend(true, {}, CRamCalc.conditions[id]),
			calculations: $.extend(true, {}, CRamCalc.calculations[id]),
			properties: $.extend(true, {}, CRamCalc.properties[id]),
		});
		
		$(newTab).click();
	},
	
	AddData: function(params)
	{
		if (!params.id) return false;
		
		var id = params.id;
		
		CRamCalc.params[id] = params.params;
		
		if (params.multyple)
		{
			CRamCalc.conditions[id] = params.conditions;
			CRamCalc.calculations[id] = params.calculations;
			CRamCalc.properties[id] = params.properties;
			
			CRamCalc.htmls[id] = $("[data-calculator='"+id+"']").clone()[0].outerHTML;
			CRamCalc.titles[id] = params.title;
			
			$("[data-calculator='"+id+"']").attr("data-calculator", id+"_1").attr("data-index", 1);
			id += "_1";
		}
		
		CRamCalc.conditions[id] = $.extend(true, {}, params.conditions);
		CRamCalc.calculations[id] = $.extend(true, {}, params.calculations);
		CRamCalc.properties[id] = $.extend(true, {}, params.properties);
		
		CRamCalc.UpdatePropertiesValues(id);
		CRamCalc.CheckConditions(id);
		CRamCalc.UpdatePropertiesValues(id);
		CRamCalc.DoCalculates(id);
	},
	
	InitPopup: function(params)
	{
		CRamCalc.popups[params.id] =
		{
			popup: BX.PopupWindowManager.create("ram-calc__popup-" + params.id, null,
			{
				autoHide: true,
				offsetLeft: 0,
				offsetTop: 0,
				overlay: true,
				closeByEsc: true,
				titleBar: false,
				closeIcon: true,
				contentColor: "white",
				className: "ram-calc__popup ram-calc__popup-"+params.id+" ram-calc__popup_theme-"+params.theme
			}),
			successMessage: params.successMessage,
			failMessage: params.failMessage,
		};
		
		//CRamCalc.popups[params.id].popup.show();
		//CRamCalc.popups[params.id].popup.close();
	},
	
	ShowPopup: function(params)
	{
		if (CRamCalc.popups[params.id].popup) CRamCalc.popups[params.id].popup.close();
		
		CRamCalc.popups[params.id].popup.setContent(params.status == "success" ? CRamCalc.popups[params.id].successMessage : CRamCalc.popups[params.id].failMessage);
		CRamCalc.popups[params.id].popup.resizeOverlay();
		CRamCalc.popups[params.id].popup.show();
	},
	
	Submit: function(item)
	{
		var calculatorWrap = $(item).parentsUntil(".ram-calc__calculator-wrap").parent();
		var parentID = $(calculatorWrap).attr("data-calculator-wrap");
		
		var checkFields = true;
		var requestFields = {};
		
		$(calculatorWrap).find("[name='requestFields[]']").each(function()
		{
			if (!$(this).val())
			{
				$(this).prop("required", true).focus();
				checkFields = false;
				return false;
			}
			else
			{
				$(this).prop("required", false);
				requestFields[$(this).attr("placeholder")] = $(this).val();
			}
		});
		
		if (!checkFields)
		{
			return false;
		}
		
		var data = JSON.parse(atob(CRamCalc.params[parentID]));
		data.CALC = {};
		data.FIELDS = requestFields;
		var url = data.AJAX_URL;
		delete data.AJAX_URL;
		
		$(calculatorWrap).find("[data-calculator]").each(function()
		{
			var id = $(this).attr("data-calculator");
			
			data.CALC[id] = {};
			data.CALC[id].VALUES = $(this).find("form").serializeObject().property;
			//data.CALC[id].PROPERTIES = CRamCalc.properties[id];
			data.CALC[id].CALCULATIONS = {};
			for (var i in CRamCalc.calculations[id])
			{
				data.CALC[id].CALCULATIONS[i] = CRamCalc.calculations[id][i].RESULT;
			}
			data.CALC[id].PARENT_ID = parentID;
		})
		
		$.ajax({url: url, type: "POST", data: data}).done(function(msg)
		{
			CRamCalc.ShowPopup({id: parentID, status: msg});
		});
		
		return false;
	},
};

!function(e,i){if("function"==typeof define&&define.amd)define(["exports","jquery"],function(e,r){return i(e,r)});else if("undefined"!=typeof exports){var r=require("jquery");i(exports,r)}else i(e,e.jQuery||e.Zepto||e.ender||e.$)}(this,function(e,i){function r(e,r){function n(e,i,r){return e[i]=r,e}function a(e,i){for(var r,a=e.match(t.key);void 0!==(r=a.pop());)if(t.push.test(r)){var u=s(e.replace(/\[\]$/,""));i=n([],u,i)}else t.fixed.test(r)?i=n([],r,i):t.named.test(r)&&(i=n({},r,i));return i}function s(e){return void 0===h[e]&&(h[e]=0),h[e]++}function u(e){switch(i('[name="'+e.name+'"]',r).attr("type")){case"checkbox":return"on"===e.value?!0:e.value;default:return e.value}}function f(i){if(!t.validate.test(i.name))return this;var r=a(i.name,u(i));return l=e.extend(!0,l,r),this}function d(i){if(!e.isArray(i))throw new Error("formSerializer.addPairs expects an Array");for(var r=0,t=i.length;t>r;r++)this.addPair(i[r]);return this}function o(){return l}function c(){return JSON.stringify(o())}var l={},h={};this.addPair=f,this.addPairs=d,this.serialize=o,this.serializeJSON=c}var t={validate:/^[a-z_][a-z0-9_]*(?:\[(?:\d*|[a-z0-9_]+)\])*$/i,key:/[a-z0-9_]+|(?=\[\])/gi,push:/^$/,fixed:/^\d+$/,named:/^[a-z0-9_]+$/i};return r.patterns=t,r.serializeObject=function(){return new r(i,this).addPairs(this.serializeArray()).serialize()},r.serializeJSON=function(){return new r(i,this).addPairs(this.serializeArray()).serializeJSON()},"undefined"!=typeof i.fn&&(i.fn.serializeObject=r.serializeObject,i.fn.serializeJSON=r.serializeJSON),e.FormSerializer=r,r});