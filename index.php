<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>jstree basic demos</title>
	<style>
	html { margin:0; padding:0; font-size:62.5%; }
	body { max-width:800px; min-width:300px; margin:0 auto; padding:20px 10px; font-size:14px; font-size:1.4em; }
	h1 { font-size:1.8em; }
	.demo { overflow:auto; border:1px solid silver; min-height:100px; }
	</style>
	<link rel="stylesheet" href="./themes/default/style.min.css" />
</head>
<body>
	<script src="./jquery.min.js"></script>
	<script src="./jstree.min.js"></script>
	<h1>Json &amp; Event jstree demo</h1>
	<div id="using_json_3" class="demo"></div>
	<div id="event_result"></div>
	
	<script>
	$(function () {
		$('#using_json_3')
		.on('changed.jstree', function (e, data) {
			var i, j, r = [];
			for(i = 0, j = data.selected.length; i < j; i++) {
			  r.push(data.instance.get_node(data.selected[i]).data);
			}
			$('#event_result').html('Selected: ' + r.join(', '));
		  })
		.jstree({
			'core' : {
				'data' : {
					'url' : function (node) {
					  return node.id === '#' ? './ajax_roots.json' : './ajax_children.json';
					},
					'data' : function (node) {
					  return { 'id' : node.id };
					}
				}
			}
		});
	});
	</script>
</body>
</html>
