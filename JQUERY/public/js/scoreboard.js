function addScore() {
    let numberWordsRight = $("#numberTotalWordsTyped").text();
    let nameUser = 'Eva Olegário de Souza Silva';
    let newColumn = newLineTable(numberWordsRight,nameUser);
    $("#tablePlacar tbody").prepend(newColumn);
}

function newLineTable(numberWords,nameUser){
    const line = $("<tr>");
    const columnUser = $("<td>").text(nameUser);
    const columnNumberWords = $("<td>").text(numberWords);
    const columnIconRemove = $("<td>");

    const link = $("<a>").addClass('deleteRowsScore').attr("href","#tablePlacar").attr("onclick","removeLineTable(this)");
    const icon = $("<i>").addClass('small').addClass("material-icons").text("delete");
    
    line.prepend(columnUser);
    line.append(columnNumberWords);
    line.append(columnIconRemove.append(link.append(icon)));

    return line;
}

// passa o this dentro da função click para especificar que aquele elmento    
removeLineTable = function(item) {
    //dentro do item closest => pega o primeiro tr
    var tr = $(item).closest('tr');
    tr.fadeOut(400, function() {
        tr.remove();  
    });  
    return false;
}