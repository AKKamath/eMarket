

$(document).ready(function(){
  
    
  
    $("td.hidden").find("p").hide();
    $("td.hidden").attr("vis",0);
    $("button").click(function(event){
        event.stopPropagation();
        var $target1= $(event.target);
        // console.log($target.parent().parent());
        var $target= $target1.parent();
        
        if( $target.parent().find(".hidden").attr("vis")==1){
            $target.parent().find(".hidden").find("p").slideUp();
             $target.parent().find(".hidden").css("visibility","collapse");
             $target.parent().find(".hidden").attr("vis",0);
            //  $target.parent().find(".hidden").attr("colspan",1);
             $target.parent().find("#details").show();
        }
        else{
            
            var url = $target.parent().find(".hidden").find("a.cont").attr("href");
             console.log(url);
            // var x;
            if(undefined!==url){
            $.get(url,function(data){
                // x=data;
                // console.log(x);
            var v =$(data).find("#description").text();
            var contact= $(data).find("#contact").text();
            // console.log(v);
            var items= $(data).find("#link").attr("href");
            var college= $target.parent().find(".hidden").find("b.college").text();
            var date= $target.parent().find(".hidden").find("b.date").text();
            var category= $target.parent().find(".hidden").find("b.category").text();
            var more = '<br><br><div class="popup"><b>more info</b><span class="popuptext" id="myPopup"><p>'+college+'</p><p>'+category
                         +'</p><p>'+date+'</p><a href="'
                         +url
                        +'">Contact Seller</a>'
                        +'<p>'+contact+'</p>'
                        +'<a href="'+items+'">More from this seller</a>'
                        +'</span></div>';
            
            
            
            // $target.parent().find(".hidden").attr("colspan",2);
            $target.parent().find(".hidden").find("p").html('<b>Description:</b><br><span style="font-family:courier">'+v+'</span>');
            $target.parent().find(".hidden").find("p").append(more);
            
            });
            }
            
            $target.parent().find("#details").hide();
           
            $target.parent().find(".hidden").find("p").slideToggle();
            $target.parent().find(".hidden").css("visibility","visible");
            $target.parent().find(".hidden").show();
            $target.parent().find(".hidden").attr("vis",1);
           
        }
    });
    
    $("tr#table_row").mouseleave(function(){
        if($(this).find(".hidden").attr("vis")==1){
            $(this).find(".hidden").find("p").slideUp();
            $(this).find(".hidden").hide();
            $(this).find(".hidden").attr("vis",0);
            
        }
        // $(this).find(".hidden").attr("colspan",1);
        $(this).find("#details").css("visibility","visible");
        $(this).find("#details").show();
    });
    
    
   $(".recieved").on('click','.popup',function(){
    //   var popup= $(".popup");
    //   console.log($(this));
    //   alert("i work");
        $(this).find("#myPopup").toggle();
       
   });
   
   $(".recieved").on('mouseleave',function(){
    //   var popup= $(".popup");
    //   console.log($(this));
    //   alert("i work");
        $(this).find("#myPopup").hide();
       
   });
   
   $("tr#table_row").hover(function(){
        if($(this).find("#price").text()==="On Donation")
        {
            $(this).css("background-color","rgba(0,255,0,0.7)");
        }
        else
        {
            $(this).css("background-color","rgba(255,0,0,0.7)");
        }
   },function(){
       $(this).css("background-color","rgba(169,169,169,0.3)");
   });
   
   $.validate({
       form:'#RegisterF, #LoginF ,#postF'
   });
        
})