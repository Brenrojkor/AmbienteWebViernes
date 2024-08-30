var cards = document.querySelectorAll('.card-custom');
    cards.forEach(function(card) {
        card.addEventListener('mouseover', function() {
            card.style.transform = 'scale(1.05)'; 
        });

        card.addEventListener('mouseout', function() {
            card.style.transform = 'scale(1)';
        });
    });

    $(document).on('click', '.btnModificarNoticia', function () {
        var numNoticia = $(this).data('id');
        var titulo = $(this).data('titulo');
        var contenido = $(this).data('contenido');
        var fecha = $(this).data('fecha');
        var autor = $(this).data('autor');
        var categoria = $(this).data('categoria');
        var imagen = $(this).data('imagen');

        $('#modNum_Noticia').val(numNoticia);
        $('#modTitulo').val(titulo);
        $('#modContenido').val(contenido);
        $('#modFecha').val(fecha);
        $('#modIdAutor').val(autor);
        $('#modIdCategoria').val(categoria);
        $('#modImagen').val(imagen);
    });
