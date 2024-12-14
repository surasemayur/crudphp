<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC"); // using mysqli_query instead

        session_start();
       
        if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
                header('login.php');
                exit();
        }else{

        }
        include('conn.php');
        $query=mysqli_query($conn,"select * from user where userid='".$_SESSION['id']."'");
        $row=mysqli_fetch_assoc($query);
?>
<html>
<head>	
	<title>Homepage</title>
	<!-- ===== CSS ===== -->
    <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- ===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
	<nav>
        <div class="nav-bar">
            <i class='bx bx-menu sidebarOpen' ></i>
            <span class="logo navLogo"><a href="#">My Demo WebSite</a></span>
            <div class="menu">
                <div class="logo-toggle">
                    <span class="logo"><a href="#">My Demo WebSite</a></span>
                    <i class='bx bx-x siderbarClose'></i>
                </div>
                <ul class="nav-links">
                   <li><a href="index.php">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Portfolio</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="logout.php">LogOut</a></li>
                </ul>
            </div>
            <div class="darkLight-searchBox">
                <div class="dark-light">
                    <i class='bx bx-moon moon'></i>
                    <i class='bx bx-sun sun'></i>
                </div>
                <div class="searchBox">
                   <div class="searchToggle">
                    <i class='bx bx-x cancel'></i>
                    <i class='bx bx-search search'></i>
                   </div>
                    <div class="search-field">
                        <input type="text" placeholder="Search...">
                        <i class='bx bx-search'></i>
                    </div>
                </div>
            </div>
        </div>
    </nav><br/><br/><br/><br/><br/><br/>
    <div >
		<h2>Login Success</h2>
        <?php echo $row['fullname']; ?>
       
	</div> 
    <a href="add.html">Add New Data</a><br/><br/>

	<table class="table table-bordered table-hover table-striped table-responsive datatable" width='80%' border=0>
    <thead class="thead-dark">
	<tr bgcolor='#CCCCCC'>
		<th scope="col">Name</th>
		<th scope="col">Age</th>
		<th scope="col">Email</th>
		<th scope="col">Update</th>
	</tr>
	</thead>
	<body>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['name']."</td>";
		echo "<td>".$res['age']."</td>";
		echo "<td>".$res['email']."</td>";	
		echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?></body>
	</table>
</body>
</html>
