import showInsertPage from "./showInsertPage.js";
import showUpdatePage from "./showUpdatePage.js";
import doDelete from "./doDelete.js";

export default function employeeInfo(){
    axios.get("index.php?action=getProducts")
    .then(res => {
        let response = res['data'];
        switch(response['status']){
            case 200:
                const rows = response['result'];
                let str = `<table border="1">`;
                str += `<tr style="text-align: center;"><td>產品編號</td><td>產品名稱</td><td>成本</td><td>單價</td><td>數量</td><td><button id='newProduct'>新增產品</button></td></tr>`;
                rows.forEach(element => {
                    str += `<tr>`;
                    str += `<td id='id'>` + element['productID'] + `</td>`;
                    str += `<td>` + element['productName'] + `</td>`;
                    str += `<td>` + element['productCost'] + `</td>`;
                    str += `<td>` + element['unitprice'] + `</td>`;
                    str += `<td>` + element['productCount'] + `</td>`;
                    str += `<td><button id='updateProduct'>修改</button><button id='deleteProduct'>刪除</button></td>`;
                    str += `</tr>`;
                });
                str += `</table>`;
                $("#content").html(str);

                $("#newProduct").click(function (e) { 
                    showInsertPage();
                });
                const updateButtons = $("button[id=updateProduct]");
                const deleteButtons = $("button[id=deleteProduct]");
                const ids = $("td[id=id]");
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
