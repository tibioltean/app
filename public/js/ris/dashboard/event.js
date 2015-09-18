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
                    Result.success('Adaugat cu succces');
                    var output = Template.todo(o.data[0]); // Aici vine raspunsul din DOM api create_todo variabila data
                    $("#list_todo").append(output);  // in loc de html(output) pun prepand pentru sortarea listei instant

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
        $("body").on('click','.todo_update', function(e){
            e.preventDefault();

            var self = $(this);  // acces inauntru $. POST-ului de mai jos

            // Atentie la todo_id era id simplu, iar cand ajungea in API nu il preluam corect cu post input si nu putea sa imi faca query in db
            var url = $(this).attr('href');
            var postData = {
                todo_id: $(this).attr('data-id'),            
                completed: $(this).attr('data-completed')
            }; // 'todo_id': merge si todo_id: in ex de mai sus

            //console.log(postData);

            $.post(url, postData, function(o){

                if(o.result == 1){
                   // Result.success('Saved'); //Suprascriu mesajul din Result Success .js - daca nu trimit rezultat se pun automat cel din !!! NU AM NEVOIE DE MESAJ PT SUCCES 
                    if(postData.completed == 1){
                        self.parent('div').addClass('todo_complete'); // daca las parents - atunci adauga lasa css la toate div-urile 
                        self.html('<i class="icon-share-alt">'); // Aici a fost uncomplete -- afiseaza pentru live cum sa arate dupa ce incarca template-ul
                        self.attr('data-completed', 0);                        
                    } else {

                        self.parent('div').removeClass('todo_complete'); // daca e completat dau remove la clasa
                        self.html('<i class="icon-ok"></i>'); // aici a fost Complete
                        self.attr('data-completed', 1);  
                    }

                } else {
                    Result.error('Nothing Updated'); // Suprascrie eroarea din Result.js
                }

            }, 'json');
        });
    };

    // ------------------------------------------------------------------------

    var update_note = function() {
        
    };
    
    // ------------------------------------------------------------------------
    
    // AM gasig problem era la .todo_delete
    var delete_todo = function() {
        $("body").on('click','.todo_delete', function(e){
        e.preventDefault();
        //alert('Intra in functie si activeza linkul');

        var self =$(this).parent('div');
        var url = $(this).attr('href');
        var postData = { 
            'todo_id' : $(this).attr('data-id') 
        };

        //console.log('!!*** Verficare');
        $.post(url, postData, function(o){

                if(o.result == 1){
                    Result.success('Item Deleted');
                    self.remove();
                     console.log('canci');
                }else {
                    Result.error(o.msg);
                }
         }, 'json');
     });
    };

    // ------------------------------------------------------------------------

    var delete_note = function() {
        
    };
    
    // ------------------------------------------------------------------------
    
    this.__construct();
    
};
