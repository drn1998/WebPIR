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
				<option value="html">Scrolling HTML table</option>
				<option value="htmldownload">Scrolling HTML table (Download)</option>
				<option value="txt">Formatted text file (not implemented)</option>
				<option value="pdf">A4 PDF file (not implemented)</option>
                <option value="wav">Text-to-speech WAV file (not implemented)</option>
		  	</select><br/>
			<label for="speed">Speed of table: </label>
			<input type="text" name="speed" value="5">
			<br/>
			<label for="pir">1st column satisfies PIR code: </label>
			<input type="text" name="pir" minlength="1" maxlength="5">
			<br/>
			<button type="submit">Send request</button>
        </form>
    </body>
</html>
