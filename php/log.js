function login(str) {
    if (str == "") {
        document.getElementById("logear").innerHTML = "";
        return;
    } else { 
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("logear").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET","seleccionar.php?q="+str,true);
        xmlhttp.send();
}
}