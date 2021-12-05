import startPage from './startPage.js';
import employeeInfo from './employee/employeeInfo.js';
import productInfo from './product/productInfo.js';
import deptInfo from './dept/deptInfo.js';
import supplierInfo from './supplier/supplierInfo.js';

$(document).ready(function () {
    $("#root").html(startPage());
    $("#employee").click(function (e) { 
        employeeInfo();
    });
    $("#product").click(function (e) { 
        productInfo();
    });
    $("#dept").click(function (e) { 
        deptInfo();
    });
    $("#supplier").click(function (e) { 
        supplierInfo();
    });
});