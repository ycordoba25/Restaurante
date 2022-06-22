</div>
<script>
    var listaMenu = document.querySelectorAll(".nav > .activar > li");
    var cadena = "<?= $_GET['url'] ?>";

    for (let i = 0; i < listaMenu.length; i++) {

        listaMenu[i].setAttribute("class", "");
        if (listaMenu[i].getAttribute("data-active") != null) {
            if (listaMenu[i].getAttribute("data-active").includes(cadena.split("/")[0])) {
                listaMenu[i].setAttribute("class", "active");
            }
        }
    }
</script>
<!--   Core JS Files   -->

<script>
    function multi() {
        var total = 0;

        $(".monto").each(function() {
            if (isNaN(parseFloat($(this).val()))) {
                total += 0;
            } else {
                total += parseFloat($(this).val());
            }
        });

        document.getElementById('Costo').innerHTML = total;
    }
</script>
<!-- <script src="public/js/core/jquery.min.js"></script>
<script src="public/js/core/popper.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<script src="<?= URL ?>public/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<!-- Chart JS -->
<!--  Notifications Plugin    -->
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?= URL ?>public/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="<?= URL ?>public/demo/demo.js"></script>
</body>

</html>