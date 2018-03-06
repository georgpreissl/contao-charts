				var options = {
					title: '',
					subtitle: '',
					curveType: 'none',

					fontSize: 11,
					colors:['#<?= $chart->line_color; ?>'],
					legend: 'left',
					backgroundColor: {
						stroke: '#<?= $chart->bg_stroke; ?>',
						strokeWidth: <?= $chart->strokeWidth; ?>,
						fill: '#<?= $chart->bg_color; ?>'
					},
					focusTarget: 'category',
					reverseCategories: 'false',
					width: <?= $chart->width; ?>, 
					height: <?= $chart->height; ?>,
					chartArea: {
						left:'20%',
						top:'10%',
						width:'85%',
						height:'75%'
					},
					axisTitlesPosition: 'none',
					hAxis:{
						title: '<?= $chart->name_x; ?>',
						slantedTextAngle: 30,
						textStyle: {
							color: '#<?= $chart->textcolor; ?>'
						}, 
						titleTextStyle: {
							color: '#<?= $chart->textcolor; ?>'
						}
					},
					vAxis:{
						title: '<?= $chart->name_y; ?>', 
						textStyle: {
							color: '#<?= $chart->textcolor; ?>'
						}, 
						titleTextStyle: {
							color: '#<?= $chart->textcolor; ?>'
						}
					},
					tooltipTextStyle: {
						color: '#<?= $chart->textcolor; ?>'
					}
				}