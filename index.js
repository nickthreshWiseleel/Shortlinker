let input;
let result;
let xhr = new XMLHttpRequest()
let server = "http://localhost:8000/";

function OnClick() {
    input = document.getElementById("input").value;
}

function SetClipboardText() {
    navigator.clipboard.writeText(result);
}

function Send(param) {
    if (xhr.readyState == 4 && xhr.status == 200) {
        return xhr.send(param);
    }
}

function Short() {
    xhr.open("POST", server);   
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("result").value = xhr.responseText;
        }
    };

    xhr.send("url=" + document.getElementById("input").value);
}

function OpenShort(){
    window.open(document.getElementById("result").value, '_blank').focus();
}
