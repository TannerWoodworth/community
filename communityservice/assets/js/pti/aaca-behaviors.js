$(document).ready(function(e)
	{
		//$('select[name="choose_a_pti_program"]').before('<label for="choose_a_pti_program">Choose a Program</label>');
		//$('option[value="Culinary Arts"]').attr('selected', 'selected');
		
		$('#freeform_choose_a_pti_program optgroup:last-child').prevAll('optgroup').remove();
		$('a[href="http://www.pti.edu/admissions-financial-aid/admissions/apply-now"]').attr('href','https://www.pti.edu/admissions-financial-aid/admissions/apply-now/apply-to-aaca');
		// next 10
		
		$('input[name="phone"]').attr('class', 'phone required parsley-validated');
		$('input[name^="phone_"]').attr('class','phone');
		$('div[data-type="international"] input[name="phone"]').removeAttr('class');
		$('input[name="work_phone"]').attr('class', 'phone required parsley-validated');
		
				$('div#chatStatusLoad').load('/assets/includes/readChatStatus-2.php',
				function ()
					{
						//alert (statusText);
						$('#chatButtonLoadStatus').removeAttr('class');
						var statusText 	= $('div#chatStatusLoad').text();
						var statText	= 'chat-trigger chat-'+statusText+'line';
						$('#chatButtonLoadStatus').attr('class', statText);
					});

function resizeObject ()
	{
		var GRcurdat	= new Date();
		var GRcurrMo 	= GRcurdat.getMonth();
		var GradYear	= GRcurdat.getFullYear();
		var GRSenior	= '';
		if (GRcurrMo < 5)
			{
				var GRSenior	= GradYear;	
			}
		else 
			{
				var GRSenior	= GradYear+1;
			}

		if ((window.innerWidth >= 1065))
			{
				$('strong:contains("gradyear")').html(GRSenior);
			}
		if ((window.innerWidth < 1065))
			{
				$('strong:contains("gradyear")').html(GRSenior);
			}
	}

//$(window).resize().resizeObject();
resizeObject();
$(window).on('resize', resizeObject);


$('dl.programDefList dt+dd').prev('dt').prepend('<div class="dlButton rt" title="click to show">►</div><div class="dlButton dn" title="click to hide">▼</div>');
$('dl.programDefList dd').hide();
$('dl.programDefList dt div.dlButton.dn').hide();
$('dl.programDefList dt').click(function()
	{
	    $(this).next('dd').toggle(200);
		$(this).children('div.dlButton').toggle();
	});

if ($('div#socialMediaList').length)
	{
		$('div#socialMediaList').load('/assets/includes/socialMediaList.html');
	}	

		$('div#iCalLoadACADStarts').load('/assets/includes/calendar.php?c=academic');


	});