    /*---For Login and Sign-up----------------------------*/
    $(document).on('click','.user,.already-account',function(){
        $('.form').addClass('login-active').removeClass('sign-up-active')
    });
 
    $(document).on('click','.sign-up-btn',function(){
        $('.form').addClass('sign-up-active').removeClass('login-active')
    });
 
    $(document).on('click','.form-cancel',function(){
        $('.form').removeClass('login-active').removeClass('sign-up-active')
    });

