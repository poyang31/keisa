import doInsert from "./doInsert.js";

export default function showInsertPage(){
    let str = `<table>`;
    str += `<tr><td>產品名稱:</td><td><input type="text" id="productName"></td></tr>`;
    str += `<tr><td>成本:</td><td><input type="text" id="productCost"></td></tr>`;
    str += `<tr><td>單價:</td><td><input type="text" id="unitprice"></td></tr>`;
    str += `<tr><td>數量:</td><td><input type="text" id="productCount"></td></tr>`;
    str += `<tr><td></td><td style="text-align: right"><button id="doinsert">新增</button></td></tr>`;
    str += `</table>`;
    $("#content").html(str);
    $("#doinsert").click(function (e) { 
        doInsert();
    });
}