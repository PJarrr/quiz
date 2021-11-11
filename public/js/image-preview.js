if (document.querySelector(".img-upload")) {
    console.log("works");

    function readURL(input) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();

            reader.onload = function (e) {
                $(".img-preview").attr("src", e.target.result);
            };

            reader.readAsDataURL(input.files[0]);

            //if new image is choosen, then the old one is not shown.
            let oldImg = document.querySelector(".old-img-preview");
            if (oldImg) {
                oldImg.style.display = "none";
            }
        }
    }
}
