$(document).ready(function() { 
     $("#photo").fileinput({'showRemove':false,'showCancel': false});
    
    
//    
//	$('#photoimg').die('click').change(function() { 
//		$("#form").ajaxForm({target: '#preview', 
//			beforeSubmit:function(){ 
//				$("#imageloadstatus").show();
//				$("#imageloadbutton").hide();
//			}, 
//			success:function(){                                
//				$("#imageloadstatus").hide();
//				$("#imageloadbutton").show();
//                                
//			}, 
//			error:function(){ 
//				$("#imageloadstatus").hide();
//				$("#imageloadbutton").show();
//			} 
//		}).submit();
//	});
//        
//        $('#submitButton').click(function(){
//                  var msg   = $('#form').serialize();
////                  var imgIds = [];
////                  $(".imgList").each(function( i ){
////                      imgIds.push(this.id);
////                  });
//                console.log($('#form'));
//        $.ajax({            
//          type: 'POST',
//          url: '/admin/saveAjax',
//          data: msg,
//          success: function(data) {
////            location.reload();
//          },
//          error:  function(xhr, str){
//	    alert('Возникла ошибка: ' + xhr.responseCode);
//          }
//        });
//        });
//        
}); 