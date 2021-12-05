import doUpdate from './doUpdate.js';
export default function showUpdatePage(productID){
    let data = {
        "productID":productID,
    }

    axios.post("index.php?action=getProducts",Qs.stringify(data))
    .then(res => {
        let response = res['data'];
        switch (response['status']) {
            case 200:
                const rows = response['result'];
                const row = rows[0];
                let str = `<table>`;
                    str += `<tr><td>產品編號:</td><td><input type="text" id="productID" value="` + row['productID'] + `" disabled="disabled"></td></tr>`;
                    str += `<tr><td>產品名稱:</td><td><input type="text" id="productName" value="` + row['productName'] + `"></td></tr>`;
                    str += `<tr><td>成本:</td><td><input type="text" id="productCost" value="` + row['productCost'] + `"></td></tr>`;
                    str += `<tr><td>單價:</td><td><input type="text" id="unitprice" value="` + row['unitprice'] + `"></td></tr>`;
                    str += `<tr><td>數量:</td><td><input type="text" id="productCount" value="` + row['productCount'] + `"></td></tr>`;
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