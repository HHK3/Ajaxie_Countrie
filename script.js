function showList(str, typeSearch) {
    console.log(typeSearch);
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(typeSearch == "list"){
                    var myArr = JSON.parse(xmlhttp.responseText);
                    printArray(myArr);
                }
                if(typeSearch == "answer"){
                    document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                }
            }
        }
        xmlhttp.open("GET","getdata.php?q=" + str + "&type=" + typeSearch,true);
        xmlhttp.send();
    }
}
//===============================================
function printArray(arr) {
    let out = "";
    let i;
    for(i = 0; i < arr.length; i++) {
        out += '<span id="'  + arr[i] + '" class="country" onClick = "showList(this.id,\'answer\')" >'+ arr[i] + '</span><br>';
    }
    document.getElementById("txtHint").innerHTML = out;
}

// function parseJson(result) {
//
// }
