$(document).ready(function()
	{
		if ($('div#studentPortfolioPDFs').length)
			{
				var dataNom = $('div#studentPortfolioPDFs').attr('data-nom').valueOf();
				//if (dataNom != '') { alert(dataNom); }
				$('div#studentPortfolioPDFs').load('/assets/php/portfolioLoad.php?nom='+dataNom);
			}
		if ($('div#socialMediaList').length)
			{
				$('div#socialMediaList').load('/assets/includes/socialMediaList.html');
			}		
		if ($('div#careerAssistanceData').length)
			{
				$('div#careerAssistanceData').load('/assets/includes/careerAssistanceData.html');
			}
		if ($('hsdsasc-process-submit').length)
			{
				$('hsdsasc-process-submit').load('/assets/includes/visions-process-submit.php');
			}	
		$('div#iCalLoadACAD').load('/assets/includes/calendar.php?c=academic');
		$('div#iCalLoadACADStarts').load('/assets/includes/calendar.php?c=academic');
	   	$('div#iCalLoadACT').load('/assets/includes/calendar.php?c=student%20activities');
		$('#FinAidVerificationFormsLoad').load('/assets/includes/finAidFormsLoader.php?type=ver');
		$('#freeform_state option[value="PA"]').attr('selected','selected');
		$('#freeform_state_1 option[value="PA"]').attr('selected','selected');
		$('#freeform_state_2 option[value="PA"]').attr('selected','selected');
		$('#freeform_trans_rel_state_1').prepend('<option value selected="selected">Choose One</option>');
		$('#freeform_trans_rel_state_2').prepend('<option value selected="selected">Choose One</option>');
		$('#freeform_trans_rel_state_3').prepend('<option value selected="selected">Choose One</option>');
		$('#freeform_trans_rel_state_4').prepend('<option value selected="selected">Choose One</option>');
		$('#freeform_educational_institution_state_1 option[value="PA"]').attr('selected','selected');
		$('#freeform_educational_institution_state_2 option[value="PA"]').attr('selected','selected');
		$('#freeform_educational_institution_state_3 option[value="PA"]').attr('selected','selected');
		$('#freeform_country option[value="us"]').attr('selected','selected');
		//$('div#loadTwitterFeed').load('/assets/includes/twitterFeed.php');
		//$('iframe#loadTwitterFeed').attr('style', 'width:100%;height:700px; overflow:hidden;');
		//$('iframe#loadTwitterFeed').attr('scrolling','no');
				
		$('#advisoryBoardList ul.advisoryBoard li.child').hide();
		$('#advisoryBoardList ul.advisoryBoard li.parent').click(function(e) {
            $('#advisoryBoardList ul.advisoryBoard li.child').hide(200);
			$(this).nextUntil('li.parent').show(200);
        });

		$('div.videoTranscript').hide();
		$('div.toggleVideoTranscript').click(function(e) {
            $('div.videoTranscript').toggle(500);
        });
		
		$('article header+img[src^="/images/made/uploads/pages/videoWorkshops/featureImage/"]').hide();
		
		$('input[name="phone"]').attr('class', 'phone required parsley-validated');
		$('input[name^="phone_"]').attr('class','phone');
		$('div[data-type="international"] input[name="phone"]').removeAttr('class');
		$('input[name="work_phone"]').attr('class', 'phone required parsley-validated');

// local-visits.js		

		$('a[href="http://www.pti.edu/portfolio-show/"]').attr('target','_blank');

		// visions and voices - do not display current year
		$('select[name="year_of_hs_graduation"]').children('option:last-child').remove();
		//$('select[name="year_of_hs_graduation"]').children('option:last-child').removeAttr('value');
		
		$('div.gedGrad').click(function(e)
			{
				$('#openerStarter').text('I affirm that I have ');
				var textParse 	= $(this).attr('data-gradtoggle').valueOf();
				var junct		= $(this).attr('data-junct').valueOf();
				var dataInst	= $(this).attr('data-inst').valueOf();
				$('#school-1-label').text(dataInst);
				$('#gradGEDResponse').text(textParse);
				$('#ged_graduation_response').attr('value', textParse);
				$('#gradGEDConjunction').text(junct);
				$('#gradGEDResponse').attr('class', 'twelve columns true');
				$('div.gedGrad').attr('class', 'six columns gedGrad');
				$(this).attr('class', 'six columns gedGrad active');  
				$('#school_1').removeAttr('disabled');
				$('#freeform_state').removeAttr('disabled');          
				$('#ged_form_graduation_date').removeAttr('disabled');          
        	});
		//$('#freeform_description').after('<div id="description-counter"></div>');
		$('#freeform_description').live('keyup',function()
			{
				$(this).attr('maxlength','600');
				$(this).attr('rows','8');
			});

		// visions and voices content
		$('body.hsdsasc-registration-recovery #freeform_email').addClass(function()
			{
            	$(this).parent().parent().parent().parent('form').attr('action', 'http://www.pti.edu/news-events/hsdsasc-registration-results');
        	});

  $('form[action="http://www.pti.edu/?ACT=66"] optgroup[label="PTI Online"]').remove();
  $('form[action="http://www.pti.edu/?ACT=66"] #freeform_choose_a_pti_program option[value=""]').after(
  '<optgroup label="PTI Online">'+
  '<option value="Business Administration - Management, Online">Business Administration - Management, Online</option>'+
  '<option value="Medical Coding, Online">Medical Coding, Online</option>'+
  '<option value="Medical Office Administration, Online">Medical Office Administration, Online</option>'+
  '</optgroup>');
  $('form[action="http://www.pti.edu/?ACT=66"] optgroup[label="Continuing Education Courses at PTI"]').remove();
//});	

// scroll the browser
$('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
    && location.hostname == this.hostname) {
      var $target = $(this.hash);
      $target = $target.length && $target
      || $('[name=' + this.hash.slice(1) +']');
      if ($target.length) {
        var targetOffset = $target.offset().top;
        $('html,body')
        .animate({scrollTop: targetOffset}, 1000);
       return false;
      }
    }
  });
  
$('dl.locations-tabs input[name="campus"]').parent().click(function(e)
	{
	//	if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
	//	&& location.hostname == this.hostname) {
		  var $target = $(this.hash).parent();
		  $target = $target.length && $target
		  || $('[name="viewLocation"]');
		  if ($target.length) {
			var targetOffset = $target.offset().top;
			$('html,body')
			.animate({scrollTop: targetOffset}, 1000);
		   //return false;
		  }
	//	}
	});	

// CHAT - load file and check online or offline status
// display different style depending on status

				$('div#chatStatusLoad').load('/assets/includes/readChatStatus-2.php',
				function ()
					{
						$('#chatButtonLoadStatus').removeAttr('class');
						var statusText 	= $('div#chatStatusLoad').text();
						var statText	= 'chat-trigger chat-'+statusText+'line';
						$('#chatButtonLoadStatus').attr('class', statText);
					});

// $('#chatButtonLoadStatus').attr('class', 'chat-trigger chat-offline');

$(window).scroll(function(eventObject)
{
		function getScrollXY()
			{
					var x = 0, y = 0;
					if( typeof( window.pageYOffset ) == 'number' ) {
						// Netscape
						x = window.pageXOffset;
						y = window.pageYOffset;
					} else if( document.body && ( document.body.scrollLeft || document.body.scrollTop ) ) {
						// DOM
						x = document.body.scrollLeft;
						y = document.body.scrollTop;
					} else if( document.documentElement && ( document.documentElement.scrollLeft || document.documentElement.scrollTop ) ) {
						// IE6 standards compliant mode
						x = document.documentElement.scrollLeft;
						y = document.documentElement.scrollTop;
					}
					return [x, y];
			}
		
		var xy = getScrollXY();
		var x = xy[0];
		var y = xy[1];


			
});


$("p:contains('Employed in Field')").hide();
$("p:contains('employed in field rate for our 2013 graduates')").hide();

if (window.innerWidth > 859)
	{
		$('a.crosslink').each(function(index, element)
			{
				var a = $(this).position();
            	$(this).append('<div class="crossLinkNote" style="display:none;left:'+a.left+'px; top:'+a.top+'px;">Programs related to: ' +
					$(this).text() + '</div>');
        	});
					
	}

$('a[href^="http://www.pti.edu/virtual_tour"]').attr('target','_blank');

if (window.innerWidth > 768)
	{
		$('ul.programs-list').clone(true,true).appendTo('div.morePrograms');
	}

function resizeObject ()
	{
		var GRcurdat	= new Date();
//		var GRcurdat	= GRcurdat.getTimezoneOffset(GMT-0240);
		var GRcurrMo 	= GRcurdat.getMonth();
		var GRcurDay 	= GRcurdat.getDate();
		var GradYear	= GRcurdat.getFullYear();
		var timeT		= GRcurdat.getHours();
		//alert(GRcurdat.getTimezoneOffset());
		var GRSenior	= '';
		var GRSenCon	= '';

		if ((GRcurrMo < 4))
			{
				var GRSenior	= GradYear;
				var GRSenCon	= GradYear;	
			}

		else 
			{
				if ((GRcurrMo == 4) && (GRcurDay < 11))
 					{
						var GRSenior	= GradYear;
						var GRSenCon	= GradYear;
					}
					
				else if ((GRcurrMo == 4) && (GRcurDay >= 11))
 					{
						var GRSenior	= '<b class="double"><span>' + GradYear + '</span><span>' + (GradYear + 1) + '</span></b>';
						var GRSenCon	= GradYear + 1;
					}

				else if ((GRcurrMo == 5) && (GRcurDay < 6))
					{
						var GRSenior	= '<b class="double"><span>' + GradYear + '</span><span>' + (GradYear + 1) + '</span></b>';
						var GRSenCon	= GradYear + 1;
					}
				
				else 
					{
						var GRSenior	= GradYear+1;
						var GRSenCon	= GradYear+1;
					}
				//alert(GRcurrMo);
			}

		if ((window.innerWidth >= 1065))
			{
				$('#hsSeniorHeaderLink').html('<strong>'+GRSenior+'</strong><br />GRADUATES<br /><img src="/images/HS-link-icon-62.png" alt="high school seniors" />');
				$('strong:contains("gradyearPlusX")').each(function(index, element) {
					var GrYrAdd = Number($(this).attr('data-add').valueOf());
					$(this).html((GRSenCon + GrYrAdd));
					$(this).css('font-weight','inherit');
                });
				$('strong:contains("gradyear")').html(GRSenCon);
				$('strong:contains("gradyear")').css('font-weight','inherit');
				$('span:contains("gradyear")').html(GRSenCon);
				$('strong:contains("prevFiveGradYrListOr")').html((GRSenCon - 1) + ', ' + (GRSenCon - 2) + ', ' + (GRSenCon - 3) + ', ' + (GRSenCon - 4) + ' or ' + (GRSenCon - 5));
			}

		if ((window.innerWidth < 1065))
			{
				$('#hsSeniorHeaderLink').html('<img src="/images/HS-link-icon-62.png" alt="high school seniors" /><strong>'+GRSenior+'</strong> GRADUATES');
				$('strong:contains("gradyearPlusX")').each(function(index, element) {
					var GrYrAdd = Number($(this).attr('data-add').valueOf());
                    $(this).html((GRSenCon + GrYrAdd));
					$(this).css('font-weight','inherit');
                });
				$('strong:contains("gradyear")').html(GRSenCon);
				$('strong:contains("gradyear")').css('font-weight','inherit');
				$('span:contains("gradyear")').html(GRSenCon);
				$('strong:contains("prevFiveGradYrListOr")').html((GRSenCon - 1) + ', ' + (GRSenCon - 2) + ', ' + (GRSenCon - 3) + ', ' + (GRSenCon - 4) + ' or ' + (GRSenCon - 5));
				
			}			
	}

//$(window).resize().resizeObject();
resizeObject();
$(window).on('resize', resizeObject);
// prepend('<input type="hidden" name="bob" value="dylan" />');

var utmData = $('div#blueskyCampaignID').attr('data-utmcampaign').valueOf();
//alert(utmData);
$('form').prepend('<input type="hidden" name="utm_campaign" value="'+utmData+'" />');
// alert(utmData);
$('input[name="utm_campaign"]').attr('value',utmData);

		var date	= new Date();
		var year	= date.getFullYear();
		var month	= date.getMonth();
		
$('#CareerSidebarAlumniEvents p').hide();
$('#CareerSidebarAlumniEvents p:contains("'+year+'")').show();
$('#CareerSidebarAlumniEvents p:contains("'+year+'")+p:contains("'+year+'")+p:contains("'+year+'")+p:contains("'+year+'")+p:contains("'+year+'")+p:contains("'+year+'")').hide();

$('#facebooklike').prepend('<img src="/images/facebook.svg" />');

$('#nurseEligibilityInfo').prepend('<div class="toggleNurseInfo" data-rel="show">Show Eligibility Information</div>');

$('.nurseInfo').hide();

function nursingBehavior ()
	{
	    	$('.nurseInfo').toggle(500);
		//alert(textData);
				var textData = $('.toggleNurseInfo').attr('data-rel').valueOf();
				if (textData == 'hide')
					{
						$('.toggleNurseInfo').attr('data-rel','show');
						$('.toggleNurseInfo').text('Show Eligibility Information');				
					};
				if (textData == 'show')
					{
						$('.toggleNurseInfo').attr('data-rel','hide');
						$('.toggleNurseInfo').text('Hide Eligibility Information');
					};
	}

$('.toggleNurseInfo').click(nursingBehavior);
$('#loadInvoice').load('/assets/php/loadInvoice.php');




// after Dark Campaign - Evening Classes
function afterDk (startMonth)
	{
		var afterDark = '<div id="afterDarkC">'+
						'<a '+
						'href="/admissions-financial-aid/admissions/adult-learners/pti-after-dark">'+
						//'<img src="/images/afterDarkIcon.png" />'+
						'After Dark'+
						'</a>'+
						'<a href="/admissions-financial-aid/admissions/adult-learners/pti-after-dark" '+
						'class="violatorTextLink">'+
						'<span class="one">available</span><br />'+
						'<span class="two">evenings</span><br />'+
						'<span class="three">in '+startMonth+'</span><br />'+
						'</a></div>';
						//Available Evenings in October
						//more about evening programs
		return afterDark;
	}
	var day = date.getDay();
if (month > 0) // from january to whenever
	{
		$('div.panel-hd.school-detail-hd h2:contains("Certificate in Welding")').append(afterDk('April'));
		$('div.panel-hd.school-detail-hd h2:contains("Welding Technology")').append(afterDk('April'));
	//	$('div.panel-hd.school-detail-hd h2:contains("IT Certification Preparation")').append(afterDk('January'));
	//	$('div.panel-hd.school-detail-hd h2:contains("Information Technology")').append(afterDk('October'));
	//	$('div.panel-hd.school-detail-hd h2:contains("Network")').append(afterDk('October'));
	//	$('div.panel-hd.school-detail-hd h2:contains("Drafting")').append(afterDk('October'));
	//	$('div.panel-hd.school-detail-hd h2:contains("Electronics Engineering Technology")').append(afterDk('October'));
	//	$('div.panel-hd.school-detail-hd h2:contains("Oil and Gas Electronics Certificate")').append(afterDk('October'));
		$('div.panel-hd.school-detail-hd h2:contains("Surgical Technology")').append(afterDk('April'));
		$('div.panel-hd.school-detail-hd h2:contains("Therapeutic Massage Practitioner")').append(afterDk('April'));
		//$('div.panel-hd.school-detail-hd h2:contains("Medical Coding")').append(afterDk('October'));
	//	$('div.panel-hd.school-detail-hd h2:contains("Medical Coding")').attr('class', 'MCOnGround');
	//	$('div.panel-hd.school-detail-hd h2:contains("Medical Coding, Online")').attr('class', 'MCOnline');
	//	$('div.panel-hd.school-detail-hd h2.MCOnGround').append(afterDk('October'));
	//	$('div.panel-hd.school-detail-hd h2:contains("Certificate in HVAC")').append(afterDk('January'));
	}
// after Dark Campaign - Evening Classes

// programming video button on homepage slider
$('#caption-1651 .caption-text').append('<a '+
		'class="sliderVidLink"  href="/about/video-resource-center/category/featured/1163">'+
		'watch video <span>&#9654;</span></a>');
// programming video button on homepage slider

$('#fundinglist').before('<div id="toggleFundingList" class="hiddenlist">show list of Grants and Scholarships</div>');
$('#fundinglist').hide();
$('a[href="#fundinglist"]').hide();
$('#toggleFundingList').click(function()
	{
		var fundAttr	= $('#toggleFundingList').attr('class').valueOf();
		$('#fundinglist').toggle(200);
		if (fundAttr == 'hiddenlist')
			{
				$('#toggleFundingList').text('hide list of Grants and Scholarships');
				$('#toggleFundingList').attr('class','shownlist');
				$('a[href="#fundinglist"]').show();
			}
		if (fundAttr == 'shownlist')
			{
				$('#toggleFundingList').text('show list of Grants and Scholarships');	
				$('#toggleFundingList').attr('class','hiddenlist');
				$('a[href="#fundinglist"]').hide();
			}
			
		
	});
	
	$('a[rel="IBCvideos"] img').attr('src','/images/icebucket-gif.gif');
	$('#freeform_high_school_graduation_year').removeAttr('disabled');
	
// $('#earlyAdmTimedContent').replaceWith('<p>The Early Admissions Deadline for 2015 graduates has passed. Early Admissions applications will be available in the spring of 2015 for the High School graduating class of 2016. If you are an Early Admissions candidate, Don\'t forget about the Housing Deadline in February! If you have any questions, please contact Kristy DeAngelis at this email address <a href="mailto:Deangelis.Kristy@pti.edu">Deangelis.Kristy@pti.edu</a>, or by phone 412 809-5170.</p>');	
	
    	var massageDate = new Date();
		var massYear = massageDate.getFullYear();
		var massMonth = massageDate.getMonth();
		var massDay = massageDate.getDay();

$('#showHideMassageDates li').each(function()
	{	if (( massMonth > Number( $(this).attr('data-dateSetting').valueOf() ))	&&
			( massMonth != 11 ))
				{
					$(this).attr('style','display:none;');
				}
	});	

$('a[href="http://www.pti.edu/admissions-financial-aid/admissions/apply-now"]').attr('href','https://www.pti.edu/admissions-financial-aid/admissions/apply-now');
// ► alt 16 ---- ▼ alt 31
$('dl.freqAskedQuestions dt').prepend('<div class="dlButton rt">►</div><div class="dlButton dn">▼</div>');
$('dl.freqAskedQuestions dd').hide();
$('dl.freqAskedQuestions dt div.dlButton.dn').hide();
$('dl.freqAskedQuestions dt').click(function()
	{
	    $(this).next('dd').toggle(200);
		$(this).children('div.dlButton').toggle();
	});

$('dl.programDefList dt+dd').prev('dt').prepend('<div class="dlButton rt" title="click to show">►</div><div class="dlButton dn" title="click to hide">▼</div>');
$('dl.programDefList dd').hide();
$('dl.programDefList dt div.dlButton.dn').hide();
$('dl.programDefList dt').click(function()
	{
	    $(this).next('dd').toggle(200);
		$(this).children('div.dlButton').toggle();
	});

// program oriented application headers
$('div.content p strong:contains("Choose a start date.")').replaceWith('<strong>Choose the school you would like to attend.</strong>');
$('div.content p strong:contains("Choose a program.")').replaceWith('<strong>Choose a program and start date.</strong>');

$('a[href^="http://www.pti.edu/about/video-resource-center/category/featured/"]:contains("Video")').attr('class', 'sliderVidLink');
$('a[href^="http://www.pti.edu/about/video-resource-center/category/featured/"]:contains("Video") span + i.ss-navigateright.right').hide();

$('li.continuing-education-courses-at-pti').attr('class','continuing-education-courses-at-pti pti-online');

function listCatalogs ()
	{
		$('div#catalogArchiveLinks').html('<p style="margin-bottom:0;"><strong>Catalog: Archives</strong>');
		var dateDate = new Date();
		var catYear = dateDate.getFullYear();
		var catYear = catYear + 1;
		var int = 1;
		do
			{
				var catYear = catYear - 1;
				$('div#catalogArchiveLinks').append('<a href="//www.pti.edu/uploads/pages/documents/catalog-' + (catYear - 1) + '-' +catYear + '/" target="_blank">Catalog ' + (catYear - 1) + '-' +catYear + '</a><br />');
				var int = int + 1;
			}
		while (int < 5)
		$('div#catalogArchiveLinks').append('</p>');
	}
	
listCatalogs();

$('h2:contains("Open House RSVP")').parent().parent().parent('form').attr('id', 'openHouseFormResponse');
$('form#openHouseFormResponse select#freeform_choose_a_pti_program').attr('disabled','disabled');
$('input[name="please_indicated_your_open_house_interest"]').click(function()
	{
    	$('form#openHouseFormResponse select#freeform_choose_a_pti_program').removeAttr('disabled');
		var interestVal = $(this).val();
		if ((interestVal == "RSVP for Healthcare and Design Open House: April 1 at 11am") ||
			(interestVal == "RSVP for Healthcare and Design Open House: April 1 at 4pm"))
			{
				$('select#freeform_choose_a_pti_program optgroup').hide();
				$('select#freeform_choose_a_pti_program optgroup[label="School of Healthcare"]').show();
				$('select#freeform_choose_a_pti_program optgroup[label="School of Design"]').show();
			}
		else
			{
				$('select#freeform_choose_a_pti_program optgroup').show();
			}
	});

$('div.VRCDescription').hide();
function widdeoDescriptions ()
	{
		if ((window.innerWidth > 767))
			{
				$('li.videoListItem').hover(function(e)
					{
						if ($(this).children('div.VRCDescription').children('p').text() != '')
							{
								$(this).children('div.VRCDescription').show(200);
							}
					},
						function(e)
							{
								$(this).children('div.VRCDescription').hide(200);
							});
			}
	}
widdeoDescriptions();
$(window).on('resize', widdeoDescriptions);
//window.onresize = widdeoDescriptions;

$('a[href="/campus-life/photo-gallery/72157652123637362"]').parent('li').empty();

$('a[href^="http://studentaid.ed.gov"]').attr('target','_blank');

function moveForm ()
	{
		if (window.innerWidth > 767)
			{
				var height = $(window).scrollTop().valueOf();
				if (height > 150)
					{
						$('#welcome-kb').attr('style','position:fixed; top: 10px; margin-right: 25px;');
						$('#welcome-kb .formPre').hide(200);
						$('#welcome-kb .formPost').show(200);
					}
				else 
					{
						$('#welcome-kb').removeAttr('style');
						$('#welcome-kb .formPre').show(200);
						$('#welcome-kb .formPost').hide(200);
					}
			}
		else
			{
				$('#welcome-kb').removeAttr('style');
				$('#welcome-kb .formPre').show(200);
				$('#welcome-kb .formPost').hide(200);
			}
	}
moveForm();
$(window).on('resize scroll', moveForm);

$('.addthis_toolbox.addthis_default_style+.feedioSub').hide();
$('.addthis_toolbox.addthis_default_style').hover(
	function ()
		{
			$('.feedioSub').show(300);
		}); 

$('.rssLink').hover(
	function ()
		{
			$('.feedioSub').show(300);
		});

$('img[src="/images/made/images/remote/https_i.ytimg.com/vi/_HkZnT3Z7WY/hqdefault_200_100_s_c1.jpg"]').attr('src','/images/made/uploads/callouts/Video%20Thumbnails/DianeFinal.Still001_243_137_s.jpg');

$('article a img[alt=""]').each(function(index, element)
	{
		$(this).attr('alt','click here');
		$(this).parent('a').append('<br />click here');
	});
$('h3:contains("Piece 1 Information")').parent('div').prepend('<br /><br /><hr /><br /><br />');
$('h3:contains("Piece 2 Information")').parent('div').prepend('<br /><br /><hr /><br /><br />');
$('h3:contains("Exhibition Information")').parent('div').prepend('<br /><br /><hr /><br /><br />');

function toggleEarlyAdm ()
	{
		var dt	= new Date();
		var mo	= dt.getMonth();
		if ((mo > 2) && (mo < 11))
		{
			$('h3:contains("EARLY ADMISSIONS AT PTI")').show();
			$('.eacontent').show();
		}
		else
		{
			$('h3:contains("EARLY ADMISSIONS AT PTI")').hide();
			$('.eacontent').hide();
		}
	}

function infoScroll ()
	{
		if (window.innerWidth < 480)
			{
				$('body.home.pti').append('<a id="toInfo" style="position:absolute;top:85px;right:25px;font-size:30px;color:#fff !important;font-style: normal;width:30px;height:30px;" href="#infoReq" class="ss-icon">info</a>');
				//$('#toInfo').draggable();
				$('a#toInfo').click(function()
					{
						$('a#toInfo').hide();
					});
			}
		else
			{
				$('a#toInfo').hide();
			}
	}
infoScroll();
$(window).on('resize scroll', infoScroll);
toggleEarlyAdm();


$('article img.content-image').each(function(index, element)
	{
		var captionText = $(this).attr('title').valueOf();
		if ((captionText != ''))
			{
				$(this).attr('style','margin-bottom:0 !important;');
				$(this).parent('p').attr('style','margin-bottom:0 !important;');
				$(this).parent('p').after('<p class="newsCaptions">'+captionText+'</p>');
			}
	});


$('input[name="billing_name"]').attr("placeholder","First-name Last-name");
});

	











