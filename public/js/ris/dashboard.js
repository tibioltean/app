var Dashboard = function() {
  
    // ------------------------------------------------------------------------
  
    this.__construct = function() {
        console.log('Dashboard Created @');
        Template= new Template();
        //console.log(Template.todo({todo_id:3242, content: "This is life"}));
        Event   = new Event();
        Result  = new Result();
    };
    
    // ------------------------------------------------------------------------
    
    var load_todo = function() {
        
    };
    
    // ------------------------------------------------------------------------
    
    var load_note = function() {
        
    };
    
    // ------------------------------------------------------------------------
    
    this.__construct();
    
};
