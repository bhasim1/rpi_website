var ones = ['', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
var tens = ['', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];
var teens = ['ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];

function convert_millions(num) {
  if (num >= 1000000) {
    return convert_millions(Math.floor(num / 1000000)) + " million " + convert_thousands(num % 1000000);
  } else {
    return convert_thousands(num);
  }
}

function convert_thousands(num) {
  if (num >= 1000) {
    return convert_hundreds(Math.floor(num / 1000)) + " thousand " + convert_hundreds(num % 1000);
  } else {
    return convert_hundreds(num);
  }
}

function convert_hundreds(num) {
  if (num > 99) {
    return ones[Math.floor(num / 100)] + " hundred " + convert_tens(num % 100);
  } else {
    return convert_tens(num);
  }
}

function convert_tens(num) {
  if (num < 10) return ones[num];
  else if (num >= 10 && num < 20) return teens[num - 10];
  else {
    return tens[Math.floor(num / 10)] + " " + ones[num % 10];
  }
}
//main entry function
function convert(num) {
  if (num == 0) return "zero";
  else return convert_millions(num);
}

//wecker
const countdown = document.getElementById("countdown");
const input = document.getElementById("wanttime");

let video = document.createElement("video");
const srcarray = [
  "alertmusic/alert.mp3",
  "alertmusic/Geld anlegen 2021_Trim.mp4",
  "alertmusic/Indila - Tourner Dans Le Vide-vtNJMAyeP0s_Trim.mp4",
  "alertmusic/stay halal brother.mp4",
  "alertmusic/yt1s.com - My cup song with a gun_360p_Trim.mp4",
  "mixkit-game-notification-wave-alarm-987.wav",
];
video.src = srcarray[Math.floor(Math.random() * srcarray.length)];
video.controls = true;
video.setAttribute("width", "100%");

let wanttimeend;
let wanttime;
let ws;
let wm;
let s;
let m;
let t;

function startTime() {
  var today = new Date();
  s = today.getHours();
  m = today.getMinutes();
  var si = s * 100;
  t = si + m;

  if (wanttime <= 0) {
    wanttime = "10,00";
  }

  wanttime = localStorage.getItem("wanttime");
  var wanttime2 = wanttime.replace(",", "");
  wanttimeend = Math.floor(Number(wanttime2));

  ws = parseInt(wanttime[0] + wanttime[1]);
  wm = parseInt(wanttime[3] + wanttime[4]);
  cd();

  if (wanttimeend === t) {
    document.querySelector(".timeset").appendChild(video);
    window.scroll(0, 10000);
    video.play();
    console.log("alert");
    setTimeout(startTime, 60 * 1000);
  } else {
    setTimeout(startTime, 1000);
  }
}
startTime();

function settime() {
  var text = input.value;
  var textjs = text.split("-");
  if (textjs[0] > 24) {
    textjs[0] = "10";
  }
  if (textjs[1] > 60) {
    textjs[1] = "10";
  }
  console.log(textjs);
  localStorage.setItem("wanttime", textjs);
  console.log("new wanted time:" + textjs);
}

function cd() {
  if (ws * 100 + wm > s * 100 + m) {
    var x;
    if (wm - m < 0) {
      x = 60 + wm - m;
    } else {
      x = wm - m;
    }
    countdown.textContent = `Noch: ${
      ws - s
    } Stunden & ${x} Minuten bis zum Klingeln`;
  } else if (ws * 100 + wm <= s * 100 + m) {
    countdown.textContent = `Klingel erst morgen wieder`;
  }
}

//bussfahrkarten alert
const canvas = document.createElement("canvas");
canvas.setAttribute("width", "300px");
canvas.setAttribute("height", "300px");

var play = true;

canvas.addEventListener("click", () => {
  play = false;
});

const ctx = canvas.getContext("2d");
ctx.font = "bold 180px serif";

const cw = canvas.width;
const ch = canvas.height;

const alertsoundcard = new Audio(
  "./alertmusic/mixkit-game-notification-wave-alarm-987.wav"
);

var lightness = 45;
var turn = 0;
const day = new Date().getDate();

if (day >= 28) {
  document.querySelector(".timeset").appendChild(canvas);
  animate();
}

function animate() {
  if (play === true) {
    alertsoundcard.play();
  }

  if (turn === 0) {
    lightness -= 0.5;
    if (lightness <= 30) {
      turn = 1;
    }
  } else {
    lightness += 0.5;
    if (lightness >= 60) {
      turn = 0;
    }
  }

  ctx.beginPath();
  ctx.lineWidth = 10;
  ctx.strokeStyle = `hsl(0, 100%, ${lightness}%)`;
  ctx.lineCap = "round";
  ctx.moveTo(cw / 2, 10);
  ctx.lineTo(10, ch - 10);
  ctx.lineTo(cw - 10, ch - 10);
  ctx.lineTo(cw / 2, 10);
  ctx.stroke();
  ctx.beginPath();
  ctx.fillText("!", cw / 2 - cw / 10, ch / 2 + (cw / 10) * 3);
  ctx.fill();
  requestAnimationFrame(animate);
}
