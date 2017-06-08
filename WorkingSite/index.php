<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />

        <title>Demo Applicatie</title>

        <!-- Use bootstrap & main.css -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/main.css" />

	<!-- Use javascripts -->
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script src="//cdn.jsdelivr.net/jdenticon/1.3.2/jdenticon.min.js" async></script>

    </head>

    <body>
<div class="container">
  <h1>Demo Applicatie</h1>
  <h3>Hostname: <?php echo gethostname(); ?></h3>
  <h4>IP-address: <?php echo getHostByName(getHostName());?></h4>
	<h3>NIEUW</h3>
	<div> 
          <canvas width="150" height="150" data-jdenticon-hash="<?php echo hash('sha256', gethostname()); ?>"></canvas> 
	    </div>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
<label>
    <input type="file" name="fileToUpload">
</label>
    <input type="submit" value="Upload Image" name="submit">
</form>
<div class="well">
	<h2><u>Files bucket:</u></h2>
<?php
 if ($handle = opendir('/var/InstallationApplicationAWS/bucket')) {
   while (false !== ($file = readdir($handle)))
      {
          if ($file != "." && $file != "..")
          {
                $thelist .= '<p>'.$file.'</p>';
          }
       }
  closedir($handle);
  }       
?>
<P>List of files:</p>
<P><?=$thelist?></p>
</div>
</div>
    </body>
</html>
