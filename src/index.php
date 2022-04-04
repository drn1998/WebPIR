<html>
    <head>
        <title>WebPIR</title>
    </head>
    <body>
        <h1>WebPIR: Main request form</h1>
        <form method="post" action="request.php">
            <label for="sparql">SPARQL code of the request:</label><br/>
			<textarea name="sparql" rows="20" cols="70"></textarea><br/>
			<label for="format">Output format</label>
		  	<select name="format">
				<option value="htmltable">HTML Table</option>
        <option value="htmlstring">HTML String</option>
		  	</select><br/>
			<label for="speed">Speed of table: </label>
      <fieldset>
        <input type="radio" id="mq" name="display" value="mq">
        <label for="mq"> Marquee</label>
        <input type="radio" id="st" name="display" value="st">
        <label for="vi"> Static</label>
      </fieldset>
			<input type="text" name="speed" value="5">
			<br/>
			<label for="pir">1st column satisfies PIR code: </label>
			<input type="text" name="pir" minlength="1" maxlength="5">
			<br/>
			<button type="submit" value="view">View</button>
      <button type="submit" value="view">Download</button>
        </form>
    </body>
</html>
