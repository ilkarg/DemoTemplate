const isNull = (value) => {
    return value === null || value.trim() === '';
}

const createFoodCard = (id, name, image) => {
    let foodDiv = document.createElement('div');
    foodDiv.classList.add('col-lg-4');

    let cardDiv = document.createElement('div');
    cardDiv.classList.add('card', 'mt-2', 'text-center');
    cardDiv.style.width = '13.5rem';
    cardDiv.style.height = '22rem';

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

const createAdminFoodCard = (id, name, image) => {
    let foodDiv = document.createElement('div');
    foodDiv.classList.add('col-lg-4');
    foodDiv.id = `food${id}`;
    foodDiv.setAttribute('name', name);

    let cardDiv = document.createElement('div');
    cardDiv.classList.add('card', 'mt-2', 'text-center');
    cardDiv.style.width = '13.5rem';
    cardDiv.style.height = '22rem';

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

    let foodLinksDiv = document.createElement('div');

    let foodEditA = document.createElement('a');
    foodEditA.href = '#';
    foodEditA.classList.add('btn', 'btn-primary', 'food-about-link');
    foodEditA.setAttribute('data-bs-toggle', 'modal');
    foodEditA.setAttribute('data-bs-target', '#updateFoodModal');
    foodEditA.innerText = 'Изменить';
    foodEditA.onclick = (event) => {
        getAdminFoodInfo(event.target.parentNode.parentNode.parentNode.parentNode.id);
    }

    let foodRemoveA = document.createElement('a');
    foodRemoveA.href = '#';
    foodRemoveA.setAttribute('data-bs-toggle', 'modal');
    foodRemoveA.setAttribute('data-bs-target', '#confirmDeleteFoodModal');
    foodRemoveA.onclick = (event) => {
        localStorage['food'] = JSON.stringify({
            id: event.target.parentNode.parentNode.parentNode.parentNode.id,
            name: event.target.parentNode.parentNode.parentNode.parentNode.getAttribute('name')
        });
        document.querySelector('.confirm-delete-food-modal-body').innerText = `Вы уверены, что хотите удалить блюдо ${JSON.parse(localStorage['food']).name}?`;
    }
    foodRemoveA.classList.add('btn', 'btn-primary', 'food-about-link', 'mt-2');
    foodRemoveA.innerText = 'Удалить';

    foodLinksDiv.appendChild(foodEditA);
    foodLinksDiv.appendChild(foodRemoveA);

    foodBodyDiv.appendChild(foodNameH);
    foodBodyDiv.appendChild(foodLinksDiv);

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

const removeFoodData = () => {
    localStorage.removeItem('food');
}

const removeCategoryData = () => {
    localStorage.removeItem('category');
}

const createAdminCategoryCard = (id, name) => {
    let categoryDiv = document.createElement('div');
    categoryDiv.classList.add('col-lg-4');
    categoryDiv.id = `category${id}`;
    categoryDiv.setAttribute('name', name);

    let cardDiv = document.createElement('div');
    cardDiv.classList.add('card', 'mt-2', 'text-center');
    cardDiv.style.width = '13.5rem';

    let categoryBodyDiv = document.createElement('div');
    categoryBodyDiv.classList.add('card-body');

    let categoryNameH = document.createElement('h5');
    categoryNameH.classList.add('card-title');
    categoryNameH.innerText = name;

    let categoryLinksDiv = document.createElement('div');

    let categoryRemoveA = document.createElement('a');
    categoryRemoveA.href = '#';
    categoryRemoveA.setAttribute('data-bs-toggle', 'modal');
    categoryRemoveA.setAttribute('data-bs-target', '#confirmDeleteCategoryModal');
    categoryRemoveA.onclick = (event) => {
        localStorage['category'] = JSON.stringify({
            id: event.target.parentNode.parentNode.parentNode.parentNode.id,
            name: event.target.parentNode.parentNode.parentNode.parentNode.getAttribute('name')
        });
        document.querySelector('.confirm-delete-category-modal-body').innerText = `Вы уверены, что хотите удалить категорию ${JSON.parse(localStorage['category']).name}?`;
    }
    categoryRemoveA.classList.add('btn', 'btn-primary', 'food-about-link', 'mt-2');
    categoryRemoveA.innerText = 'Удалить';

    categoryLinksDiv.appendChild(categoryRemoveA);

    categoryBodyDiv.appendChild(categoryNameH);
    categoryBodyDiv.appendChild(categoryLinksDiv);

    cardDiv.appendChild(categoryBodyDiv);

    categoryDiv.appendChild(cardDiv);
    $('#categories').append(categoryDiv);
}

const addCategoryInInput = (id, name) => {
    let categoryOption = document.createElement('option');
    categoryOption.id = `category${id}`;
    categoryOption.setAttribute('name', name);
    categoryOption.innerText = name;

    document.querySelectorAll('#category')[0].appendChild(categoryOption);
    document.querySelectorAll('#category')[1].appendChild(categoryOption);
}

const writeDataInUpdateFood = (data) => {
    document.querySelectorAll('#name')[1].value = data.name;
    document.querySelectorAll('#price')[1].value = data.price;
    document.querySelectorAll('#country')[1].value = data.country;
    let options = document.querySelectorAll(".category option");

    let result = Array.prototype.filter.call(options, (option) => {
        return option.value === data.category;
    });

    if (result.length > 0) {
        result[0].setAttribute("selected", true);
    }

    document.querySelectorAll('#ingredients')[1].value = data.ingredients;
}

const clearUpdateFields = () => {
    document.querySelectorAll('#name')[1].value = '';
    document.querySelectorAll('#price')[1].value = 0;
    document.querySelectorAll('#country')[1].value = '';
    document.querySelectorAll('#category')[1].innerHTML = '';
    document.querySelectorAll('#ingredients')[1].value = '';
}
