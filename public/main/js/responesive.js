const navBtn = $('.nav-icon-btn');
const navMobile = $('.header-responesive > nav');
const navBtnsSub = $$('.header-nav > li > .header-inner-sub > svg');
const navMobileSub = $$('.header-nav > li > nav');

var heightOfNavMobile = 0;

const appResponsive = {
    
    domEvent: () => {
        if (navBtn) {
            var iconNavLine = $$('.nav-icon-line');
            navBtn.onclick = () => {
                iconNavLine[0].classList.toggle('open');
                iconNavLine[1].classList.toggle('open');
                iconNavLine[2].classList.toggle('open');

                navMobile.offsetHeight > 0 ? navMobile.style.height = 0 + 'px' : navMobile.style.height = 'auto';
            }
            
            navBtnsSub.forEach((navBtnSub, index)=> {
                navBtnSub.onclick = () => {
                    navBtnSub.classList.toggle('open');
                    navMobileSub[index].offsetHeight > 0 ? navMobileSub[index].style.height = 0 + 'px' : navMobileSub[index].style.height = 'auto';
                }
            });
        }
    },

    start: () => {
        appResponsive.domEvent();

    }
}

appResponsive.start();