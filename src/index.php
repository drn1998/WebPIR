<!DOCTYPE html>
<html>
    <head>
        <title>WebPIR</title>
        <link rel="stylesheet" href="style/form.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    </head>
    <body class="article">
        <h1>WebPIR: Main request form</h1>
        <form method="post" action="request.php">
            <label for="script">Script of the request:</label><br/>
			<textarea name="script" spellcheck="false"></textarea><br/>
      <label for="format">API</label>
        <select name="api">
        <option value="wikidata">Wikidata/SPARQL</option>
        <option value="openstreetmap">OpenStreetMap/OQL</option>
        <option value="genericurl">Generic/URL</option>
        <option value="csvdata">Generic/CSV</option>
        </select><br/>
			<label for="format">Output format</label>
		  	<select name="format" id="format" onchange="checkSSML()">
				<option value="htmltable">HTML Table</option>
        <option value="htmlstring">HTML String</option>
        <option value="ssmlstring">SSML String</option>
		  	</select><br/>
      <fieldset>
        <input type="radio" name="display" value="mq" checked="checked" onchange="controlScrollspeedField()">
        <label for="mq"> Marquee</label>
        <input type="radio" name="display" value="st" onchange="controlScrollspeedField()">
        <label for="sts"> Static</label>
      </fieldset>
      <label for="speed">Speed of scrolling: </label>
			<input type="text" name="speed" id="speed" value="5">
			<br/>
			<label for="pir">1st column satisfies PIR code: </label>
			<input type="text" name="pir" minlength="1" maxlength="5">
			<br/>
			<button type="submit" name="load" id="viewbutton" value="view">View</button>
      <button type="submit" name="load" id="downloadbutton" value="download">Download</button>
        </form>
        <script>
          var speed_field;
          var selection;

          function controlScrollspeedField() {
            speed_field = document.getElementById("speed");
            selection = document.querySelector('input[name="display"]:checked').value;

            if(selection == "mq") {
              speed_field.removeAttribute("disabled");
            }
            if(selection == "st") {
              speed_field.setAttribute("disabled", true);
            }

            return;
          }

          function checkSSML() {
            format_field = document.getElementById("format");
            viewbtn = document.getElementById("viewbutton");

            if(format_field.value == "ssmlstring") {
              viewbtn.setAttribute("disabled", true);
            } else {
              viewbtn.removeAttribute("disabled");
            }

            return;
          }
        </script>
    </body>
</html>
