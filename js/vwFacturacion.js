const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
    }
});

document.getElementById("btnFlush").addEventListener('click', () => {
    var nodes = document.getElementById('contentTable');
    while(nodes.firstChild){
        nodes.removeChild(nodes.firstChild);
    }
});

document.getElementById('addFact').addEventListener('click', () => {
    calcularDetalle();
});

function deleteElement(button) {
    var row = button.closest("tr");
    row.parentNode.removeChild(row);
}

function calcularDetalle(){
    /* 
        Pie de Factura
            ID_Factura
            efectivo - El monto con el que paga el cliente
            monto - El monto total a pagar
            cambio - devolucion al cliente
    */
    var nodes = document.getElementById('contentTable').childNodes;
    var subtotal = 0;
    var descuento = 0;
    var sobrecargo = 0;
    var total = 0;
    var idMembresia = 0;
    var idCliente = 0;
    var idConcepto = 0;
    var detalle = Array();
    var reg = {
        'idMembresia' : null,
        'idCliente' : null,
        'idConcepto' : null,
        'precio' : null,
        'sobrecargo' : null,
        'descuento' : null
    };
    for(i=0; i<nodes.length;i++){
        var list = nodes[i].childNodes;
        idMembresia = 0;
        idCliente = 0;
        idConcepto = 0;
        for(x=0; x<list.length-1; x++){
            if(list[x].localName === 'td'){
                //Validar que los select no esten vacios para sumar
                if(list[x].childNodes[1]){
                    var element = list[x].childNodes[1];
                    var select = element.childNodes;
                    if(select[1].id === 'idMembresia'){
                        idMembresia = parseInt(select[1].value);
                        reg['idMembresia'] = idMembresia;
                    }
                    if(select[1].id === 'idCliente'){
                        idCliente = parseInt(select[1].value);
                        reg['idCliente'] = idCliente;
                    }
                    if(select[1].id === 'idConcepto'){
                        idConcepto = parseInt(select[1].value);
                        reg['idConcepto'] = idConcepto;
                    }
                }
                if(idMembresia != 0 && idCliente != 0 && idConcepto != 0){
                    if(x===7){
                        subtotal += parseFloat(list[x].textContent);
                        reg['precio'] = parseFloat(list[x].textContent);
                    }
                    if(x===9){
                        sobrecargo += parseFloat(list[x].textContent);
                        reg['sobrecargo'] = parseFloat(list[x].textContent);
                    }
                    if(x===11){
                        descuento += parseFloat(list[x].textContent);
                        reg['descuento'] = parseFloat(list[x].textContent);
                    }
                    if(x===13){
                        total += parseFloat(list[x].textContent);
                    }    
                }
            }
        }
        if(reg['idMembresia'] != 0 && reg['idMembresia'] != null ){
            detalle.push(reg);
            var reg = {
                'idMembresia' : null,
                'idCliente' : null,
                'idConcepto' : null,
                'precio' : null,
                'sobrecargo' : null,
                'descuento' : null
            };
        }
    }
    var header = {
        'subtotal' : subtotal,
        'descuento' : descuento,
        'sobrecargo' : sobrecargo,
        'total' : total,
        'idEmpleado' : parseInt(document.getElementById('idEmpleado').value)
    }
    document.getElementById('pieFacSub').textContent = "Subtotal: "+subtotal+" Lps";
    document.getElementById('pieFacDesc').textContent = "Descuento: "+descuento+" Lps";
    document.getElementById('pieFacSobre').textContent = "Sobrecargo: "+sobrecargo+" Lps";
    document.getElementById('pieFacTot').textContent = "Total: "+total+" Lps";
    if(header['total'] > 0){
        Swal.fire({
            title : 'Formulario de Cobro',
            html: 
            `
                <form>
                    <label>El monto total es de: ${total} Lps</label>
                    <label>Ingrese el monto: </label>
                    <input type="number" id="monto">
                </form>
            `,
            showCancelButton: true,
            confirmButtonText: 'Procesar',
            cancelButtonText: 'Cancelar'
        }).then((e) => {
            if(e.isConfirmed){
                let monto = parseFloat(document.getElementById('monto').value);
                let cambio = monto - total;
                if(cambio >= 0){
                    document.getElementById('pieMonto').textContent = "Monto: "+monto+" Lps";
                    document.getElementById('pieCambio').textContent = "Cambio: "+cambio+" Lps";
                    Swal.fire({
                        icon: 'success',
                        html: ` <h2>Factura Completa</h2>
                                <p>Su cambio es de: ${cambio} Lps</p><br>
                                <p>Puede procesar la factura. ¿Desea continuar?</p>`,
                        showCancelButton: true,
                        confirmButtonText: 'Procesar',
                        cancelButtonText: 'Cancelar'
                    }).then((e) => {
                        if(e.isConfirmed){
                            let footer = {
                                'efectivo' : monto,
                                'monto' : total,
                                'cambio' : cambio
                            }
                            $.post('../controllers/ctrlFacturacion.php', {
                                peticion: 'insertFactura',
                                header: header,
                                detalle: detalle,
                                footer: footer
                            }).done((response) => {
                                if(response.status === 'success'){
                                    Toast.fire({
                                        icon: 'success',
                                        text: 'Factura insertada correctamente'
                                    }).then(() => {
                                        location.reload();
                                    })
                                }else{
                                    Toast.fire({
                                        icon: 'error',
                                        text: 'Error al insertar factura'
                                    })
                                }
                            }).fail((err) => {
                                Swal.fire({
                                    icon: 'error',
                                    text: err
                                })
                            })
                        }
                    })
                }else{
                    Toast.fire({
                        icon: 'error',
                        text: 'La cantidad ingresada es inferior a la solicitada. No se puede procesar la factura'
                    })
                }
            }
        })
    }else{
        Toast.fire({
            icon: 'info',
            text: 'Favor rellenar la factura'
        })
    }
}