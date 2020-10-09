//creating the XMLHttpRequest object
var xHttp = createXMLHttpRequest();

//The function that create the XMLHttpRequest
function createXMLHttpRequest() 
{

    // checker = document.getElementById('checker');
    // checkerDiv = checker.innerHTML;
    // checkerDiv = "<i>helloMessage</i>";
    // document.body.style.cursor = "default";
        
    var xHttp;

    try {
        // For browsers later than internet explorer 6
        var xHttp = new XMLHttpRequest();

    } 
    catch (e) 
    
    {
        try {
            
            xHttp = new ActiveXObject("Microsoft.XHttp");
        }
        catch (e) {alert("something occured, please try again later"); }

    }//End of the main catch block

    return xHttp;
}

//Call back function
function callback() 
{
    // var show = document.getElementById("checker");
    // show.innerHTML = xHttp.status;

    if(xHttp.readyState == 4 && xHttp.status == 200)
    {    alert("the condition was satisfied");
        try 
        {
            checker = document.getElementById('checker');
            checker.innerHTML = xHttp.responseText;
            document.body.style.cursor = "default";

        }catch (e) 
        {
            document.body.style.cursor = "default";
            alert("there is an issue");
        }
    }else{
        checker.innerHTML = "thanks";
    }
}

//Initiate a request
function process(){
    
    if (xHttp) {
        
        try {

            //alert("hello");
            var a = document.getElementById("username");
            var username = a.value;

            var b = document.getElementById("password");
            var password = b.value;
            
            var data = "username="+username+"&password="+password;

            var url = "php_post.php";
            
            xHttp.onreadystatechange = callback;
            xHttp.open('GET', url+"?"+data, true);
           // xHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            
            
            //alert(xHttp.readyState);
            
            xHttp.send(null);

            checker = document.getElementById('checker');
        
            checker.innerHTML = "Processing...";

            //document.body.style.cursor = "wait";

        } catch (e) {
            //Use a modal here later
            alert("Error connecting, " + e);

            //setTimeout('process()', 1000)
        }

        
    }
    else{
        setTimeout('process()', 1000);
    }
}