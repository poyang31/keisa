export default function doInsert() {
    let data = {
        "supplierName": $("#supplierName").val(),
        "contactPerson": $("#contactPerson").val(),
        "phoneNumber": $("#phoneNumber").val(),
        "address": $("#address").val()
    }

    axios.post("http://localhost/newMVC/backend/index.php?action=newSupplier", Qs.stringify(data))
        .then(res => {

            let response = res['data'];
            console.log(response);
            $("#content").html(response['message']);
        })
        .catch(err => {
            console.error(err);
        })
}