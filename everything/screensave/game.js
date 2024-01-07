const canvas = document.querySelector("canvas");
const ctx = canvas.getContext("2d");
// ctx.canvas.width = window.innerWidth - 6; ///4;
// ctx.canvas.height = window.innerHeight - 6; //-100;
const DOMrect = canvas.parentElement.getBoundingClientRect();
console.log(DOMrect);
const cw = DOMrect.width;
const ch = DOMrect.height;

const extra_space = 100;
const speed = 1;
const circles = [];

ctx.canvas.width = cw; ///4;
ctx.canvas.height = ch; //-100;
ctx.lineWidth = 5;
const saveway = [];

class ball {
  constructor(uuid, x, y, vx, vy, radius, color) {
    this.uuid = uuid;
    this.x = x;
    this.y = y;
    this.vx = vx;
    this.vy = vy;
    this.radius = radius;
    this.color = color;
  }
  gradientconnect(x1, y1, c1, x2, y2, c2) {
    ctx.beginPath();
    let gradient = ctx.createLinearGradient(x1, y1, x2, y2);
    gradient.addColorStop(0, c1);
    gradient.addColorStop(1, c2);
    ctx.strokeStyle = gradient;
    ctx.moveTo(x1, y1);
    ctx.lineTo(x2, y2);
    ctx.stroke();
    ctx.closePath();
  }
  connections() {
    for (let index = 0; index < circles.length; index++) {
      const element = circles[index];
      if (
        Math.sqrt((this.x - element.x) ** 2 + (this.y - element.y) ** 2) <
          300 && // näher als 150 pixel diagonal
        this.uuid != element.uuid
      ) {
        this.gradientconnect(
          this.x,
          this.y,
          this.color,
          element.x,
          element.y,
          element.color
        );
      }
    }
  }
  draw() {
    this.connections();
    ctx.beginPath();
    ctx.fillStyle = this.color;
    ctx.arc(this.x, this.y, this.radius, Math.PI * 2, false);
    ctx.fill();
    ctx.closePath();
  }
  update() {
    if (
      this.x + this.radius - extra_space > canvas.width ||
      this.x - this.radius + extra_space < 0
    ) {
      this.vx = -this.vx;
    }
    if (
      this.y + this.radius - extra_space > canvas.height ||
      this.y - this.radius + extra_space < 0
    ) {
      this.vy = -this.vy;
    }
    this.x += this.vx;
    this.y += this.vy;
  }
}

function init() {
  for (let index = 0; index < 10; index++) {
    circles.push(
      new ball(
        uuidv4(),
        Math.floor(Math.random() * cw),
        Math.floor(Math.random() * ch),
        Math.floor(Math.random() * 20 - 10) * speed,
        Math.floor(Math.random() * 20 - 10) * speed,
        Math.floor(Math.random() * 10) + 10,
        get_random_color()
      )
    );
  }
}
init();
function animate() {
  ctx.beginPath();
  ctx.fillStyle = `hsla(${0} , 0%, 0%, 0.3)`;
  ctx.fillRect(0, 0, canvas.width, canvas.height);
  ctx.closePath();

  for (const circle of circles) {
    circle.update();
    circle.draw();
  }
  requestAnimationFrame(animate);
}
animate();
