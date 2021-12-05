import showInsertPage from "./showInsertPage.js";
import showUpdatePage from "./showUpdatePage.js";
import doDelete from "./doDelete.js";

export default function employeeInfo(){
    axios.get("http://localhost/newMVC/backend/index.php?action=getSuppliers")
    .then(res => {
        let response = res['data'];
        switch(response['status']){
            case 200:
                const rows = response['result'];
                let str = `<table border="1">`;
                str += `<tr style="text-align: center;"><td>供應商編號</td><td>供應商名稱</td><td>聯絡人</td><td>電話</td><td>地址</td><td><button id='newSupplier'>新增供應商</button></td></tr>`;
                rows.forEach(element => {
                    str += `<tr>`;
                    str += `<td id='supplierID'>` + element['supplierID'] + `</td>`;
                    str += `<td>` + element['supplierName'] + `</td>`;
                    str += `<td>` + element['contactPerson'] + `</td>`;
                    str += `<td>` + element['phoneNumber'] + `</td>`;
                    str += `<td>` + element['address'] + `</td>`;
                    str += `<td><button id='updateSupplier'>修改</button><button id='deleteSupplier'>刪除</button></td>`;
                    str += `</tr>`;
                });

                str += `</table>`;
                $("#content").html(str);

                $("#newSupplier").click(function (e) { 
                    showInsertPage();
                });
                const updateButtons = $("button[id=updateSupplier]");
                const deleteButtons = $("button[id=deleteSupplier]");
                const ids = $("td[id=supplierID]");
                updateButtons.click(function(e){
                    const idx = updateButtons.index($(this));
                    showUpdatePage(ids[idx].innerText);
                })
                deleteButtons.click(function(e){
                    const idx = deleteButtons.index($(this));
                    doDelete(ids[idx].innerText);
                })
                
                break;
            default:
                $("#content").html(response['message']);
                break;
        }
    })
    .catch(err => {
        console.error(err); 
    }) 
}
