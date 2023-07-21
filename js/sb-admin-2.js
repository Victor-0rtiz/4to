(function ($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  $("#sidebarToggle, #sidebarToggleTop").on('click', function (e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
  });


  $("#formUsuario").submit(function (event) {
    // Prevenir el comportamiento predeterminado del formulario (no se recargará la página)
    event.preventDefault();

    // Obtener los valores de los campos del formulario
    const nombre = $("#nombreuser").val();
    const apellido = $("#apellidouser").val();
    const usuario = $("#Usuariouser").val();
    const contra = $("#Contrauser").val();
    const fechaNacimiento = $("#fecha_nacimientouser").val();
    const celular = $("#Celularuser").val();
    const tipoUsuario = $("#Tipo_usuariouser").val();

    // Crear un objeto con los datos que enviarás al endpoint
    const datosUsuario = {
      Pnombre: nombre,
      Papellido: apellido,
      Usuario: usuario,
      Contra: contra,
      fecha_nacimiento: fechaNacimiento,
      Celular: celular,
      Tipo_usuario: tipoUsuario
    };

    // Enviar los datos utilizando Ajax
    $.ajax({
      type: "POST",
      url: "server/gestion_nuevoUsuario.php", // Reemplaza esto por la URL de tu endpoint
      data: datosUsuario,
      success: function (response) {
        const respuesta = JSON.parse(response)
        if (response) {

          location.reload();

        }
      },
      error: function (error) {
        // Manejar el error en caso de que falle la solicitud Ajax
        console.log("Error:", error);
      }
    });
  });


  $(".editarBtn").click(function () {
    const idUsuario = $(this).data("id");

    // Realizar la consulta específica utilizando el ID del usuario
    $.ajax({
      url: "server/selec_usuarios.php",
      method: "POST",
      data: { idUsuario: idUsuario },
      success: function (response) {
        // Manejar la respuesta de la consulta
        console.log(response);
        const datos = JSON.parse(response)

        editarUsuario(datos);
      },
      error: function (error) {
        // Manejar errores de la solicitud
        console.log(error);
      }
    });
  });
  $('.borrarBtn').click(function () {
    // Obtener el ID de datos del atributo data-id
    const idUsuario = $(this).data('id');


    // Realizar la solicitud AJAX
    $.ajax({
      url: "server/deleteUsuario.php",
      method: 'POST',
      data: { idUsuario: idUsuario },
      success: function (response) {
        console.log(response);
        const respuesta = JSON.parse(response)
        if (response) {

          location.reload();

        }
      },
      error: function (xhr, status, error) {
        console.error('Error al enviar la consulta: ' + error);
      }
    });
  });

  $(".btnBorrarCali").click(function () {
    const idCalificacione = $(this).data("id");

    // Realizar la consulta específica utilizando el ID del usuario
    $.ajax({
      url: "../server/deleteCalificacion.php",
      method: "POST",
      data: { idCalificacione: idCalificacione },
      success: function (response) {
        // Manejar la respuesta de la consulta
        console.log(response);
        const datos = JSON.parse(response);
        if (response) {

          location.reload();

        }


      },
      error: function (error) {
        // Manejar errores de la solicitud
        console.log(error);
      }
    });
  });
  $(".aggCalificacion").click(function () {

    event.preventDefault(); // Prevent the default form submission

    // Get the form data
    const formData = $('#formcalificacion').serialize();

    // Send an AJAX request to the server
    $.ajax({
      url: '../server/crearCalificacion.php',
      type: 'POST',
      data: formData,
      success: function (response) {
        // Handle the response from the server
        const resp = JSON.parse(response)
        console.log(resp);
        if (response) {
          location.reload();
        }
        // You can display a success message or perform any other action here
      },
      error: function (xhr, status, error) {
        // Handle the error
        console.error(error);
        // You can display an error message or perform any other action here
      }
    });
  });

  // Close any open menu accordions when window is resized below 768px
  $(window).resize(function () {
    if ($(window).width() < 768) {
      $('.sidebar .collapse').collapse('hide');
    };

    // Toggle the side navigation when window is resized below 480px
    if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
      $("body").addClass("sidebar-toggled");
      $(".sidebar").addClass("toggled");
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function (e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on('scroll', function () {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function (e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
  });


  function editarUsuario(data) {


    const editNombre = document.querySelector("#Pnombre");
    editNombre.value = data.Pnombre;
    const editApellido = document.querySelector("#Papellido");
    editApellido.value = data.Papellido;

    const Usuario = document.querySelector(".UsuarioEdit");
    Usuario.value = data.Usuario;

    const editContra = document.querySelector(".ContraEdit");
    editContra.value = data.Contra;

    const editFechaNacimiento = document.querySelector(".fecha_nacimientoEdit");
    editFechaNacimiento.value = data.fecha_nacimiento;

    const editCelular = document.querySelector(".CelularEdit");
    editCelular.value = data.Celular;

    const editTipoUsuario = document.querySelector(".Tipo_usuarioEdit");
    editTipoUsuario.value = data.Tipo_usuario;
    const editIdUsuario = document.querySelector(".idUsuarioEdit");
    editIdUsuario.value = data.idUsuario;

  }


  $(".btn-edit-guardar").click(function (event) {
    event.preventDefault(); // Evitar el envío normal del formulario

    // Obtener los valores de los campos del formulario
    const Pnombre = $("#Pnombre").val();
    const Papellido = $("#Papellido").val();
    const Usuario = $(".UsuarioEdit").val();
    const Contra = $(".ContraEdit").val();
    const fecha_nacimiento = $(".fecha_nacimientoEdit").val();
    const Celular = $(".CelularEdit").val();
    const Tipo_usuario = $(".Tipo_usuarioEdit").val();
    const idUsuario = $(".idUsuarioEdit").val();

    // Realizar la solicitud AJAX para guardar los datos en la base de datos
    $.ajax({
      url: "server/updateUsuario.php",
      method: "POST",
      data: {
        idUsuario: idUsuario,
        Pnombre: Pnombre,
        Papellido: Papellido,
        Usuario: Usuario,
        Contra: Contra,
        fecha_nacimiento: fecha_nacimiento,
        Celular: Celular,
        Tipo_usuario: Tipo_usuario
      },
      success: function (response) {
        // Manejar la respuesta del endpoint
        console.log(response);
        const respuestas = JSON.parse(response);

        if (respuestas.correcto) {
          location.reload();
        }
      },
      error: function (xhr, status, error) {
        // Manejar errores de la solicitud
        console.log(error);
      }
    });
  });

})(jQuery); // End of use strict
