$('#form-log').on("submit", function(e) {
      e.preventDefault();
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
      $.ajax({
            url: './src/controllers/ctrlLog.php',
            method: 'POST',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                  if (response.status === 'success') {
                        Toast.fire({
                              icon: "success",
                              title: "Bienvenido"
                        }).then(() => {
                              location.reload();
                        });
                  }else{
                        Toast.fire({
                              icon: "warning",
                              title: "Credenciales Erroneas."
                        })
                  }
            },
            error: function(errorThrown) {
                  Toast.fire({
                        icon: "error",
                        title: "Error en la obtencion de credenciales"
                  });
            }
      });
});