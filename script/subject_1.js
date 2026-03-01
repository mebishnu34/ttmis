function selecttraining()
{
	//alert("Hello World"); // test function work or not
	var training=document.getElementById("cmbtraining").value;
	//alert(training); // Test Value show or not
	//to pass value in php page use ajax
	$.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "../Display/ajax_subject_1.php",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   look: training
               },
               //If result found, this funtion will be called.
               //success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                 //  $("#displaydata").html(html).show();
               //}
           });
}

function selectlevel()
{
	//alert("Hello World"); // test function work or not
	var level=document.getElementById("cmblevel").value;
	//alert(level); // Test Value show or not
	//to pass value in php page use ajax
	$.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "../Display/ajax_subject_1.php",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   looklevel: level
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#displaydata").html(html).show();
               }
           });
}

function selectsubject()
{
	//alert("Hello World"); // test function work or not
	var subject=document.getElementById("cmbsubject").value;
	//alert(subject); // Test Value show or not
	//to pass value in php page use ajax
	$.ajax({
               //AJAX type is "Post".
               type: "POST",
               //Data will be sent to "ajax.php".
               url: "../Display/ajax_training_report_1.php",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   looksubject: subject
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#displayreport").html(html).show();
               }
           });
}

