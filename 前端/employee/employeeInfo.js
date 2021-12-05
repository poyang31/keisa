import showInsertPage from "./showInsertPage.js";
import showUpdatePage from "./showUpdatePage.js";
import doDelete from "./doDelete.js";

export default function productInfo(){
    axios.get("index.php?action=getUsers")
    .then(res => {
        let response = res['data'];
        switch(response['status']){
            case 200:
                const rows = response['result'];
                let str = `<table border="1">`;
                str += `<tr style="text-align: center;"><td>員工編號</td><td>員工名稱</td><td>密碼</td><td>入職日期</td><td>住址</td><td>email</td><td>電話</td><td><button id='newUser'>新增使用者</button></td></tr>`;
                rows.forEach(element => {
                    str += `<tr>`;
                    str += `<td id='id'>` + element['id'] + `</td>`;
                    str += `<td>` + element['name'] + `</td>`;
                    str += `<td>` + element['password'] + `</td>`;
                    str += `<td>` + element['workdate'] + `</td>`;
                    str += `<td>` + element['address'] + `</td>`;
                    str += `<td>` + element['email'] + `</td>`;
                    str += `<td>` + element['phone'] + `</td>`;
                    str += `<td><button id='updateUser'>修改</button><button id='deleteUser'>刪除</button></td>`;
                    str += `</tr>`;
                });
                str += `</table>`;
                $("#content").html(str);

                $("#newUser").click(function (e) { 
                    showInsertPage();
                });
                const updateButtons = $("button[id=updateUser]");
                const deleteButtons = $("button[id=deleteUser]");
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
