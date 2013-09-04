


function yearDayOption(){
	var date = new Date();
	var year = parseInt(date.getFullYear());
	$("select[name=year]").change(function() {
		year = $('select[name=year] option:selected').val();
	});
	return year;
}

function monthDayOption(){
	$("select[name=month]").change(function() {
		var month = $('select[name=month] option:selected').val();
		$("select [name='added_day']").remove();
		if(month==2){
			var date = new Date();
			var year = yearDayOption();
			if( (year%4 == 0 && year%100!=0) ||(year%400==0)){
				$('select[name=day]').append("<option name=\"added_day\" value=\"29\">29</option>");
			}
			
		}else if(month==4 || month==6 || month==9 || month==11){
			$('select[name=day]').append("<option name=\"added_day\" value=\"29\">29</option>");
			$('select[name=day]').append("<option name=\"added_day\" value=\"30\">30</option>");
		}else{
			$('select[name=day]').append("<option name=\"added_day\" value=\"29\">29</option>");
			$('select[name=day]').append("<option name=\"added_day\" value=\"30\">30</option>");
			$('select[name=day]').append("<option name=\"added_day\" value=\"31\">31</option>");
		}
	});
}