$(document).ready(function(e)
{
	var d = new Date();
	$.each([	"January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
	function (k,v)
	{
		$('p[data-rel="'+k+'"]').each(function()
			{
				if ($(this).attr('data-year').valueOf(Number) < d.getFullYear(Number))
					{
						$('p[data-rel="'+k+'"]').hide();
					}
				else // >= currentYear
					{
						if ($(this).attr('data-rel').valueOf(Number) < d.getMonth())
						{
							$('p[data-rel="'+k+'"]').hide();
						}
						else // >= currentMonth
						{
							$('p[data-rel="'+k+'"]').show();
						}
					}				
			});
	});
});