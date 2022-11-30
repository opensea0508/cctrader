$(document).ready(function(){ 
    var userArray, text;

    $(document).on("click", "#canReq", function(){
        userArray = {
            'id':$(this).attr('data-id'), 
            "amount":$(this).attr('data-amount')
        };
        text = 'Press yes button to Cancel...'
        newMagic("Are you sure?", text, 'ajax-success', 'canReq', userArray, "Cancelled!",'');
    })

    // $(document).on("click", "#approveReq", function(){
        // userArray = {
        //     'id':$(this).attr('data-id'),
        //     'userid':$(this).attr('data-uid'),
        //     "email":$(this).attr('data-email'),
        //     "status":$(this).attr('data-status')
        // };
    //     let status = userArray.status =="approve"?"Approved!":"Rejected!";
    //     text = 'Press yes button to continue...'
    //     newMagic("Are you sure?", text, 'ajax-success', 'approveReq', userArray, status,'');
    // })

    // $(document).on("click", "#verifyAccount", function(){
    //     userArray = { 
    //         'userid':$(this).attr('data-id'),
    //         "email":$(this).attr('data-email')
    //     }; 
    //     let status = "Verified!";
    //     text = 'Press yes button to continue...'
    //     newMagic("Are you sure?", text, 'ajax-success', 'verifyAccount', userArray, status,'');
    // })
})





