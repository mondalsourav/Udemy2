<?php
if($_POST['q'] == 'Search for courses'){
	header('Location: index.php');
}
if($_POST['q'] !==''){
$con = mysqli_connect('localhost','root','','udemy');

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>

<html>
<head>
	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Udemy Online Courses - Learn Anything On Your Schedule</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="stylesheets/base.css">
	<link rel="stylesheet" href="stylesheets/skeleton.css">
	<link rel="stylesheet" href="stylesheets/layout1.css">
    <link rel="stylesheet" href="stylesheets/flexslider.css">
    <link rel="stylesheet" href="stylesheets/prettyPhoto.css">
    
    <!-- CSS
  ================================================== -->
 	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script src="js/jquery.flexslider-min.js"></script>
    <script src="js/scripts.js"></script>

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/logo-link.jpg">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
</head>
<body>
<header id="header" class="site-header" role="banner">
    <div id="header-inner" class="container sixteen columns over">
    
    <hgroup class="one-third column alpha"  style="margin-left:0; height: 50px;">
    
    <h1 id="site-title" class="site-title">
    <a href="index.html" id="logo"><img src="images/logo.jpg" alt="Icebrrrg logo" height="27" width="80"/></a>
    </h1>
    
    </hgroup>

    <nav id="main-nav" class="two thirds column omega" >
    <ul id="main-nav-menu" class="nav-menu">
    <li id="search">
    <form action="index.php" method="post"><input type="search" maxlength="30"  name="q" placeholder="Search for courses";></form>
    </li>
    <li id="menu-item-1" class="current">
    <a href="index.html">Udemy for Business</a>
    </li>
    <li id="menu-item-2">
    <a href="three-column.html">Become an Instructor</a>
    </li>
    <li id="menu-item-3">
    <a href="sidebar-right.html">Login</a>
    </li>
    <li id="menu-item-4">
    <a href="sidebar-left.html">Sign-up</a>
    </li>
    
    <!--<li id="menu-item-5">
    <a href="full-width.html">Full Width</a>-->
    
    </li>
    <li id="menu-item-6">
    <a href="contact.html">Contact</a>
    </li>
    </ul>
    </nav>
    </div>
    <div class="rslt">
	<?php
	if(!isset($_POST['q'])){
		echo '';
	} else {
		$query = mysqli_query($con,"SELECT * FROM search WHERE name LIKE '%".$_POST['q']."%'");
		//echo "SELECT * FROM udemy WHERE name LIKE '%".$_POST['q']."%'";
		//$name = mysqli_name($query);
		?>
		<p style="font-family: fantasy;color: white;font-size: 23px;"><?php echo mysqli_num_rows($query); ?> results for '<?php echo $_POST['q']; ?>'</p>
	    <?php
		while($val = mysqli_fetch_assoc($query)){
			$name = $val['name'];
			$link = $val['link'];

			echo '<h2 style="padding-left:20px;"><a class="rst" href="' . $link . '.html">' . $name . '</a></h2><p>';
			} 
		}
	?></div>
</body>
<?php
} else {
	header('Location: index.php');
}
?>