function sleep(ms) {
  return new Promise((resolve) => setTimeout(resolve, ms));
}

async function get_weather() {
  const API_KEY = "787aed01a8c7395ff5bcba9715a7be6a";
  let req = await fetch(
    `https://api.openweathermap.org/data/2.5/weather?q=Wittlich, Deutschland&units=metric&lang=de&appid=${API_KEY}`
  ).then((x) => x.json());
  return {
    temp: req["main"]["temp"],
    humidity: req["main"]["humidity"],
    weather: [
      req["weather"][0]["description"],
      "http://openweathermap.org/img/w/" + req["weather"][0]["icon"] + ".png",
    ],
  };
}

async function handle_weather() {
  let temp_field = document.querySelector(".weather #temp");
  let humidity_field = document.querySelector(".weather #humidity");
  let description_field = document.querySelector(".weather #description");
  let description_img = document.querySelector(".weather #description-img");

  const api_data = await get_weather();
  temp_field.textContent = "Temperatur: " + api_data.temp + "°C ";
  humidity_field.textContent = "Luftfeuchtigkeit: " + api_data.humidity + "% ";
  description_field.textContent = "Beschreibung: " + api_data.weather[0];
  description_img.src = api_data.weather[1];
}

async function get_news() {
  const output = [];
  let req = await fetch("https://www.tagesschau.de/api2u/homepage").then((x) =>
    x.json()
  );
  console.log(req["news"]);
  try {
    for (const x of req["news"]) {
      output.push([
        x["title"],
        x["firstSentence"],
        x["teaserImage"]["imageVariants"]["1x1-256"],
      ]);
    }
  } catch {}
  return output;
}

async function handle_news() {
  let news_div = document.querySelector(".news");
  news_div.childNodes.forEach((x) => {
    x.remove();
  });
  news_div.innerHTML = "";
  let base = document.createElement("div");
  console.log(base);
  let i = 0;
  for (const x of await get_news()) {
    if (i === 8) {
      break;
    }
    base.innerHTML = `<h2>${x[0]}</h2><p>${
      x[1] == undefined ? "empty" : x[1]
    }</p><img id="news-img" src="${x[2]}">`;
    news_div.append(base);
    base = document.createElement("div");
    i++;
  }
}
function get_schedule() {}

function show_elements() {
  let el = document.querySelectorAll(".news, .weather");
  for (const iterator of el) {
    iterator.classList.remove("hide");
    iterator.classList.add("show");
  }
}

function hide_elements() {
  let el = document.querySelectorAll(".news, .weather");
  for (const iterator of el) {
    iterator.classList.remove("show");
    iterator.classList.add("hide");
  }
}

const delay = 1000;
function update() {
  setTimeout(handle_weather, 1);
  setTimeout(handle_news, 1);

  setTimeout(async () => {
    hide_elements();
    await sleep(1000);
    update();
    show_elements();
    await sleep(1000);
  }, 60 * 1000);
}

async function main() {
  update();
}

main();

/************/
// MATRIX CODE

class matrix {
  init() {
    this.stopanimation = false;
    this.last = performance.now();
    this.canvas = document.querySelector("canvas");

    this.size = this.get_size();
    this.canvas.width = this.size[0];
    this.canvas.height = this.size[1];
    this.cw = this.canvas.width;
    this.ch = this.canvas.height;
    this.ctx = this.canvas.getContext("2d");

    this.line = [];

    this.fontsize = 10;
    this.ctx.font = this.fontsize + "px Monospace";
    this.ctx.textAlign = "left";
    this.ctx.textBaseline = "midlle";
    this.ctx.clearRect(0, 0, this.cw, this.ch);

    this.ctx.fillStyle = "rgba(13, 13, 13, 1)";

    this.ctx.moveTo(0, 0);
    this.ctx.rect(0, 0, this.cw, this.ch);
    this.ctx.fill();

    animate();
  }
  get_size() {
    this.DomRect = this.canvas.parentElement.getBoundingClientRect();
    return [this.DomRect.width, this.DomRect.height];
  }

  cleanline() {
    const basearr = [];
    for (let index = 0; index < this.line.length; index++) {
      this.line[index] != undefined ? basearr.push(this.line[index]) : null;
    }
    this.line = basearr;
  }

  randomnumber() {
    let num = Math.floor(Math.random() * 9) + 48;
    let n = String.fromCharCode(num);
    return n;
  }

  spawnnewline() {
    let x =
      Math.floor(Math.random() * (this.cw - this.fontsize * 2)) + this.fontsize;
    let y = -Math.floor(Math.random() * this.fontsize * 20);
    this.line.push([x, y]);
  }

  drawlines() {
    this.line.forEach((element, index) => {
      this.line[index][1] += this.fontsize * 1.25;
      if (element[1] >= this.ch && index === 0) {
        this.line.shift();
      } else if (element[1] >= this.ch) {
        delete this.line[index];
      } else {
        this.ctx.fillStyle = "#53c23a";

        this.ctx.moveTo(element[0], element[1]);
        this.ctx.fillText(this.randomnumber(), element[0], element[1]);
      }
    });
  }
}

const ma = new matrix();
ma.init();
// window.addEventListener("resize", () => {
//   ma.init();
// });
function animate() {
  if (ma.last + 100 <= performance.now() && !ma.stopanimation) {
    ma.cleanline();

    ma.ctx.fillStyle = "rgba(13, 13, 13, 0.1)";
    ma.ctx.moveTo(0, 0);
    ma.ctx.rect(0, 0, ma.cw, ma.ch);
    ma.ctx.fill();

    if (Math.floor(Math.random() * 3) === 0) {
      ma.spawnnewline();
    }
    ma.drawlines();
    ma.last = performance.now();
  }
  requestAnimationFrame(animate);
}
