<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="./Css/style.css">
        <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
        session_start();
        $_SESSION['username'] = 'Jorman Ramírez';
        ?>
        <div id="wrapper">
            <h1>Welcome chat system with php</h1>
            <div class="chat_wrapper">
                <div id="chat"></div>
                <form id="form" method="POST">
                    <textarea name="message" cols="30" rows="7" class="textarea" placeholder="Text Here..."></textarea>
                </form>   

            </div>
        </div>
        <script>
            showData();

            setInterval(function(){
                showData();
            }, 1000);
            
            function showData(){
                $.post('Business/chatBusiness.php?action=data', function(response){
                    
                    var scrollPos = $('#chat').scrollTop();
                    var scrollPos = parseInt(scrollPos)+340;
                    var scrollHeight = $('#chat').prop('scrollHeight');
                    $('#chat').html(response);
                    if(scrollPos < scrollHeight){
                        
                    }else{
                       $('#chat').scrollTop($('#chat').prop('scrollHeight')); 
                    }
                    
                });
            }//end showData
            
            $('.textarea').keyup(function(e){
                //alert('Something');
                //alert($(this).val());
                //alert(e.which);
                if(e.which === 13){
                    //alert('Enter has been pressed');
                    $('form').submit();
                }
            });

            $('form').submit(function(){
                //alert('Form is submitted using jquery');
                var message = $('.textarea').val();
                $.post('Business/chatBusiness.php?action=send&message='+message, function(response){
                    
                    if(response == 1){
                       showData();
                       //document.getElementById('form').reset(); //SIRVE
                        $('#form').trigger("reset");//SIRVE
                        
                    }//end if respons
                    
                });
                return false;
            });
        </script>
    </body>
</html>
