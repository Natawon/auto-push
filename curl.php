<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans+Mono" rel="stylesheet">
<link rel="prefetch" href="http://www.iconsdb.com/icons/preview/white/check-mark-xxl.png">
<link rel="prefetch" href="http://www.iconsdb.com/icons/preview/white/x-mark-xxl.png">
    <title>Document</title>

    <style>
* {
  box-sizing: border-box;
  padding: 0;
  margin: 0;
  font-family: monospace;
}

.progress-bar {
  height: 20px;
  background: #1da1f2;
  box-shadow: 2px 14px 15px -7px rgba(30, 166, 250, 0.36);
  border-radius: 50px;
  transition: all 0.5s;
}

.container {
  width: 100%;
  height: 100vh;
  display: flex;
  flex-flow: column nowrap;
  justify-content: center;
  align-items: center;
}
.container h2 {
  margin-bottom: 20px;
}
.container .progress {
  width: 40%;
  height: 200px;
  display: flex;
  flex-flow: column nowrap;
  justify-content: center;
  align-items: start;
  padding: 20px;
  background: #e6e9ff;
  border-radius: 20px;
  box-shadow: 0px 10px 50px #abb7e9;
}

.doc {
  display: block;
  text-align: center;
  font-size: 20px;
  color: white;
  background: #263238;
  padding: 10px;
}
        
    </style>
</head>
<body>

<!-- add with javascript -->
<div class="container">
  <h2>Progressing</h2>
  <div class="progress"></div>
</div>
<!-- read document -->
<a class="doc" target="_blank" href="https://github.com/Miladxsar23/simple-progressbar-component">Document</a>


</body>
</html>

<script>
    /* 
 * (class)Progress<nowValue, minValue, maxValue>
 */

//helper function-> return <DOMelement>
function elt(type, prop, ...childrens) {
  let elem = document.createElement(type);
  if (prop) Object.assign(elem, prop);
  for (let child of childrens) {
    if (typeof child == "string") elem.appendChild(document.createTextNode(child));
    else elem.appendChild(elem);
  }
  return elem;
}

//Progress class
class Progress {
  constructor(now, min, max, options) {
    this.dom = elt("div", {
      className: "progress-bar"
    });
    this.min = min;
    this.max = max;
    this.intervalCode = 0;
    this.now = now;
    this.syncState();
    if(options.parent){
      document.querySelector(options.parent).appendChild(this.dom);
    } 
    else document.body.appendChild(this.dom)
  }

  syncState() {
    this.dom.style.width = this.now + "%";
  }

  startTo(step, time) {
    if (this.intervalCode !== 0) return;
    this.intervalCode = setInterval(() => {
      console.log("sss")
      if (this.now + step > this.max) {
        this.now = this.max;
        this.syncState();
        clearInterval(this.interval);
        this.intervalCode = 0;
        return;
      }
      this.now += step;
      this.syncState()
    }, time)
  }
  end() {
    this.now = this.max;
    clearInterval(this.intervalCode);
    this.intervalCode = 0;
    this.syncState();
  }
}


let pb = new Progress(15, 0, 100, {parent : ".progress"});

//arg1 -> step length
//arg2 -> time(ms)
pb.startTo(5, 500);

//end to progress after 5s
setTimeout( () => {
  pb.end()
}, 50000)
</script>