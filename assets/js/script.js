// ANIMATION TITRE
// ///////////////
document.addEventListener("DOMContentLoaded", function() {
    var logo = document.querySelector('.fade-in');
    logo.classList.add('show');
});

// ANIMATION PHOTOS
// ///////////////
document.addEventListener("DOMContentLoaded", function() {
    var images = document.querySelectorAll('.slide-in');

    function checkSlide() {
        images.forEach(function(image) {
            var slideInAt = window.scrollY + window.innerHeight - image.height / 2;
            var imageBottom = image.offsetTop + image.height;
            var isHalfShown = slideInAt > image.offsetTop;
            var isNotScrolledPast = window.scrollY < imageBottom;

            if (isHalfShown && isNotScrolledPast) {
                image.classList.add('show');
            } else {
                image.classList.remove('show');
            }
        });
    }

    window.addEventListener('scroll', checkSlide);
    window.addEventListener('resize', checkSlide);
});
