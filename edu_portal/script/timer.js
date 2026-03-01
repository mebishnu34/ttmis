function countDown(secs, elem)
  {
     var element = document.getElementById(elem);
      element.innerHTML = "<b>"+secs+"</b> Minute Remaining.";
      if(secs < 1) 
	  {
       document.quiz.submit();
       }
      else
      {
      secs--;
      setTimeout('countDown('+secs+',"'+elem+'")',60000);
      }
  }
function validate()
{
   return true;
}
// JavaScript Document