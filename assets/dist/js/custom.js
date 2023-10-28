function deleteItem() {
    if (confirm("Are you sure you want to delete ?")) {
        return true;
    }
    return false;
}

function statusUpdate(){
    if (confirm("Are you sure change the status ?")) {
        return true;
    }
    return false;
}

function confirmOrder() {
    if (confirm("Are you sure you want to confirmOrder ?")) {
        return true;
    }
    return false;
}

$(document).ready(function(){
    //Work Assign Status Update
     $('.addtoCart').click(function(){
        var userId = $('#user_name').val();
        if(userId != ""){
            var location = $('#distance').val();
            if(location != ""){
                var itemId = $(this).attr('id');
                var quantity = $('#qty_'+itemId).val();
                var price = $('#price_'+itemId).val();
                //alert(quantity)
                if(quantity != 0){
                    var url = baseurl+'cementOrders/additemtocart';
                    $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        data:{prod_type_id : itemId, quantity:quantity, user_id:userId, location:location, price: price },
                        success: function (res) {
                            console.log(res['status']);
                            if(res['status'] == "pass")
                            {
                                $("#popuperrorstatus").show();
                                $("#popuperrorstatus").attr("class","alert alert-success");
                                $("#popuperrorstatus").html(res['message']);
                            }
                            else
                            {
                                $("#popuperrorstatus").show();
                                $("#popuperrorstatus").attr("class","alert alert-danger");
                                $("#popuperrorstatus").html(res['message']);
                            }
                        }
                    });
                }else{
                    alert("Please select Quantity.");
                }
            }else{
                alert("Please select Distance.");
            }
        }else{
            alert("Please select customer.");
        }
    });

    $('.addtoCartBar').click(function(){
        var userId = $('#user_name').val();
         var location = $('#distance').val();
        if(userId != "" && location != ""){
            var itemId = $(this).attr('id');
            var aa = itemId.split("_");
            var gtotal = $('#grand_tot_'+aa[0]).val();
            var qtys = $('#qtyNum_'+aa[0]).val();
            var price = $('#qtyPrice_'+aa[0]).val();

            if(gtotal != 0){
                var url = baseurl+'cementOrders/addBaritemtocart';
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data:{prod_type_id : aa[1], quantity:qtys, user_id:userId, price: price, location:location },
                    success: function (res) {
                        console.log(res['status']);
                        if(res['status'] == "pass")
                        {
                            $("#popuperrorstatus").show();
                            $("#popuperrorstatus").attr("class","alert alert-success");
                            $("#popuperrorstatus").html(res['message']);
                        }
                        else
                        {
                            $("#popuperrorstatus").show();
                            $("#popuperrorstatus").attr("class","alert alert-danger");
                            $("#popuperrorstatus").html(res['message']);
                        }
                    }
                });
            }else{
                alert("Please select Quantity.");
            }
        }else{
            alert("Please select customer and location.");
        }
    });



    $('.addtoCartStone').click(function(){
        var userId = $('#user_name').val();
         var location = $('#distance').val();
        if(userId != "" && location != ""){
            var itemId = $(this).attr('id');
            var aa = itemId.split("_");
            var gtotal = $('#sgrand_tot_'+aa[0]).val();
            console.log(gtotal)
            var qtys = $('#sqtyNum_'+aa[0]).val();
            var price = $('#sqtyPrice_'+aa[0]).val();

            if(gtotal != 0){
                var url = baseurl+'cementOrders/addStoneitemtocart';
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data:{prod_type_id : aa[1], quantity:qtys, user_id:userId, price: price, location:location },
                    success: function (res) {
                        console.log(res['status']);
                        if(res['status'] == "pass")
                        {
                            $("#popuperrorstatus").show();
                            $("#popuperrorstatus").attr("class","alert alert-success");
                            $("#popuperrorstatus").html(res['message']);
                        }
                        else
                        {
                            $("#popuperrorstatus").show();
                            $("#popuperrorstatus").attr("class","alert alert-danger");
                            $("#popuperrorstatus").html(res['message']);
                        }
                    }
                });
            }else{
                alert("Please select Quantity.");
            }
        }else{
            alert("Please select customer and location.");
        }
    });

       

    //     $('.addItems').click(function(){
    //     var url = baseurl+'orderlist/additemstocart';
    //     $("#mtitle").html("Add New Oder");
    //     $.ajax({
    //         type: 'GET',
    //         url: url,
    //         beforeSend: function()
    //         {
    //             $("#viewdata").html("Please wait...");
    //         },
    //         success: function (result) {
    //             if(result){
    //                 $("#viewdata").html(result);
    //             }
    //         }
    //     });
    // });

    // $('.addCompany').click(function(){
    //     var url = baseurl+'bars/barCompany';
    //     $("#mtitle").html("Add New Company");
    //     $.ajax({
    //         type: 'GET',
    //         url: url,
    //         beforeSend: function()
    //         {
    //             $("#viewdata").html("Please wait...");
    //         },
    //         success: function (result) {
    //             if(result){
    //                 $("#viewdata").html(result);
    //             }
    //         }
    //     });
    // });


    $('.addProductType').click(function(){
        var url = baseurl+'otherproducts/createProductType';
        $("#mtitle").html("Create Product Type");
        $.ajax({
            type: 'GET',
            url: url,
            beforeSend: function()
            {
                $("#viewdata").html("Please wait...");
            },
            success: function (result) {
                if(result){
                    $("#viewdata").html(result);
                }
            }
        });
    });
    //     $('.addtoCartStone').click(function(){
    //     var userId = $('#user_name').val();
    //      var location = $('#distance').val();
    //     if(userId != "" && location != ""){
    //         var itemId = $(this).attr('id');
    //         var aa = itemId.split("_");
    //         var gtotal = $('#sgrand_tot_'+aa[1]).val();
    //         // console.log(gtotal)
    //         var qtys = $('#sqtyNum_'+aa[1]).val();
    //         var price = $('#sqtyPrice_'+aa[1]).val();

    //         // console.log(qtys);
    //         // console.log(price);

    //         // if(gtotal != 0){
    //             var url = baseurl+'cementOrders/addStoneitemtocart';
    //             $.ajax({
    //                 url: url,
    //                 type: 'POST',
    //                 dataType: 'json',
    //                 data:{prod_type_id : aa[1], quantity:qtys, user_id:userId, price: price, location:location },
    //                 success: function (res) {
    //                     console.log(res['status']);
    //                     if(res['status'] == "pass")
    //                     {
    //                         $("#popuperrorstatus").show();
    //                         $("#popuperrorstatus").attr("class","alert alert-success");
    //                         $("#popuperrorstatus").html(res['message']);
    //                     }
    //                     else
    //                     {
    //                         $("#popuperrorstatus").show();
    //                         $("#popuperrorstatus").attr("class","alert alert-danger");
    //                         $("#popuperrorstatus").html(res['message']);
    //                     }
    //                 }
    //             });
    //         // }else{
    //         //     alert("Please select Quantity.");
    //         // }
    //     }else{
    //         alert("Please select customer and location.");
    //     }
    // });
});

