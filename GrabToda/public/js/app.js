
{
    const navbar = document.querySelector('.navbar');

    window.addEventListener('scroll', () => {
        if (scrollY >= 188) {
            navbar.classList.add('bg');
        } else {
            navbar.classList.remove('bg');
        }
    });

    const sliderImgs = [
        "/images/dagupan.jpeg",
        "/images/market.jpg",
        "/images/up.jpg",
        "/images/sm.jpg",
        "/images/beach.jpg",
        "/images/church.jpg"
    ];

    const sliderImage = document.querySelector('.background-image');
    const sliderGrids = [...document.querySelectorAll('.grid-item')];

    let currentImage = 0;

    setInterval(changeSliderImage, 5000);

    function changeSliderImage() {
        sliderGrids.map((gridItem, index) => {
            setTimeout(() => {
                gridItem.classList.remove('hide');

                setTimeout(() => {
                    if (index == sliderGrids.length - 1) {
                        if (currentImage >= sliderImgs.length - 1) {
                            currentImage = 0;
                        } else {
                            currentImage++;
                        }

                        const sliderImage = document.querySelector('.background-image');

                        if (sliderImage) {
                            sliderImage.src = sliderImgs[currentImage];
                        } else {
                            console.error('Slider image element not found.');
                        }

                        sliderGrids.map((item, i) => {
                            setTimeout(() => {
                                item.classList.add('hide');
                            }, i * 100);
                        });
                    }
                }, 100);
            }, index * 100);
        });
    }
}
 document.getElementById('logout').addEventListener('click', function(event) {
        localStorage.removeItem('userToken');
        window.location.href = '/logout';
});
