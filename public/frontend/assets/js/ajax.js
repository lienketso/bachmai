//ajax news letter page
jQuery(document).ready(function($) {
    $('#alert_success').hide();
    $('#btnNewsletter').on('click', function (e) {
        e.preventDefault();
        let mess = '';
        let email = $('input[name="email"]').val();
        let _this = $(e.currentTarget);
        let url = _this.attr('data-url');
        if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
            mess += '<p>Email address not valid !</p>';
        }
        if(mess.length <=0 ){
            $.ajax({
                type: "GET",
                url: url,
                data: {
                     email
                },
            })
                .done(function(res){
                    $('#alert_success').show();
                    $('#alert_success').html(res);
                    $('.alert-content').fadeOut(1000);
                    $('input[name="email"]').val('');
                })
                .always(function(resp) {
                    setTimeout(() => {
                    }, 2000)
                })
        }else{
            $('.alert-content').fadeIn(2000);
            $('.alert-content').html(mess);
        }

    });

    $('.clickReply').on('click',function(e){
        e.preventDefault();
        let _this = $(e.currentTarget);
        let parent = _this.attr('data-parent');
        $('#parentID').val(parent);
        $('#contentCM').focus();
    });
    $('.sp_content').hide();
    $('.sp_name').hide();
    $('.sp_mail').hide();
    $('#successComment').hide();
    $('#btnComment').on('click',function (e) {
        e.preventDefault();
        let _this = $(e.currentTarget);
        let parent = $('#parentID').val();
        let post_id = _this.attr('data-post-id');
        let post_type = _this.attr('data-post-type');
        let url = _this.attr('data-url');
        let mess = '';
        let content = $('#contentCM').val();
        let guest_name = $('#guestName').val();
        let guest_mail = $('#guestMail').val();

        if(content.length <= 0){
            mess += 'err';
            $('#contentCM').addClass('err_alert');
            $('.sp_content').show();
        }else{
            $('#contentCM').removeClass('err_alert');
            $('.sp_content').hide();
        }
        if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(guest_mail)){
            mess += 'err';
            $('#guestMail').addClass('err_alert');
            $('.sp_mail').show();
        }else{
            $('#guestMail').removeClass('err_alert');
            $('.sp_mail').hide();
        }
        if(guest_name.length <= 0){
            mess += 'err';
            $('#guestName').addClass('err_alert');
            $('.sp_name').show();
        }else{
            $('#guestName').removeClass('err_alert');
            $('.sp_name').hide();
        }

        if(mess.length <=0 ){
            $.ajax({
                type: "GET",
                url: url,
                data: {
                    parent,content,guest_name,guest_mail,post_id,post_type
                },
            })
                .done(function(res){
                //closed modal
                    $('#contentCM').val('');
                    $('#guestName').val('');
                    $('#guestMail').val('');
                    $('#partMessage').val('');
                    $('#successComment').show();
                    setTimeout(() => {
                        $('#successComment').hide();
                    }, 5000)
                })
        }

    });



});

