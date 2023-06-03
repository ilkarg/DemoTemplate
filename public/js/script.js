const isNull = (value) => {
    return value === null || value.trim() === '';
}

const createFoodCard = (id, name, image) => {
    let foodDiv = document.createElement('div');
    foodDiv.classList.add('col-lg-4');

    let cardDiv = document.createElement('div');
    cardDiv.classList.add('card', 'mt-2', 'text-center');
    cardDiv.style.width = '13.5rem';

    let foodImg = document.createElement('img');
    foodImg.classList.add('card-img-top');
    foodImg.width = 160;
    foodImg.height = 160;
    foodImg.alt = name;
    foodImg.src = image;

    let foodBodyDiv = document.createElement('div');
    foodBodyDiv.classList.add('card-body');

    let foodNameH = document.createElement('h5');
    foodNameH.classList.add('card-title');
    foodNameH.innerText = name;

    let foodAboutA = document.createElement('a');
    foodAboutA.href = `/menu/${id}`;
    foodAboutA.classList.add('btn', 'btn-primary', 'food-about-link');
    foodAboutA.innerText = 'Подробнее';

    foodBodyDiv.appendChild(foodNameH);
    foodBodyDiv.appendChild(foodAboutA);

    cardDiv.appendChild(foodImg);
    cardDiv.appendChild(foodBodyDiv);

    foodDiv.appendChild(cardDiv);
    $('#foods').append(foodDiv);
}

const createSliderFood = (name, image) => {
    let sliderFoodButton = document.createElement('button');
    sliderFoodButton.type = 'button';
    sliderFoodButton.setAttribute('data-bs-target', '#carouselExampleIndicators');
    sliderFoodButton.setAttribute('data-bs-slide-to', `${$('.carousel-indicators').children().length}`);
    if ($('.carousel-indicators').children().length === 0) {
        sliderFoodButton.classList.add('active');
        sliderFoodButton.setAttribute('aria-current', 'true');
    }
    sliderFoodButton.setAttribute('aria-label', name);

    let carouselItemDiv = document.createElement('div');
    carouselItemDiv.classList.add('carousel-item');
    if ($('.carousel-indicators').children().length === 0) {
        carouselItemDiv.classList.add('active');
    }

    let carouselItemImg = document.createElement('img');
    carouselItemImg.src = image;
    carouselItemImg.width = 550;
    carouselItemImg.height = 400;
    carouselItemImg.classList.add('d-block', 'w-100');
    carouselItemImg.alt = name;

    let carouselItemHeaderDiv = document.createElement('div');
    carouselItemHeaderDiv.classList.add('carousel-caption', 'd-none', 'd-md-block');
    carouselItemHeaderDiv.innerHTML = `<h3>${name}</h3>`;

    carouselItemDiv.appendChild(carouselItemImg);
    carouselItemDiv.appendChild(carouselItemHeaderDiv);

    $('.carousel-indicators').append(sliderFoodButton);
    $('.carousel-inner').append(carouselItemDiv);
}
