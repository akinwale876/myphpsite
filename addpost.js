
var title,description,category,tag,content,data;

// preparing variables 

function _(el){

return document.getElementById(el);


}




// ..beginning of form validation...
function uploadFile(){




title = _('title');
description =_('description');
file = _('file').files[0];

 category = _('category');
 tag = _('tag');
 content = _('content');


var formdata = new FormData();

formdata.append('title', title.value);
formdata.append('description', description.value);
formdata.append('category', category.value);
formdata.append('tag', tag.value);
formdata.append('content', content.value);
formdata.append('file', file);


if (window.XMLHttpRequest) {
    // code for modern browsers
   var ajax = new XMLHttpRequest();
 } else {
    // code for old IE browsers
   var ajax = new ActiveXObject("Microsoft.XMLHTTP");
}


ajax.upload.addEventListener('progress', progressHandle, false);
ajax.addEventListener('load', completeHandle, false);
ajax.addEventListener('error', errorHandle, false);
ajax.addEventListener('abort', abortHandle, false);
ajax.open("POST", "addpost_server.php");
ajax.send(formdata);




}


function progressHandle(event){

    _('loaded').innerHTML = "uploaded " + event.loaded + "bytes of " + event.total;

var percent = (event.loaded / event.total) * 100;

_('progressbar').value = Math.round(percent);
_('status').innerHTML = Math.round(percent) + "% upload... please wait";


}

function completeHandle(event){

_('status').innerHTML = event.target.responseText;

_('progressbar').value = 0;

}

function errorHandle(event){

_('status').innerHTML = "upload failed";



}

function abortHandle(event){

_('status').innerHTML = "upload aborted";



}

