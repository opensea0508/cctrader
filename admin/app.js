$(document).ready(function(){ 
    var userArray, text;

    $(document).on("click", "#banUser", function(){
        userArray = {
            'userid':$(this).attr('data-id'),
            "email":$(this).attr('data-email'),
            "status":$(this).attr('data-status')
        };
        let status = userArray.status =="banned"?"Banned!":"Activated!";
        text = 'Press yes button to continue...'
        newMagic("Are you sure?", text, 'ajax-success', 'Ban', userArray, status,'');
    })

    $(document).on("click", "#setAsTrader", function(){
        userArray = {
            'userid':$(this).attr('data-id'),
            "email":$(this).attr('data-email'),
            "status":$(this).attr('data-status')
        };
        let status = userArray.status =="client"?"Became A Trader. Congrats!":"You are no longer a trader";
        text = 'Press yes button to continue...'
        newMagic("Are you sure?", text, 'ajax-success', 'Trader', userArray, status,'');
    })

    $(document).on("click", "#setTrader", function(){
        userArray = {
            'id':$(this).attr('data-id'),
            "userid":$(this).attr('data-userid'),
            "email":$(this).attr('data-email'),
            "status":$(this).attr('data-status')
        };
        let status = userArray.status =="client1"?"Congrats":"";
        text = 'Press yes button to continue...'
        newMagic("Are you sure?", text, 'ajax-success', 'SetTrader', userArray, status,'');
    })

    $(document).on("click", "#setReferer", function(){
        userArray = {
            'id':$(this).attr('data-id'),
            "userid":$(this).attr('data-userid'),
            "email":$(this).attr('data-email'),
            "status":$(this).attr('data-status')
        };
        let status = userArray.status =="client1"?"Congrats":"";
        text = 'Press yes button to continue...'
        newMagic("Are you sure?", text, 'ajax-success', 'SetReferer', userArray, status,'');
    })

    $(document).on("click", "#approveReq", function(){
        userArray = {
            'id':$(this).attr('data-id'),
            'userid':$(this).attr('data-uid'),
            "email":$(this).attr('data-email'),
            "status":$(this).attr('data-status')
        };
        let status = userArray.status =="approve"?"Approved!":"Rejected!";
        text = 'Press yes button to continue...'
        newMagic("Are you sure?", text, 'ajax-success', 'approveReq', userArray, status,'');
    })

    $(document).on("click", "#verifyAccount", function(){
        userArray = { 
            'userid':$(this).attr('data-id'),
            "email":$(this).attr('data-email')
        }; 
        let status = "Verified!";
        text = 'Press yes button to continue...'
        newMagic("Are you sure?", text, 'ajax-success', 'verifyAccount', userArray, status,'');
    })



    $(document).on("click", "#paidDepo", function(){
        userArray = {
            'id':$(this).attr('data-id'), 
            'user':$(this).attr('data-user'), 
            'email':$(this).attr('data-email'), 
            "amount":$(this).attr('data-amount')
        };
        text = 'Press yes button to continue...'
        newMagic("Are you sure?", text, 'ajax-success', 'paidDepo', userArray, "Paid!",'');
    })

    $(document).on("click", "#canDepo", function(){
        userArray = {
            'id':$(this).attr('data-id'), 
            'user':$(this).attr('data-user'), 
            'email':$(this).attr('data-email'), 
            "amount":$(this).attr('data-amount')
        };
        text = 'Press yes button to Cancel...'
        newMagic("Are you sure?", text, 'ajax-success', 'canDepo', userArray, "Cancelled!",'');
    })



    $(document).on("click", "#paidReq", function(){
        userArray = {
            'id':$(this).attr('data-id'), 
            'user':$(this).attr('data-user'), 
            'email':$(this).attr('data-email'), 
            "amount":$(this).attr('data-amount')
        };
        text = 'Press yes button to continue...'
        newMagic("Are you sure?", text, 'ajax-success', 'paidReq', userArray, "Paid!",'');
    })


    $(document).on("click", "#canReq", function(){
        userArray = {
            'id':$(this).attr('data-id'), 
            'user':$(this).attr('data-user'), 
            'email':$(this).attr('data-email'), 
            "amount":$(this).attr('data-amount')
        };
        text = 'Press yes button to Cancel...'
        newMagic("Are you sure?", text, 'ajax-success', 'canReq', userArray, "Cancelled!",'');
    })

    $(document).on("click", "#paidComReq", function(){
        userArray = {
            'id':$(this).attr('data-id'), 
            'user':$(this).attr('data-user'), 
            'email':$(this).attr('data-email'), 
            "amount":$(this).attr('data-amount')
        };
        text = 'Press yes button to continue...'
        newMagic("Are you sure?", text, 'ajax-success', 'paidComReq', userArray, "Paid!",'');
    })


    $(document).on("click", "#canComReq", function(){
        userArray = {
            'id':$(this).attr('data-id'), 
            'user':$(this).attr('data-user'), 
            'email':$(this).attr('data-email'), 
            "amount":$(this).attr('data-amount')
        };
        text = 'Press yes button to Cancel...'
        newMagic("Are you sure?", text, 'ajax-success', 'canComReq', userArray, "Cancelled!",'');
    })


    $(document).on("click", "#deleteNid", function(){
        userArray = $(this).attr('data-id')
        text = 'Press yes button to delete...'
        newMagic("Are you sure?", text, 'ajax-success', 'deleteNid', userArray, "Deleted!",'');
    })


    $(document).on("click", "#sendTest", function(){
        userArray = {
            'name':$(this).attr('data-name'), 
            'email':$(this).attr('data-email') 
        };
        text = 'Press yes button to send this message...'
        newMagic("Send Margin Email Notification ?", text, 'controller', 'sendTest', userArray, "Message Sent!",'');
    })

    $(document).on("click", "#deleteCourse", function(){
        userArray = {
            'id':$(this).attr('data-id'), 
            'img':$(this).attr('data-img') 
        };
        text = 'Press yes button to delete...'
        newMagic("Are you sure?", text, 'ajax-success', 'deleteCourse', userArray, "Deleted!",'no', 'courses');
    })



})





