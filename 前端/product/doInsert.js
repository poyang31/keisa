export default function doInsert(){
    let data = {
        "productName":$("#productName").val(),
        "productCost":$("#productCost").val(),
        "unitprice":$("#unitprice").val(),
        "productCount":$("#productCount").val(),
    }

    axios.post("index.php?action=newProduct",Qs.stringify(data))
    .then(res => {
        
        let response = res['data'];
        console.log(response);
        $("#content").html(response['message']);
    })
    .catch(err => {
        console.error(err); 
    })
}