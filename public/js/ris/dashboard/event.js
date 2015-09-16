var Event = function() {
  
    // ------------------------------------------------------------------------
  
    this.__construct = function() {
        console.log('Event Created @');
        Result = new Result();
        create_todo();
        create_note();
        update_todo();
        update_note();
        delete_todo();
        delete_note();
    };
    
    // ------------------------------------------------------------------------
    
    var create_todo = function() {
        $("#create_todo").submit(function(evt) {
           // console.log('create_todo clicked');
            evt.preventDefault();

            var url = $(this).attr('action');
            var postData = $(this).serialize();

            $.post(url , postData, function(o){
                if (o.result == 1){
                    Result.success('test');
                    var output = Template.todo(o.data[0]); // Aici vine raspunsul din DOM api create_todo variabila data
                    $("#list_todo").append(output);  // in loc de html(output) pun prepand

                }else{

                    Result.error(o.error);

                }
            }, 'json');
        });
    };
    
    // ------------------------------------------------------------------------
    
    var create_note = function() {
        $("#create_note").submit(function(evt) {
            console.log('create_note clicked');
            return false;
        });
    };
    
    // ------------------------------------------------------------------------
    
    var update_todo = function() {
        
    };

    // ------------------------------------------------------------------------

    var update_note = function() {
        
    };
    
    // ------------------------------------------------------------------------
    
    var delete_todo = function() {
        
    };

    // ------------------------------------------------------------------------

    var delete_note = function() {
        
    };
    
    // ------------------------------------------------------------------------
    
    this.__construct();
    
};
