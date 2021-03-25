

<!--

// to get na infromation of whitch data has been edited..
-->





<html>
<head>
	<title>CRUD: CReate, Update, Delete PHP MySQL</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">

</head>
<body>

    
    

    
	<form method="post" action="service/customerService.php" >
        
        
        <input type="hidden" name="cid" >
        
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="cname" >
		</div>
		<div class="input-group">
			<label>Address</label>
			<input type="text" name="caddress" >
		</div>
        <div class="input-group">
			<label>Password</label>
			<input type="password" name="cpassword" ">
		</div>
        <div class="input-group">
			<label>Email</label>
			<input type="text" name="cemail" >
		</div>
        <div class="input-group">
			<label>Mobile</label>
			<input type="text" name="cmobile" >
		</div>
        <div class="input-group">
			<label>date of birth</label>
			<input type="date" name="cdob" >
		</div>
		<div class="input-group">
            
			
                <button class="btn" type="submit" name="save" >Save</button>
            
            
		</div>
	</form>
    
</body>
</html>