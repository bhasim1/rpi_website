function sleep(ms) {
  return new Promise((resolve) => setTimeout(resolve, ms));
}

class Key_watcher {
  /**
   *
   * @param {Array} keys keys array and call-back function
   */
  constructor(keys) {
    this.keys = keys;
    console.log(this.keys);
    this.pressed = [];
    document.body.addEventListener("keydown", (e) => {
      // console.log(e);
      if (!this.pressed.includes(e.key)) {
        this.pressed.push(e.key);
      }
      // console.log(this.pressed);
      this.execute_callbacks();
    });
    document.body.addEventListener("keyup", (e) => {
      // console.log(e);
      this.pressed.map((el, inel) => {
        if (el == e.key) {
          this.pressed.splice(inel, 1);
        }
      });
      // console.log(this.pressed);
    });
  }

  execute_callbacks() {
    // console.log(this.keys);
    for (let index = 0; index < this.keys.length; index++) {
      let searched_keys = this.keys[index][0]; //array of key comb
      let callback_func = this.keys[index][1];
      let is_included = 0;
      for (let i = 0; i < this.pressed.length; i++) {
        let pressed_key = this.pressed[i];
        // console.log(pressed_key);
        if (searched_keys.includes(pressed_key)) {
          console.log(searched_keys, searched_keys[index], pressed_key);
          is_included++;
          console.log(is_included);
        }
      }
      // console.log(searched_keys);
      if (searched_keys.length == is_included) {
        callback_func();
      }
    }
  }
}

const Keywatcher = new Key_watcher([
  [
    ["e", "l"],
    () => {
      let user_input = prompt(
        "links to be displayed as JSON array",
        window.localStorage.getItem("user_links")
      );
      user_input ??= "[]"
      window.localStorage.setItem("user_links", user_input)
    },
  ],
]);
