var layouts = document.getElementsByClassName('layouts')[0];
var app = document.getElementById('mycanvas');
// var renderer = new PIXI.autoDetectRenderer(1000,400,);
var app = new PIXI.Application(600, 300, { view: app });
layouts.appendChild(app.view);
var stage = app.stage;

var brush = new PIXI.Graphics();
brush.beginFill(0xE7ED26);
brush.drawCircle(0, 0, 30);
brush.endFill();

PIXI.loader.add("t1", "images/brush/proj8-1voetbal.jpg");
PIXI.loader.add("t2", "images/brush/BGrotate.jpg");
PIXI.loader.load(setup);

function setup(loader, resources) {
  var background = new PIXI.Sprite(resources["t1"].texture);
  stage.addChild(background);
  background.width = app.screen.width;
  background.height = app.screen.height;

  var imageToReveal = new PIXI.Sprite(resources["t2"].texture);
  stage.addChild(imageToReveal);
  imageToReveal.width = app.screen.width;
  imageToReveal.height = app.screen.height;

  var renderTexture = PIXI.RenderTexture.create(app.screen.width, app.screen.height);

  var renderTextureSprite = new PIXI.Sprite(renderTexture);
  stage.addChild(renderTextureSprite);
  imageToReveal.mask = renderTextureSprite;

  app.stage.interactive = true;
  app.stage.on('pointerdown', pointerDown);
  app.stage.on('pointerup', pointerUp);
  app.stage.on('pointermove', pointerMove);

  var dragging = false;

  function pointerMove(event) {
    if (dragging) {
      brush.position.copy(event.data.global);
      app.renderer.render(brush, renderTexture, false, null, false);
    }
  }

  function pointerDown(event) {
    dragging = true;
    pointerMove(event);
  }

  function pointerUp(event) {
    dragging = false;
  }
};
$("#scene-mask").parallax();
