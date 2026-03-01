<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Untitled Document</title>
<script type="text/javascript">
     function CallPreview(strid1)
        {
            var prtContent = document.getElementById(strid1);
            var WinPrint = window.open('','','letf=0,top=0,width=1000,height=700,toolbar=0,scrollbars=1,status=0');
            WinPrint.document.write(prtContent.innerHTML);
        }
      function CallPrint(strid)
        {
        var prtContent = document.getElementById(strid);
        var WinPrint = window.open('','','letf=0,top=0,width=1000,height=700,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
        prtContent.innerHTML=strOldOne;
        }
   </script>
</head>

<body>

</body>
</html>
