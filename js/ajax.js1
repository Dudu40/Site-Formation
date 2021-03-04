

function getXhr(){
    var xhr = null;
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    } else if(window.ActiveXObject) { 
        try {
          	xhr = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
          	xhr = new ActiveXObject("Microsoft.XMLHTTP") ;
        }
    }
    else{
        alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
        xhr = false;
    }
    return xhr;
}


function ajax (link, content, call) {
	let xhr = getXhr();

	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200){
			let res = xhr.responseText;
			call(res);
		}
	}
	
	xhr.open("POST", link, true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8");
	xhr.send(content);
}









