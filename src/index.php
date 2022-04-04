<html>
    <head>
        <title>WebPIR</title>
        <link rel="stylesheet" href="style/form.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    </head>
    <body class="article">
        <h1>WebPIR: Main request form</h1>
        <form method="post" action="request.php">
            <label for="sparql">SPARQL code of the request:</label><br/>
			<textarea name="sparql"></textarea><br/>
			<label for="format">Output format</label>
		  	<select name="format">
				<option value="htmltable">HTML Table</option>
        <option value="htmlstring">HTML String</option>
		  	</select><br/>
      <fieldset>
        <input type="radio" id="mq" name="display" value="mq" checked="checked">
        <label for="mq"> Marquee</label>
        <input type="radio" id="st" name="display" value="st">
        <label for="vi"> Static</label>
      </fieldset>
      <label for="speed">Speed of table: </label>
			<input type="text" name="speed" value="5">
			<br/>
			<label for="pir">1st column satisfies PIR code: </label>
			<input type="text" name="pir" minlength="1" maxlength="5">
			<br/>
			<button type="submit" name="load" value="view">View</button>
      <button type="submit" name="load" value="download">Download</button>
        </form>
    </body>
</html>
