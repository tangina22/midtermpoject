 <?php 
  session_start();
 ?>
 <html>
            <body>  
             <h4><a href="courses.php">courses</a></h4>
            	<center>
            		<h2>Your Information</h2>
            	<table border="1">
                 	<TR> <td>Your id</td><td><?Php echo $_SESSION['id'] ?></td></TR>
                 	<TR> <td>Your id</td><td><?Php echo  $_SESSION['username'] ?></td></TR>
                 	<TR> <td>Your id</td><td><?Php echo $_SESSION['email']  ?></td></TR>
                 	<TR> <td>Your id</td><td><?Php echo  $_SESSION['gender'] ?></td></TR>
                 	<TR> <td>Your id</td><td><?Php echo$_SESSION['mobileno'] ?></td></TR>
                 	<TR> <td>Your id</td><td><?Php echo $_SESSION['address'] ?></td></TR>
                 	<TR> <td>Your id</td><td><?Php echo $_SESSION['applied']  ?></td></TR>
                 </table>
                 </center>
                 

            </body>


</html>