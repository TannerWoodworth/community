$(document).ready(function(e) {

$('form#apply-form').prepend('<div id="collegeYNData" style="display:none;" data-otherunivyn="No"></div>');
$('form#apply-form').prepend('<div id="gradYearData" style="display:none;"></div>');

$('#college_university_information').hide();
$('.hsApplication').hide();

var currentDate = new Date();
var thisYr = currentDate.getFullYear();
var thisMo = currentDate.getMonth();
var thisDa = currentDate.getDate();
if (thisMo < 4)
	{
		$('#freeform_high_school_graduation_year option:contains("'+(thisYr+1)+'")').remove();
		$('#freeform_high_school_graduation_year option:contains("'+(thisYr+2)+'")').remove();
		$('#freeform_high_school_graduation_year option:contains("'+(thisYr+3)+'")').remove();
	}
else if (thisMo >= 4)
	{
		if ((thisMo == 4) && (thisDa < 11))
			{
				$('#freeform_high_school_graduation_year option:contains("'+(thisYr+1)+'")').remove();
				$('#freeform_high_school_graduation_year option:contains("'+(thisYr+2)+'")').remove();
				$('#freeform_high_school_graduation_year option:contains("'+(thisYr+3)+'")').remove();
			}
		else
			{
				$('#freeform_high_school_graduation_year option:contains("'+(thisYr+2)+'")').remove();
				$('#freeform_high_school_graduation_year option:contains("'+(thisYr+3)+'")').remove();
			}
	}
else
	{
		$('#freeform_high_school_graduation_year option:contains("'+(thisYr+2)+'")').remove();
		$('#freeform_high_school_graduation_year option:contains("'+(thisYr+3)+'")').remove();
	}	

$('#freeform_high_school_graduation_year').on('change', function ()
	{
		$('#gradYearData').text($(this).val());
		$('#gradYearData').attr('data-gradyr',$(this).val());
		var otherUniv	=	$('#collegeYNData').attr('data-otherunivyn').valueOf();
		var gradYr		=	$('#gradYearData').attr('data-gradyr').valueOf();
		transForm(otherUniv,gradYr);
	});
	
$('#freeform_have_you_attended_another_college_or_university_1').click(function ()
	{
		$('#collegeYNData').text($(this).val());
		$('#collegeYNData').attr('data-otherunivyn',$(this).val());
		var otherUniv	=	$('#collegeYNData').attr('data-otherunivyn').valueOf();
		var gradYr		=	$('#gradYearData').attr('data-gradyr').valueOf();
		transForm(otherUniv,gradYr);
	});

$('#freeform_have_you_attended_another_college_or_university_2').click(function ()
	{
		$('#collegeYNData').text($(this).val());
		$('#collegeYNData').attr('data-otherunivyn',$(this).val());
		var otherUniv	=	$('#collegeYNData').attr('data-otherunivyn').valueOf();
		var gradYr		=	$('#gradYearData').attr('data-gradyr').valueOf();
		transForm(otherUniv,gradYr);
	});

function concatName ()
	{
		var fName	= $('#first_name').attr('value').valueOf();
		var lName	= $('#last_name').attr('value').valueOf();
		var coll1	= $('#freeform_educational_institution_1').attr('value').valueOf();
		var coll2	= $('#freeform_educational_institution_2').attr('value').valueOf();
		var coll3	= $('#freeform_educational_institution_3').attr('value').valueOf();
		
				$('#trans_rel_school_2').val(coll1);
				$('#trans_rel_school_3').val(coll2);
				$('#trans_rel_school_4').val(coll3);
		
		if ((fName != '') && (lName != ''))
			{
				$('#fullName').text(fName+' '+lName);
			}
	}
$('input#signature_name').keyup(function() { concatName(); });
$('input#trans_rel_school_1').keyup(function() { concatName(); });	
$('input#first_name').keyup(function() { concatName(); });
$('input#last_name').keyup(function() { concatName(); });
	
// it's all about this function
function transForm (otherUniv,gradYr)
	{
		
        var curdate 	= new Date();
		var currMonth 	= curdate.getMonth();
		var gradYear 	= gradYr;
		var otherSch	= otherUniv;
		var dateYear	= curdate.getFullYear();
		var type;
		//alert(otherUniv+' - '+gradYr+' - '+currMonth);
		
		if (otherSch != "Yes")
			{
				var otherSch = "No";
			}
		
		if (gradYear == "")
			{
				type = 2;
			}
		
		if (currMonth <= 5)
			{
				if (gradYear == dateYear)
					{
						if (otherSch == 'Yes')
							{
								type = 3;
							}
						else
							{
								type = 4;
							}
					}	// senior
				else if (gradYear == dateYear + 1)
					{
						if (otherSch == 'Yes')
							{
								type = 4;
							}
						else
							{
								type = 4;
							}
					}	// junior
				else if (gradYear > dateYear + 1)
					{
						if (otherSch == 'Yes')
							{
								type = 5;
							}
						else
							{
								type = 5;
							}
					}	// underclass
				else
					{
						if (otherSch == 'Yes')
							{
								type = 1;
							}
						else
							{
								type = 2;
							}
					}	// adult
			}
		else if (currMonth >= 10)
			{
				if	(gradYear == dateYear)
					{
						if (otherSch == 'Yes')
							{
								type = 1; // was 3
							}
						else
							{
								type = 2;
							}
					}	// adult
				else if (gradYear == dateYear + 1)
					{
						if (otherSch == 'Yes')
							{
								type = 3;
							}
						else
							{
								type = 4;
							}
					}	// senior
				else if (gradYear > dateYear + 1)
					{
						if (otherSch == 'Yes')
							{
								type = 6;
							}
						else
							{
								type = 5;
							}
					}	// underclass
				else
					{
						if (otherSch == 'Yes')
							{
								type = 1;
							}
						else
							{
								type = 2;
							}
					}	// adult
			}
		else
			{
				if (gradYear == dateYear)
					{
						if (otherSch == 'Yes')
							{
								type = 3; // 6
							}
						else
							{
								type = 4; // 5
							}
					}	// senior
				else if (gradYear == dateYear + 1)
					{
						if (otherSch == 'Yes')
							{
								type = 3; // 6
							}
						else
							{
								type = 4; // 5
							}
					}	// junior
				else if (gradYear == dateYear + 2)
					{
						if (otherSch == 'Yes')
							{
								type = 6;
							}
						else
							{
								type = 5;
							}
					}	// sophomore
		/*		else if (gradYear >= dateYear + 1)
					{
						if (otherSch == 'Yes')
							{
								type = 6;
							}
						else
							{
								type = 5;
							}
					}	// underclass
		*/
				else
					{
						if (otherSch == 'Yes')
							{
								type = 1;
							}
						else
							{
								type = 2;
							}
					}	// adult
			}
	
	switch(type)
		{
			// adult app with univ list
			case 1:
				$('#college_university_information').show(200);
				$('.hsApplication').hide(200);
			break;
			
			// adult app no univ list
			case 2:
				$('#college_university_information').hide(200);
				$('.hsApplication').hide(200);
			break;
			
			// HS senior with univ list
			case 3:
				$('#college_university_information').show(200);
				$('.hsApplication').show(200);
			break;
			
			// HS senior no univ list
			case 4:
				$('#college_university_information').hide(200);
				$('.hsApplication').show(200);
			break;
			
			// HS basic app
			case 5:
				$('#college_university_information').hide(200);
				$('.hsApplication').hide(200);
			break;

			// HS basic app with univ list
			case 6:
				$('#college_university_information').show(200);
				$('.hsApplication').hide(200);
			break;
			
		}	
	
	}

});