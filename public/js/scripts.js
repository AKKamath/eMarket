/* Javascript for Project 2
 *
 *  Features:
 *
 * 1)Donated items become white on hover while items for money become dark
 * 2)I obtain description of item from other page by ajax request
 * 3)If nothing is for sale in a particular category i change it by javascript
 * 4)There may be some misnamed variables
 *
 */


$(document).ready(function() {

    $("fieldset.text_area").css("width","400px");  //To solve the problem of textarea resizing
    $(document).find("table#myitems").hide();
    $("td.hidden").find("p").hide();
    $("td.hidden").attr("vis", 0);
    $("button.myButton").click(function(event) {
        event.stopPropagation();
        var $target1 = $(event.target);

        var $target = $target1.parent();

        $.ajaxSetup({
            async: false
        });

        if ($target.parent().find(".hidden").attr("vis") == 1) {
            $target.parent().find(".hidden").find("p").slideUp();
            $target.parent().find(".hidden").css("visibility", "collapse");
            $target.parent().find(".hidden").attr("vis", 0);

            $target.parent().find("#details").show();
        } else {

            var url = $target.parent().find(".hidden").find("a.cont").attr("href");
            console.log(url);


            if (undefined !== url) {
                $.get(url, function(data) {

                    if (typeof(data) === undefined) {
                        $target.parent().find(".hidden").find("p").html('<img alt="Loading" src="/img/ajax-loader.gif"/>');
                    }
                    var v = $(data).find("#description").text();
                    var contact = $(data).find("#contact").text();

                    var items = $(data).find("#link").attr("href");
                    var college = $target.parent().find(".hidden").find("b.college").text();
                    var date = $target.parent().find(".hidden").find("b.date").text();
                    var category = $target.parent().find(".hidden").find("b.category").text();
                    
                    //var more is the data in the popup from ajax request on clicking more_details
                    
                    var more = '<br><br><div class="popup"><b>more info</b><span class="popuptext" id="myPopup"><p>' + college + '</p><p>' + category +
                        '</p><p>' + date + '</p><a href="' +
                        url +
                        '">Contact Seller</a>' +
                        '<p>' + contact + '</p><br>' +
                        '<a href="' + items + '">More from this seller</a>' +
                        '</span></div>';

                    $target.parent().find(".hidden").find("p").html('<b>Description:</b><br><span style="font-family:courier">' + v + '</span>');
                    $target.parent().find(".hidden").find("p").append(more);

                });

            }
            $target.parent().find("#details").hide();


            $target.parent().find(".hidden").css("visibility", "visible");
            $target.parent().find(".hidden").show();
            $target.parent().find(".hidden").attr("vis", 1);
            $target.parent().find(".hidden").find("p").slideToggle();



        }
    });

    $("tr#table_row").mouseleave(function() {
        if ($(this).find(".hidden").attr("vis") == 1) {
            $(this).find(".hidden").find("p").slideUp();
            $(this).find(".hidden").hide();
            $(this).find(".hidden").attr("vis", 0);

        }

        $(this).find("#details").css("visibility", "visible");
        $(this).find("#details").show();
    });


    $(".recieved").on('click', '.popup', function() {

        $(this).find("#myPopup").toggle();

    });

    $(".recieved").on('mouseleave', function() {
        $(this).find("#myPopup").hide();

    });
    var blank = $(".tbl-content").html();                      //If nothing for sale

    if (blank && blank.length == 13) {
        console.log("Hi");
        $(".tbl-content").html('<tr id="table_row"><td style="text-align:center; font-family:sans-serif" colspan="4">Nothing for sale</td></tr>');
    }

    $("tr#table_row").hover(function() {
        if ($(this).find("#price").text() === "On Donation") {
            $(this).css("background-color", "rgba(255,255,255,0.7)");
        } else {
            $(this).css("background-color", "rgba(169,169,169,0.7)");
        }
    }, function() {
        $(this).css("background-color", "rgba(100,100,100,0.3)");
    });

    $.validate({
        form: '#RegisterF, #LoginF ,#postF'  //form validation using jquery since jquery was allowed to be used
    });

    $("button#myitems_button").click(function() {
        $(document).find("table#myitems").slideToggle("slow");
    });

})