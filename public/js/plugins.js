//var httpSite = 'http://10.186.1.53/cttc/';
var httpSite = 'http://localhost/cttc/';
//var httpSite = "http://www.imp-cr.com/";

 $(document).ready(function() {
   $('#color1').click(function(){
      $('#colorpicker1').show(function(){
         $('#colorpicker1').farbtastic('#color1');
	     });
	});
//----------------------------------------------------------------------------------------

 $('#colorpicker1').mouseleave(function(){
      $('#colorpicker1').hide(function(){
         $('#colorpicker1').farbtastic('#color1');
	     });
	}); 
 });
//----------------------------------------------------------------------------------------

	$(document).ready(function () {
		$("#delet").click(function(){
     $("#delet_all").toggle();
		});

    });
//----------------------------------------------------------------------------------------

$(document).ready(function () {
		$("#checkAll").click(function(){
     $("#delet_all").toggle();
		});

    });

//----------------------------------------------------------------------------------------
$(document).ready(function () {

			$("#idCard").focusout(function(){
			var idCardLength = $("#idCard").val().length;
            if(idCardLength < 10 ){
               $('.idCard').html('يجب أن يحتوي الحقل على 10 أرقام');
				$("#idCard").focus();
			} else{ $('.idCard').html('');}

			if(idCardLength > 9 ){
				var url      = 'trainee/get_idCard';
				var id1      = 'checkidCard';
				var value   =  $("#idCard").val();
			   
			   //document.write(httpSite+url);
			   //document.write(value1+'+'+value2);
			   //document.write(value);

				if (window.XMLHttpRequest) {
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				} else { // code for IE6, IE5
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById(id1).innerHTML = xmlhttp.responseText;
						document.getElementById(id1).style.display = 'block';
					}
				}
				xmlhttp.open("POST", httpSite + url, true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
				xmlhttp.send('value='+value);	
			
			}else{ $('#checkidCard').html('');}

		  });
		 
		 $("#mobile").focusout(function(){
			var mobileLength = $("#mobile").val().length;
		    if(mobileLength < 10 ){
               $('.mobile').html('يجب أن يحتوي الحقل على 10 أرقام');
				$("#mobile").focus();
			}else{ $('.mobile').html('');}
		  });

		 $("#id_course").change(function(){
			 		var courseValue = $("#id_course").val();
			if (courseValue < 1){
				$('#submit').css('pointer-events','none');
			}
			else{
				$('#submit').css('pointer-events','auto');
				}

		});
		
		var courseValue = $("#id_course").val();
		if (courseValue < 1)
		{
		 $('#submit').css('pointer-events','none');
		}
 });
//----------------------------------------------------------------------------------------
	function get_courses(value1,value2) {
		var url      = 'lists/get_courses';
		var id1      = 'result';
		var id2      = 'display';
       
	   //document.write(httpSite+url);
       //document.write('value='+value1+'-'+value2);
	   

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(id1).innerHTML = xmlhttp.responseText;
                document.getElementById(id1).style.display = 'block';
                document.getElementById(id2).style.display = 'none';
            }
        }
        xmlhttp.open("POST", httpSite + url, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
        xmlhttp.send('value='+value1+'|'+value2);
	}  
//----------------------------------------------------------------------------------------
	function getTextbook(value) {
		var url      = 'division/getTextbook';
		var id1      = 'getTextbook';
		var id2      = 'display';
       
	   //document.write(httpSite+url);
       //document.write('value='+value);
	   
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(id1).innerHTML = xmlhttp.responseText;
                document.getElementById(id1).style.display = 'block';
                document.getElementById(id2).style.display = 'none';
            }
        }
        xmlhttp.open("POST", httpSite + url, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
        xmlhttp.send('value='+value);
	}	
//----------------------------------------------------------------------------------------
	function linkTextbook(value) {
		var url      = 'linkTextbook/getDivision';
		var id1      = 'getDivision';
		var id2      = 'display';
       
	   //document.write(httpSite+url);
       //document.write('value='+value);
	   
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(id1).innerHTML = xmlhttp.responseText;
                document.getElementById(id1).style.display = 'block';
                document.getElementById(id2).style.display = 'none';
            }
        }
        xmlhttp.open("POST", httpSite + url, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
        xmlhttp.send('value='+value);
	}			
//----------------------------------------------------------------------------------------
	function get_textbook(value1,value2,value3) {
		var url      = 'linkTextbook/textbook';
		var id1      = 'result';
		var id2      = 'display';
       
	   //document.write(httpSite+url);
       //document.write('value='+value1+'-'+value2+'-'+value3);
	   

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(id1).innerHTML = xmlhttp.responseText;
                document.getElementById(id1).style.display = 'block';
                document.getElementById(id2).style.display = 'none';
            }
        }
        xmlhttp.open("POST", httpSite + url, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
        xmlhttp.send('value='+value1+'-'+value2+'-'+value3);
	}
//----------------------------------------------------------------------------------------
	function get_listTextbook(value1,value2) {
		var url      = 'lists/get_list';
		var id1      = 'result';
		var id2      = 'display';
       
	   //document.write(httpSite+url);
       //document.write('value='+value1+'-'+value2);
	   

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(id1).innerHTML = xmlhttp.responseText;
                document.getElementById(id1).style.display = 'block';
                document.getElementById(id2).style.display = 'none';
            }
        }
        xmlhttp.open("POST", httpSite + url, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
        xmlhttp.send('value='+value1+'-'+value2);
	}
//----------------------------------------------------------------------------------------
	function get_list(value1,value2,value3) {
		
		var url      = 'lists/get_list';
		var id1      = 'result';
      
	   //document.write(httpSite+url);
       //document.write(value1);
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(id1).innerHTML = xmlhttp.responseText;
                document.getElementById(id1).style.display = 'block';
            }
        }
        xmlhttp.open("POST", httpSite + url, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
        xmlhttp.send('value='+value1+'-'+value2+'-'+value3);
	}
//----------------------------------------------------------------------------------------
	function get_present(value1,value2,value3) {
		var url      = 'lists/get_present';
		var id1      = 'result';
       
	   //document.write(httpSite+url);
       //document.write(value1);

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(id1).innerHTML = xmlhttp.responseText;
                document.getElementById(id1).style.display = 'block';
            }
        }
        xmlhttp.open("POST", httpSite + url, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
        xmlhttp.send('value='+value1+'-'+value2+'-'+value3);
	}
//----------------------------------------------------------------------------------------
	function get_mark(value1,value2,value3) {
		var url      = 'lists/get_mark';
		var id1      = 'result';
       
	   //document.write(httpSite+url);
       //document.write(value1);
	   

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(id1).innerHTML = xmlhttp.responseText;
                document.getElementById(id1).style.display = 'block';
            }
        }
        xmlhttp.open("POST", httpSite + url, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
        xmlhttp.send('value='+value1+'-'+value2+'-'+value3);
	}
//----------------------------------------------------------------------------------------

    function ajaxDivision(value,id1,url) {

       //document.write(httpSite+url);
       //document.write(value);

        if (value == "") {
            document.getElementById(id1).innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(id1).innerHTML = xmlhttp.responseText;
                document.getElementById(id1).style.display = 'block';
            }
        }
        xmlhttp.open("POST", httpSite + url, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
        xmlhttp.send('value=' + value);
	
	}
//----------------------------------------------------------------------------------------
	
	function AjaxSearch(search, id1, id2, url) {
        //document.write(httpSite+url);
        //document.write(search);

        if (search == "") {
            document.getElementById(id1).innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(id1).innerHTML = xmlhttp.responseText;
                document.getElementById(id1).style.display = 'block';
                document.getElementById(id2).style.display = 'none';
            }
        }
        xmlhttp.open("POST", httpSite + url, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
        xmlhttp.send('search=' + search);
    }
//----------------------------------------------------------------------------------------

    function restData(id1) {
        document.getElementById(id1).innerHTML = "";
    }

    
