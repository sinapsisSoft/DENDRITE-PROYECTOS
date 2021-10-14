//**************************//
//Author: DIEGO CASALLAS
//Date: 24/08/2019
//Description : Class Table 
//************CLASS TABLE**************//

class Table {

  constructor(id, arrayCell, jSon) {
    this.id = id;
    this.arrayCell = arrayCell;
    this.jSon = jSon;
  }
  //**Method create Table Customers **/
  createTableCustomers() {
   
    var objTable = document.getElementById(this.id);
    let objThead = '<thead class="text-wine">';
    let objtbody = '<tbody>';
    let table = "";
    for (let j = 0; j < this.arrayCell.length; j++) {
      objThead += '<th>' + this.arrayCell[j] + '</th>';
    }
    for (let k = 0; k < this.arrayCell.length - 1; k++) {
      if (k == 0) {
        objThead += '<tr>';
      }
      objThead += '<th><input type="text" class="form-control bg-light border-0 small" id="myInput' + k + '" onkeyup="searchTable(' + "'" + this.id + "'," + k + ",'myInput'" + ')" placeholder="Search.." title="Search"></th>';
      if (k == this.arrayCell.length) {
        objThead += '</tr>';
      }
    }
    for (let i = 0; i < this.jSon.length; i++) {
      objtbody += '<tr><td>' + this.jSon[i].Client_identification + '</td><td>' + this.jSon[i].Client_name + '</td><td>' + this.jSon[i].Client_tel + '</td><td>' + this.jSon[i].Client_email + '</td><td>' + this.jSon[i].Client_contactName + '</td><td><button onclick="getDataEdit(' + this.jSon[i].Client_id + ');clearForm(' + "'form_customers'" + ', 0);" class="btn btn-primary" style="margin:0; padding:5px" value=""><i class="material-icons">border_color</i></button></td></tr>';
    }
    objtbody += '</tbody>';
    objThead += '</thead>';
    table = objThead + objtbody;
    objTable.innerHTML = table;
  }
  //**Method create Table Provider **/
  createTableProviders() {
    var objTable = document.getElementById(this.id);
    let objThead = '<thead class="text-wine">';
    let objtbody = '<tbody>';
    let table = "";
    for (let j = 0; j < this.arrayCell.length; j++) {
      objThead += '<th>' + this.arrayCell[j] + '</th>';
    }
    for (let k = 0; k < this.arrayCell.length - 1; k++) {
      if (k == 0) {
        objThead += '<tr>';
      }
      objThead += '<th><input type="text" class="form-control bg-light border-0 small" id="myInput' + k + '" onkeyup="searchTable(' + "'" + this.id + "'," + k + ",'myInput'" + ')" placeholder="Search.." title="Search"></th>';
      if (k == this.arrayCell.length) {
        objThead += '</tr>';
      }
    }
    for (let i = 0; i < this.jSon.length; i++) {
      objtbody += '<tr><td>' + this.jSon[i].Pro_identification + '</td><td>' + this.jSon[i].Pro_name + '</td><td>' + this.jSon[i].Pro_tel + '</td><td>' + this.jSon[i].Pro_contactName + '</td><td>' + this.jSon[i].Pro_contactEmail + '</td><td><button onclick="getDataEdit(' + this.jSon[i].Pro_id + ');clearForm(' + "'form_providers'" + ', 0);" class="btn btn-primary" style="margin:0; padding:5px" value=""><i class="material-icons">border_color</i></button></td></tr>';
    }
    objtbody += '</tbody>';
    objThead += '</thead>';
    table = objThead + objtbody;
    objTable.innerHTML = table;
  }
  //**Method create Table Users **/
  createTableUsers() {
    var objTable = document.getElementById(this.id);
    let objThead = '<thead class="text-wine">';
    let objtbody = '<tbody>';
    let table = "";
    for (let j = 0; j < this.arrayCell.length; j++) {
      objThead += '<th>' + this.arrayCell[j] + '</th>';
    }
    for (let k = 0; k < this.arrayCell.length - 1; k++) {

      if (k == 0) {
        objThead += '<tr>';
      }
      objThead += '<th><input type="text" class="form-control bg-light border-0 small" id="myInput' + k + '" onkeyup="searchTable(' + "'" + this.id + "'," + k + ",'myInput'" + ')" placeholder="Search.." title="Search"></th>';
      if (k == this.arrayCell.length) {
        objThead += '</tr>';
      }
    }
    for (let i = 0; i < this.jSon.length; i++) {
      objtbody += '<tr><td>' + this.jSon[i].User_name + '</td><td>' + this.jSon[i].User_email + '</td><td>' + this.jSon[i].User_title + '</td><td><button onclick="getDataEdit(' + this.jSon[i].User_id + ');clearForm(' + "'form_users'" + ', 0);passwordDataForm(0);" class="btn btn-primary" style="margin:0; padding:5px" value=""><i class="material-icons">border_color</i></button></td></tr>';
    }
    objtbody += '</tbody>';
    objThead += '</thead>';
    table = objThead + objtbody;
    objTable.innerHTML = table;
  }
//**Method create Table Customers **/
  createTableSearchClient() {
    var objTable = document.getElementById(this.id);
    let objThead = '<thead class="text-wine">';
    let objtbody = '<tbody>';
    let table = "";
    for (let j = 0; j < this.arrayCell.length; j++) {
      if (j == 0) {
        objThead += '<th style="visibility:collapse">' + this.arrayCell[j] + '</th>';
      }
      objThead += '<th>' + this.arrayCell[j] + '</th>';

    }
    for (let i = 0; i < this.jSon.length; i++) {
      objtbody += '<tr><td style="visibility:collapse">' + this.jSon[i].Client_id + '</td><td scope="row">' + this.jSon[i].Client_identification + '</td><td>' + this.jSon[i].Client_name + '</td><td>' +
        '<input value="' + this.jSon[i].Client_id + '" name="subject" class="subject-list text-center"  style="width: 100%;"type="radio"></td></tr>';
    }
    objtbody += '</tbody>';
    objThead += '</thead>';
    table = objThead + objtbody;
    objTable.innerHTML = table;
  }
    //**Method create Table Provider **/
  createTableSearchProvider() {
    var objTable = document.getElementById(this.id);
    let objThead = '<thead class="text-wine">';
    let objtbody = '<tbody>';
    let table = "";
    for (let j = 0; j < this.arrayCell.length; j++) {
      if (j == 0) {
        objThead += '<th style="visibility:collapse">' + this.arrayCell[j] + '</th>';
      }
      objThead += '<th>' + this.arrayCell[j] + '</th>';
    }
    for (let i = 0; i < this.jSon.length; i++) {
      objtbody += '<tr><td style="visibility:collapse">' + this.jSon[i].Pro_id + '</td><td scope="row">' + this.jSon[i].Pro_identification + '</td><td>' + this.jSon[i].Pro_name + '</td><td>' +
        '<input value="' + this.jSon[i].Pro_id + '" name="subject" class="subject-list text-center"  style="width: 100%;"type="radio"></td></tr>';
    }
    objtbody += '</tbody>';
    objThead += '</thead>';
    table = objThead + objtbody;
    objTable.innerHTML = table;
  }
  //**Method create Table Quotations **/
  createTableQuotations() {
    var objTable = document.getElementById(this.id);
    let objThead = '<thead class="text-wine">';
    let objtbody = '<tbody>';
    let table = "";
    for (let j = 0; j < this.arrayCell.length; j++) {
      objThead += '<th>' + this.arrayCell[j] + '</th>';
    }
    for (let k = 0; k < this.arrayCell.length - 1; k++) {

      if (k == 0) {
        objThead += '<tr>';
      }
      objThead += '<th><input type="text" class="form-control bg-light border-0 small" id="myInput' + k + '" onkeyup="searchTable(' + "'" + this.id + "'," + k + ",'myInput'" + ')" placeholder="Search.." title="Search"></th>';
      if (k == this.arrayCell.length) {
        objThead += '</tr>';
      }
    }
    for (let i = 0; i < this.jSon.length; i++) {
      let version = 0;
      version = (this.jSon[i].Quo_version === null) ? 1 : this.jSon[i].Quo_version;
      objtbody += '<tr><td>' + this.jSon[i].Quo_number + '</td><td>' + version + '</td><td>' + this.jSon[i].Quo_hours + '</td><td>' + this.jSon[i].Stat_name + '</td><td><button onclick="getDataEdit(' + this.jSon[i].Quo_id + ');clearForm(' + "'form_users'" + ', 0);passwordDataForm(0);" class="btn btn-primary" style="margin:0; padding:5px" value=""><i class="material-icons">border_color</i></button></td></tr>';
    }
    objtbody += '</tbody>';
    objThead += '</thead>';
    table = objThead + objtbody;
    objTable.innerHTML = table;
  }
}

