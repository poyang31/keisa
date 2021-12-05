import doUpdate from './doUpdate.js';
export default function showUpdatePage(id){
    let data = {
        "id":id,
    }

    axios.post("http://localhost/newMVC/backend/index.php?action=getUsers",Qs.stringify(data))
    .then(res => {
        let response = res['data'];
        switch (response['status']) {
            case 200:
                const rows = response['result'];
                const row = rows[0];
                let str = `<table>`;
                    str += `<tr><td>編號:</td><td><input type="text" id="id" value="` + row['id'] + `" disabled="disabled"></td></tr>`;
                    str += `<tr><td>員工姓名:</td><td><input type="text" id="name" value="` + row['name'] + `"></td></tr>`;
                    str += `<tr><td>密碼:</td><td><input type="text" id="password" value="` + row['password'] + `"></td></tr>`;
                    str += `<tr><td>入職日期:</td><td><input type="date" id="workdate" value="` + row['workdate'] + `"></td></tr>`;
                    str += `<tr><td>地址:</td><td><input type="text" id="address" value="` + row['address'] + `"></td></tr>`;
                    str += `<tr><td>email:</td><td><input type="text" id="email" value="` + row['email'] + `"></td></tr>`;
                    str += `<tr><td>電話:</td><td><input type="text" id="phone" value="` + row['phone'] + `"></td></tr>`;
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