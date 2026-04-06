<?php
session_start();
   $_SESSION['application']="";
   $_SESSION['csrf']="";
   $_SESSION['token']="Stop";
?>
<HTML>
    <Head>
        <title>TTMIS:Error</title>
    </head>
<BODY class="bg">
<center>
<?php
if(isset($_GET['msg']))
	{
		echo $_GET['msg'];
	}
?>
</center>

</BODY>
</HTML>
