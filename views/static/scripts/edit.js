(function(){
        
    var buttons = {},
    edit_mode = false,
    introduction = document.getElementById('intro');
            
    [    
        ['cancel', 'Annuler', init],
        ['save',   'Enregistrer', save_edit],
        ['edit',   'Éditer', edit]    
    ]
    .forEach(function(b) 
    {
        buttons[b[0]] = document.createElement('button');
        buttons[b[0]].innerText = b[1];
        buttons[b[0]].onclick = b[2];
    });
    introduction.appendChild(buttons.edit);
                
    function edit() 
    {
    
        if (edit_mode) 
            return;
        edit_mode = true;
                          
        introduction.setAttribute('contenteditable', edit_mode);
        introduction.focus();
                                                            
        introduction.removeChild(buttons.edit);
        introduction.appendChild(buttons.save);
        introduction.appendChild(buttons.cancel);
    
    }
                    
    function init() 
    {
    
        if (!edit_mode)
            return;
        edit_mode = false;
                                                
        introduction.setAttribute('contenteditable', edit_mode);
                                                    
        introduction.removeChild(buttons.save);
        introduction.removeChild(buttons.cancel);
        introduction.appendChild(buttons.edit);        
        
    }
                        
    function save_edit() 
    {
    
        var text = introduction.innerText;
        init();
    
    }
                            

})();
