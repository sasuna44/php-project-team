window.onload = function () {
    const products = [
      { imgsrc: "images/1.jpg", name: "User1", room: 5, ext: 10 },
      { imgsrc: "images/3.jpg", name: "User2", room: 10, ext: 10 },
      { imgsrc: "images/5.jpg", name: "User3", room: 3, ext: 15 },
      { imgsrc: "images/2.jpg", name: "User4", room: 3, ext: 15 },
      { imgsrc: "images/4.jpg", name: "User5", room: 3, ext: 15 },
      { imgsrc: "images/6.jpg", name: "User6", room: 3, ext: 15 },
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
      const roomItem = createListItem("Room", product.room);
      const extItem = createListItem("Ext", product.ext);
  
      // Append list items to list group
      listGroup.appendChild(nameItem);
      listGroup.appendChild(extItem);
      listGroup.appendChild(roomItem);
  
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
  
    
  };
  