<?php
session_start();
if (!isset($_SESSION['loggedin']))
{
    header("Location: login.php");
    die();
}
echo 'Welcome, ' . $_SESSION["username"];

$user = $_SESSION["username"];
$query = "SELECT * FROM logins
        WHERE username='$user'";
$con = mysqli_connect('localhost', 'id13743142_csi2403', 'tq-4wiZWd/K@I!D{','id13743142_login_passwords');
$result=mysqli_query($con, $query);
?>
<html>
<head>
	<title>Transfer</title>
		<link rel="stylesheet" href="../css/style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> 
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
</head>
<body>
	
	<!----NavigationBar---->
		<section id="nav-bar">
		  <nav class="navbar navbar-expand-lg navbar-light">
	<a class="navbar-brand" href="#"><img src="../img/bank.jpg" width="75" height="75"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav ml-auto">
		<li class="nav-item">
			<a class="nav-link" href="/index.html">HOME</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#">SERVICES</a>
			<div class="sub-menu-1">
				<ul>
				<li><a class="nav-link" href="account.php">Manage Accounts</a></li>
				<li><a class="nav-link" href="loan.html">Personal Loans</a></li>
				<li><a class="nav-link" href="tracking.html">Spendings & Expense Tracking</a></li>
				
				
		</li>
				</ul>
				</div>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="contact.html">CONTACT US</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="aboutus.html">ABOUT US</a>
		</li>
		<li class ="nav-item">
		    <a class="nav-link" href="logout.php">LOG OUT</a>
		</ul>
	</div>
	</nav>
	<table>
		    <tr>
		        <th width = 25%> <h1>Checking Account</h1></th>
		        <th width = 25%> <h1>Savings Account</h1></th>
		        <th width = 25%> <h1>Reserve Account</h1></th>
		    </tr>
		    
		<?php
		    while($rows=mysqli_fetch_assoc($result))
		    {
		?>
		    <tr>
		        <td><?php echo '$'.number_format($rows['spendaccount'],2); ?></td>
		        <td><?php echo '$'.number_format($rows['growthaccount'],2); ?></td>
		        <td><?php echo '$'.number_format($rows['reserveaccount'],2); ?></td>
		    </tr>
		<?php
		    }
		?>
	</table>
	<br>
	<br>
	
	<form method="post" action="insertdb.php">
	    <label for="account">Choose a Account to send to:</label>
	    <select id="account" name="account"> 
	        <option value="spendaccount">Checking Account</option>
	        <option value="growthaccount">Savings Account</option>
	        <option value="reserveaccount">Reserve Account</option>
	    </select><br>
	    <label for="account2">Choose a Account to withdraw from:</label>
	    <select id="account2" name="account2"> 
	        <option value="spendaccount">Checking Account</option>
	        <option value="growthaccount">Savings Account</option>
	        <option value="reserveaccount">Reserve Account</option>
	    </select>
	    <input type="number" placeholder="0.00" name="amount" min="0" value="0" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$"">
	    <input type="submit" value="Submit" min =".01" step=".01"> </form>
	    
	    
	    
	    
	    
	    
	</form>
</body>