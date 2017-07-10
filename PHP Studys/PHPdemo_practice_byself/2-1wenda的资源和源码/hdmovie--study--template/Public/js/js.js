
// //文章喜欢收藏操作js代码开始
// function user_like(obj){
// 	var aid = $(obj).attr('aid');
// 	var like = $(obj).attr('like');
// 	var num = $(obj).next('span').html();
// 	num = parseInt(num);
// 	if(!login){//如果没有登录，那么就不能收藏，直接返回
// 		return ;
// 	}

// 	if(like==0){
// 		$(obj).addClass('active');
// 		$(obj).attr('like',1);
// 		$(obj).next('span').html(num+1);
// 		$.post(CONTROLLER+"/like",{aid:aid},function(data){

// 			//收藏添加成功
// 		},'json');
// 	}else{
// 		$(obj).removeClass('active');
// 		$(obj).attr('like',0);
// 		$(obj).next('span').html(num-1);
// 		$.post(CONTROLLER+"/del_like",{aid:aid},function(data){
// 			//收藏删除成功
// 		},'json');
// 	}
// }
// //文章喜欢收藏操作js代码结束

