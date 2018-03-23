<!DOCTYPE html>
<html>
<head>
	<title></title>
	    <!-- jQuery -->
    <script src="../../vendors/jquery/dist/jquery.min.js"></script>
</head>
<body>


<p id="value"></p>

<script type="text/javascript">
	$.ajax({
		url: "http://192.168.4.1/",
		dataType: 'text',
		jsonpCallback: "localJsonpCallback",
		success: function(data){
			
			result = JSON.parse(data);

			console.log(result.value);
		},
		error: function(jqhr, error){
			alert(error);
		}
	});

	// function localJsonpCallback(json) {
 //    	console.log(json);
	// }

	//$("#value").load("http://192.168.4.1/");

	const url = "http://192.168.4.1"; // site that doesn’t send Access-Control-*
	fetch(url) // https://cors-anywhere.herokuapp.com/https://example.com
	.then(response => response.text())
	.then(contents => console.log(contents))
	.catch(console.log("Can’t access " + url + " response. Blocked by browser?"))

</script>
</body>
</html>