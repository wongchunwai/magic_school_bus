$(document).ready(function()
{
	//bus stop search result
	$('#search_location').keyup(function()
	{
		$.get("/busStop/" + $("#search_location").val(), function(data)
		{
			$(".result ul").empty();
			$("#bus_stop_result").css('display', 'block');
			$("#bus_detail_result").css('display', 'none');
			
			$.each(data, function(index, item)
			{
				var id = item.id;
				var name = item.name;
				var distance_in_meter = item.distance_in_meter + "m";
				var result = '<li id="' + id + '"><div>' + id + " - " + name + "</strong><BR><span>" + distance_in_meter + '</span></div></li>';
				$("#bus_stop_result ul").append(result);
			})
		});
	});
	
	//bus details at each bus stop
	$("body").on("click", "#bus_stop_result li", function()
	{
		var bus_stop_id = $(this).attr("id");
		$("#bus_detail_result ul").empty();
		$("#bus_detail_result ul").prepend('<li class="bus_stop_no">« Bus Stop: ' + bus_stop_id + '</li>');
		
		$.get("/busDetail/" + bus_stop_id, function(data)
		{
			if (data != "")
			{
				$.each(data, function(index, item)
				{
					var bus_stops_id = item.bus_stops_id;
					var number = item.number;
					var eta = item.eta;
					var result = '<li id="' + bus_stops_id + '"><div><strong>' + number + "</strong><BR><span>Arriving in <span>" + eta + ' mins</span></span></div></li>';
					$("#bus_detail_result ul").append(result);
				})
			}
			else $("#bus_detail_result ul").append('<li><span>No information available</span></li>');
		});
		$(".result").slideToggle();
	});
	
	//bus top label toggel
	$("body").on("click", ".bus_stop_no", function()
	{
		$(".result").slideToggle("linear");
	});
	
});