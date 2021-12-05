import showInsertPage from "./showInsertPage.js";
import showUpdatePage from "./showUpdatePage.js";
import doDelete from "./doDelete.js";

export default function employeeInfo(){
    axios.get("http://localhost/newMVC/backend/index.php?action=getDepts")
    .then(res => {
        let response = res['data'];
        switch(response['status']){
            case 200:
                const rows = response['result'];
                let str = `<table border="1">`;
                str += `<tr style="text-align: center;"><td>角色編號</td><td>角色名稱</td><td><button id='newDept'>新增角色</button></td></tr>`;
                rows.forEach(element => {
                    str += `<tr>`;
                    str += `<td id='deptID'>` + element['deptID'] + `</td>`;
                    str += `<td>` + element['deptName'] + `</td>`;
                    str += `<td><button id='updateDept'>修改</button><button id='deleteDept'>刪除</button></td>`;
                    str += `</tr>`;
                });
                str += `</table>`;
                $("#content").html(str);

                $("#newDept").click(function (e) { 
                    showInsertPage();
                });
                const updateButtons = $("button[id=updateDept]");
                const deleteButtons = $("button[id=deleteDept]");
                const ids = $("td[id=deptID]");
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
