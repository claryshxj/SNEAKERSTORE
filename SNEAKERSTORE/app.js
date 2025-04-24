const wrapper = document.querySelector(".sliderWrapper");
const menuItems = document.querySelectorAll(".menuItem");

const products = [
  {
    id: 1,
    title: "Air Force",
    price: 129,
    colors: [
      {
        code: "white",
        img: "./img/airforce.png",
      },
      {
        code: "pink",
        img: "./img/airforce2.png",
      },
    ],
  },
  {
    id: 2,
    title: "Air Jordan",
    price: 159,
    colors: [
      {
        code: "black",
        img: "./img/airjordan.avif",
      },
      {
        code: "blue",
        img: "./img/airjordan2.png",
      },
    ],
  },
  {
    id: 3,
    title: "Blazer",
    price: 119,
    colors: [
      {
        code: "black",
        img: "./img/blazer.webp",
      },
      {
        code: "white",
        img: "./img/blazer2.png",
      },
    ],
  },
  {
    id: 4,
    title: "Crater",
    price: 139,
    colors: [
      {
        code: "blue",
        img: "./img/crater1.png",
      },
      {
        code: "black",
        img: "./img/crater2.avif",
      },
    ],
  },
  {
    id: 5,
    title: "Hippie",
    price: 109,
    colors: [
      {
        code: "gray",
        img: "./img/hippie.webp",
      },
      {
        code: "black",
        img: "./img/hippie2.png",
      },
    ],
  },
];

let choosenProduct = products[0];

const currentProductImg = document.querySelector(".productImg");
const currentProductTitle = document.querySelector(".productTitle");
const currentProductPrice = document.querySelector(".productPrice");
const currentProductColors = document.querySelectorAll(".color");
const currentProductSizes = document.querySelectorAll(".size");

menuItems.forEach((item, index) => {
  item.addEventListener("click", () => {
    //change the current slide
    wrapper.style.transform = `translateX(${-100 * index}vw)`;

    //change the choosen product
    choosenProduct = products[index];

    //change texts of currentProduct
    currentProductTitle.textContent = choosenProduct.title;
    currentProductPrice.textContent = "RM" + choosenProduct.price;
    currentProductImg.src = choosenProduct.colors[0].img;

    //assing new colors
    currentProductColors.forEach((color, index) => {
      color.style.backgroundColor = choosenProduct.colors[index].code;
    });
  });
});

currentProductColors.forEach((color, index) => {
  color.addEventListener("click", () => {
    currentProductImg.src = choosenProduct.colors[index].img;
  });
});

currentProductSizes.forEach((size, index) => {
  size.addEventListener("click", () => {
    currentProductSizes.forEach((size) => {
      size.style.backgroundColor = "white";
      size.style.color = "black";
    });
    size.style.backgroundColor = "black";
    size.style.color = "white";
  });
});


const productButton = document.querySelector(".productButton");
const payment = document.querySelector(".payment");
const close = document.querySelector(".close");

productButton.addEventListener("click", () => {
  payment.style.display = "flex";
});

close.addEventListener("click", () => {
  payment.style.display = "none";
});