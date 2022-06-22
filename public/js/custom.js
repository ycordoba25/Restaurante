const categorias = document.getElementsByClassName("item-categoria");

for (i = 0; i < categorias.length; i++) {
  categorias[i].addEventListener("click", cargarProductos);
}

function cargarProductos(event) {
  var divProductos = document.getElementById("productos");
  divProductos.innerHTML = "";
  var url =
    "http://localhost/negro/productos/ObtenerProductosAjax/" +
    event.target.dataset.id;

  fetch(url)
    .then((response) => response.json())
    .then(function (data) {
      for (var i = 0; i < data.length; i++) {
        var div = document.createElement("div");
        div.className = "producto";
        div.textContent = data[i].nombre;
        div.dataset.id = data[i].id_producto;
        div.dataset.nombre = data[i].nombre;
        div.dataset.precio = data[i].precio;
        div.addEventListener("click", addToFactura);
        divProductos.appendChild(div);
      }
    });
}

function addToFactura(event) {
  var esta = document.getElementById(event.target.dataset.id);

  if (esta === null) {
    const tbodyFactura = document.getElementById("factura");

    const tr = document.createElement("tr");

    const tdId = document.createElement("td");
    tdId.textContent = event.target.dataset.id;
    tdId.className = "id";

    const tdCantidad = document.createElement("td");
    tdCantidad.textContent = 1;
    tdCantidad.id = event.target.dataset.id;
    tdCantidad.className = "cantidad";

    const tdDescripcion = document.createElement("td");
    tdDescripcion.textContent = event.target.dataset.nombre;
    tdDescripcion.className = "descripcion";

    const tdPrecio = document.createElement("td");
    tdPrecio.textContent = event.target.dataset.precio;
    tdPrecio.className = "precio";

    const tdEliminar = document.createElement("td");
    const imgEliminar = document.createElement("img");
    imgEliminar.src =
      "https://cdn.imgbin.com/15/4/14/imgbin-delete-key-logo-button-CxsMWPmWuFq6Bk7v63tLJJ83G.jpg";
    imgEliminar.width = 30;
    imgEliminar.style = "cursor: pointer";
    imgEliminar.addEventListener("click", removeProducto);
    imgEliminar.dataset.idProducto = event.target.dataset.id;
    tdEliminar.appendChild(imgEliminar);

    tr.appendChild(tdId);
    tr.appendChild(tdCantidad);
    tr.appendChild(tdDescripcion);
    tr.appendChild(tdPrecio);
    tr.appendChild(tdEliminar);
    tbodyFactura.appendChild(tr);
  } else {
    esta.textContent = parseInt(esta.textContent) + 1;
  }
  actualizarTotal();
}

function removeProducto(event) {
  const tdCantidad = document.getElementById(event.target.dataset.idProducto);
  const cantidad = parseInt(tdCantidad.textContent);
  if (cantidad > 1) {
    tdCantidad.textContent = parseInt(tdCantidad.textContent) - 1;
  } else {
    event.target.parentNode.parentNode.innerHTML = "";
  }
  actualizarTotal();
}

function actualizarTotal() {
  const precios = document.getElementsByClassName("precio");
  const cantidad = document.getElementsByClassName("cantidad");

  var suma = 0;
  for (var i = 0; i < precios.length; i++) {
    suma +=
      parseInt(precios[i].textContent) * parseInt(cantidad[i].textContent);
  }
  const h5Total = document.createElement("h5");
  h5Total.textContent = "total:     $ ";
  const spanTotal = document.createElement("span");
  spanTotal.id = "totalFinal";
  spanTotal.textContent = suma;

  h5Total.appendChild(spanTotal);

  const divTotal = document.getElementById("total");
  divTotal.innerHTML = "";
  divTotal.appendChild(h5Total);
}

const btn = document.getElementById("btn-aceptar");
btn.addEventListener("click", enviarForm);

function enviarForm() {
  const cliente = document.getElementById("cliente");
  const metodoPago = document.getElementById("metodoPago");
  const descripcion = document.getElementById("detalles");
  const total = document.getElementById("totalFinal");

  console.log("cliente: " + cliente.value);
  console.log("Metodo de pago: " + metodoPago.value);
  console.log("descripcion: " + descripcion.value);
  console.log("Totsl: " + total.value);

  console.log(obtenerProductos());
  let venta = {
    cliente: cliente.value,
    metodoPago: metodoPago.value,
    detalle: descripcion.value,
    total: total.textContent,
    productos: obtenerProductos(),
  };

  console.log("esta es la venta 1: " + venta);
  crearFomularioVenta(venta);

  const formularioVenta = document.getElementById("formularioVenta");

  formularioVenta.submit();
}

function crearFomularioVenta(venta) {
  console.log("esta es la venta: " + venta);

  const formulario = document.createElement("form");
  formulario.id = "formularioVenta";
  formulario.method = "POST";
  formulario.action = "http://localhost/negro/ventas/registrarVenta";
  const clienteInput = document.createElement("input");
  clienteInput.value = venta.cliente;
  clienteInput.name = "cliente_id";

  const metodoInput = document.createElement("input");
  metodoInput.value = venta.metodoPago;
  metodoInput.name = "metodoPago";

  const detalleInput = document.createElement("input");
  detalleInput.value = venta.detalle;
  detalleInput.name = "detalle";

  const totalInput = document.createElement("input");
  totalInput.value = venta.total;
  totalInput.name = "total";

  console.log(venta.productos);
  for (let i = 0; i < venta.productos.length; i++) {
    const productoInput = document.createElement("input");
    productoInput.value = venta.productos[i].id;
    productoInput.name = "productos[]";

    const cantidadInput = document.createElement("input");
    cantidadInput.value = venta.productos[i].cantidad;
    cantidadInput.name = "cantidades[]";

    formulario.appendChild(productoInput);
    formulario.appendChild(cantidadInput);
  }

  formulario.appendChild(clienteInput);
  formulario.appendChild(metodoInput);
  formulario.appendChild(detalleInput);
  formulario.appendChild(totalInput);

  const body = document.getElementById("ventaForm");
  body.appendChild(formulario);
}

function obtenerProductos() {
  const productos = [];
  const array = document.getElementsByClassName("descripcion");
  for (let i = 0; i < array.length; i++) {
    const producto = {
      id: document.getElementsByClassName("id")[i].textContent,
      cantidad: document.getElementsByClassName("cantidad")[i].textContent,
    };
    productos.push(producto);
  }
  return productos;
}
