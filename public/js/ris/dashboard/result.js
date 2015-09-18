var Result = function() {
  
    // ------------------------------------------------------------------------
  
    this.__construct = function() {
        console.log('Result Created @');
    };
    
    // ------------------------------------------------------------------------
    
    this.success = function(msg) {
      
        var dom = $("#success");

        if ( typeof msg === 'undefined' ) {
            $("#success").html('Success mesaj de succes').fadeIn();

        }
        $("#success").html(msg).fadeIn();
        setTimeout(function(){
            dom.fadeOut();
        }, 5000);
    };
    
    // ------------------------------------------------------------------------
    
    this.error = function(msg) {
        // variablia Jscript pentru a usura scrierea 
        var dom = $("#error");

        if(typeof msg === 'undefined'){
            $("#error").html('Error ').fadeIn();
        }

           if (typeof msg === 'object'){
                //loop

                var output ='<ul>';

                for (var key in msg){
                   
                    output += '<li>' + msg[key] + '</li>';
                }
                output +='</ul>';

                dom.html(output).fadeIn();
           } else{

                $("#error").html(msg).fadeIn();
           }
            setTimeout(function(){
                dom.fadeOut();
            }, 5000);
         
      
    };
    
    // ------------------------------------------------------------------------
    
    this.__construct();
    
};
