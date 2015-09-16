var Dashboard = function() {
  
    var self = this;
    // ------------------------------------------------------------------------
   
    this.__construct = function() {
        console.log('Dashboard Created @');
        Template = new Template();
        //console.log(Template.todo({todo_id:3242, content: "This is life"}));
        Event   = new Event();
        //Result  = new Result();
        load_todo();
    };
    
    // ------------------------------------------------------------------------
    
    var load_todo = function() {
        $.get('api/get_todo', function(o){

           //console.log(o.length);   

           //Afisare din db din Json obj in loop cu div            
           var output = '';
           for (var i = 0; i < o.length; i++){
                output += Template.todo(o[i]);
           } 
            //console.log(output);
            $("#list_todo").html(output); 
        },'json');
    };
    
    // ------------------------------------------------------------------------
    
    var load_note = function() {
        
    };
    
    // ------------------------------------------------------------------------
    
    this.__construct();
    
};
