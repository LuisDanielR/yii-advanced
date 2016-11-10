$(function(){
    
    $(document).on('click','.language',function(){
       var lang = $(this).attr('id');       
       $.post('index.php?r=site/language',{'lang':lang},function(data){
          location.reload();
       });
            
    });
    
    $(document).on('click','.fc-day',function(){
       var date = $(this).attr('data-date');
       alert(date);
       $.get('index.php?r=event/create',{'date':date},function(data){
             $('#modal').modal('show')
               .find('#modelContent')
               .html(data);});
    });
    
    $(document).on('click','.fc-day',function(){
       var date = $(this).attr('data-date');
       alert(date);
       $.get('index.php?r=event/create',{'date':date},function(data){
             $('#modal').modal('show')
               .find('#modelContent')
               .html(data);});
   });
    
   $('#modalButton').click(
           function(){       
                $('#modal').modal('show')
               .find('#modelContent')
               .load($(this).attr('value'));
   });
});

