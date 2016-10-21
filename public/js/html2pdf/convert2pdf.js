function convert2pdf(element){
    var doc = new jsPDF('l', 'mm', [500, 300]);
    var selector = '#'+element;
    var elementHandler = {
        'selector': function (element, renderer) {
            return true;
        }
    };
    var source = window.document.getElementsByTagName("body")[0];
    doc.fromHTML(
        source,
        45,
        5,
        {
            'width': 400,'elementHandlers': elementHandler
        });

    doc.output('dataurlnewwindow');
}
