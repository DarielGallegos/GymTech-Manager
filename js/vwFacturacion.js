document.getElementById("btnFlush").addEventListener('click', () => {
    var nodes = document.getElementById('contentTable');
    while(nodes.firstChild){
        nodes.removeChild(nodes.firstChild);
    }
});

function deleteElement(button) {
    var row = button.closest("tr");
    row.parentNode.removeChild(row);
}