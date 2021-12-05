import doInsert from "./doInsert.js";

export default function showInsertPage(){
    let str = `<table>`;
    str += `<tr><td>供應商名稱:</td><td><input type="text" id="supplierName"></td></tr>`;
    str += `<tr><td>聯絡人:</td><td><input type="text" id="contactPerson"></td></tr>`;
    str += `<tr><td>電話:</td><td><input type="text" id="phoneNumber"></td></tr>`;
    str += `<tr><td>地址:</td><td><input type="text" id="address"></td></tr>`;
    str += `<tr><td></td><td style="text-align: right"><button id="doinsert">新增</button></td></tr>`;
    str += `</table>`;
    $("#content").html(str);
    $("#doinsert").click(function (e) { 
        doInsert();
    });
}