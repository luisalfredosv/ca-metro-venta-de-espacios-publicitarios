$(document).ready(function() {
            // Filtrar input
        $(".numero").keyup(function (){
        this.value = (this.value + '').replace(/[^0-9]/g, '');
        });

        $(".letras").keyup(function () {
        this.value=(this.value + '').replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚ\s]/g, '');
        });            
              
        $(".buscador").keyup(function () {
        this.value=(this.value + '').replace(/[^a-z0-9A-ZñÑáéíóúÁÉÍÓÚ\s]/g, '');
        }); 

        $(".nom_emp").keyup(function () {
        this.value=(this.value + '').replace(/[^a-z0-9A-ZñÑáéíóúÁÉÍÓÚ\s]/g, '');
        });


        $(".codigo").keyup(function() {
        $(this).val($(this).val().toUpperCase());
        this.value=(this.value + '').replace(/[^a-z0-9A-ZñÑáéíóúÁÉÍÓÚ-\s]/g, '');
        });

        $(".correo").keyup(function() {
        this.value=(this.value + '').replace(/[^@._*+#a-z0-9A-ZñÑáéíóúÁÉÍÓÚ-\s]/g, '');
        });

        $(".cod_bien").keyup(function() {
        this.value=(this.value + '').replace(/[^@a-z0-9A-ZñÑáéíóúÁÉÍÓÚ-\s]/g, '');
        });

        // $(".rif").keyup(function (){
        // //$(this).val($(this).val().toUpperCase());
        // // /[^VEPGJC]{1}[\d]{10}$/g
        // //var re = /[^A-Z]{1}[\d]{10}$/g;
        // var re = /[\d]{9}\S/g;
        // this.value = (this.value + '').replace(re, '');
        // });

        $(".telf").keyup(function (){
        this.value = (this.value + '').replace(/[^0-9]/g, '');
        });

        $(".alfa").keyup(function (){
        this.value = (this.value + '').replace(/[^a-z0-9A-ZñÑáéíóúÁÉÍÓÚ.,:°#-\s]/g, '');
        });
        
        $(".dinero").keyup(function (){
        this.value = (this.value + '').replace(/[^0-9.,]/g, '');
        });
});