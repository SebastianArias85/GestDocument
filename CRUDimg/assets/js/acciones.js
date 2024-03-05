function actualizaImage(){
    const $sel = document.querySelector('#selImagen');
    const $preview = document.querySelector('#preview');

    $sel.addEventListener("change", () => {
        const $files = $sel.files;

        const $file = $files[0];

        const url = URL.createObjectURL($file);

        $preview.src = url;
    });
}