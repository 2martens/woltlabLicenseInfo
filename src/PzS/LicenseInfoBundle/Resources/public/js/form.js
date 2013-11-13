$(function(){
	$('#wbb31Neu').hide();
	$('#updateZugang31').hide();
	$('#updateZugang30').hide();
	
	$('input[type="reset"]').click(function() {
		$('#wbb31Neu').hide();
		$('#updateZugang31').hide();
		$('#updateZugang30').hide();
	});

	$('#kundeJaNein').change(function(event) {
		var value = $(event.target).val();
		if (value == 0) {
			$('#wbb31Neu').hide();
			$('#updateZugang31').hide();
			$('#updateZugang30').hide();
		} 
		else {
			$('#wbb31Neu').show()
			var valueWbb31 = $('#wbb31NeuJaNein').val();
			if (valueWbb31 == 1) $('#updateZugang31').show();
			else $('#updateZugang30').show();
		}
	});

	$('#wbb31NeuJaNein').change(function(event) {
		var value = $(event.target).val();
		if (value == 1) {
			$('#updateZugang31').show();
			$('#updateZugang30').hide();
		}
		else {
			$('#updateZugang31').hide();
			$('#updateZugang30').show();
		}
	});
});