

$(document).ready(function(){
   
	$('.hidden').eq(0).show();
	// tab选项卡切换
	var zindex = 0;
    $('.tab_menu li a').click(function(){
    	 zindex++;
    	 var id = '#'+$(this).attr('tab');
    	 $(this).parent().siblings('li').find('a').removeClass('action');
    	 $(this).addClass('action');
		 $('.hidden').hide();
    	 $(id).show();

    });
//******************权限控制**************
    $('input[level=1]').click(function(){
        var inputs = $(this).parents('.rbac_app').find('input');
        $(this).attr('checked') ? inputs.attr('checked','checked'):inputs.removeAttr('checked');
    });
    $('input[level=2]').click(function(){
        var inputs = $(this).parents('.rbac_control').find('input');
        $(this).attr('checked') ? inputs.attr('checked','checked'):inputs.removeAttr('checked');
    });

});
var addAllNum = 0;//全选反选切换计数  
 //全选
function addAll(){
    addAllNum++;
    if(addAllNum%2==0){
        $("input[name='check_id[]']").removeAttr('checked'); 
    }else{
        $("input[name='check_id[]']").attr('checked','checked');
    }
   
   return false;
}

// 反选
function back(){
    var checked = $("input[name='check_id[]']:checked");
    $("input[name='check_id[]']").attr('checked','checked')
    checked.removeAttr('checked');
   
}

function sort(){
    var data = $('form').serialize();
    $.post('sort',data, function(data, textStatus, xhr) {
        if(data){
            var url = 'index';
            location.href = url;
        }
    });

}


