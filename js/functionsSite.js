//**************************//
//Author: DIEGO CASALLAS
//Date: 23/08/2019
//Description : funtions project
//************GET DATA FORM**************//
function getDataForm(idForm) {
  let objForm = document.getElementById(idForm);
  let jsonData = '';
  let exclude = "no-valid";
  let selectForm = objForm.querySelectorAll('select');
  for (let i = 0; i < objForm.length; i++) {

    let input = false;
    if (objForm[i].type == "email" && !(objForm[i].classList.contains(exclude))) {
      input = true;
    }
    if (objForm[i].type == "password" && !(objForm[i].classList.contains(exclude))) {
      input = true;
    }
    if (objForm[i].type == "text" && !(objForm[i].classList.contains(exclude))) {
      input = true;
    }
    if (objForm[i].type == "number" && !(objForm[i].classList.contains(exclude))) {
      input = true;
    }
    if (objForm[i].type == "hidden" && !(objForm[i].classList.contains(exclude))) {
      input = true;
    }
    if (objForm[i].type == "date" && !(objForm[i].classList.contains(exclude))) {
      input = true;
    }
    if (objForm[i].type == "checkbox" && !(objForm[i].classList.contains(exclude))){
      input = true;
    }
    if (objForm[i].type == "textarea" && !(objForm[i].classList.contains(exclude))){
      input = true;
    }

    if (input) {
      if (objForm[i].type == "checkbox" && !(objForm[i].classList.contains(exclude))){
        if(objForm[i].checked){
          jsonData += '"' + objForm[i].id + '":' + '"1",';
        }
        else {
          jsonData += '"' + objForm[i].id + '":' + '"0",';
        }
      }
      else{
        jsonData += '"' + objForm[i].id + '":' + '"' + objForm[i].value + '",';
      }  
    }
  }
  ///For select ///
  for (let j = 0; j < selectForm.length; j++) {
    let objSelect = document.getElementById(selectForm[j].id);
    if (objSelect != 'Quo_dimensions') {
 
      jsonData += '"' + selectForm[j].id + '":' + '"' + objSelect.options[objSelect.selectedIndex].value + '",';
    }
  }
  jsonData = jsonData.substring(0, jsonData.length - 1);
  return jsonData;
}
//************SET DATA FORM**************//
function setDataForm(json) {
  let jsonData = json;
  for (let key in jsonData[0]) {
    //console.log(key+"-"+jsonData[0][key]);    
    if (document.getElementById(key).type == "checkbox"){
      if(jsonData[0][key] == 1){
        document.getElementById(key).checked = true;
      }
      else {
        document.getElementById(key).checked = false;
      }
    }
    document.getElementById(key).value = jsonData[0][key];
  }
}
//************ MODAL**************//
var timeAlert;
function createModalAlert(idMenssage, type, time) {
  myStopFunction();
  let arrayStyle = new Array("alert-success", "alert-info", "alert-warning", "alert-danger");
  var objModal = document.getElementById("myAlert");
  objModal.innerHTML = '<div class="alert ' + arrayStyle[type] + ' text-center"><a class="close " data-dismiss="alert">×</a><span>' + idMenssage + '</span></div>';

  timeAlert = setTimeout(function () {
    objModal.innerHTML = "";
  }, time);
  $('html, body').animate({
    scrollTop: 0
  }, 600);
  return false;
  
}
function myStopFunction() {
  clearTimeout(timeAlert);
}
//************ VALIDATOR FORM**************//
function validatorForm(idForm) {
  let objForm = document.getElementById(idForm);

  ///For input ///
  for (let i = 0; i < objForm.length; i++) {

    if (objForm[i].required == true) {
      if (objForm[i].type == "email") {
        if (objForm[i].value == "" || objForm[i].value.length == 0) {
          return false;
        }
      }
      if (objForm[i].type == "password") {
        if (objForm[i].value == "" || objForm[i].value.length == 0) {
          return false;
        }
      }
      if (objForm[i].type == "text") {
        if (objForm[i].value == "" || objForm[i].value.length == 0) {
          return false;
        }
      }
      if (objForm[i].type == "number") {
        if (objForm[i].value == "" || objForm[i].value.length == 0) {
          return false;
        }
      }
      if (objForm[i].type == "date") {
        if (objForm[i].value == "" || objForm[i].value.length == 0) {
          return false;
        }
      }
    }
  }
  return true;
}
//************ LOCATION **************//
function viewModal(idModal, state) {
  if (state == 0) {
    $("#" + idModal).modal("show");
  } else {
    $("#" + idModal).modal("hide");
  }
}

function viewCard(idCard, state){
  if(state == 0){
    document.getElementById(idCard).style.visibility = "hidden";
  } else {
    document.getElementById(idCard).style.visibility = "visible";
  }
}

//**************DISABLED TEXT FORM**************/
function disableForm(form) {
  var objForm = document.getElementById(form);
  let intLogForm = objForm.querySelectorAll('input').length;

  for (let i = 0; i < intLogForm; i++) {
      objForm[i].disabled = true;
  }
}

//************CLEAR FORM****************/
function clearForm(form, type) {
  try {

    var objForm = document.getElementById(form);
    let intLogForm = objForm.querySelectorAll('input');
    var clas = objForm.getElementsByClassName('read');
    var hidde = objForm.getElementsByClassName('hidden');

    for (let i = 0; i < intLogForm.length; i++) {      
      if(intLogForm[i].type == "number"){
        intLogForm[i].value = 0;
      }
      else if(intLogForm[i].className == "id"){
        intLogForm[i].value = "0";
      }
      else if(intLogForm[i].type == 'checkbox'){
        intLogForm[i].checked = false;
      }
      else {
        intLogForm[i].value = "";
      }      
    }
    if (type == 0) {
      for (let i = 0; i < clas.length; i++) {
        clas[i].setAttribute('disabled', true);
      }
      for (let i = 0; i < hidde.length; i++) {
        hidde[i].setAttribute('display', 'none');
      }
    }
    else if (type == 1) {
      for (let i = 0; i < clas.length; i++) {
        clas[i].removeAttribute('disabled');
      }
      for (let i = 0; i < hidde.length; i++) {
        hidde[i].removeAttribute('display');
      }
    }
    
  }
  catch (error) {
    console.error(error);
  }
}

function disabledForm(){
  var clas = document.getElementsByClassName('read');
  for (let i = 0; i < clas.length; i++) {
    clas[i].setAttribute('disabled', true);
  }
}
//************SUM PAGE*************//
var intPage0, intPage1, intRes = 0;
function sumPage(id) {
  var result = 0;
  var arrayPreQuote = new Array('Pre_quo_color', 'Pre_quo_bw', 'Pre_quo_guards', 'Pre_quo_cover', 'Pre_quo_inser');
  var arrayQuote = new Array('Quo_color','Quo_bw','Quo_guards','Quo_cover','Quo_inser');
  try {
    if (id == 0) {
      for (let i = 0; i < arrayPreQuote.length; i++) {
        let values = 0;
        let obj = document.getElementById(arrayPreQuote[i]);
        if(obj.value.length == 0 || obj.value == ""){
          obj.value = 0;
        }
        if (arrayPreQuote[4] == arrayPreQuote[i]) {          
          values = parseInt(obj.value) * 2;  
        }
        else {
          values = obj.value;
        }        
        result += parseInt(values);
      }
      document.getElementById('Pre_quo_pageTotal').value = result;
    }
    else if(id == 1){
      for (let i = 0; i < arrayQuote.length; i++) {
        let values = 0;
        let obj = document.getElementById(arrayQuote[i]);
        if(obj.value.length == 0 || obj.value == ""){
          obj.value = 0;
        }
        if (arrayQuote[4] == arrayQuote[i]) {          
          values = parseInt(obj.value) * 2;  
        }
        else {
          values = obj.value;
        }        
        result += parseInt(values);
      }
      document.getElementById('Quo_pageTotal').value = result;
    }
  }
  catch (error) {
    console.error(error);
  }
}
//************GET DATA USER**************//
function getDataUserId(idUser) {
  try {
    var xhttp = new XMLHttpRequest();
    var JsonData;
    xhttp.open("POST", ajaxUserLogin, true);
    xhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
    xhttp.onreadystatechange = function () {
      if (this.readyState === 4 && this.status === 200) {
        var jsonObj = JSON.parse(xhttp.responseText);
        if (jsonObj.length != 0) {
          setInformationUser(jsonObj);
          enableScroll();
        } else {
          locationLogin();
        }

      }
    };

    JsonData = '{"GET":"GET","User_id":"' + idUser + '"}';

    xhttp.send(JsonData);
  } catch (error) {
    console.error(error);
  }

}
function locationLogin() {
  if(ajaxUserLogin.indexOf("../") >= 0){
    window.location.assign("../login/login.html");
  }
  else {
    window.location.assign("../login/login.php");
  }
}
function setInformationUser(json) {
  document.getElementById("labelName").innerHTML = json[0]["User_name"];
  document.getElementById("User_id").value = json[0]["User_id"];
  document.getElementById("Comp_id").innerHTML = json[0]["Comp_id"];
}

function requireds (className){
  let objClass = document.getElementsByClassName(className);
  let valid = 0;
  for(let i =0; i < objClass.length; i++){    
    if(objClass[i].required == true) {
      if(objClass[i].value == "" || objClass[i].length == 0){
        valid++;
      }
    }
  }
  return valid;
}
//************GLOAD SCROLL VIEW**************//

    function disableScroll(){  
    var x = window.scrollX;
    var y = window.scrollY;
    window.onscroll = function(){ window.scrollTo(x, y) };
}
function loadPageView(){
  let obj=document.getElementById("loadPage");
  obj.style.display="block";
  let divObj="";
  for(let i=0;i<4;i++){
    divObj +='<div class="block"></div>';
  }
  obj.innerHTML=divObj;
  disableScroll();  
}
function enableScroll(){  
  window.onscroll = null;
  document.getElementById("loadPage").style.display="none";
}
//************TO BLOCK FORM**************//
function to_block_form(){
  let objBody=document.forms;

  for(let i=0;i<objBody.length;i++){
     
      let objForm=objBody[i];
      for(let j=0;j<objForm.length;j++){
          objForm[j].disabled =true;
      }
  }
}
//******Get the actual url page********//
function getUrl(){
  let strUrl=window.location.href;
  let strQuery=strUrl.indexOf("/pages");
  let strHast=strUrl.substring(0,strQuery);
  return strHast;
}

function getCompanyId(){
  return document.getElementById("Comp_id").innerHTML;
}

//**Function get Notifications **/
function getNotification(dataSetUser) {
  try {
      //loadPageView();
      var xhttp = new XMLHttpRequest();
      var JsonData;
      xhttp.open("POST", ajaxUserLogin, true);
      xhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
      xhttp.onreadystatechange = function () {
          if (this.readyState === 4 && this.status === 200) {
              var jsonObj = JSON.parse(xhttp.responseText);
              notificationList(jsonObj);
          }
      };
      JsonData = '{"POST":"NOTIFICATION","User_id":"' + dataSetUser + '"}';
      xhttp.send(JsonData);
  } catch (error) {
      console.error(error);
      enableScroll();
  }
}

function notificationList(json){
  let not = document.getElementById('notifications');
  not.innerHTML = '<h6 class="dropdown-header">Centro de Alertas</h6>';
  if(json.length > 0){
    let count = document.getElementById("notificationCount");
    count.innerHTML = json.length;
    for (let i = 0; i < json.length; i++){
      not.innerHTML += '<a class="dropdown-item d-flex align-items-center" href="#">'+
                      '<div class="mr-3">' + 
                      '<div class="icon-circle bg-warning">'+
                        '<i class="fas fa-exclamation text-white"></i>'+
                      '</div>'+
                    '</div>'+
                    '<div>'+
                      '<div class="small text-gray-500">'+ json[i]["Consecutive"]+'</div>'+
                      '<span class="font-weight-bold">'+ json[i]["Message"]+'</span>'+
                    '</div>'+
                  '</a>';
    }  
  }
  else {
    not.innerHTML += '<a class="dropdown-item d-flex align-items-center" href="#">'+
                      '<div class="mr-3">' + 
                      '<div class="icon-circle bg-success">'+
                        '<i class="fas fa-check text-white"></i>'+
                      '</div>'+
                    '</div>'+
                    '<div>'+
                      '<span class="font-weight-bold">No hay notificaciones para mostrar</span>'+
                    '</div>'+
                  '</a>';
  }
  
}
function messageList(){
  let mess = document.getElementById('messages');
    mess.innerHTML = '<h6 class="dropdown-header">Centro de Mensajes</h6>';
    mess.innerHTML += '<a class="dropdown-item d-flex align-items-center" href="#">'+
                      '<div class="dropdown-list-image mr-3">'+
                        '<div class="icon-circle bg-success">'+
                          '<i class="fas fa-check text-white"></i>'+
                        '</div>'+
                      '</div>'+
                      '<div class="font-weight-bold">'+
                        '<div class="text-truncate">No hay mensajes para mostrar.</div>'+
                      '</div>'+
                    '</a>';
}

function nobackbutton(){
  window.location.hash="no-back-button";
  window.location.hash="Again-No-back-button" //chrome
  window.onhashchange=function(){window.location.hash="no-back-button";} 
}

//************ LOAD VIEW ******************/
function loadGeneralView() {
  loadPageView();
  getActionStorage();
  nobackbutton();    
}

//************ LOAD VIEW STORAGE ******************/
function getActionStorage() {
 
  let obj=new StoragePage();
  let json=JSON.parse(obj.getStorageLogin());
  //console.log(json);
  if (json !== null) {
  getDataUserId(json[0]["User_id"]);
  //getNotification(json[0]["User_id"]);
  //messageList();
  }else{
      locationLogin();
  }
}

//**Function get Today request **/
function getDataNotReq(table, dataSetRequest, typeSend) {
  try {
    loadPageView();
    var xhttp = new XMLHttpRequest();
    var JsonData;
    xhttp.open("POST", "../../php/bo/bo_request.php", true);
    xhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
    xhttp.onreadystatechange = function () {
      if (this.readyState === 4 && this.status === 200) {
        var json = JSON.parse(xhttp.responseText);
        if (json.length != 0) {
          if (typeSend == 0) {
            ListRequest(table,json);
            enableScroll();
          }  
          if(typeSend == 1){
            notificationList(json);
            enableScroll();
          }
        } else {
          enableScroll();
        }
      }
    };
    if (typeSend == 0) {
      JsonData = '{"GET":"GET_TODAY_REQUEST"}';
    }  
    if (typeSend == 1) {
      JsonData = '{"GET":"GET_PENDING_REQUEST"}';
    } 
    xhttp.send(JsonData);
  } catch (error) {
    console.error(error);
    enableScroll();
  }
}

function notificationList(json){
  let not = document.getElementById('notifications');
  if(not != null){
    not.innerHTML = '<h6 class="dropdown-header">Centro de Alertas</h6>';
    if (json.length > 0) {
      let count = document.getElementById("notificationCount");
      count.innerHTML = json.length;
      let url;
      for (let i = 0; i < json.length; i++) {
        not.innerHTML += '<a class="dropdown-item d-flex align-items-center" href="../request/request.php?Req_id='+ json[i]["Req_id"] +'">' +
          '<div class="mr-3">' +
          '<div class="icon-circle bg-warning">' +
          '<i class="fas fa-exclamation text-white"></i>' +
          '</div>' +
          '</div>' +
          '<div>' +
          '<div class="small text-gray-500">' + json[i]["Req_subject"] + '</div>' +
          '</div>' +
          '</a>';
      }
    }
    else {
      not.innerHTML += '<a class="dropdown-item d-flex align-items-center" href="#">' +
        '<div class="mr-3">' +
        '<div class="icon-circle bg-success">' +
        '<i class="fas fa-check text-white"></i>' +
        '</div>' +
        '</div>' +
        '<div>' +
        '<span class="font-weight-bold">No hay notificaciones para mostrar</span>' +
        '</div>' +
        '</a>';
    }
  } 
}

function month2digits(month) {
  return (month < 10 ? '0' : '') + month;
}