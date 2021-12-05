import doUpdate from './doUpdate.js';
export default function showUpdatePage(supplierID){
    let data = {
        "supplierID":supplierID,
    }

    axios.post("index.php?action=getSuppliers",Qs.stringify(data))
    .then(res => {
        let response = res['data'];
        switch (response['status']) {
            case 200:
                const rows = response['result'];
                const row = rows[0];
                let str = `<table>`;
                    str += `<tr><td>供應商編號:</td><td><input type="text" id="supplierID" value="` + row['supplierID'] + `" disabled="disabled"></td></tr>`;
                    str += `<tr><td>供應商名稱:</td><td><input type="text" id="supplierName" value="` + row['supplierName'] + `"></td></tr>`;
                    str += `<tr><td>聯絡人:</td><td><input type="text" id="contactPerson" value="` + row['contactPerson'] + `"></td></tr>`;
                    str += `<tr><td>電話:</td><td><input type="text" id="phoneNumber" value="` + row['phoneNumber'] + `"></td></tr>`;
                    str += `<tr><td>地址:</td><td><input type="text" id="address" value="` + row['address'] + `"></td></tr>`;
                    str += `<tr><td></td><td style="text-align: right"><button id="doUpdate">修改</button></td></tr>`;
                    str += `</table>`;
                $("#content").html(str);
                $("#doUpdate").click(function (e) { 
                    doUpdate();
                });
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