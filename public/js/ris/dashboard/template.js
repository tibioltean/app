var Template = function() {
  
    // ------------------------------------------------------------------------
  
    this.__construct = function() {
        console.log('Template Created @');
    };
    
    // ------------------------------------------------------------------------
    
    this.todo = function(obj) {
        var output = '';
        // Verific daca am taskul est completat cu 1 in db
        if(obj.completed == 1){
            output += '<div id="todo_'+ obj.todo_id +'" class="todo_complete">';

        }else{
            output += '<div id="todo_'+ obj.todo_id +'">';            
        }
        output += '<span>' + obj.content + '</span>';

       var data_completed = (obj.completed == 1 ) ? 0 :1 ;
       var data_completed_text = (obj.completed == 1 ) ? '<i class="icon-share-alt"></i>' : '<i class="icon-ok"></i>'; // pe afiare in link daca e complet sau nu
        output += '<a class="todo_update" data-id="' + obj.todo_id +  '" data-completed="'+ data_completed +'" href="api/update_todo">' + data_completed_text + '</a>';
  
      
        output += '<a data-id="' + obj.todo_id + '" class="todo_delete" href="api/delete_todo"><i class="icon-remove"></i></a>';
        output += '</div>';
        return output;
    };
    
    // ------------------------------------------------------------------------
    
    this.note = function(obj) {
        var output = '';
        output += '<div id="note_'+ obj.note_id +'">';
        output += '<span>' + obj.title + '</span>';
        output += '<span>' + obj.content + '</span>';
        output += '</div>';
        return output;
    };
    
    // ------------------------------------------------------------------------
    
    this.__construct();
    
};
