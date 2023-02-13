const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const xhttp = new XMLHttpRequest();
const formatter = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'VND',
  
    // These options are needed to round to whole numbers if that's what you want.
    //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
    maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
  });


var loader = $('.loader');
var headerUnfixed = $('.header-unfixed');
var haederFixed = $('.header-wrapper-fixed');
var scrollToTop = $('.scroll-top');
var cartBtns = $$('.header__right-cart');
var cartOverlay = $('.cart-overlay');
var cartFixed = $('.cart-fixed');
var line = $('div.line');
var sectionNav = $$('.section-nav li');
var formInputs = $$('.form-gruop');
var toast = $('.toast');
var toastContent = $('.toast_content');
var toastCloseBtn = $('.toast span');
var sectionContent = $$('.section-content_text');
var userAvatas = $$('span.user-tie');
var userDropdownMenus = $$('.user-dropdown-menu-contain');
var submitBtn = $('.submit-btn');
var inputQuatinty = $('.input-quatinty input')
var inputMinus = $('.minus');
var inputPlus = $('.plus');
var btnsAddCartItem = $$('.add-cart-item');
var cartDetailTable = $('.cart-table');
var userLayouts = $$('.user-layout');
var imageAvataUpload = $('#img-upload');
var btnsConfirmOrder = $$('.btn-confirm-order');
var confirmModel = $('.confirm-model');
var cancelOrderModel = $('.cancel-model');
var btnsCancelOrder = $$('.btn-cancel-order');
var inputSortProduct = $('.sort-product-field');
var btnSubmitSearchProducts = $('.options_search button');
var submitFilter = $('.submit-filter');


const app = {

    defaultWidthLine: () => {
        line.style.left = sectionNav[0].offsetLeft + 'px';
        line.style.width = sectionNav[0].offsetWidth + 'px';
    },

    domeEventListener: () => {

        window.onload = () => {
            loader.classList.add('loader-hidden'); 
        }

        var oldScrollValue = 0;

        window.onscroll = () => {
            var newScrollValue = window.pageYOffset;
            if (newScrollValue > oldScrollValue) {
                app.handdleLogic.headerUnfixedOff();
                app.handdleLogic.haederFixedOn();
                if (newScrollValue > 100) {
                    app.handdleLogic.scrollToTopOn();
                }
            } else {
                if (newScrollValue < 40) {
                    app.handdleLogic.haederFixedOff();
                    app.handdleLogic.headerUnfixedOn();
                    app.handdleLogic.scrollToTopOff();
                    userLayouts[1] && userLayouts[1].classList.remove('active');
                }
            }

            oldScrollValue = newScrollValue;
        }

        scrollToTop.onclick = () => {
            app.handdleLogic.toTop();
        }

        for (var cartBtn of cartBtns) {
            cartBtn.onclick = () => {
                app.handdleLogic.openCartOverlay();
                setTimeout(app.handdleLogic.openCartFixed(), 200);
            }
        }

        cartOverlay.onclick = () => {
            app.handdleLogic.closeCartFixed();
            setTimeout(app.handdleLogic.closeCartOverlay(), 500);
        }

        sectionNav.forEach((sectionItem, index) => {
            sectionItem.onclick = () => {
                var sectionContentActive = $('.section-content_text.active');
                
                var SectionNavAccountActive = $('.section-nav-account li.active') || '';
                if (SectionNavAccountActive != '') {
                    SectionNavAccountActive.classList.remove('active');
                    sectionNav[index].classList.add('active');
                }

                sectionContentActive.classList.remove('active');
                sectionContent[index].classList.add('active');

                var lineLeft = sectionItem.offsetLeft + 'px';
                var LineWidth = sectionItem.offsetWidth + 'px';
            
                app.handdleLogic.changeDefaultWidthLine(lineLeft, LineWidth);
            }
        })

        toastCloseBtn.onclick = () => {
            toast.classList.remove('active');
        }

        userAvatas.forEach((userAvata, index) => {
            userAvata.onclick = () => {
                app.handdleLogic.changeStatusDropdown(index);
                userLayouts[index].classList.toggle('active');
            }
        })

        userLayouts.forEach((userLayout, index) => {
            userLayout.onclick = () => {
                app.handdleLogic.changeStatusDropdown(index);
                userLayouts[index].classList.toggle('active');
            }
        });

        if (submitBtn) {
            submitBtn.onclick = () => {
                submitBtn.innerHTML = '<div class="loader-btn"></div>';
                //submitBtn.setAttribute('disabled', true);
                console.log('submit');
            }
        }
        
        if (inputMinus) {
            inputMinus.onclick = () => {
                app.handdleLogic.handleInputQuantity('-', inputQuatinty);
            }
        }
        
        if (inputPlus) {
            inputPlus.onclick = () => {
                app.handdleLogic.handleInputQuantity('+', inputQuatinty);
            }
        }
        

        btnsAddCartItem.forEach((btnAddCartItem)=>{
            btnAddCartItem.onclick = () => {
                app.handdleLogic.addNewCartItem(btnAddCartItem.dataset.id, btnAddCartItem.dataset.method);
            }
        });

        cartFixed.onclick = (e) => {
            if (e.target.closest('.del-cart-item')) {
                app.handdleLogic.deleteCartItem(e.target.closest('.del-cart-item').dataset.id);
            }
            if (e.target.closest('.cart-fixed-close-btn')) {
                app.handdleLogic.closeCartFixed();
                setTimeout(app.handdleLogic.closeCartOverlay(), 500);
            }
        }
        

        if (cartDetailTable) {
            cartDetailTable.onclick = (e) => {
                if (e.target.closest('.del-cart-item')) {
                    app.handdleLogic.deleteCartItem(e.target.closest('.del-cart-item').dataset.id);
                }   
                if (e.target.closest('.product-save')) {
                     //
                }
                if (e.target.closest('.plus')) {
                    var input = e.target.parentElement.querySelector('input');
                    app.handdleLogic.handleInputQuantity('+', input);
                    var tr = input.parentElement.parentElement.parentElement;
                    app.handdleLogic.handlePriceCartItemUpdate(tr, input.value);
                } 
                if (e.target.closest('.minus')) {
                    var input = e.target.parentElement.querySelector('input');
                    app.handdleLogic.handleInputQuantity('-', input);
                    var tr = input.parentElement.parentElement.parentElement;
                    app.handdleLogic.handlePriceCartItemUpdate(tr, input.value);
                } 
                if (e.target.closest('#save-cart')) {
                    var id = e.target.dataset.id;
                    var quantity = e.target.parentElement.parentElement.querySelector('.quantity').value;
                    app.handdleLogic.editCartItem(id, quantity);
                }
            }
        }

        if (imageAvataUpload) {
            imageAvataUpload.onchange = () => {
                // imageAvataUpload.files[0] : lấy thông tin của file
                if (imageAvataUpload.files[0]) {

                    // khởi tạo interface File Reader
                    const reader = new FileReader();

                    reader.onload = () => {
                        $('.img-user img').setAttribute('src', reader.result);
                        // reader.result nội dung của file sau khi đã đọc xong ở dưới
                    }
                    
                    // bắt đầu đọc dữ liệu file, sau khi đọc xong reader.result sẽ là một url đại diện cho file đã được đọc
                    reader.readAsDataURL(imageAvataUpload.files[0]);
                }

                // FileReader sử dụng quy tắc bất đồng bộ.
            }
        }

        if (btnsConfirmOrder) {
            btnsConfirmOrder.forEach((btnConfirmOrder) => {
                btnConfirmOrder.onclick = () => {
                    $('.confirm-model').classList.add('active');
                    cartOverlay.classList.add('active');
                    $('.js-confirm-order').href = 'order/confirm/' + btnConfirmOrder.dataset.id;
                }
            });
        }

        if (btnsCancelOrder) {
            btnsCancelOrder.forEach((btnCancelOrder) => {
                btnCancelOrder.onclick = () => {
                    $('.cancel-model').classList.add('active');
                    cartOverlay.classList.add('active');
                    $('.js-cancel-order').href = 'order/cancel/' + btnCancelOrder.dataset.id;
                }
            });
        }

        if (inputSortProduct) {
            inputSortProduct.onchange = () => {
                inputSortProduct.classList.contains('sort-product-field-cate') ? app.handdleLogic.sortProductsOfCategory(inputSortProduct.value, inputSortProduct.dataset.id) : app.handdleLogic.sortProducts(inputSortProduct.value);
            }
        }

        if (btnSubmitSearchProducts) {
            btnSubmitSearchProducts.onclick = () => {
                content = $('.options_search input').value;
                var id = btnSubmitSearchProducts.classList.contains('cate-products') ?  $('.options_search input').dataset.id : '';
                if (content == '') {
                    toastContent.innerHTML = 'Vui lòng nhập tên sản phẩm bạn muốn tìm';
                    $('.toast').classList.add('toast-error');
                    app.toastShow();
                } else {
                   id ? app.handdleLogic.searchProductsOfCategory(content, id) : app.handdleLogic.searchProducts(content);
                }
                
                
            }
        }

        if (submitFilter) {
            submitFilter.onclick = () => {
                var priceStart = $('.price-start').innerText;
                var priceEnd = $('.price-end').innerText;
                var idCategory = submitFilter.dataset.id
                idCategory ? app.handdleLogic.filterProducstPriceOfCategory(priceStart, priceEnd, idCategory) : app.handdleLogic.filterProductsPrice(priceStart, priceEnd);
            }
        }

    },

    handdleLogic: {
        haederFixedOn: () => {
            haederFixed.classList.add('active');
        },
        haederFixedOff: () => {
            haederFixed.classList.remove('active');
            if (userDropdownMenus[1]) {
                userDropdownMenus[1].classList.remove('active');
            }
        },
        headerUnfixedOff: () => {
            headerUnfixed.classList.add('active');
            if(userDropdownMenus[0]) {
                userDropdownMenus[0].classList.remove('active');
                userLayouts[0].classList.remove('active');
            }
        },
        headerUnfixedOn: () => {
            headerUnfixed.classList.remove('active');
        },
        scrollToTopOn: () => {
            scrollToTop.classList.add('active');
        },
        scrollToTopOff: () => {
            scrollToTop.classList.remove('active');
        },
        toTop: () => {
            window.scrollTo({top: 0, behavior: 'smooth'});
        },
        openCartFixed: () => {
            cartFixed.classList.add('active');
        },
        openCartOverlay: () => {
            cartOverlay.classList.add('active');
        },
        closeCartFixed: () => {
            cartFixed.classList.remove('active');
        },
        closeCartOverlay: () => {
            cartOverlay.classList.remove('active');
            if (confirmModel.classList.contains('active')) {
                confirmModel.classList.remove('active')
            } else if (cancelOrderModel.classList.contains('active')) {
                cancelOrderModel.classList.remove('active')
            }

            
        },
        changeDefaultWidthLine: (left, width) => {
            line.style.left = left;
            line.style.width = width;
        },
        changeStatusDropdown: (index) => {
            userDropdownMenus[index].classList.toggle('active');
        },
        handlePriceCartItemUpdate: (tr, value) => {
            var newPrice = tr.querySelector('.js-product-price').dataset.price * value;
            tr.querySelector('.js-product-subtotal').innerText = formatter.format(newPrice);
        },
        
        // add new cart item get, post
        addNewCartItem: (id, method) => {
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var response = JSON.parse(this.responseText);
                    $('.cart-fixed').innerHTML = response['viewCartFixed'];
                    $$('.cart-count').forEach((item) => {item.innerHTML= '(' + response['quantity'] + ')'});
                    if (cartDetailTable) {
                        cartDetailTable.innerHTML = response['viewCartDetailTable'];
                    }
                    toastContent.innerHTML = 'sản phẩm mới đã được thêm vào giỏ hàng';
                    app.toastShow();
                }
            };
            
            xhttp.open(method, '/cart/add-cart-item/'+id, true);
            xhttp.send();
        },
        
        // render cart defaut when page is loaded
        indexDefaultCartItem: () => {
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var response = JSON.parse(this.responseText);
                    $('.cart-fixed').innerHTML = response['viewCartFixed'];
                    $$('.cart-count').forEach((item) => {item.innerHTML= '(' + response['quantity'] + ')'});
                    if (cartDetailTable) {
                        cartDetailTable.innerHTML = response['viewCartDetailTable'];
                        $('.cart-info-table').innerHTML = response['viewCartDetailInfo'];
                    }
                }
            };
            xhttp.open("GET", '/cart', true);
            xhttp.send();

        },

        // khi return response dưới dạng thông thường như view() thì laravel return dưới dạng chuỗi
        // còn khi return response dưới dạng mảng thì laravel sẽ auto chuyển đổi thành JSON sau đó return nó

        deleteCartItem: (id) => {
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var response = JSON.parse(this.responseText);
                    $('.cart-fixed').innerHTML = response['viewCartFixed'];
                    $$('.cart-count').forEach((item) => {item.innerHTML= '(' + response['quantity'] + ')'});
                    if (cartDetailTable) {
                        cartDetailTable.innerHTML = response['viewCartDetailTable'];
                        $('.cart-info-table').innerHTML = response['viewCartDetailInfo'];
                    }
                }
            };
            
            xhttp.open('GET', '/cart/del-cart-item/'+id, true);
            xhttp.send();
        },

        editCartItem: (id, quantity) => {
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    var response = JSON.parse(this.responseText);
                    $('.cart-fixed').innerHTML = response['viewCartFixed'];
                    $$('.cart-count').forEach((item) => {item.innerHTML= '(' + response['quantity'] + ')'});
                    if (cartDetailTable) {
                        cartDetailTable.innerHTML = response['viewCartDetailTable'];
                        $('.cart-info-table').innerHTML = response['viewCartDetailInfo'];
                    }
                    toastContent.innerHTML = 'giỏ hàng đã được cập nhật';
                    app.toastShow();
                }
            };
            
            xhttp.open('GET', '/cart/edit-cart-item/'+ id + '/' + quantity, true);
            xhttp.send();
        },

        sortProducts: (type) => {
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                   $('.row .products').innerHTML = this.responseText;
                }
            };

            xhttp.open('GET', '/products/sort/' + type, true);
            xhttp.send();
        },

        sortProductsOfCategory: (type, id) => {
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                   $('.row .products').innerHTML = this.responseText;
                }
            };

            xhttp.open('GET', '/category/' + id + '/products/sort/' + type, true);
            xhttp.send();
        },

        searchProducts: (content) => {
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                   $('.row .products').innerHTML = this.responseText;
                }
            };

            xhttp.open('GET', '/products/search/' + content, true);
            xhttp.send();
        },

        searchProductsOfCategory: (content, id) => {
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                   $('.row .products').innerHTML = this.responseText;
                }
            };

            xhttp.open('GET', '/category/' + id + '/products/search/' + content, true);
            xhttp.send();
        },

        filterProductsPrice: (priceStart, priceEnd) => {
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                   $('.row .products').innerHTML = this.responseText;
                }
            };

            xhttp.open('GET', '/products/filter/'+ priceStart +'/' + priceEnd, true);
            xhttp.send();
        },

        filterProducstPriceOfCategory: (priceStart, priceEnd, idCategory) => {
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    $('.row .products').innerHTML = this.responseText;
                }
            };

            xhttp.open('GET', '/category/' + idCategory + '/products/filter/' + priceStart + '/' + priceEnd, true);
            xhttp.send();
        },

        handleInputQuantity: (type, input) => {
            if (type == '-') {
                if (input.value == 1) {
                    return;
                } else {
                    input.value = input.value - 1;
                }
            } else {
                input.value = Number(input.value) + 1;
            }
        }
    },
    toastShow: () => {
        if (toastContent.innerHTML) {
            toast.classList.add('active');
        }

        setTimeout(() => {
            if (toast.classList.contains('active')) {
                toast.classList.remove('active');
            } else {
                return;
            }
        }, 5000)
    },

    start: () => {

        app.domeEventListener();
        app.toastShow();
        app.handdleLogic.indexDefaultCartItem();

        if (line) {
            app.defaultWidthLine()
        }

        
    }
}

app.start();