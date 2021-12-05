import doInsert from "./doInsert.js";

export default function showInsertPage(){
    let str = `<table>`;
    str += `<tr><td>角色名稱:</td><td><input type="text" id="deptName"></td></tr>`;
    str += `<tr><td></td><td style="text-align: right"><button id="doinsert">新增</button></td></tr>`;
    str += `</table>`;
    $("#content").html(str);
    $("#doinsert").click(function (e) { 
        doInsert();
    });
}