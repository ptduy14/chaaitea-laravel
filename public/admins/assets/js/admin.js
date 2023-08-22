// Toast show when have test
const toastBody = document.querySelector('.toast-body');
const toast = document.querySelector('.toast');
const btnsToastDelCate = document.querySelectorAll('.btn-toast-del-cate');
const btnsToastDelPro = document.querySelectorAll('.btn-toast-del-pro');
const formDel = document.querySelector('.form-delete');
const btnSubmitUpdate = document.querySelector('.js-btn-update');
const selectInputCate = document.querySelector('.js-select-input-cate');
const btnsToastUpdate = document.querySelectorAll('.btn-toast-update');
const inputField = document.querySelector('.js-input-field');
const sortType = document.querySelector('.sort_type');
const tableOrder = document.querySelector('.js-tbl-order');
const btnUpdateModel = document.querySelector('.btn-submit-update');
var statusField = null;
var btnsSaveChangeOrder = null;
const btnSubmitSearch = document.querySelector('.submit-search');
const btnSubmitPassword = document.querySelector('.btn-submit-password');
var btnsEditAdmin = document.querySelectorAll('.btn-edit-admin');
var btnsDelAdmin = document.querySelectorAll('.btn-del-admin');

const xhttp = new XMLHttpRequest();


const formActionDelCate = '/admin/category/';
const formActionDelPro = '/admin/product/';

function checkToast() {
    if (toastBody) {
        if (toastBody.textContent.trim()) {
            toast.classList.add('show');
        }
    }
}

window.onload = () => {
    checkToast();
    if (tableOrder) {
        renderData();
    }
}

btnsToastDelCate.forEach((btnToastDelCate) => {
    btnToastDelCate.onclick = () => {
        var valueId = btnToastDelCate.getAttribute('value');

        formDel.action = formActionDelCate + valueId;
    }
})

btnsToastDelPro.forEach((btnToastDelPro) => {
    btnToastDelPro.onclick = () => {
        var valueId = btnToastDelPro.getAttribute('value');

        formDel.action = formActionDelPro + valueId;
    }
})

if (btnSubmitUpdate) {
    btnSubmitUpdate.onclick = () => {
        selectInputCate.disabled = false;
    }
}

btnsToastUpdate.forEach((btnToastUpdate) => {
    btnToastUpdate.onclick = () => {
        var valueField = btnToastUpdate.getAttribute('value');
        inputField.value = valueField;

        console.log(inputField.value);
    }
})

if (sortType) {
    sortType.onchange = () => {
        sortOrder(sortType.value);
    } 
}

if (btnSubmitSearch) {
    btnSubmitSearch.onclick = () => {
        var searchType = document.querySelector('.search-type').value;
        var searchContent = document.querySelector('.search-input').value;
        if (searchContent == '') {
            document.querySelector('.toast-body').innerText = 'vui lòng nhập thông tin bạn muốn tìm kiếm';
            document.querySelector('.toast').classList.remove('bg-success');
            document.querySelector('.toast').classList.add('bg-danger')
            checkToast();
            return;
        }   
        
        if (btnSubmitSearch.classList.contains('btn-search-customer')) {
            searchCustomer(searchType, searchContent);
        } else if (btnSubmitSearch.classList.contains('btn-search-admin')) {
            searchAdmin(searchType, searchContent);
        } else {
            searchOrder(searchType, searchContent);
        }
    }
}

if (btnsEditAdmin) {
    btnsEditAdmin.forEach((item, index) => {
        item.onclick = () => {
            handleCheckInputPassword();
            document.querySelector('.admin-id').value = item.getAttribute("value");
            changeActionSubmitForm(item.dataset.action);    
        }
    });
}

if (btnsDelAdmin) {
    btnsDelAdmin.forEach((item) => {
        item.onclick = () => {
            handleCheckInputPassword(); 
            document.querySelector('.admin-id').value = item.getAttribute("value");
            changeActionSubmitForm(item.dataset.action);   
        }
    });
}

function changeActionSubmitForm(action) {
    document.querySelector('.modal-dialog > form').action = action;
}

function handleCheckInputPassword() {
        document.querySelector('.modal-body > input').onkeyup = () => {
        document.querySelector('.modal-body > input').value ? btnSubmitPassword.hidden = false : btnSubmitPassword.hidden = true;
    }
}

function searchOrder(searchType, searchContent) {
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            render(this.responseText);
        }
    };

    xhttp.open('GET', '/admin/order-search/' + searchType + '/' + searchContent, true);
    xhttp.send();
}

function searchCustomer(searchType, searchContent) {
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            render(this.responseText);
        }
    };

    xhttp.open('GET', '/admin/customer/search/'+searchType+'/'+searchContent, true);
    xhttp.send();
}

function searchAdmin(searchType, searchContent) {
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            render(this.responseText);
        }
    };

    xhttp.open('GET', '/admin/admin/search/'+searchType+'/'+searchContent, true);
    xhttp.send();

    console.log(searchContent, searchType);
}

function sortOrder(sortType) {
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            render(this.responseText);
        }
    };
    
    xhttp.open('GET', '/admin/order/sort/'+sortType, true);
    xhttp.send();
}

function renderData() {
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            render(this.responseText);
        }
    };
    
    xhttp.open('GET', '/admin/order/render', true);
    xhttp.send();
}

function render(data) {

    if (tableOrder) {
        tableOrder.innerHTML = data;
        statusField = document.querySelectorAll('.status_field');
        btnsSaveChangeOrder = document.querySelectorAll('.btn-save-change-order');
        
        statusField.forEach((fieldItem, index) => {
            var tr = fieldItem.parentElement.parentElement;
            fieldItem.onchange = () => {
                if (fieldItem.value == 'đang giao hàng') {
                    tr.querySelector('.btn-save-change-order').hidden = false;
                } else {
                    tr.querySelector('.btn-save-change-order').hidden = true;
                }
            }
        });
    } else if (document.querySelector('.table > tbody')) {
        document.querySelector('.table > tbody').innerHTML = data;
    }
    
}



if (tableOrder) {
    tableOrder.onclick = (e) => {
        if (e.target.closest('.btn-save-change-order')) {
            var id = e.target.closest('.btn-save-change-order').dataset.id;
            btnUpdateModel.dataset.id = id;
        }
    }
}

if (btnUpdateModel) {
    btnUpdateModel.onclick = () => {
        var status = btnUpdateModel.dataset.status;
        var id = btnUpdateModel.dataset.id;
        changeStatusOrder(status, id);
    }
}

function changeStatusOrder(status, id) {

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            render(this.responseText);
            toastBody.innerText = 'Order has been updated';
            checkToast();
        }
    };
    
    xhttp.open('GET', '/admin/order/' + id + '/' + status, true);
    xhttp.send();
}
