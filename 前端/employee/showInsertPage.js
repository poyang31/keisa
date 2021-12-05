import doInsert from "./doInsert.js";

export default function showInsertPage(){
    let str = `<table>`;
    str += `<tr><td>員工姓名:</td><td><input type="text" id="name"></td></tr>`;
    str += `<tr><td>密碼:</td><td><input type="text" id="password"></td></tr>`;
    str += `<tr><td>入職日期:</td><td><input type="date" id="workdate"></td></tr>`;
    str += `<tr><td>地址:</td><td><input type="text" id="address"></td></tr>`;
    str += `<tr><td>email:</td><td><input type="text" id="email"></td></tr>`;
    str += `<tr><td>電話:</td><td><input type="text" id="phone"></td></tr>`;
    str += `<tr><td></td><td style="text-align: right"><button id="doinsert">新增</button></td></tr>`;
    str += `</table>`;
    $("#content").html(str);
    $("#doinsert").click(function (e) { 
        doInsert();
    });
}