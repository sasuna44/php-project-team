
window.onload = function () {
  const products = [
    { imgsrc: "images/11.jpg", name: "Tea", stock: 5, price: 10 },
    { imgsrc: "images/12.jpg", name: "Espresso", stock: 10, price: 10 },
    { imgsrc: "images/13.jpg", name: "Turkish Coffee", stock: 3, price: 15 },
    { imgsrc: "images/16.jpg", name: "Turkish Coffee", stock: 3, price: 15 },
    { imgsrc: "images/15.jpg", name: "Turkish Coffee", stock: 3, price: 15 },
    { imgsrc: "images/11.jpg", name: "Turkish Coffee", stock: 3, price: 15 },
  ];

  let getcardcontainer = document.getElementById("cardcontainer");
  for (i = 0; i < products.length; i++) {
    let product = products[i];
    let card = document.createElement("div");
    card.classList.add("card");

    getcardcontainer.appendChild(card);

    let cardimg = document.createElement("img");
    cardimg.src = product.imgsrc;
    cardimg.classList.add("card-img-top");
    card.appendChild(cardimg);

    let cardbody = document.createElement("div");
    cardbody.classList.add("card-body");
    card.appendChild(cardbody);

    const listGroup = document.createElement("ul");
    listGroup.classList.add("list-group");

    // Create list items
    const nameItem = createListItem("Name", product.name);
    const stockItem = createListItem("Stock", product.stock);
    const priceItem = createListItem("Price", product.price);

    // Append list items to list group
    listGroup.appendChild(nameItem);
    listGroup.appendChild(priceItem);
    // listGroup.appendChild(stockItem);

    cardbody.appendChild(listGroup);
  }

  function createListItem(label, text) {
    let listItem = document.createElement("li");
    listItem.classList.add("list-group-item");
    listItem.textContent = `${label}: ${text}`;
    return listItem;
  }
  window.onscroll = function () {
    scrollFunction();
  };

  function scrollFunction() {
    if (
      document.body.scrollTop > 50 ||
      document.documentElement.scrollTop > 50
    ) {
      document.querySelector("nav").classList.add("navbar-scrolled");
    } else {
      document.querySelector("nav").classList.remove("navbar-scrolled");
    }
  }
};
