	var curCampus = '';

	$(document).ready(function() { 
		$('#freeform_high_school_graduation_year').attr('disabled', true);
	    
	    $("input[name='campus']").change(function() {
//	    $('#freeform_high_school_graduation_year').change(function() {
	    	//get location value and set hidden field
	    	curLocation = $(this).attr('title');
			curApptDate = $(this).attr('rel-date').valueOf();
			$('#location').val(curLocation);
			
		// only enable in cases where freeform_high_school_graduation_year is not being used at all
		$('#schedulegrid').html('');
		$('#schedulegrid').show();
//		loadScheduleGridAll();
		loadScheduleGrid();

	    	// enable year list and reset grid
	    	$('#freeform_high_school_graduation_year').removeAttr('disabled');
	    	$('#freeform_high_school_graduation_year option:first').attr('selected', 'selected');
	    	//$('#schedulegrid').html('');
	    	//$('#schedulegrid').hide();
	    });

	  
	  	
		$('#freeform_high_school_graduation_year').change(function () {
		    $('#schedulegrid').show();
		    loadScheduleGrid();
		});
		


	});
	
	// only when no Grad Year used
	function loadScheduleGridAll()
	{
		curCampus = $('input[name=campus]:checked').val();
		var curdate = new Date();
		$('#schedulegrid').load('/assets/php/schedulegrid.php?campus=' + curCampus + 
		'&type=HS&year=1&form=remote&apptdate=' + curApptDate);
	}

	function loadScheduleGrid()
	{
		curCampus = $('input[name=campus]:checked').val();
		
		var curdate = new Date();
		if ($('#freeform_high_school_graduation_year').val() == "") {
			$('#schedulegrid').load('/assets/php/schedulegrid.php?&form=remote&apptdate=' + curApptDate);
		} 

		else if ((curdate.getMonth() > 5) && ($('#freeform_high_school_graduation_year').val() >= curdate.getFullYear() - 1)) {
			$('#schedulegrid').load('/assets/php/schedulegrid.php?campus=' + curCampus + '&type=HS&year=1&form=remote&apptdate=' + curApptDate);
		} 
		else if ((curdate.getMonth() >= 5) && ($('#freeform_high_school_graduation_year').val() == curdate.getFullYear() + 1)) {
			
			$('#schedulegrid').load('/assets/php/schedulegrid.php?campus=' + curCampus + '&type=HS&year=1&form=remote&apptdate=' + curApptDate);
		}
		else if ((curdate.getMonth() <= 5) && ($('#freeform_high_school_graduation_year').val() == curdate.getFullYear())) {
			
			$('#schedulegrid').load('/assets/php/schedulegrid.php?campus=' + curCampus + '&type=HS&year=1&form=remote&apptdate=' + curApptDate);
		}

		else if ((curdate.getMonth() <= 5) && ($('#freeform_high_school_graduation_year').val() > curdate.getFullYear())) {
			
			$('#schedulegrid').load('/assets/php/schedulegrid.php?campus=' + curCampus + '&type=AD&year=1&form=remote&apptdate=' + curApptDate);
		}
		
		else {
//			$('#schedulegrid').load('/assets/php/schedulegrid.php?campus=' + curCampus + '&type=AD&year=1&form=remote');
			$('#schedulegrid').load('/assets/php/schedulegrid.php?campus=' + curCampus + '&type=AD&year=1&form=remote&apptdate=' + curApptDate);
		}
		//alert(curdate.getMonth());
	}
