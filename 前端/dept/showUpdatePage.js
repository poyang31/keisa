import doUpdate from './doUpdate.js';
export default function showUpdatePage(id){
    let data = {
        "deptID":deptID,
    }

    axios.post("index.php?action=getDepts",Qs.stringify(data))
    .then(res => {
        let response = res['data'];
        switch (response['status']) {
            case 200:
                const rows = response['result'];
                const row = rows[0];
                let str = `<table>`;
                    str += `<tr><td>角色編號:</td><td><input type="text" id="deptID" value="` + row['deptID'] + `" disabled="disabled"></td></tr>`;
                    str += `<tr><td>角色名稱:</td><td><input type="text" id="deptName" value="` + row['deptName'] + `"></td></tr>`;
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