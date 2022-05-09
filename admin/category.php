<?php
  session_start();
  if (isset($_SESSION['uname'])&&$_SESSION['uname']!=""){
  }
  else
  {
    header("Location:index.php");
  }
$uname=$_SESSION['uname'];

?>
<html>
<head>
	<title></title>

	<!--Custom CSS-->
	<link rel="stylesheet" type="text/css" href="../css/global.css">
	<!--Bootstrap CSS-->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!--Script-->
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>
<body>
	<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="home.php"></a>
            </div>
            <div class="navbar-header">
                <a class="navbar-brand" href="home.php">Admin Dashboard</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            	
                <ul class="nav navbar-nav navbar-left">
                   <!-- <li><a href="home.php"> Dashboard</a></li> -->
                    <!-- <li><a href="post.php"> Topics</a></li> -->
                    <li><a href="user.php"> Users</a></li>
                    <li class="active"><a href="category.php">Category</a></li>


                </ul>
              <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" ><span class="glyphicon glyphicon-user"></span> <?php echo $uname;?></a></li>
                <li ><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
               
                </ul>

                
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <div class="container" style="margin:8% auto;width:900px;">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Category</h3>
                </div> 
                 <div class="panel-body">
                     <a href="add-category.php" class="pull-right btn btn-success">Add New</a><br><br>
            <table class="table table-stripped">
                                <th>Category Name</th>
                                 <th>Category Description</th>
                                <th>Actions</th>
                            <?php
                            
                            include "../functions/db.php";

                            $sql = "SELECT * from categories";
                            $run = mysqli_query($con,$sql);

                            while($row=mysqli_fetch_assoc($run))
                            {
                                $id = $row['category_id'];
                                $cat = $row['category_name'];
                                $desc = $row['category_description'];
                                echo "<tr>";
                                echo "<td>{$cat}</td>" ; 
                                echo "<td>{$desc}</td>" ;
                                // extract($row);
                                // echo "<tr>";
                                // echo "<td>".$cat."</td>";
                                // echo "<td>".$desc."</td>";
                                echo '<td><a href="edit-category.php?cat_id='.$id.'"><button class="btn btn-default">Edit</button> <a href="delete-category.php?cat_id='.$id.'"><button class="btn btn-danger">Delete</button></a></td>';
                                echo "</tr>";
                            }
                           // $query = "select * from corner";
    // $sel_corner = mysqli_query($connection, $query);

    //       while($row = mysqli_fetch_assoc($sel_corner)) {
    //         $ctv_id = $row['ctv_id'];
    //         $ctv_name = $row['ctv_name'];
    //         echo "<tr>";
    //         echo "<td>{$ctv_id}</td>" ; 
    //         echo "<td>{$ctv_name}</td>" ; 
    //         echo "<td><a href='categories.php?delete_c={$ctv_id}'>Delete</a></td>" ; 
    //         echo "<td><a href='categories.php?edit_c={$ctv_id}'>Edit</a></td>" ; 
    //         echo "</tr>";

    //      }

                            ?>
                            </table>
                     </div>
                </div>

            </div>
            <script type="text/javascript">

           

            </script>
	</body>
</html>