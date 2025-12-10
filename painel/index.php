<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="style/style_calendar.css">
	</head>
	<body>
		<div class="calendar-container">
			<div class="calendar" style="margin-top:64px;">
				<?php
					$events = json_decode(file_get_contents('events.json'), true);
					$currentMonth = date('n');
					$currentYear = date('Y');
					$daysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);
					$firstDayOfMonth = date('N', strtotime("$currentYear-$currentMonth-01"));
					
					for ($i = 1; $i < $firstDayOfMonth; $i++) {
						echo '<div class="day_bg_empty"></div>';
					}
					
					for ($i = 1; $i <= $daysInMonth; $i++) 
					{
						$date = "$currentYear-$currentMonth-" . str_pad($i, 2, '0', STR_PAD_LEFT);
						$class = ($i == date('d')) ? 'day_bg current_day' : 'day_bg';
						$eventsForDay = isset($events[$date]) ? $events[$date] : [];
						
						$tooltipContent = "";
						$eventsImages = [];
						foreach ($eventsForDay as $index => $event) {
							$tooltipContent .= "{$event['name']}<br>{$event['start']} - {$event['end']}<br><br>";
							$eventsImages[] = '<img class="event-icon" src="style/icons/'.$event['type'].'.png" alt="Event Image '.$index.'">';
						}
						
						if (!empty($eventsForDay)) {
							$current_datem = "{$i} ". date('F');
							echo '
								<div class="hover-text" onmousemove="showTooltip(event, \'' . addslashes($tooltipContent) . '\', \''.$current_datem.'\')" onmouseout="hideTooltip()">
									<div class="'.$class.'">
										<span class="daytext">'.$i.'</span>
										<div class="slider">
											' . implode('', $eventsImages) . '
										</div>
									</div>
								</div>';
						} else {
							echo '
								<div class="hover-text">
									<div class="'.$class.'">
										<span class="daytext">'.$i.'</span>
									</div>
								</div>';
						}
					}
					
					?>
				<span class="tooltip" style="display:none;position:absolute;">
					<div style="width:145px;height:155px;">
						<div style="position:absolute;left:0px;top:0px;width:10px;height:10px;line-height:7px;"><img alt="UL nativelook.png" src="style/ui/UL_nativelook.png" width="10" height="10" data-file-width="10" data-file-height="10"></div>
						<div style="position:absolute;right:0px;top:0px;width:10px;height:10px;line-height:7px;"><img alt="UR nativelook.png" src="style/ui/UR_nativelook.png" width="10" height="10" data-file-width="10" data-file-height="10"></div>
						<div style="position:absolute;left:0px;bottom:0px;width:10px;height:10px;line-height:7px;"><img alt="DL nativelook.png" src="style/ui/DL_nativelook.png" width="10" height="10" data-file-width="10" data-file-height="10"></div>
						<div style="position:absolute;right:0px;bottom:0px;width:10px;height:10px;line-height:7px;"><img alt="DR nativelook.png" src="style/ui/DR_nativelook.png" width="10" height="10" data-file-width="10" data-file-height="10"></div>
						<div style="position:absolute;left:10px;top:0px;width:125px;height:100%">
							<div style="position:absolute;top:0px;height:1px;background-color:#524e4b;width:100%"></div>
							<div style="position:absolute;top:1px;height:1px;background-color:black;width:100%"></div>
							<div style="position:absolute;top:2px;height:4px;background-color:black;opacity:0.5;width:100%;"></div>
							<div style="position:absolute;bottom:0px;height:1px;background-color:#524e4b;width:100%"></div>
							<div style="position:absolute;bottom:1px;height:1px;background-color:black;width:100%"></div>
							<div style="position:absolute;bottom:2px;height:4px;background-color:black;opacity:0.5;width:100%;;"></div>
						</div>
						<div style="position:absolute;left:0px;top:10px;width:100%;height:135px">
							<div style="position:absolute;left:0px;height:100%;width:1px;background-color:#524e4b"></div>
							<div style="position:absolute;left:1px;height:100%;width:1px;background-color:black"></div>
							<div style="position:absolute;left:2px;height:100%;width:4px;background-color:black;opacity:0.5;"></div>
							<div style="position:absolute;right:0px;height:100%;width:1px;background-color:#524e4b"></div>
							<div style="position:absolute;right:1px;height:100%;width:1px;background-color:black"></div>
							<div style="position:absolute;right:2px;height:100%;width:4px;background-color:black;opacity:0.5;;"></div>
						</div>
						<div style="position:absolute;left:6px;top:6px;width:133px;height:143px">
							<div style="position:absolute;background-color:black;opacity:0.5;width:100%;height:100%;"></div>
							<div style="position:absolute;left:0px;top:0px;width:100%;height:100%;text-align:center;font-size:9px;text-shadow:-1px -1px 0.1px black, -1px 1px 0.1px black, 1px 1px 0.1px black, 1px -1px 0.1px black, -1px 0px 0.1px black, 1px 0px 0.1px black, 0px 1px 0.1px black, 0px -1px 0.1px black">
								<div style="color:#ffc700;font-weight:bold;" id="content_dm"> '.$i.'</div>
								<br>
								<div style="color:#c1c1c1;font-weight:bold;" id="content_event"></div>
								<div style="color:#c1c1c1;font-weight:bold;" id="content_type"></div>
							</div>
						</div>
					</div>
				</span>
			</div>
		</div>
	</body>
</html>
<script>
	function showTooltip(event, content, datem) {
	    const tooltip = document.querySelector('.tooltip');
	    tooltip.style.display = 'block';
	    tooltip.style.left = (event.pageX + 10) + 'px';
	    tooltip.style.top = (event.pageY + 10) + 'px';
		
		const content_event = document.querySelector('#content_event');
		content_event.innerHTML = content || '<div>No events</div>';
		
		const datetimes = document.querySelector('#content_dm');
		datetimes.innerHTML = datem;
	}
	
	function hideTooltip() {
	    document.querySelector('.tooltip').style.display = 'none';
	}
	
	function initEventSliders() {
	    const sliders = document.querySelectorAll('.slider');
	    sliders.forEach(slider => {
	        const images = slider.querySelectorAll('.event-icon');
	        if (images.length > 1) {
	            let currentIndex = 0;
	            images[currentIndex].classList.add('active');
	
	            setInterval(() => {
	                images[currentIndex].classList.remove('active');
	                currentIndex = (currentIndex + 1) % images.length;
	                images[currentIndex].classList.add('active');
	            }, 2000);
	        } else if (images.length === 1) {
	            images[0].classList.add('active');
	        }
	    });
	}
	
	document.addEventListener('DOMContentLoaded', initEventSliders);
</script>