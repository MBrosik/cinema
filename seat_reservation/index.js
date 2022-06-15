import Seat from "./Seat.js";

window.onload = async () => {

   // ---------------------
   // get_seats arr
   // ---------------------
   let query = window.location.search;
   let urlParams = new URLSearchParams(query);
   let film_id = urlParams.get("id")

   let res = await fetch("../src/php/get_seats_arr.php", {
      method: "POST",
      headers: {
         "Content-Type": "application/json"
      },
      body: JSON.stringify({ film_id })
   });
   /**@type {{table:{yourSeat:boolean, reserved:boolean}[][], mode:boolean}} */
   let data = await res.json();

   console.log(data)



   // ---------------------
   // fill to html
   // ---------------------
   /**@type {HTMLDivElement} */
   let seatsContainer = document.querySelector(".seats-container");
   seatsContainer.style.gridTemplateColumns = `repeat(${data.table[0].length + 1}, 20px)`
   seatsContainer.style.gridTemplateRows = `repeat(${data.table.length + 1}, 20px)`

   let numbers = [...new Array(data.table[0].length + 1).keys()].map(el => {
      let html = document.createElement("div");
      if (el != 0) html.innerText = (el - 1).toString();
      return html;
   })
   seatsContainer.append(...numbers);

   let seat1Arr = data.table.map((el, ind) => el.map((el1, ind1) => {
      if (ind1 == 0) {
         let html = document.createElement("div");
         html.innerText = ind.toString();

         seatsContainer.appendChild(html);
      }

      return new Seat(el1.yourSeat, el1.reserved, data.mode)
   }))


   // -----------------------------
   // add event listener to button
   // -----------------------------

   /**@type {HTMLButtonElement} */
   let button = document.querySelector(".button-container > button");

   if (button) {
      button.onclick = async () => {
         let res = await fetch("../src/php/reserve_seats.php", {
            method: "Post",
            headers: {
               "Content-Type": "application/json"
            },
            body: JSON.stringify({
               seats: seat1Arr.map(el => el.map(el1 => ({
                  reserved: el1.reserved,
                  mySeat: el1.mySeat,
               }))),
               film_id: film_id,
            })
         });

         let json = res.text();
         console.log(json);

         alert("Zarezerwowano!");
      }
   }
}