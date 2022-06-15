export default class Seat {
   /**
    * @param {boolean} mySeat
    * @param {boolean} reserved
    * @param {boolean} mode
    */
   constructor(mySeat, reserved, mode) {
      this.mySeat = mySeat;
      this.reserved = reserved;
      this.mode = mode;

      this.html = document.createElement("div");
      this.html.classList.add("seat");

      if (this.reserved && this.mySeat) {
         this.html.classList.add("my-reserved");
         this.addListener();
      }
      else if (this.reserved) {
         this.html.classList.add("reserved");
      }
      else if(this.mode) {
         this.addListener();
      }
      else{
         this.html.style.cursor = "default";
      }

      document.querySelector(".seats-container").appendChild(this.html);
   }
   addListener() {
      if(this.mode){
         this.html.onclick = () => {
            this.reserved = this.reserved ? false : true;
            this.mySeat = this.mySeat ? false : true;
            
            this.html.classList[this.mySeat?"add":"remove"]("my-reserved");
         }
      }
   }
}