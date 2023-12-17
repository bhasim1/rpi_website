
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
  