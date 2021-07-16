<?php include "db_conn.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>View</title>
	<style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-wrap: wrap;
			min-height: 100vh; 
		}
		.alb {
			width: 200px;
			height: 200px;
			padding: 5px;
		}
		.alb img {
			width: 100%;
			height: 100%;
		}
		a {
			text-decoration: none;
			color: black;
		}
	</style>
</head>
<body>
     <a href="index.php">&#8592;</a>
     <?php 
          $sql = "SELECT * FROM images ORDER BY id DESC";
          $res = $conn->query($sql);

          if ($res->num_rows > 0) {
          	while ($images = $res->fetch_assoc()) {  ?>
             
             <div class="alb">
             	<img src="uploads/<?php echo $images['image_url']?>">
             </div>
          		
    <?php } }?>
</body>
</html>