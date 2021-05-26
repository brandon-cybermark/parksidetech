
function submitReq()
{
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();

    // Create some variables we need to send to our PHP file
    var url = "wp-content/themes/ckokickboxing-location-new/assets/js/request-plan-process.php";
    var p0  = document.getElementById("popName").value; //Their name in form
    var p1  = document.getElementById("popEmail").value; //Their email in form
    var p2  = document.getElementById("popTel").value; //Their tel in form
    var p3  = document.getElementById("popMsg").value; //Their msg in form
    var p4  = document.getElementById("popRedirect").value; // Not used
    var p5  = document.getElementById("popSub").value; // Not used
    var p6 = document.getElementById("popSendEmail").value; // Custom Field email
    var p7 = document.getElementById("popSendName").value; // Custom field club name
    var p8 = document.getElementById("popSendAddress").value; // Custom field club address
    var p9 = document.getElementById("popSendCity").value; //custom field club city
    var p10 = document.getElementById("popSendPhone").value; //custom field club phone
    var p11 = grecaptcha.getResponse();

    // Compile for query string
    var vars = "name="+p0+"&email="+p1+"&telephone="+p2+"&message="+p3+"&redirect="+p4+"&subject="+p5+"&popSendEmail="+p6+"&popSendName="+p7+"&popSendAddress="+p8+"&popSendCity="+p9+"&popSendPhone="+p10+"&cap="+p11;

    // Post query string values
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
    if(hr.readyState == 4 && hr.status == 200)
        {
            var return_data = hr.responseText.split("|");
            document.getElementById("popErr").innerHTML = return_data[4];

            // This page is where we will redirect once form is submitted
            var redirect = myScript.theme_directory + "/thank-you/";

            // Redirect if Success
            if(return_data[4] == "Success")
            {
                console.log(return_data);
                window.location = redirect;
            }


        }


    }

    hr.send(vars);
    document.getElementById("popErr").innerHTML = "Processing...";

}
