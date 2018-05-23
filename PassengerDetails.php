<?php
session_start();
 $con=mysqli_connect('127.0.0.1','root');
 mysqli_select_db($con,'syj');

 $username=$_SESSION['username'];
 $size=sizeof($_POST);
	$j=1;
	for($i=1; $i<=$size; $i++,$j++) { 
		$index=$username;
		if(isset($_POST[$index]))
			$prid[$i]=$_POST[$index];
		else
			$i--;
	}
	
	
 $q1="select username from passenger where prid='$prid[1]'";
 $result1=mysqli_query($con,$q1);
 $row1=mysqli_fetch_array($result1);
 $pusername=$row1[0];
 $_SESSION['pusername']=$pusername;

 $q="select * from registration where `username`='$pusername'";
 $result=mysqli_query($con,$q);
 $row_count=mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>ShareYourJourney</title>
			<link href="https://fonts.googleapis.com/css?family=Nova+Square" rel="stylesheet">
    	<link rel="stylesheet" type="text/css" href="css/style.css">
    	<link rel="stylesheet" type="text/css" href="css/table.css">
	</head>
	<body>
		<div class="container">
			<header>
				<div class="login_img">
					<img src=images/<?php echo $_SESSION['username'];?>.jpeg alt=<?php echo $_SESSION['username'];?> height=50 width=50 border=5/><br>
					<?php echo "Welcome<br>".$_SESSION['username'];?>
				</div>
				<nav>
					<ul>
						<li><a href="LoginHome.php">LoginHome</a></li>
						<li><a href="dhistory.php">History</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</nav>
				<a href="index.html"><img src="images/logo.jpg" height=100 width=100 border=5/></a>
			</header>
			<section id="main" class="boxed">
				<div id="section">
					<form method="post" action="AcceptReject.php">
					  <table id="questiontable">
						<?php
							for($i=0;$i<$row_count;$i++)
							{
							  $row=mysqli_fetch_array($result);
						?>
						 <tr class="odd" >
						 	<th>Name</th>
							<td><?php echo $row['Name']; ?></td>
						</tr>
						<tr>
						 	<th>Father`s Name</th>
							<td><?php echo $row['FatherName']; ?></td>
						</tr>
						<tr class="odd">
						 	<th>Gender</th>
							<td><?php echo $row['Gender']; ?></td>
						</tr>
						<tr>
						 	<th>DOB</th>
							<td><?php echo $row['dob']; ?></td>
						</tr>
						<tr class="odd">
						 	<th>Mobile No.</th>
							<td><?php echo $row['mobileNo']; ?></td>
						</tr>
						<tr>
						 	<th>Email</th>
							<td><?php echo $row['email']; ?></td>
						</tr>
						<?php } ?>
					 </table>
					 <input type="radio" value="<?php echo $prid[1]; ?>" name="<?php echo $username?>" required/>
					<input type="submit" name="Accept" value="Accept" id="matchRoot">
					<input type="submit" name="Reject" value="Reject" id="matchRoot" />
					</form>
				</div>
			</section>
			<footer>
				copyright &copy; 2018 All Rights Reserverd email : shareyourjourney03@gmail.com
			</footer>
		</div>
	</body>
</html>