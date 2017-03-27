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
             $target.parent().find(".hidden").attr("vis",0);
           
        }
        else{
            
            var url = $target.parent().find(".hidden").find("a").attr("href");
            // console.log(url.length);
            // var x;
            if(undefined!==url){
            $.get(url,function(data){
                // x=data;
                // console.log(x);
            var v =$(data).find("#description").text();
            console.log(v);
            $target.parent().find(".hidden").find("p").html('<b>Description:</b><br><span style="font-family:courier">'+v+'</span>');
            $target.parent().find(".hidden").find("p").append('<br><a href='+url+'>Contact Seller</a>');
            });
            }
            
            
           
            $target.parent().find(".hidden").find("p").slideToggle();
            $target.parent().find(".hidden").attr("vis",1);
           
        }
    });
    
    $("tr#table_row").mouseleave(function(){
        if($(this).find(".hidden").attr("vis")==1){
            $(this).find(".hidden").find("p").slideUp();
            $(this).find(".hidden").attr("vis",0);
            
        } 
    });
        
})